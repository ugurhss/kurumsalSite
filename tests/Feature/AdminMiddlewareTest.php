<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::middleware('admin')->get('/__test/admin', fn () => response('ok'));

    //__test/admin adında sadece test için bir route tanımlıyorum
    //admin middleware doğru şekilde izin veriyor mu / engelliyor mu
    // Gerçek routeları kullansaydım  alakasız şeyler testin içine karışırdı ornegin polcy falan olsa 
});

test(' giriş yapmamış kullanıcıları login sayfasına yönlendir', function () {
    $this->get('/__test/admin')
        ->assertRedirect('/login')
        ->assertSessionHas('error'); // hata mesajı sessionda var mı kontrol ediyorum
});

test('admin olmayan kullanıcıları login sayfasına yönlendirir rol almamış kullanıcıyı yani', function () {
    $user = User::factory()->create(); // rolü olmayan normal bir kullanıcı oluşturuyorum

    $this->actingAs($user) // kullanıcıyı oturum açmış olarak ayarlıyorum
        ->get('/__test/admin') // admin route'una erişmeye çalışıyorum
        ->assertRedirect('/login') // login sayfasına yönlendirildiğini kontrol ediyorum
        ->assertSessionHas('error'); //sonra hatamız
});

test('admin kullanıcılar için doğru erişim izni verilir', function () {
    $user = User::factory()->create();
    $user->forceFill(['role' => 'admin'])->save(); // kullanıcıya admin rolü veriyorum

    $this->actingAs($user)
        ->get('/__test/admin')
        ->assertOk()
        ->assertSeeText('ok'); //cevapımız basarılı
});
