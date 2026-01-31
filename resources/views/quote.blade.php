@extends('layouts.app')

@section('content')
<section class="quote-page">
  <div class="container">

    <header class="quote-hero">
      <h1>Teklif Oluştur</h1>
      <p>“İhtiyacınıza en uygun teklifi almak için hemen formu doldurun.”</p>
    </header>

    <div class="quote-grid">

      {{-- Sol Bilgi Kartı --}}
      <aside class="quote-card quote-info">
        <h2>Bilgi</h2>
        <p>Teklifin hızlı hazırlanması için ürün ölçüsü, adet, baskı türü ve teslim tarihi gibi detayları yazmanız önerilir.</p>

        <div class="info-note">
          <strong>İpucu:</strong> Eğer örnek görsel/çizim varsa ek dosya alanı da ekleyebiliriz.
        </div>
      </aside>

      {{-- Form --}}
      <section class="quote-card quote-form">
        <h2>Teklif Formu</h2>

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

        <form action="{{ url('/quote') }}" method="POST" class="form">
          @csrf

          <div class="form-row">
            <div class="field">
              <label>ADINIZ SOYADINIZ</label>
              <input type="text" name="full_name" value="{{ old('full_name') }}" required>
            </div>
          </div>

          <div class="form-row two">
            <div class="field">
              <label>TELEFON</label>
              <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="05xx xxx xx xx" required>
            </div>

            <div class="field">
              <label>MAİL</label>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@mail.com" required>
            </div>
          </div>

          <div class="form-row two">
            <div class="field">
              <label>FİRMANIZ</label>
              <input type="text" name="company" value="{{ old('company') }}" required>
            </div>

            <div class="field">
              <label>FİRMANIZIN BULUNDUĞU ŞEHİR</label>
              <input type="text" name="city" value="{{ old('city') }}" placeholder="Örn: Mersin" required>
            </div>
          </div>

          <div class="field">
            <label>TEKLİF İSTEDİĞİNİZ ÜRÜN</label>
            <input type="text" name="product" value="{{ old('product') }}" placeholder="Örn: Islak Mendil / Ambalaj / Kutu" required>
          </div>

          <div class="field">
            <label>ÜRÜN İÇERİĞİ HAKKINDA BİLGİ VERİNİZ.</label>
            <textarea name="details" rows="7" required
              placeholder="Örn: Ölçüler, adet, baskı (CMYK/varak), malzeme (PET/PE), kapak türü, teslim tarihi vb.">{{ old('details') }}</textarea>
          </div>

          <button type="submit" class="btn-submit">
            Teklif İste <span class="btn-arrow">→</span>
          </button>

          <p class="form-footnote">
            Formu göndererek iletişim bilgilerinizin teklif amaçlı kullanılmasını kabul etmiş olursunuz.
          </p>
        </form>
      </section>

    </div>
  </div>
</section>

<style>
  .quote-page{padding:70px 0;background:#f6f7fb}
  .container{max-width:1100px;margin:0 auto;padding:0 18px}

  .quote-hero{margin-bottom:24px}
  .quote-hero h1{font-size:40px;line-height:1.1;margin:0 0 10px;color:#101828}
  .quote-hero p{margin:0;color:#475467;font-size:16px}

  .quote-grid{display:grid;grid-template-columns:1fr 1.4fr;gap:20px}
  @media(max-width:900px){.quote-grid{grid-template-columns:1fr}}

  .quote-card{
    background:#fff;border:1px solid #eaecf0;border-radius:18px;padding:22px;
    box-shadow:0 10px 30px rgba(16,24,40,.06)
  }
  .quote-card h2{margin:0 0 10px;font-size:20px;color:#101828}
  .quote-card p{margin:0 0 14px;color:#475467}

  .info-note{
    margin-top:14px;padding:12px;border-radius:14px;
    background:#ecfdf3;border:1px solid #abefc6;color:#067647;font-size:13px
  }

  .alert{border-radius:14px;padding:12px 14px;margin-bottom:12px;font-size:14px}
  .alert.success{background:#ecfdf3;border:1px solid #abefc6;color:#067647}
  .alert.error{background:#fef3f2;border:1px solid #fecdca;color:#b42318}
  .alert ul{margin:0;padding-left:18px}

  .form{margin-top:8px}
  .form-row{display:grid;grid-template-columns:1fr;gap:12px}
  .form-row.two{grid-template-columns:1fr 1fr}
  @media(max-width:700px){.form-row.two{grid-template-columns:1fr}}

  .field{display:flex;flex-direction:column;gap:8px;margin-bottom:12px}
  label{font-size:13px;color:#344054;font-weight:700;letter-spacing:.02em}
  input, textarea{
    border:1px solid #d0d5dd;border-radius:14px;padding:12px 12px;
    font-size:14px;outline:none;background:#fff;color:#101828;
    transition:.15s border-color,.15s box-shadow
  }
  input:focus, textarea:focus{border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.14)}

  .btn-submit{
    width:100%;border:none;border-radius:14px;padding:12px 14px;
    background:#2563eb;color:#fff;font-weight:800;font-size:14px;
    display:flex;align-items:center;justify-content:center;gap:10px;
    cursor:pointer;transition:.15s transform,.15s opacity
  }
  .btn-submit:hover{opacity:.95;transform:translateY(-1px)}
  .btn-arrow{font-size:16px}

  .form-footnote{margin:10px 0 0;color:#667085;font-size:12px}
</style>

@include('partials.footer')
@endsection
