@extends('layouts.app')

@section('content')
    <!-- Hero Section 5 -->
  
@include('partials.hero')
    <!-- Portfolio Grid -->
    <div class="section-block grid-container fade-in-progressively pt-50 no-padding-bottom bosluksuz"
        data-default-filter=".identity">
        <div class="row">
            <div class="column width-12">
                <!-- <div class="row grid content-grid-4">
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
                </div> -->
            </div>
        </div>
    </div>
    <!-- Portfolio Grid -->

    <!-- <br> -->

    <!-- Logo Slider -->
    @include('partials.logoSlider')
    <!-- Logo Slider End -->

    @include('partials.footer')

@endsection
