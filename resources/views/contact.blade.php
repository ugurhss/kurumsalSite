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

<form action="{{ route('contact.store') }}" method="POST" class="form">
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



@include('partials.footer')
@endsection
