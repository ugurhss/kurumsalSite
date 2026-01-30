<h2 style="text-align:center; font-size:34px; font-weight:700; margin:60px 0 50px; color:#1a1a1a; position:relative;">
    Referanslarımız
<span style="
    display:block;
    width:290px;
    height:3px;
    background:#0d6efd;
    margin:12px auto 0;
    border-radius:3px;
    opacity:0.6;
    box-shadow: 0 0 12px rgba(13,110,253,0.5);
"></span>
</h2>

<div class="logo-marquee-wrapper">

  <!-- Fade efektleri -->
  <div class="logo-marquee-fade logo-marquee-fade-left"></div>
  <div class="logo-marquee-fade logo-marquee-fade-right"></div>

  <!-- Slider -->
  <div class="logo-marquee-track">

    <div class="logo-marquee-group">
      @foreach($logos as $logo)
      <div class="logo-marquee-item"><img src="{{ asset('storage/'.$logo->logo_path) }}" alt="{{ $logo->name }}"></div>
      @endforeach
    </div>

    <div class="logo-marquee-group">
      @foreach($logos as $logo)
      <div class="logo-marquee-item"><img src="{{ asset('storage/'.$logo->logo_path) }}" alt="{{ $logo->name }}"></div>
      @endforeach
    </div>

  </div>
</div>