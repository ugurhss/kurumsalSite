@extends('admin.layout')

@section('content')
<h1>Yeni 3D Ürün</h1>

<form method="POST"
      action="{{ route('admin.products3d.store') }}"
      enctype="multipart/form-data">
    @include('admin.products3d._form')
</form>
@endsection
