@extends('admin.layout')

@section('content')
<h1>3D Ürünler</h1>

<div style="margin:12px 0;">
    <a href="{{ route('admin.products3d.create') }}"
       style="padding:8px 12px;background:#0d6efd;color:#fff;text-decoration:none;border-radius:6px;">
        + Yeni 3D Ürün
    </a>
</div>

@if(session('success'))
    <div style="padding:10px;border:1px solid #cce5ff;background:#e7f1ff;border-radius:6px;margin-bottom:12px;">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
    <thead style="background:#f1f1f1;">
        <tr>
            <th>ID</th>
            <th>Başlık</th>
            <th>Model</th>
            <th>Aktif</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title ?? '-' }}</td>

                {{-- GLB Önizleme --}}
                <td style="width:180px;text-align:center;">
                    @if($item->model_path)
                        <model-viewer
                            src="{{ asset('storage/'.$item->model_path) }}"
                            style="width:160px;height:120px;"
                            camera-controls
                            auto-rotate
                            shadow-intensity="0.4">
                        </model-viewer>
                    @else
                        <small>-</small>
                    @endif
                </td>

                <td style="text-align:center;">
                    {{ $item->is_active ? 'Evet' : 'Hayır' }}
                </td>

                <td style="text-align:center;">
                    <a href="{{ route('admin.products3d.edit', $item->id) }}">Düzenle</a>

                    <form method="POST"
                          action="{{ route('admin.products3d.destroy', $item->id) }}"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Silinsin mi?')"
                                style="margin-left:8px;background:#dc3545;color:#fff;border:0;padding:6px 10px;border-radius:6px;cursor:pointer;">
                            Sil
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:20px;">Kayıt yok.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
