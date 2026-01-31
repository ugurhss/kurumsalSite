@extends('admin.layout')

@section('content')
<div style="max-width:1000px;margin:30px auto;padding:0 16px;">

  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
    <div>
      <h1 style="font-size:26px;font-weight:900;">Mesaj Detayı</h1>
      <small style="color:#6b7280;">#{{ $contact->id }}</small>
    </div>

    <a href="{{ route('admin.contacts.index') }}"
       style="padding:10px 14px;border:1px solid #e5e7eb;border-radius:10px;text-decoration:none;color:#111827;">
      ← Liste
    </a>
  </div>

  @if(session('success'))
    <div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:12px;border-radius:10px;margin-bottom:14px;">
      {{ session('success') }}
    </div>
  @endif

  <div style="display:grid;grid-template-columns:1.2fr .8fr;gap:16px;">

    {{-- Mesaj --}}
    <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:16px;">
      <h2 style="font-size:18px;font-weight:800;margin-bottom:12px;">Gönderen Bilgileri</h2>

      <p><strong>Ad Soyad:</strong> {{ $contact->name }}</p>
      <p><strong>Telefon:</strong> {{ $contact->phone }}</p>
      <p><strong>E-posta:</strong> {{ $contact->email }}</p>

      <hr style="margin:14px 0;">

      <h3 style="font-size:16px;font-weight:700;">Mesaj</h3>
      <div style="white-space:pre-wrap;line-height:1.6;">
        {{ $contact->message }}
      </div>
    </div>

    {{-- Durum --}}
    <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:16px;">
      <h2 style="font-size:18px;font-weight:800;margin-bottom:12px;">Durum Güncelle</h2>

      <form method="POST"
            action="{{ route('admin.contacts.status',$contact->id) }}">
        @csrf
        @method('PATCH')

        <label style="display:block;font-size:13px;margin-bottom:6px;">Durum</label>
        <select name="status"
                style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
          <option value="new" {{ $contact->status=='new'?'selected':'' }}>new</option>
          <option value="replied" {{ $contact->status=='replied'?'selected':'' }}>replied</option>
          <option value="closed" {{ $contact->status=='closed'?'selected':'' }}>closed</option>
        </select>

        <button type="submit"
                style="margin-top:12px;width:100%;background:#111827;color:#fff;
                       padding:10px;border-radius:10px;border:none;font-weight:800;">
          Kaydet
        </button>
      </form>
    </div>

  </div>
</div>
@endsection
