@extends('layouts.app')

@section('content')

<!-- Products Hero -->
<section class="about-cta">
  <div class="container-about">
    <div class="cta-wrapper">
      <h2>Ürünlerimiz</h2>

      <p class="cta-subtitle">
        Markanıza özel tasarlanan, yüksek kalite standartlarında ambalaj çözümleri sunuyoruz.
      </p>

      <p class="cta-description">
        Ürün gamımız; estetik, dayanıklılık ve işlevselliği bir araya getiren 
        özel üretim ambalajlardan oluşur. Her ürün, markanızın kimliğini 
        en doğru şekilde yansıtacak şekilde titizlikle tasarlanır ve üretilir.
      </p>

      <div class="cta-buttons">
        <a href="/products" class="btn btn-primary">
          <span class="btn-text">Ürünleri İnceleyin</span>
          <span class="btn-arrow">→</span>
        </a>
        <a href="/quote" class="btn btn-outline">Teklif Alın</a>
      </div>

      <p class="cta-footer">
        Size en uygun ambalaj çözümünü birlikte belirleyelim.
      </p>
    </div>
  </div>
</section>

<!-- Products Grid -->
<section class="products-section">
  <div class="container-products">
    <h2>Ürünlerimiz</h2>
    <p class="products-sub">
      Hijyen, kalite ve markanıza özel çözümler sunan geniş ürün yelpazemiz.
    </p>

    <div class="products-grid" aria-live="polite">

      <!-- Islak Mendil -->
      <article class="product-tile">
        <img src="https://productimages.hepsiburada.net/s/777/375-375/110001032724657.jpg" alt="Islak Mendil" class="product-img">
        <h3>Islak Mendil</h3>
        <p>
          Hijyenik ve pratik tek kullanımlık ıslak mendillerimiz, yüksek kalite
          standartları esas alınarak modern üretim tesislerimizde titizlikle üretilmektedir.
          Yüksek üretim kapasitemiz sayesinde hızlı ve sürdürülebilir çözümler sunarken;
          koku, içerik ve ambalaj tasarımı gibi detaylar tamamen size özel olarak
          şekillendirilebilmektedir.
        </p>
        <a class="btn btn-outline" href="/products/wet-wipes">Detay</a>
      </article>

      <!-- Plastik İkram Setleri -->
      <article class="product-tile">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHEtXr2oJO7mlk3k6w8ii-7D1yhxlFqSgLrQ&s" alt="Plastik İkram Setleri" class="product-img">
        <h3>Plastik İkram Setleri</h3>
        <p>
          İhtiyaçlarınıza ve kullanım alanlarınıza göre şekillendirilebilen ikram setlerimiz,
          tam otomatik üretim hatlarında, el değmeden ve yüksek hijyen standartlarına uygun
          şekilde üretilmektedir. Gıda güvenliği mevzuatlarına uygun üretim süreçlerimizle,
          farklı sektörlere hitap eden pratik ve şık ikram çözümleri sunuyoruz.
        </p>
        <a class="btn btn-outline" href="/products/ikram-setleri">Detay</a>
      </article>

      <!-- Stick Şeker -->
      <article class="product-tile">
        <img src="https://api.bidolubaski.com/sites/default/files/styles/product_page_w580/public/product-image/2018-09/baskili_stick_seker_bidolubaski.jpg?itok=rb3ZHVXD" alt="Stick Şeker" class="product-img">
        <h3>Stick Şeker</h3>
        <p>
          Küçük bir stick, büyük bir marka etkisi. Doğal şeker pancarından üretilen,
          dengeli lezzete sahip stick şekerlerimiz; logonuz, mesajınız ve tasarımınızla
          tamamen size özel olarak üretilebilir. Markanızı her sunumda görünür kılan
          etkili ve ekonomik bir tanıtım aracıdır.
        </p>
        <a class="btn btn-outline" href="/products/stick-seker">Detay</a>
      </article>

      <!-- Çatal Kaşık Bıçak Zarfları -->
      <article class="product-tile">
        <img src="https://s.alicdn.com/@sc04/kf/H668a3f7897444f938746ac47fb4269f4K/Custom-Kraft-Paper-Envelope-Packaging-Kraft-Envelope-Packaging-Packaging-Envelope-for-Cutlery-Knives-Forks-Spoons.jpg_300x300.jpg" alt="Çatal Kaşık Bıçak Zarfları" class="product-img">
        <h3>Çatal · Kaşık · Bıçak Zarfları</h3>
        <p>
          Gıda ile temasa uygun, çevre dostu ve geri dönüştürülebilir kâğıtlardan üretilen
          tek kullanımlık zarflarımız; metal servis ürünlerini dış etkenlerden koruyarak
          hijyen sağlar. İsteğe bağlı baskı seçenekleriyle logonuzu ve marka mesajınızı
          taşıyarak hijyeni güçlü bir iletişim aracına dönüştürür.
        </p>
        <a class="btn btn-outline" href="/products/cutlery-envelopes">Detay</a>
      </article>

    </div>
  </div>
</section>


@include('partials.footer')

@section('page-js')
<!-- If your layout yields page-js, keep it empty; animations handled globally -->
@endsection

@endsection
