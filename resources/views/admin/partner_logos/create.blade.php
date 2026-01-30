@extends('admin.layout')

@section('content')
<h1>Yeni Logo</h1>

<form method="POST"
      action="{{ route('admin.partner_logos.store') }}"
      enctype="multipart/form-data">
    @include('admin.partner_logos._form')
</form>
@endsection
