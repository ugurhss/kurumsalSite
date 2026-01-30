@extends('admin.layout')

@section('content')
<h1>Slider Listesi</h1>

<div style="margin-bottom:15px;">
    <a href="{{ route('admin.slider.create') }}"
       style="padding:8px 12px;background:#0d6efd;color:#fff;text-decoration:none;border-radius:6px;">
        + Yeni Slide
    </a>
</div>

<table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
    <thead style="background:#f1f1f1;">
        <tr>
            <th>ID</th>
            <th>Başlık</th>
            <th>Sol Görsel</th>
            <th>Sağ Görsel</th>
            <th>Aktif</th>
            <th>İşlem</th>
        </tr>
    </thead>

    <tbody>
        @forelse($items as $item)
            @php
                $leftSrc  = !empty($item->image_left_path)  ? asset('storage/'.$item->image_left_path)  : null;
                $rightSrc = !empty($item->image_right_path) ? asset('storage/'.$item->image_right_path) : null;
            @endphp

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>

                <td style="text-align:center;">
                    @if($leftSrc)
                        <img src="{{ $leftSrc }}"
                             width="80"
                             style="border-radius:6px;border:1px solid #eee;"
                             alt="Sol görsel">
                    @else
                        <small>Yok</small>
                    @endif
                </td>

                <td style="text-align:center;">
                    @if($rightSrc)
                        <img src="{{ $rightSrc }}"
                             width="80"
                             style="border-radius:6px;border:1px solid #eee;"
                             alt="Sağ görsel">
                    @else
                        <small>Yok</small>
                    @endif
                </td>

                <td style="text-align:center;">
                    @if($item->is_active)
                        <span style="color:green;font-weight:bold;">Evet</span>
                    @else
                        <span style="color:#dc3545;font-weight:bold;">Hayır</span>
                    @endif
                </td>

                <td style="text-align:center;">
                    <a href="{{ route('admin.slider.edit', $item->id) }}" style="margin-right:8px;">
                        Düzenle
                    </a>

                    <form method="POST"
                          action="{{ route('admin.slider.destroy', $item->id) }}"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Silinsin mi?')"
                                style="background:#dc3545;color:#fff;border:0;padding:6px 10px;border-radius:6px;cursor:pointer;">
                            Sil
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;padding:20px;">
                    Henüz slide yok.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
