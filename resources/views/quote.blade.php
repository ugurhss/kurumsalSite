@extends('layouts.app')

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
        <p>Teklifin hızlı hazırlanması için ürün ölçüsü, adet, baskı türü ve teslim tarihi gibi detayları yazmanız önerilir.</p>

        <!-- <div class="info-note">
          <strong>İpucu:</strong> Eğer örnek görsel/çizim varsa ek dosya alanı da ekleyebiliriz.
        </div> -->
      </aside>

      {{-- Form --}}
      <section class="quote-card quote-form">
        <h2>Teklif Formu</h2>

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

        <form action="{{ url('/quote') }}" method="POST" class="form">
          @csrf

          <div class="form-row">
            <div class="field">
              <label>ADINIZ SOYADINIZ</label>
              <input type="text" name="full_name" value="{{ old('full_name') }}" required>
            </div>
          </div>

          <div class="form-row two">
            <div class="field">
              <label>TELEFON</label>
              <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="05xx xxx xx xx" required>
            </div>

            <div class="field">
              <label>MAİL</label>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@mail.com" required>
            </div>
          </div>

          <div class="form-row two">
            <div class="field">
              <label>FİRMANIZ</label>
              <input type="text" name="company" value="{{ old('company') }}" required>
            </div>

            <div class="field">
              <label>FİRMANIZIN BULUNDUĞU ŞEHİR</label>
              <input type="text" name="city" value="{{ old('city') }}" placeholder="Örn: Mersin" required>
            </div>
          </div>

          <div class="field">
            <label>TEKLİF İSTEDİĞİNİZ ÜRÜN</label>
            <input type="text" name="product" value="{{ old('product') }}" placeholder="Örn: Islak Mendil / Ambalaj / Kutu" required>
          </div>

          <div class="field">
            <label>ÜRÜN İÇERİĞİ HAKKINDA BİLGİ VERİNİZ.</label>
            <textarea name="details" rows="7" required
              placeholder="Örn: Ölçüler, adet, baskı (CMYK/varak), malzeme (PET/PE), kapak türü, teslim tarihi vb.">{{ old('details') }}</textarea>
          </div>

          <button type="submit" class="btn-submit">
            Teklif İste <span class="btn-arrow">→</span>
          </button>
<br>
          <p class="form-footnote">
            Formu göndererek iletişim bilgilerinizin teklif amaçlı kullanılmasını kabul etmiş olursunuz.
          </p>
        </form>
      </section>

    </div>
  </div>
</section>



@include('partials.footer')
@endsection
