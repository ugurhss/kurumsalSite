@extends('admin.layout')

@section('page-title', 'Yeni 3D Ürün Ekle')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50/50">
        <h2 class="text-lg font-semibold text-gray-800">Ürün Bilgileri</h2>
        <a href="{{ route('admin.products3d.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 flex items-center gap-1 transition-colors">
            <i class="fa fa-arrow-left"></i> Listeye Dön
        </a>
    </div>

    <div class="p-6">
        <form method="POST" action="{{ route('admin.products3d.store') }}" enctype="multipart/form-data" class="space-y-6">
            @include('admin.products3d._form')
        </form>
    </div>
</div>
@endsection
