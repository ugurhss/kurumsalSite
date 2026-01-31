@csrf

@if ($errors->any())
    <div style="padding:10px;border:1px solid #f5c2c7;background:#f8d7da;color:#842029;border-radius:6px;margin-bottom:12px;">
        <strong>Hata:</strong>
        <ul style="margin:8px 0 0 18px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="display:grid;gap:12px;max-width:720px;">

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Başlık</label>
        <input type="text" name="title"
               value="{{ old('title', $item->title ?? '') }}"
               style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
        <small style="color:#666;">Slug otomatik oluşur.</small>
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Kısa Açıklama</label>
        <input type="text" name="short_description"
               value="{{ old('short_description', $item->short_description ?? '') }}"
               style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Açıklama</label>
        <textarea name="description" rows="5"
                  style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">{{ old('description', $item->description ?? '') }}</textarea>
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">3D Model Dosyası (.glb/.gltf)</label>
        <input type="file" name="model" accept=".glb,.gltf,model/*">

        @if(!empty($item?->model_path))
            <div style="margin-top:10px;display:grid;gap:8px;">
                <small>Mevcut: {{ $item->model_path }}</small>

                <model-viewer
                    src="{{ $item->model_url }}"
                    style="width:100%;max-width:720px;height:300px;border:1px solid #eee;border-radius:10px;"
                    camera-controls
                    auto-rotate
                    shadow-intensity="0.4">
                </model-viewer>

                <small style="color:#666;">Not: Yeni dosya seçmezsen mevcut model korunur.</small>
            </div>
        @else
            <small style="color:#666;">Not: Yeni ürün eklerken model dosyası zorunlu.</small>
        @endif
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Ürün Görselleri (çoklu)</label>
        <input type="file" name="images[]" multiple accept="image/*">

        @if(!empty($item?->images_urls) && count($item->images_urls))
            <div style="margin-top:10px;display:flex;flex-wrap:wrap;gap:10px;">
                @foreach($item->images_urls as $url)
                    <img src="{{ $url }}" alt="image"
                         style="width:110px;height:80px;object-fit:cover;border:1px solid #eee;border-radius:10px;">
                @endforeach
            </div>
            <small style="color:#666;display:block;margin-top:6px;">Not: Yeni görseller eklenir, mevcutlar korunur.</small>
        @endif
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Teklif Notu (price_note)</label>
        <input type="text" name="price_note"
               value="{{ old('price_note', $item->price_note ?? '') }}"
               style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Teklif Linki (quote_url)</label>
        <input type="url" name="quote_url"
               value="{{ old('quote_url', $item->quote_url ?? '') }}"
               style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;"
               placeholder="https://...">
    </div>

    {{-- SPECS (JSON) --}}
    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">
            Teknik Özellikler (specs) - JSON
        </label>

        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:8px;">
            <button type="button"
                    onclick="fillSpecsTemplate()"
                    style="padding:8px 10px;border:1px solid #ddd;border-radius:8px;cursor:pointer;background:#fff;">
                Örnek JSON’u Yükle
            </button>

            <button type="button"
                    onclick="clearSpecs()"
                    style="padding:8px 10px;border:1px solid #ddd;border-radius:8px;cursor:pointer;background:#fff;">
                Temizle
            </button>

            <small style="color:#666;align-self:center;">
                Sadece değerleri değiştirin. Tırnak/virgül/süslü parantez silmeyin.
            </small>
        </div>

        <textarea id="specs"
                  name="specs"
                  rows="10"
                  style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;"
                  placeholder='{"boyutlar":{"genislik":"120 mm","yukseklik":"45 mm","derinlik":"80 mm"},"agirlik":"1.2 kg","malzeme":"ABS Plastik","renkler":["Siyah","Beyaz","Kirmizi"],"uyumluluk":["Web","Mobil","AR"],"render_kalitesi":"Yuksek","poligon_sayisi":"45k","doku_cozunurlugu":"4K","dosya_formati":"GLB","surum":"1.0"}'>{{ old('specs', !empty($item?->specs) ? json_encode($item->specs, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) : '') }}</textarea>
    </div>

    <label style="display:flex;align-items:center;gap:8px;">
        <input type="checkbox" name="is_active" value="1"
               {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
        <span>Aktif</span>
    </label>

    <div style="display:flex;gap:10px;">
        <button type="submit" style="padding:10px 14px;border:0;border-radius:8px;cursor:pointer;">
            Kaydet
        </button>

        <a href="{{ route('admin.products3d.index') }}"
           style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;text-decoration:none;">
            İptal
        </a>
    </div>
</div>

<script>
function fillSpecsTemplate() {
 const tpl = {
    boyutlar: {
        genislik: "65 mm",
        yukseklik: "10 mm",
        derinlik: "45 mm"
    },
    agirlik: "12 g",
    malzeme: "Lamineli Plastik Film (PET/PE)",
    renkler: [
        "Beyaz",
        "Pastel Mavi",
        "Pastel Yesil"
    ],
    uyumluluk: [
        "Web",
        "Mobil",
        "AR"
    ],
    render_kalitesi: "Yuksek",
    poligon_sayisi: "6k",
    doku_cozunurlugu: "2K",
    dosya_formati: "GLB",
    surum: "1.0"
};


    const el = document.getElementById('specs');
    el.value = JSON.stringify(tpl, null, 2);
    el.focus();
}

function clearSpecs() {
    const el = document.getElementById('specs');
    el.value = '';
    el.focus();
}
</script>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
