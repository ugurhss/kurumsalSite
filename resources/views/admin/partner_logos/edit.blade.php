@extends('admin.layout')

@section('content')
<h1>Logo Düzenle</h1>

<form method="POST"
      action="{{ route('admin.partner_logos.update', $item->id) }}"
      enctype="multipart/form-data">
    @method('PUT')
    @include('admin.partner_logos._form', ['item' => $item])
</form>
@endsection
