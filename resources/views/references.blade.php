@extends('layouts.app')

@section('content')

<!-- References Hero Section -->
<section class="about-cta">
  <div class="container-about">
    <div class="cta-wrapper">
      <h2>Referanslarımız</h2>

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


<!-- References Section with Marquee -->
<section class="references-section">
  <div class="references-container">
    <h2>Global Müşterilerimiz</h2>
    <p class="references-subtitle">Göksu Kağıt'ın kalitesine ve güvenilirliğine güvenen uluslararası markalar</p>
  </div>

  <!-- Logos Grid (sequential list) -->
 <div class="references-logos">
  <div class="references-container">
    <div class="references-logos-grid" aria-live="polite">

      @foreach($logos as $logo)
        <div class="logo-card">
          <img class="logo-img"
               src="{{ asset('storage/'.$logo->logo_path) }}"
               alt="{{ $logo->name }}">
        </div>
      @endforeach

    </div>
  </div>
</div>

</section>

<!-- Stats Section -->
<section class="references-stats">
  <div class="references-container">
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-number">50+</div>
        <div class="stat-label">Ülke</div>
        <div class="stat-description">Global pazarlarda faaliyet gösteriyor</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">1000+</div>
        <div class="stat-label">Kurumsal Müşteri</div>
        <div class="stat-description">Dünya çapında güvenilen marka</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">46+</div>
        <div class="stat-label">Yıl Deneyim</div>
        <div class="stat-description">Endüstrinin öncü firması</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">99%</div>
        <div class="stat-label">Müşteri Memnuniyeti</div>
        <div class="stat-description">Kalite ve hizmet garantisi</div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->


<!-- CTA Section -->


@include('partials.footer')



@endsection
