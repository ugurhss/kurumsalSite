@extends('admin.layout')

@section('content')
<h1>Yeni Slide</h1>

<form method="POST"
      action="{{ route('admin.slider.store') }}"
      enctype="multipart/form-data">
    @include('admin.slider._form')
</form>
@endsection
