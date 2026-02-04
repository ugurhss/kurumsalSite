@extends('layouts.app')

@section('title', 'Ürünlerimiz - Gren Kurumsal')
@section('meta_description', 'Markanıza özel tasarlanan, yüksek kalite standartlarında ambalaj çözümlerimizi inceleyin. 3D ürün modellerimiz ve detayları için ürün sayfamızı ziyaret edin.')
@section('meta_keywords', 'gren ambalaj ürünleri, 3D ürün modelleri, özel tasarım ambalaj, kurumsal ambalaj çözümleri')

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

  @foreach($products3d as $product)
  <article class="product-tile">

    <div class="product-img" style="padding:0; background:transparent;">
      <model-viewer
        src="{{ $product->model_url }}"
        shadow-intensity="0.4"
        camera-controls
        auto-rotate
        style="width:100%; height:260px; display:block;">
      </model-viewer>
    </div>

    <h3>{{ $product->title ?? '3D Ürün' }}</h3>

    <!-- @if(!empty($product->description))
      <p>{{ $product->description }}</p>
    @endif -->

<a class="btn btn-outline" href="{{ route('products3d.show', $product->slug) }}">Detay</a>

  </article>
  @endforeach

</div>

  </div>
</section>


@include('partials.footer')

@section('page-js')
<!-- If your layout yields page-js, keep it empty; animations handled globally -->
@endsection

@endsection
