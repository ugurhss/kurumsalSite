@extends('layouts.app')

@section('title', 'Fiyat Teklifi Al - Gren Kurumsal')
@section('meta_description', 'Markanıza özel ambalaj çözümleri için hızlıca fiyat teklifi alın. Proje detaylarınızı iletin, uzman ekibimiz size en uygun çözümleri sunsun.')
@section('meta_keywords', 'gren teklif al, ambalaj fiyat teklifi, özel üretim ambalaj fiyatları, kurumsal teklif formu')

@section('content')

<section class="about-cta">
  <div class="container-about">
    <div class="cta-wrapper">
      <h2>Teklif oluştur</h2>

      <p class="cta-subtitle">
        Güvenilir iş ortaklıkları ve uzun soluklu projelerle markalara değer katıyoruz.
      </p>

      <p class="cta-description">
        Farklı sektörlerden birçok marka ile yürüttüğümüz başarılı iş birlikleri,
        kalite anlayışımızın ve hizmet gücümüzün en güçlü göstergesidir.
        Her projede markaya özel çözümler üreterek sürdürülebilir iş ortaklıkları kuruyoruz.
      </p>

      <div class="cta-buttons">
        <a href="/references" class="btn btn-primary">
          <span class="btn-text">Referanslarımızı İnceleyin</span>
          <span class="btn-arrow">→</span>
        </a>
        <a href="/contact" class="btn btn-outline">Bizimle Çalışın</a>
      </div>

      <p class="cta-footer">
        Siz de referanslarımız arasındaki yerinizi almak ister misiniz?
      </p>
    </div>
  </div>
</section>

<section class="quote-page">
  <div class="container">
    <div class="quote-grid">

      {{-- Sol Bilgi Kartı --}}
      <aside class="quote-card quote-info">
        <h2>Bilgi</h2>
        <p>
          Teklifin hızlı hazırlanması için ürün ölçüsü, adet, baskı türü ve teslim tarihi gibi detayları yazmanız önerilir.
        </p>

        <div class="info-note" style="margin-top:14px; padding:12px; border-radius:12px; background:#f7f7f7; color:#444;">
          <strong>İpucu:</strong> Ölçü, malzeme (PET/PE), baskı (CMYK/varak), kapak türü, adet ve teslim tarihini belirtin.
        </div>
      </aside>

      {{-- Form --}}
      <section class="quote-card quote-form">
        <h2>Teklif Formu</h2>

        @if(session('success'))
          <div class="alert success">
            {{ session('success') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="alert error">
            <strong>Lütfen hataları düzeltin:</strong>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('quote.store') }}" method="POST" class="form" novalidate>
          @csrf

          <div class="form-row">
            <div class="field">
              <label>ADINIZ SOYADINIZ <span style="color:#d00">*</span></label>
              <input
                type="text"
                name="full_name"
                value="{{ old('full_name') }}"
                required
                autocomplete="name"
                @class(['is-invalid' => $errors->has('full_name')])
              >
              @error('full_name')
                <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="form-row two">
            <div class="field">
              <label>TELEFON <span style="color:#d00">*</span></label>
              <input
                type="tel"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="05xx xxx xx xx"
                required
                autocomplete="tel"
                inputmode="tel"
                @class(['is-invalid' => $errors->has('phone')])
              >
              @error('phone')
                <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
              @enderror
            </div>

            <div class="field">
              <label>MAİL <span style="color:#d00">*</span></label>
              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="ornek@mail.com"
                required
                autocomplete="email"
                @class(['is-invalid' => $errors->has('email')])
              >
              @error('email')
                <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="form-row two">
            <div class="field">
              <label>FİRMANIZ <span style="color:#d00">*</span></label>
              <input
                type="text"
                name="company"
                value="{{ old('company') }}"
                required
                autocomplete="organization"
                @class(['is-invalid' => $errors->has('company')])
              >
              @error('company')
                <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
              @enderror
            </div>

            <div class="field">
              <label>FİRMANIZIN BULUNDUĞU ŞEHİR <span style="color:#d00">*</span></label>
              <input
                type="text"
                name="city"
                value="{{ old('city') }}"
                placeholder="Örn: Mersin"
                required
                autocomplete="address-level2"
                @class(['is-invalid' => $errors->has('city')])
              >
              @error('city')
                <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="field">
            <label>TEKLİF İSTEDİĞİNİZ ÜRÜN <span style="color:#d00">*</span></label>
            <input
              type="text"
              name="product"
              value="{{ old('product') }}"
              placeholder="Örn: Islak Mendil / Ambalaj / Kutu"
              required
              @class(['is-invalid' => $errors->has('product')])
            >
            @error('product')
              <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
            @enderror
          </div>

          <div class="field">
            <label>ÜRÜN İÇERİĞİ HAKKINDA BİLGİ VERİNİZ. <span style="color:#d00">*</span></label>
            <textarea
              name="details"
              rows="7"
              required
              placeholder="Örn: Ölçüler, adet, baskı (CMYK/varak), malzeme (PET/PE), kapak türü, teslim tarihi vb."
              @class(['is-invalid' => $errors->has('details')])
            >{{ old('details') }}</textarea>
            @error('details')
              <small class="field-error" style="color:#d00; display:block; margin-top:6px;">{{ $message }}</small>
            @enderror
          </div>

          <button type="submit" class="btn-submit">
            Teklif İste <span class="btn-arrow">→</span>
          </button>

          <p class="form-footnote" style="margin-top:10px;">
            Formu göndererek iletişim bilgilerinizin teklif amaçlı kullanılmasını kabul etmiş olursunuz.
          </p>
        </form>
      </section>

    </div>
  </div>
</section>

@include('partials.footer')
@endsection
