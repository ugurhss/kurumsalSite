@extends('layouts.app')

@section('title', 'Gren Kurumsal - Ana Sayfa')
@section('meta_description', 'Gren Kurumsal web sitesine hoş geldiniz. Sektördeki yenilikçi çözümlerimiz ve ürünlerimiz hakkında bilgi alın.')
@section('meta_keywords', 'gren kurumsal, ana sayfa, kurumsal çözümler, yenilikçi ürünler')

@section('content')

@include('partials.hero', ['slides' => $slides])
    <!-- Portfolio Grid -->

    <!-- Portfolio Grid -->

    <!-- <br> -->

    <!-- Logo Slider -->
        @include('partials.logoSlider', ['products' => $products3d])
@include('partials.endSponsor', ['logos' => $logos])
    <!-- Logo Slider End -->

    @include('partials.footer')

@endsection
