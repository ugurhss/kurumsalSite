@extends('layouts.app')

@section('content')

<section class="contact-page">
  <div class="container">

    {{-- Başlık --}}
    <header class="contact-hero">
      <h1>İletişim</h1>
      <p>Formu doldurun, en kısa sürede size dönüş yapalım.</p>
    </header>

    <div class="contact-grid">

      {{-- SOL: Hızlı İletişim + Harita --}}
      <aside class="contact-card contact-info">
        <h2>Hızlı İletişim</h2>
        <p>Talep, fiyat teklifi ve üretim süreçleri için bize yazabilirsiniz.</p>

        <div class="info-list">
          <div class="info-item">
            <span class="info-label">Telefon</span>
            <span class="info-value">0 (544) 438 37 94</span>
          </div>
          <div class="info-item">
            <span class="info-label">E-posta</span>
            <span class="info-value">info@siteadi.com</span>
          </div>
          <div class="info-item">
            <span class="info-label">Adres</span>
            <span class="info-value">Mersin / Türkiye</span>
          </div>
        </div>

        {{-- HARİTA --}}
        <div class="contact-map">
          <iframe
            src="https://www.google.com/maps?q=Mersin,Turkey&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
          </iframe>
        </div>

        <div class="info-note">
          <strong>Not:</strong> Ürün/ambalaj ölçüsü, adet ve baskı bilgilerini yazarsanız daha hızlı teklif çıkar.
        </div>
      </aside>

      {{-- SAĞ: İletişim Formu --}}
      <section class="contact-card contact-form">
        <h2>Mesaj Gönder</h2>

        @if(session('success'))
          <div class="alert success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
          <div class="alert error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ url('/contact') }}" method="POST" class="form">
          @csrf

          <div class="form-row">
            <div class="field">
              <label>Ad Soyad</label>
              <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="field">
              <label>Telefon</label>
              <input type="tel" name="phone" value="{{ old('phone') }}" required>
            </div>
          </div>

          <div class="field">
            <label>E-posta</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
          </div>

          <div class="field">
            <label>Mesaj</label>
            <textarea name="message" rows="6" required>{{ old('message') }}</textarea>
          </div>

          <button type="submit" class="btn-submit">
            Gönder <span class="btn-arrow">→</span>
          </button>

          <p class="form-footnote">
            Gönder butonuna basarak iletişim bilgilerinizin yanıt amacıyla kullanılmasını kabul etmiş olursunuz.
          </p>
        </form>
      </section>

    </div>
  </div>
</section>

{{-- STYLES --}}
<style>
.contact-page{padding:70px 0;background:#f6f7fb}
.container{max-width:1100px;margin:0 auto;padding:0 18px}
.contact-hero{margin-bottom:24px}
.contact-hero h1{font-size:40px;margin-bottom:10px;color:#101828}
.contact-hero p{color:#475467}

.contact-grid{display:grid;grid-template-columns:1fr 1.4fr;gap:20px}
@media(max-width:900px){.contact-grid{grid-template-columns:1fr}}

.contact-card{
  background:#fff;border-radius:18px;padding:22px;
  border:1px solid #eaecf0;
  box-shadow:0 10px 30px rgba(16,24,40,.06)
}
.contact-card h2{font-size:20px;margin-bottom:10px;color:#101828}

.info-list{display:grid;gap:10px;margin:14px 0}
.info-item{background:#f9fafb;border:1px solid #f2f4f7;border-radius:14px;padding:12px}
.info-label{font-size:12px;color:#667085}
.info-value{font-weight:600;color:#101828}

.contact-map{
  margin-top:14px;border-radius:16px;overflow:hidden;
  border:1px solid #eaecf0;
}
.contact-map iframe{width:100%;height:220px;border:0}

.info-note{
  margin-top:14px;padding:12px;border-radius:14px;
  background:#ecfdf3;border:1px solid #abefc6;
  color:#067647;font-size:13px
}

.alert{padding:12px;border-radius:14px;margin-bottom:12px}
.alert.success{background:#ecfdf3;border:1px solid #abefc6;color:#067647}
.alert.error{background:#fef3f2;border:1px solid #fecdca;color:#b42318}

.form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
@media(max-width:700px){.form-row{grid-template-columns:1fr}}

.field{display:flex;flex-direction:column;gap:8px;margin-bottom:12px}
input,textarea{
  border:1px solid #d0d5dd;border-radius:14px;
  padding:12px;font-size:14px
}
input:focus,textarea:focus{outline:none;border-color:#2563eb}

.btn-submit{
  width:100%;padding:12px;border-radius:14px;
  background:#2563eb;color:#fff;font-weight:700;
  border:none;cursor:pointer
}
.form-footnote{margin-top:10px;font-size:12px;color:#667085}
</style>

@include('partials.footer')
@endsection
