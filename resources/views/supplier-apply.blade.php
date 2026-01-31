@extends('layouts.app')

@section('content')
<section class="supplier-page">
  <div class="container">

    <header class="supplier-hero">
      <h1>Tedarikçi Başvurusu</h1>
      <p>Güçlü ve sürdürülebilir hammadde tedarik ağımızda yerinizi alın.</p>
    </header>

    <div class="supplier-grid">

      {{-- SOL: Bilgilendirme --}}
      <aside class="card info-card">
        <h2>Başvuru Bilgisi</h2>
        <p>
          Başvurunuz değerlendirildikten sonra ekibimiz sizinle iletişime geçer.
          Ürün/hammadde özelliklerini, minimum sipariş miktarını (MOQ), teslim süresini ve varsa sertifikaları belirtmeniz önerilir.
        </p>

        <div class="note">
          <strong>İpucu:</strong> Ürün datasheet, analiz raporu veya sertifika gibi ek dosya yükleme alanı da ekleyebiliriz.
        </div>
      </aside>

      {{-- SAĞ: Form --}}
      <section class="card form-card">
        <h2>Başvuru Formu</h2>

        @if(session('success'))
          <div class="alert success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
          <div class="alert error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ url('/supplier-apply') }}" method="POST" class="form">
          @csrf

          <div class="row two">
            <div class="field">
              <label>ADINIZ SOYADINIZ</label>
              <input type="text" name="full_name" value="{{ old('full_name') }}" required>
            </div>

            <div class="field">
              <label>FİRMANIZ</label>
              <input type="text" name="company" value="{{ old('company') }}" required>
            </div>
          </div>

          <div class="row two">
            <div class="field">
              <label>TELEFON</label>
              <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="05xx xxx xx xx" required>
            </div>

            <div class="field">
              <label>MAİL</label>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@mail.com" required>
            </div>
          </div>

          <div class="row">
            <div class="field">
              <label>FİRMANIZIN BULUNDUĞU ŞEHİR</label>
              <input type="text" name="city" value="{{ old('city') }}" placeholder="Örn: Mersin" required>
            </div>
          </div>

          <div class="row">
            <div class="field">
              <label>TEKLİF VERMEK İSTEDİĞİNİZ ÜRÜN</label>
              <input type="text" name="product" value="{{ old('product') }}" placeholder="Örn: Nonwoven / Ambalaj Film / Kapak / Esans" required>
            </div>
          </div>

          <div class="row">
            <div class="field">
              <label>TEKLİF VERMEK İSTEDİĞİNİZ ÜRÜN HAKKINDA BİLGİ VERİNİZ</label>
              <textarea name="details" rows="7" required
                placeholder="Örn: Teknik özellikler, MOQ, termin süresi, fiyatlandırma modeli, sertifikalar (ISO/REACH), numune durumu vb.">{{ old('details') }}</textarea>
            </div>
          </div>

          <button type="submit" class="btn-submit">
            Başvuru Gönder <span class="arrow">→</span>
          </button>

          <p class="footnote">
            Formu göndererek bilgilerinizin başvurunun değerlendirilmesi amacıyla kullanılmasını kabul etmiş olursunuz.
          </p>
        </form>
      </section>

    </div>
  </div>
</section>

<style>
  .supplier-page{padding:70px 0;background:#f6f7fb}
  .container{max-width:1100px;margin:0 auto;padding:0 18px}

  .supplier-hero{margin-bottom:24px}
  .supplier-hero h1{font-size:40px;line-height:1.1;margin:0 0 10px;color:#101828}
  .supplier-hero p{margin:0;color:#475467;font-size:16px}

  .supplier-grid{display:grid;grid-template-columns:1fr 1.4fr;gap:20px}
  @media(max-width:900px){.supplier-grid{grid-template-columns:1fr}}

  .card{
    background:#fff;border:1px solid #eaecf0;border-radius:18px;padding:22px;
    box-shadow:0 10px 30px rgba(16,24,40,.06)
  }
  .card h2{margin:0 0 10px;font-size:20px;color:#101828}
  .card p{margin:0 0 14px;color:#475467}

  .note{
    margin-top:14px;padding:12px;border-radius:14px;
    background:#eff8ff;border:1px solid #b2ddff;color:#175cd3;font-size:13px
  }

  .alert{border-radius:14px;padding:12px 14px;margin-bottom:12px;font-size:14px}
  .alert.success{background:#ecfdf3;border:1px solid #abefc6;color:#067647}
  .alert.error{background:#fef3f2;border:1px solid #fecdca;color:#b42318}
  .alert ul{margin:0;padding-left:18px}

  .form{margin-top:8px}
  .row{display:grid;grid-template-columns:1fr;gap:12px}
  .row.two{grid-template-columns:1fr 1fr}
  @media(max-width:700px){.row.two{grid-template-columns:1fr}}

  .field{display:flex;flex-direction:column;gap:8px;margin-bottom:12px}
  label{font-size:13px;color:#344054;font-weight:800;letter-spacing:.02em}
  input, textarea{
    border:1px solid #d0d5dd;border-radius:14px;padding:12px 12px;
    font-size:14px;outline:none;background:#fff;color:#101828;
    transition:.15s border-color,.15s box-shadow
  }
  input:focus, textarea:focus{border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.14)}

  .btn-submit{
    width:100%;border:none;border-radius:14px;padding:12px 14px;
    background:#101828;color:#fff;font-weight:900;font-size:14px;
    display:flex;align-items:center;justify-content:center;gap:10px;
    cursor:pointer;transition:.15s transform,.15s opacity
  }
  .btn-submit:hover{opacity:.95;transform:translateY(-1px)}
  .arrow{font-size:16px}

  .footnote{margin:10px 0 0;color:#667085;font-size:12px}
</style>

@include('partials.footer')
@endsection
