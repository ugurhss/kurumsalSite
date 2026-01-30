@extends('layouts.app')

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
