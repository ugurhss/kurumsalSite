@extends('layouts.app')

@section('content')
  <section class="about-cta">
  <div class="container-about">
    <div class="cta-wrapper">
      <h2>Tedarikçi Başvurusu</h2>

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
<section class="supplier-page">
  <div class="container">

 

    <div class="supplier-grid">

      {{-- SOL: Bilgilendirme --}}
      <aside class="card info-card">
        <h2>Başvuru Bilgisi</h2>
        <p>
          Başvurunuz değerlendirildikten sonra ekibimiz sizinle iletişime geçer.
          Ürün/hammadde özelliklerini, minimum sipariş miktarını (MOQ), teslim süresini ve varsa sertifikaları belirtmeniz önerilir.
        </p>

        <!-- <div class="note">
          <strong>İpucu:</strong> Ürün datasheet, analiz raporu veya sertifika gibi ek dosya yükleme alanı da ekleyebiliriz.
        </div> -->
      </aside>

      {{-- SAĞ: Form --}}
      <section class="card form-card">
        <h2>Başvuru Formu</h2>

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

        <form action="{{ url('/supplier-apply') }}" method="POST" class="form">
          @csrf

          <div class="row two">
            <div class="field">
              <label>ADINIZ SOYADINIZ</label>
              <input type="text" name="full_name" value="{{ old('full_name') }}" required>
            </div>

            <div class="field">
              <label>FİRMANIZ</label>
              <input type="text" name="company" value="{{ old('company') }}" required>
            </div>
          </div>

          <div class="row two">
            <div class="field">
              <label>TELEFON</label>
              <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="05xx xxx xx xx" required>
            </div>

            <div class="field">
              <label>MAİL</label>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@mail.com" required>
            </div>
          </div>

          <div class="row">
            <div class="field">
              <label>FİRMANIZIN BULUNDUĞU ŞEHİR</label>
              <input type="text" name="city" value="{{ old('city') }}" placeholder="Örn: Mersin" required>
            </div>
          </div>

          <div class="row">
            <div class="field">
              <label>TEKLİF VERMEK İSTEDİĞİNİZ ÜRÜN</label>
              <input type="text" name="product" value="{{ old('product') }}" placeholder="Örn: Nonwoven / Ambalaj Film / Kapak / Esans" required>
            </div>
          </div>

          <div class="row">
            <div class="field">
              <label>TEKLİF VERMEK İSTEDİĞİNİZ ÜRÜN HAKKINDA BİLGİ VERİNİZ</label>
              <textarea name="details" rows="7" required
                placeholder="Örn: Teknik özellikler, MOQ, termin süresi, fiyatlandırma modeli, sertifikalar (ISO/REACH), numune durumu vb.">{{ old('details') }}</textarea>
            </div>
          </div>

          <button type="submit" class="btn-submit">
            Başvuru Gönder <span class="arrow">→</span>
          </button>
<br>
          <p class="footnote">
            Formu göndererek bilgilerinizin başvurunun değerlendirilmesi amacıyla kullanılmasını kabul etmiş olursunuz.
          </p>
        </form>
      </section>

    </div>
  </div>
</section>



@include('partials.footer')
@endsection
