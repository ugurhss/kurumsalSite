@extends('admin.layout')

@section('content')
<h1>3D Ürün Düzenle</h1>

<form method="POST"
      action="{{ route('admin.products3d.update', $item->id) }}"
      enctype="multipart/form-data">
    @method('PUT')
    @include('admin.products3d._form', ['item' => $item])
</form>
@endsection
