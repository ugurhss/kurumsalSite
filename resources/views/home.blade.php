@extends('layouts.app')

@section('content')
    <!-- Hero Section 5 -->
    <section id="about" class="section-block hero-5 window-height right show-media-column-on-mobile bkg-charcoal color-white"
        style="background-image: url(BG.jpg);background-repeat: no-repeat;">
        <div class="media-column width-6 window-height background-none">
            <div class="tm-slider-container content-slider window-height" data-animation="slide" data-nav-arrows="false"
                data-auto-advance data-auto-advance-interval="4000" data-progress-bar="false" data-speed="1000"
                data-scale-under="0" data-width="722">s
                <ul class="tms-slides">
                    <li class="tms-slide" data-image data-as-bkg-image data-force-fit data-as-bkg-image
                        data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.0" data-animation="scaleOut">
                        <img data-src="hero-half-1.jpg" data-retina src="images/blank.png" alt="" />
                    </li>
                    <li class="tms-slide" data-image data-as-bkg-image data-force-fit data-as-bkg-image
                        data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.0" data-animation="slideLeftRight">
                        <img data-src="hero-half-2.jpg" data-retina src="images/blank.png" alt="" />
                    </li>
                    <li class="tms-slide" data-image data-as-bkg-image data-force-fit data-as-bkg-image
                        data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.0" data-animation="slideTopBottom">
                        <img data-src="hero-half-3.jpg" data-retina src="images/blank.png" alt="" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="column width-5">
                <div class="hero-content split-hero-content">
                    <div class="hero-content-inner left horizon" data-animate-in="preset:slideInRightShort;duration:1000ms;"
                        data-threshold="0.5">
                        <h1 class="mb-0"><br>AVRUPA'NIN<br>EN BÜYÜK<br><span class="opacity-05">ISLAK MENDİL
                                ÜRETİCİSİYİZ.</span></h1>
                        <p style="font-size:30px;line-height:100%;"><br>YILDA 600 MİLYON ADET ISLAK MENDİL
                            ÜRETİYORUZ...</p><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <div class="section-block grid-container fade-in-progressively pt-50 no-padding-bottom bosluksuz"
        data-default-filter=".identity">
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-4">
                    <div class="grid-item identity" style="margin-bottom:50px;">
                        <div class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700"
                            data-hover-bkg-color="#ffffff" data-hover-bkg-opacity="0.7"
                            style="border:1px solid #ededed;padding:7px;">
                            <a class="overlay-link" href="islak-mendil.asp">
                                <img src="images/1.jpg" alt="" />
                                <span class="overlay-info">
                                    <span>
                                        <span>
                                            <span class="project-title">Detay</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <p style="text-align:center;">Islak Mendil</p>
                    </div>

                    <div class="grid-item identity" style="margin-bottom:50px;">
                        <div class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700"
                            data-hover-bkg-color="#ffffff" data-hover-bkg-opacity="0.7"
                            style="border:1px solid #ededed;padding:7px;">
                            <a class="overlay-link" href="laminasyon-urunler.asp">
                                <img src="images/2.jpg" alt="" />
                                <span class="overlay-info">
                                    <span>
                                        <span>
                                            <span class="project-title">Detay</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <p style="text-align:center;">Laminasyon Ürünler</p>
                    </div>

                    <div class="grid-item identity" style="margin-bottom:50px;">
                        <div class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700"
                            data-hover-bkg-color="#ffffff" data-hover-bkg-opacity="0.7"
                            style="border:1px solid #ededed;padding:7px;">
                            <a class="overlay-link" href="pe-kapli-kagitlar.asp">
                                <img src="images/3.jpg" alt="" />
                                <span class="overlay-info">
                                    <span>
                                        <span>
                                            <span class="project-title">Detay</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <p style="text-align:center;">PE Kaplı Kağıtlar</p>
                    </div>

                    <div class="grid-item identity" style="margin-bottom:50px;">
                        <div class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700"
                            data-hover-bkg-color="#ffffff" data-hover-bkg-opacity="0.7"
                            style="border:1px solid #ededed;padding:7px;">
                            <a class="overlay-link" href="toz-dolum.asp">
                                <img src="images/4.jpg" alt="" />
                                <span class="overlay-info">
                                    <span>
                                        <span>
                                            <span class="project-title">Detay</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <p style="text-align:center;">Toz ve Sıvı Dolum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Grid -->

    <br>

    <!-- Logo Slider -->

    @include('partials.logoSlider')

    <!-- Logo Slider End -->

    @include('partials.footer')

@endsection
