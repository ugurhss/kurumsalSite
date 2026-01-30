@extends('layouts.app')

@section('content')

<!-- Product Detail Hero -->
<section class="references-hero">
  <div class="references-container">
    <h1>Ürün Detayları</h1>
    <p>Ürün detaylarını burada inceleyebilirsiniz.</p>
  </div>
</section>

<!-- Product Detail Main -->
<section class="product-detail-main">
  <div class="container-product">
    <div class="detail-grid">

      <!-- Left: Description -->
      <div class="detail-left">
        <h2>Ürün Açıklaması</h2>

        <div class="detail-specs">
          <h3>Özellikler</h3>
          <ul>
            @php
              $specs = is_array($product->specs ?? null) ? $product->specs : [];
            @endphp

            @forelse($specs as $key => $value)
              <li>
                <strong>{{ $key }}:</strong>
                @if(is_array($value))
                  {{ json_encode($value, JSON_UNESCAPED_UNICODE) }}
                @else
                  {{ $value }}
                @endif
              </li>
            @empty
              <li><strong>Bilgi:</strong> Özellik bilgisi eklenmemiş.</li>
            @endforelse
          </ul>
        </div>

        <div class="detail-description">
          <h3>Detaylı Bilgi</h3>

          @if(!empty($product->description))
            {{-- description içinde satır satır yazmak istersen --}}
            {!! nl2br(e($product->description)) !!}
          @else
            <p>Bu ürün için detaylı açıklama eklenmemiş.</p>
          @endif
        </div>

        <div class="detail-price">
          <h3>Fiyat Bilgisi</h3>
          <p class="price-note">
            {{ $product->price_note ?: 'Fiyatlandırma adet ve sipariş büyüklüğüne göre değişir.' }}
          </p>

          @if(!empty($product->quote_url))
            <a href="{{ $product->quote_url }}" class="btn btn-primary">Fiyat Teklifi Al</a>
          @else
            <a href="/quote" class="btn btn-primary">Fiyat Teklifi Al</a>
          @endif
        </div>
      </div>

      <!-- Right: Carousel -->
      <div class="detail-right">

        {{-- 3D model (tasarımı bozmadan, carousel üstünde) --}}
        @if(!empty($product->model_url))
          <div style="margin-bottom:14px;">
            <model-viewer
              src="{{ asset('storage/'.$product->model_path) }}"
              shadow-intensity="0.4"
              camera-controls
              auto-rotate
              style="width:100%; height:260px; display:block;">
            </model-viewer>
          </div>
        @endif

        <div class="product-carousel">
          <div class="carousel-main">
            @php
              $imgs = is_array($product->images_urls ?? null) ? $product->images_urls : [];
              $main = $imgs[0] ?? null;
            @endphp

            @if($main)
              <img id="mainImage" src="{{ $main }}" alt="{{ $product->title ?? 'Ürün' }}">
            @else
              <img id="mainImage" src="/images/product-premium-1.jpg" alt="{{ $product->title ?? 'Ürün' }}">
            @endif
          </div>

          <div class="carousel-thumbs">
            @if(!empty($imgs))
              @foreach($imgs as $i => $img)
                <img class="thumb {{ $i === 0 ? 'active' : '' }}"
                     src="{{ $img }}"
                     alt="View {{ $i + 1 }}"
                     data-full="{{ $img }}">
              @endforeach
            @else
              <img class="thumb active" src="/images/product-premium-1.jpg" alt="View 1" data-full="/images/product-premium-1.jpg">
              <img class="thumb" src="/images/product-premium-2.jpg" alt="View 2" data-full="/images/product-premium-2.jpg">
              <img class="thumb" src="/images/product-premium-3.jpg" alt="View 3" data-full="/images/product-premium-3.jpg">
              <img class="thumb" src="/images/product-premium-4.jpg" alt="View 4" data-full="/images/product-premium-4.jpg">
            @endif
          </div>
        </div>

      </div>

    </div>
  </div>
</section>



<!-- How to Order Section -->
<section class="how-to-order">
  <div class="container-product">
    <h2>3 Kolay Adımda Siparişinizi Verebilirsiniz</h2>
    
    <div class="steps-grid">
      <!-- ADIM 1: Renk Seçimi -->
      <div class="step-card enhanced">
        <div class="step-number">ADIM 1</div>
        <h3>Renk Seçin</h3>
        <p class="step-subtitle">İlk adım olarak logonuz ve kurumsal kimliğinize uygun olarak kullanılacak baskı renkleri belirlenin.</p>
        
        <div class="step-options">
          <div class="option-item">
            <div class="color-swatch single-color"></div>
            <div class="option-label">1x<br><span>RENK</span></div>
            <small>1x Pantone Renk</small>
          </div>
          <div class="option-item">
            <div class="color-swatch dual-color"></div>
            <div class="option-label">2x<br><span>RENK</span></div>
            <small>2x Pantone Renk</small>
          </div>
          <div class="option-item">
            <div class="color-swatch tri-color"></div>
            <div class="option-label">3x<br><span>RENK</span></div>
            <small>3x Pantone Renk</small>
          </div>
          <div class="option-item">
            <div class="color-swatch quad-color"></div>
            <div class="option-label">4x<br><span>RENK</span></div>
            <small>4x Pantone Renk</small>
          </div>
          <div class="option-item">
            <div class="color-swatch full-color"></div>
            <div class="option-label">ÇOK<br><span>RENKLİ</span></div>
            <small>Çok Renkli Baskı</small>
          </div>
        </div>
      </div>

      <!-- ADIM 2: Boyut Seçimi -->
      <div class="step-card enhanced">
        <div class="step-number">ADIM 2</div>
        <h3>Boyut Belirleyin</h3>
        <p class="step-subtitle">İkinci aşamada ambalaj ölçüleri ve kağıt türü belirlenerek tarafınıza teklif sunulur.</p>
        
        <div class="step-options size-options">
          <div class="size-item">
            <div class="size-box">
              <span class="size-letter">S</span>
              <div class="size-dims">5cm</div>
            </div>
            <small>10/12/15cm</small>
          </div>
          <div class="size-item">
            <div class="size-box">
              <span class="size-letter">M</span>
              <div class="size-dims">6cm</div>
            </div>
            <small>8/10/12cm</small>
          </div>
          <div class="size-item">
            <div class="size-box">
              <span class="size-letter">L</span>
              <div class="size-dims">7cm</div>
            </div>
            <small>10/12/14cm</small>
          </div>
        </div>
      </div>

      <!-- ADIM 3: Sipariş Süresi -->
      <div class="step-card enhanced">
        <div class="step-number">ADIM 3</div>
        <h3>Teslimat Süresini Seçin</h3>
        <p class="step-subtitle">Son olarak sipariş süresi kriterlerinize uygun olarak tasarımınız hazırlanır ve anayınıza sunularak başkıya alınır.</p>
        
        <div class="step-options delivery-options">
          <div class="delivery-item">
            <div class="delivery-badge fast">
              <div class="badge-inner">
                <span class="delivery-label">İLK SİPARİŞ</span>
                <span class="delivery-time">10-12 GÜN</span>
              </div>
            </div>
          </div>
          <div class="delivery-item">
            <div class="delivery-badge express">
              <div class="badge-inner">
                <span class="delivery-label">TEKRAR SİPARİŞ</span>
                <span class="delivery-time">4-5 GÜN</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="cta-buttons" style="text-align: center; margin-top: 3rem;">
      <a href="/quote" class="btn btn-primary">Hemen Teklif İsteyin</a>
    </div>
  </div>
</section>

<!-- Related Products Carousel -->
<!-- <section class="related-products">
  <div class="container-product">
    <h2>Benzer Ürünler</h2>

    <div class="carousel-wrapper">
      <div class="carousel-track" id="relatedCarousel">
        <div class="carousel-item">
          <img src="/images/product-1.jpg" alt="Classic">
          <h4>Islak Mendil - Classic</h4>
          <p>Standart kalite, geniş kullanım alanları</p>
          <a href="/products/classic" class="btn btn-outline">Detay</a>
        </div>

        <div class="carousel-item">
          <img src="/images/product-2.jpg" alt="Sensitive">
          <h4>Islak Mendil - Sensitive</h4>
          <p>Hassas ciltler için hipoalerjenik formül</p>
          <a href="/products/sensitive" class="btn btn-outline">Detay</a>
        </div>

        <div class="carousel-item">
          <img src="/images/product-3.jpg" alt="Economy">
          <h4>Islak Mendil - Economy</h4>
          <p>Ekonomik paket seçenekleri</p>
          <a href="/products/economy" class="btn btn-outline">Detay</a>
        </div>

        <div class="carousel-item">
          <img src="/images/product-5.jpg" alt="Towel Pro">
          <h4>Kağıt Havlu - Pro</h4>
          <p>Yüksek mukavemet ve hızlı kuruma</p>
          <a href="/products/towel-pro" class="btn btn-outline">Detay</a>
        </div>

        <div class="carousel-item">
          <img src="/images/product-6.jpg" alt="Industrial">
          <h4>Endüstriyel Rulo</h4>
          <p>Büyük hacim ve ekonomik seçenekler</p>
          <a href="/products/industrial" class="btn btn-outline">Detay</a>
        </div>
      </div>

      <button class="carousel-control prev" id="carouselPrev">❮</button>
      <button class="carousel-control next" id="carouselNext">❯</button>
    </div>
  </div>
</section> -->

@include('partials.footer')

@endsection
