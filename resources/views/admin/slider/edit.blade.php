@extends('admin.layout')

@section('content')
<h1>Slide Düzenle</h1>

<form method="POST"
      action="{{ route('admin.slider.update', $item->id) }}"
      enctype="multipart/form-data">
    @method('PUT')
    @include('admin.slider._form', ['item' => $item])
</form>
@endsection
