@extends('admin.layout')

@section('title', 'Teklif Detay')

@section('content')
<div style="max-width:1000px;margin:30px auto;padding:0 16px;">
  <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px;">
    <div>
      <h1 style="margin:0;font-size:28px;font-weight:900;">Teklif Detay</h1>
      <div style="margin-top:6px;color:#6b7280;font-size:13px;">
        #{{ $quote->id }} • {{ optional($quote->created_at)->format('d.m.Y H:i') }}
      </div>
    </div>

    <div style="display:flex;gap:10px;align-items:center;">
      <a href="{{ url('/admin/quotes') }}"
         style="padding:10px 14px;border:1px solid #e5e7eb;border-radius:10px;background:#fff;color:#111827;text-decoration:none;font-weight:800;">
        ← Liste
      </a>

      <form method="POST" action="{{ url('/admin/quotes/'.$quote->id) }}"
            onsubmit="return confirm('Silmek istediğine emin misin?');">
        @csrf
        @method('DELETE')
        <button type="submit"
                style="padding:10px 14px;border:0;border-radius:10px;background:#dc2626;color:#fff;font-weight:900;cursor:pointer;">
          Sil
        </button>
      </form>
    </div>
  </div>

  @if(session('success'))
    <div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:12px 14px;border-radius:10px;margin-bottom:14px;">
      {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
    <div style="background:#fef2f2;border:1px solid #fecaca;color:#991b1b;padding:12px 14px;border-radius:10px;margin-bottom:14px;">
      <ul style="margin:0;padding-left:18px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div style="display:grid;grid-template-columns:1.2fr .8fr;gap:16px;">
    {{-- Sol: içerik --}}
    <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:16px;">
      <h2 style="margin:0 0 12px;font-size:18px;font-weight:900;">İletişim</h2>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
        <div>
          <div style="font-size:12px;color:#6b7280;">Ad Soyad</div>
          <div style="font-weight:900;color:#111827;">{{ $quote->full_name }}</div>
        </div>
        <div>
          <div style="font-size:12px;color:#6b7280;">Firma</div>
          <div style="font-weight:900;color:#111827;">{{ $quote->company }}</div>
        </div>
        <div>
          <div style="font-size:12px;color:#6b7280;">Telefon</div>
          <div style="font-weight:800;color:#111827;">{{ $quote->phone }}</div>
        </div>
        <div>
          <div style="font-size:12px;color:#6b7280;">E-posta</div>
          <div style="font-weight:800;color:#111827;">{{ $quote->email }}</div>
        </div>
        <div>
          <div style="font-size:12px;color:#6b7280;">Şehir</div>
          <div style="font-weight:800;color:#111827;">{{ $quote->city }}</div>
        </div>
        <div>
          <div style="font-size:12px;color:#6b7280;">Ürün</div>
          <div style="font-weight:800;color:#111827;">{{ $quote->product }}</div>
        </div>
      </div>

      <hr style="border:none;border-top:1px solid #e5e7eb;margin:14px 0;">

      <h2 style="margin:0 0 10px;font-size:18px;font-weight:900;">Detay</h2>
      <div style="white-space:pre-wrap;line-height:1.6;color:#111827;">
        {{ $quote->details }}
      </div>
    </div>

    {{-- Sağ: durum güncelle --}}
    <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:16px;height:fit-content;">
      <h2 style="margin:0 0 12px;font-size:18px;font-weight:900;">Durum</h2>

      <div style="margin-bottom:10px;color:#6b7280;font-size:13px;">
        Mevcut: <strong style="color:#111827;">{{ $quote->status }}</strong>
      </div>

      <form method="POST" action="{{ url('/admin/quotes/'.$quote->id) }}">
        @csrf
        @method('PATCH')

        <label style="display:block;font-size:12px;color:#6b7280;margin-bottom:6px;">Yeni Durum</label>
        <select name="status" style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
          <option value="new" {{ $quote->status==='new' ? 'selected' : '' }}>new</option>
          <option value="contacted" {{ $quote->status==='contacted' ? 'selected' : '' }}>contacted</option>
          <option value="closed" {{ $quote->status==='closed' ? 'selected' : '' }}>closed</option>
        </select>

        <button type="submit"
                style="margin-top:12px;width:100%;padding:10px 14px;border:0;border-radius:10px;background:#111827;color:#fff;font-weight:900;cursor:pointer;">
          Kaydet
        </button>
      </form>

      <hr style="border:none;border-top:1px solid #e5e7eb;margin:14px 0;">

      <div style="font-size:12px;color:#6b7280;line-height:1.5;">
        İpucu: status alanını enum gibi kullanmak istiyorsan migration’da enum veya
        check constraint’e de çevirebilirsin.
      </div>
    </div>
  </div>
</div>
@endsection
