# Test Rehberi (Pest + Laravel)

Bu projede testleri **Pest** ile yazıyoruz. İki ana klasör var:

- `tests/Unit`: Daha küçük, bağımsız parçaları (mümkünse DB/HTTP olmadan) test eder.
- `tests/Feature`: HTTP istekleri, middleware, controller, DB gibi Laravel akışını test eder.

## Komutlar

- Tüm testler: `php artisan test`
- Sadece Pest: `./vendor/bin/pest`
- Dosyaya göre: `./vendor/bin/pest tests/Feature/ContactControllerTest.php`
- İsme göre filtre: `./vendor/bin/pest --filter ContactControllerTest`

## Bu repodaki öğretici örnekler

- Contact formu (Feature): `tests/Feature/ContactControllerTest.php`
  - Başarılı POST isteği DB’ye kayıt atıyor ve redirect + flash mesaj dönüyor.
  - Validasyon hatasında session error’ları dönüyor.
- Admin middleware (Feature): `tests/Feature/AdminMiddlewareTest.php`
  - Guest ve non-admin kullanıcı `/login`’e yönleniyor.
  - Admin kullanıcı geçebiliyor.
- BaseService (Unit + mock): `tests/Unit/BaseServiceTest.php`
  - `list/get` çağrıları repository’ye paslanıyor.
  - `create/update/delete` DB transaction içinde çalışıyor (DB ve repository mock’lanıyor).

## Yeni test yazarken pratik şablon (AAA)

1) **Arrange**: Test verisini hazırla (factory/mock/seed).
2) **Act**: İstek at / metodu çağır.
3) **Assert**: Sonucu doğrula (`assertOk`, `assertRedirect`, `assertDatabaseHas`, `assertSessionHasErrors`).

## Notlar

- Feature testlerinde `tests/Pest.php` üzerinden `RefreshDatabase` aktif; test DB’si varsayılan olarak `sqlite :memory:` çalışır (`phpunit.xml`).
- Web route’larına `POST` atarken CSRF yüzünden 419 almamak için testte `withoutMiddleware(VerifyCsrfToken::class)` kullanımı örneklendi.

