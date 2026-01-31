@extends('admin.layout')

@section('content')
<div style="max-width:1200px;margin:30px auto;padding:0 16px;">

  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
    <h1 style="font-size:28px;font-weight:800;">Tedarikçi Başvuruları</h1>
    <span style="color:#6b7280;font-size:14px;">
      Toplam: <strong>{{ $applications->count() }}</strong>
    </span>
  </div>

  @if(session('success'))
    <div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:12px;border-radius:10px;margin-bottom:14px;">
      {{ session('success') }}
    </div>
  @endif

  {{-- Filtre --}}
  <form method="GET" action="{{ route('admin.supplier_applications.index') }}"
        style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:14px;margin-bottom:16px;">
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;">
      <input name="email" value="{{ request('email') }}" placeholder="E-posta"
             style="padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
      <input name="phone" value="{{ request('phone') }}" placeholder="Telefon"
             style="padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
      <input name="city" value="{{ request('city') }}" placeholder="Şehir"
             style="padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
      <select name="status" style="padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
        <option value="">Durum (Hepsi)</option>
        <option value="new" {{ request('status')=='new'?'selected':'' }}>new</option>
        <option value="reviewed" {{ request('status')=='reviewed'?'selected':'' }}>reviewed</option>
        <option value="approved" {{ request('status')=='approved'?'selected':'' }}>approved</option>
        <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>rejected</option>
      </select>
    </div>

    <div style="margin-top:12px;display:flex;gap:10px;">
      <button type="submit"
              style="background:#111827;color:#fff;padding:10px 14px;border-radius:10px;border:none;font-weight:700;">
        Filtrele
      </button>
      <a href="{{ route('admin.supplier_applications.index') }}"
         style="padding:10px 14px;border:1px solid #e5e7eb;border-radius:10px;text-decoration:none;color:#111827;">
        Sıfırla
      </a>
    </div>
  </form>

  {{-- Liste --}}
  <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;">
    <table style="width:100%;border-collapse:collapse;">
      <thead style="background:#f9fafb;">
        <tr>
          <th style="padding:12px;text-align:left;">ID</th>
          <th style="padding:12px;text-align:left;">Ad Soyad</th>
          <th style="padding:12px;text-align:left;">Firma</th>
          <th style="padding:12px;text-align:left;">Ürün</th>
          <th style="padding:12px;text-align:left;">Durum</th>
          <th style="padding:12px;text-align:right;">İşlem</th>
        </tr>
      </thead>
      <tbody>
        @forelse($applications as $app)
          <tr style="border-top:1px solid #f1f5f9;">
            <td style="padding:12px;">#{{ $app->id }}</td>
            <td style="padding:12px;">
              <strong>{{ $app->full_name }}</strong><br>
              <small style="color:#6b7280;">{{ $app->email }}</small>
            </td>
            <td style="padding:12px;">{{ $app->company }}</td>
            <td style="padding:12px;">{{ $app->product }}</td>
            <td style="padding:12px;">
              <span style="padding:5px 10px;border-radius:999px;font-size:12px;
                background:#f3f4f6;color:#111827;">
                {{ $app->status }}
              </span>
            </td>
            <td style="padding:12px;text-align:right;">
              <a href="{{ route('admin.supplier_applications.show',$app->id) }}"
                 style="background:#111827;color:#fff;padding:8px 12px;border-radius:10px;text-decoration:none;font-size:13px;">
                Detay
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="padding:16px;color:#6b7280;">Kayıt yok.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>
@endsection
