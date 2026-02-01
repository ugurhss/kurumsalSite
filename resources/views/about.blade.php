@extends('layouts.app')

@section('title', 'Hakkımızda - Gren Kurumsal')
@section('meta_description', '2017 yılından bu yana özel üretimli ambalaj çözümleriyle markalara değer katıyoruz. Gren Kurumsal\'ın hikayesi ve değerleri hakkında bilgi alın.')
@section('meta_keywords', 'gren kurumsal hakkında, ambalaj çözümleri, özel üretim ambalaj, kurumsal hikayemiz')

@section('content')

<!-- ABOUT CTA -->
<section class="about-cta">
  <div class="container-about">
    <div class="cta-wrapper">
      <h2>Hakkımızda</h2>

      <p class="cta-subtitle">
        2017 yılından bu yana özel üretimli ambalaj çözümleriyle markalara değer katıyoruz.
      </p>

      <p class="cta-description">
        Ambalajın yalnızca bir koruma unsuru değil, markanın duruşunu ve algısını yansıtan
        güçlü bir iletişim aracı olduğuna inanıyoruz. Bu anlayışla her markaya özgü,
        estetik ve işlevsel ambalajlar tasarlıyoruz.
      </p>

      <div class="cta-buttons">
        <a href="/quote" class="btn btn-primary">
          <span class="btn-text">Fiyat Teklifi İsteyin</span>
          <span class="btn-arrow">→</span>
        </a>
        <a href="/contact" class="btn btn-outline">İletişime Geçin</a>
      </div>

      <p class="cta-footer">
        Sorularınız mı var? Uzman ekibimiz size yardımcı olmaya hazır.
      </p>
    </div>
  </div>
</section>

<!-- COMPANY STORY -->
<section class="about-story">
  <div class="container-about">
    <div class="story-grid">
      <div class="story-content">
        <h2>Firmamızın Hikayesi</h2>

        <p>
          2017 yılında ambalaj sektöründe faaliyetlerine başlayan firmamız,
          özel üretimli ambalaj çözümleriyle markaların prestijini yükseltmeyi hedeflemektedir.
          Tasarım, kalite ve detaylara verilen önemle her markaya özgü ayrıcalıklı ambalajlar üretiyoruz.
        </p>

        <p>
          Estetik, dayanıklılık ve işlevselliği bir araya getiren üretim anlayışımızla;
          modern teknolojiyi titiz işçilikle buluşturuyor, yüksek kalite standartlarında
          özel üretim ambalajlar sunuyoruz.
        </p>

        <p>
          Deneyimli ekibimiz ve güvenilir hizmet anlayışımızla, iş ortaklarımıza uzun vadeli
          değer yaratan, sürdürülebilir ve seçkin ambalaj çözümleri sunmaya devam ediyoruz.
        </p>
      </div>

      <div class="story-image">
        <img src="{{ asset('images/logo.jpg') }}" alt="Üretim ve Tasarım Süreci" class="img-story">
      </div>
    </div>
  </div>
</section>

<!-- VALUES -->
<section class="about-values">
  <div class="container-about">
    <h2>Temel Değerlerimiz</h2>

    <div class="values-grid">
      <div class="value-card">
        <h3>Kalite</h3>
        <p>Her üretim süreci yüksek kalite standartlarıyla kontrol edilir.</p>
      </div>

      <div class="value-card">
        <h3>Sürdürülebilirlik</h3>
        <p>Çevreye duyarlı, uzun ömürlü ve sorumlu üretim anlayışını benimsiyoruz.</p>
      </div>

      <div class="value-card">
        <h3>Güvenilirlik</h3>
        <p>İş ortaklarımızla uzun vadeli ve şeffaf ilişkiler kurarız.</p>
      </div>

      <div class="value-card">
        <h3>İnovasyon</h3>
        <p>Tasarım ve üretimde sürekli gelişimi temel ilke olarak görüyoruz.</p>
      </div>
    </div>
  </div>
</section>

<!-- TIMELINE -->
<section class="about-timeline">
  <div class="container-about">
    <h2>Yolculuğumuz</h2>

    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-marker">2017</div>
        <div class="timeline-content">
          <h4>Kuruluş</h4>
          <p>Ambalaj sektöründe özel üretim odaklı faaliyetlere başlandı.</p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-marker">2019</div>
        <div class="timeline-content">
          <h4>Tasarım Odaklı Büyüme</h4>
          <p>Markaya özel ambalaj çözümleriyle portföy genişletildi.</p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-marker">2022</div>
        <div class="timeline-content">
          <h4>Teknolojik Yatırımlar</h4>
          <p>Modern üretim altyapısı ve kalite süreçleri güçlendirildi.</p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-marker">2026</div>
        <div class="timeline-content">
          <h4>Sürdürülebilir Gelecek</h4>
          <p>Seçkin, çevre dostu ve yüksek katma değerli ambalaj çözümleri sunuluyor.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="about-cta">
  <div class="container-about">
    <div class="cta-wrapper">
      <h2>Markanıza Değer Katan Ambalajlar</h2>

      <p class="cta-subtitle">
        Özel üretim, güçlü tasarım ve yüksek kaliteyle yanınızdayız.
      </p>

      <p class="cta-description">
        Markanıza özel ambalaj çözümleri için bizimle iletişime geçin.
      </p>

      <div class="cta-buttons">
        <a href="/quote" class="btn btn-primary">Fiyat Teklifi İsteyin</a>
        <a href="/contact" class="btn btn-outline">İletişime Geçin</a>
      </div>
    </div>
  </div>
</section>

@include('partials.footer')
@endsection
