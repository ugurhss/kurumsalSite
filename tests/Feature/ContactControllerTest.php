<?php

use App\Models\Contact;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

test('İletişim formu testi ', function () {
    $this->withoutMiddleware(VerifyCsrfToken::class); //CSRF korumasını devre dışı bırakma 

    $payload = [ //formda yer alacak veriler
        'name' => 'ugurcan Doğan',
        'phone' => '55555',
        'email' => 'ugur@example.com',
        'message' => 'Merhaba, bilgi almak istiyorum.',
    ];

    $response = $this->post(route('contact.store'), $payload); //post istegiyi yapacagım name den aldı ve dedimki verileri payload dan al

    $response // cevabı aldık sonra ise blade.php de ne olacak succes mesajı
        ->assertRedirect(route('contact.create'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('contacts', [ //burada ise veritabanında kayıt oldumu diye kontrol ediyorum
        'email' => 'ugur@example.com',
        'status' => 'new',
    ]);

    expect(Contact::query()->count())->toBe(1);//veritabanında 1 kayıt oldugunu test et
});

test('İletişim formu eksik veri ile gönderildiğinde hata döndürür testin amacı her zaman dogru olanı bulmak degil', function () {
    $this->withoutMiddleware(VerifyCsrfToken::class); 

    $response = $this->post(route('contact.store'), []);

    $response
        ->assertStatus(302)
        ->assertSessionHasErrors(['name', 'phone', 'email', 'message']);

    expect(Contact::query()->count())->toBe(0);
});
