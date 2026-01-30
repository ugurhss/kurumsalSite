@extends('admin.layout')

@section('content')
<h1>Partner Logolar</h1>

<div style="margin:12px 0;">
    <a href="{{ route('admin.partner_logos.create') }}"
       style="padding:8px 12px;background:#0d6efd;color:#fff;text-decoration:none;border-radius:6px;">
        + Yeni Logo
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
            <th>Önizleme</th>
            <th>Ad</th>
            <th>Aktif</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
            <tr>
                <td>{{ $item->id }}</td>

                <td style="width:140px;text-align:center;">
                    @if(!empty($item->logo_path))
                        <img src="{{ asset('storage/'.$item->logo_path) }}"
                             alt="{{ $item->name }}"
                             style="max-width:120px;max-height:44px;object-fit:contain;">
                    @else
                        <small>-</small>
                    @endif
                </td>

                <td>{{ $item->name }}</td>

                <td style="text-align:center;">
                    {{ $item->is_active ? 'Evet' : 'Hayır' }}
                </td>

                <td style="text-align:center;">
                    <a href="{{ route('admin.partner_logos.edit', $item->id) }}">Düzenle</a>

                    <form method="POST"
                          action="{{ route('admin.partner_logos.destroy', $item->id) }}"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Silinsin mi?')"
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
