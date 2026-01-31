@extends('admin.layout')

@section('title', 'Teklifler')

@section('content')
<div style="max-width:1100px;margin:30px auto;padding:0 16px;">
  <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px;">
    <h1 style="margin:0;font-size:28px;font-weight:800;">Teklifler</h1>
    <div style="font-size:13px;color:#6b7280;">
      Toplam: <strong style="color:#111827;">{{ $quotes->count() }}</strong>
    </div>
  </div>

  @if(session('success'))
    <div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:12px 14px;border-radius:10px;margin-bottom:14px;">
      {{ session('success') }}
    </div>
  @endif

  {{-- Filtre --}}
  <form method="GET" action="{{ url('/admin/quotes') }}"
        style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:14px;margin-bottom:16px;">
    <div style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;">
      <div>
        <label style="display:block;font-size:12px;color:#6b7280;margin-bottom:6px;">Durum</label>
        <select name="status" style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
          @php $st = request('status'); @endphp
          <option value="">Hepsi</option>
          <option value="new" {{ $st==='new' ? 'selected' : '' }}>new</option>
          <option value="contacted" {{ $st==='contacted' ? 'selected' : '' }}>contacted</option>
          <option value="closed" {{ $st==='closed' ? 'selected' : '' }}>closed</option>
        </select>
      </div>

      <div>
        <label style="display:block;font-size:12px;color:#6b7280;margin-bottom:6px;">E-posta</label>
        <input name="email" value="{{ request('email') }}" placeholder="ornek@mail.com"
               style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
      </div>

      <div>
        <label style="display:block;font-size:12px;color:#6b7280;margin-bottom:6px;">Telefon</label>
        <input name="phone" value="{{ request('phone') }}" placeholder="05xx..."
               style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
      </div>

      <div style="display:flex;align-items:end;gap:10px;">
        <button type="submit"
                style="padding:10px 14px;border:0;border-radius:10px;background:#111827;color:#fff;font-weight:700;cursor:pointer;">
          Filtrele
        </button>
        <a href="{{ url('/admin/quotes') }}"
           style="padding:10px 14px;border:1px solid #e5e7eb;border-radius:10px;background:#fff;color:#111827;text-decoration:none;font-weight:700;">
          Sıfırla
        </a>
      </div>
    </div>
  </form>

  {{-- Liste --}}
  <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;">
    <table style="width:100%;border-collapse:collapse;">
      <thead>
        <tr style="background:#f9fafb;border-bottom:1px solid #e5e7eb;">
          <th style="text-align:left;padding:12px 14px;font-size:12px;color:#6b7280;">ID</th>
          <th style="text-align:left;padding:12px 14px;font-size:12px;color:#6b7280;">Ad Soyad</th>
          <th style="text-align:left;padding:12px 14px;font-size:12px;color:#6b7280;">Firma</th>
          <th style="text-align:left;padding:12px 14px;font-size:12px;color:#6b7280;">Ürün</th>
          <th style="text-align:left;padding:12px 14px;font-size:12px;color:#6b7280;">Durum</th>
          <th style="text-align:left;padding:12px 14px;font-size:12px;color:#6b7280;">Tarih</th>
          <th style="text-align:right;padding:12px 14px;font-size:12px;color:#6b7280;">İşlem</th>
        </tr>
      </thead>
      <tbody>
        @forelse($quotes as $q)
          <tr style="border-bottom:1px solid #f3f4f6;">
            <td style="padding:12px 14px;color:#111827;font-weight:700;">#{{ $q->id }}</td>
            <td style="padding:12px 14px;">
              <div style="font-weight:700;color:#111827;">{{ $q->full_name }}</div>
              <div style="font-size:12px;color:#6b7280;">
                {{ $q->email }} • {{ $q->phone }}
              </div>
            </td>
            <td style="padding:12px 14px;">
              <div style="font-weight:700;color:#111827;">{{ $q->company }}</div>
              <div style="font-size:12px;color:#6b7280;">{{ $q->city }}</div>
            </td>
            <td style="padding:12px 14px;color:#111827;">{{ $q->product }}</td>
            <td style="padding:12px 14px;">
              @php
                $badge = match($q->status){
                  'new' => ['#eff6ff', '#1d4ed8'],
                  'contacted' => ['#fffbeb', '#92400e'],
                  'closed' => ['#ecfdf5', '#065f46'],
                  default => ['#f3f4f6', '#374151'],
                };
              @endphp
              <span style="display:inline-block;padding:6px 10px;border-radius:999px;font-size:12px;font-weight:800;background:{{ $badge[0] }};color:{{ $badge[1] }};">
                {{ $q->status }}
              </span>
            </td>
            <td style="padding:12px 14px;font-size:13px;color:#6b7280;">
              {{ optional($q->created_at)->format('d.m.Y H:i') }}
            </td>
            <td style="padding:12px 14px;text-align:right;">
              <a href="{{ url('/admin/quotes/'.$q->id) }}"
                 style="display:inline-block;padding:8px 12px;border-radius:10px;background:#111827;color:#fff;text-decoration:none;font-weight:700;font-size:13px;">
                Detay
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="padding:18px 14px;color:#6b7280;">
              Kayıt bulunamadı.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
