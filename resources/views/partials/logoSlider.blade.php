<h2 style="text-align:center; font-size:34px; font-weight:700; margin:60px 0 40px; color:#1a1a1a;">
    Ürünlerimiz
<span style="
    display:block;
    width:290px;
    height:3px;
    background:#0d6efd;
    margin:12px auto 0;
    border-radius:3px;
    opacity:0.6;
    box-shadow: 0 0 12px rgba(61, 125, 220, 0.5);
"></span>
</h2>
<div class="product-cards-wrapper">

  @foreach($products as $index => $product)
  <div class="product-card">
         @if($index === 0 && !empty($product->title))
         <h2 style="text-align:center;">{{ $product->title }}</h2>
         @endif

    <div class="product-overflow">
      <div class="product-model">
        <model-viewer src="{{ asset('storage/'.$product->model_path) }}"
                      shadow-intensity="0.4"></model-viewer>
                      
      </div>
    </div>

    <div class="product-glass">
      <div class="product-gradient-blur">
        <div></div><div></div><div></div><div></div><div></div><div></div>
      </div>
    </div>

   
  </div>
  @endforeach

</div>








 