<?php

use App\Models\Contact;
use App\Repositories\BaseRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\DB;

test('service katmanı repository metodlarını doğru parametrelerle çağırıyor mu', function () {
    $repo = \Mockery::mock(BaseRepository::class); // baseRepositorynin bir mock'unu oluşturuyorum
    $service = new class($repo) extends BaseService {}; // baseServiceten anonim random bir sınıf oluşturuyorum

    $repo->shouldReceive('list') // ve list metodunu bekliyorum
        ->once() // bir kere çağrılacak
        ->with(['status' => 'new'], ['user'], 10) //durumu yeni olan ve user ilişkisi ile birlikte 10 tane kayıt istiyorum
        ->andReturn(new EloquentCollection()); //boş bir koleksiyon döndürüyor

    $repo->shouldReceive('get') // get metodunu bekliyorum
        ->once()
        ->with(123, ['user']) // id'si 123 olan kaydı user ilişkisi ile birlikte istiyorum
        ->andReturn(null); //kayıt yok null döndürüyor

    $service->list(['status' => 'new'], ['user'], 10);
    $service->get(123, ['user']);
});

test('base service veri yazma işlemlerini db transaction ile korur crud', function () {
    DB::shouldReceive('transaction') // DB'nin transaction metodunu bekliyorum
        ->times(3) // 3 kere çağrılacak
        ->andReturnUsing(fn (callable $callback) => $callback()); //ve çağrıldığında verilen callback'i çalıştıracak

    $repo = \Mockery::mock(BaseRepository::class); // baseRepositorynin bir mockunu oluşturuyorum
    $service = new class($repo) extends BaseService {}; // baseServiceten anonim random bir sınıf oluşturuyorum

    $created = new Contact(['email' => 'a@example.com']); // yeni bir contact modeli oluşturuyorum
    $repo->shouldReceive('create')->once()->with(['email' => 'a@example.com'])->andReturn($created); // create metodunu bekliyorum
    expect($service->create(['email' => 'a@example.com']))->toBe($created); // servisin create metodunu çağırdığımda oluşturulan modeli döndürüyor

    $updated = new Contact(['email' => 'b@example.com']); 
    $repo->shouldReceive('update')->once()->with(5, ['email' => 'b@example.com'])->andReturn($updated);
    expect($service->update(5, ['email' => 'b@example.com']))->toBe($updated);

    $repo->shouldReceive('delete')->once()->with(7)->andReturn(true);
    expect($service->delete(7))->toBeTrue();
});
