@csrf

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="space-y-6">
        {{-- Başlık --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Başlık</label>
            <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                   placeholder="Ürün başlığını girin">
            <p class="mt-1 text-xs text-gray-500">Slug başlığa göre otomatik oluşturulacaktır.</p>
        </div>

        {{-- Kısa Açıklama --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kısa Açıklama</label>
            <input type="text" name="short_description" value="{{ old('short_description', $item->short_description ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                   placeholder="Liste sayfalarında görünecek kısa metin">
        </div>

        {{-- Açıklama --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Detaylı Açıklama</label>
            <textarea name="description" rows="6"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                      placeholder="Ürün hakkında detaylı bilgi">{{ old('description', $item->description ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Teklif Notu --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Teklif Notu</label>
                <input type="text" name="price_note" value="{{ old('price_note', $item->price_note ?? '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                       placeholder="Örn: Teklif alınız">
            </div>

            {{-- Teklif Linki --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Teklif Linki (Harici)</label>
                <input type="url" name="quote_url" value="{{ old('quote_url', $item->quote_url ?? '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                       placeholder="https://...">
            </div>
        </div>

        {{-- Aktif/Pasif --}}
        <div>
            <label class="inline-flex items-center cursor-pointer group">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                       {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                <span class="ml-3 text-sm font-semibold text-gray-700 group-hover:text-indigo-600 transition-colors">Yayında</span>
            </label>
        </div>
    </div>

    <div class="space-y-6">
        {{-- 3D Model Dosyası --}}
        <div class="p-4 bg-indigo-50 rounded-xl border border-indigo-100">
            <label class="block text-sm font-bold text-indigo-900 mb-3 flex items-center gap-2">
                <i class="fa fa-cube"></i> 3D Model Dosyası (.glb/.gltf)
            </label>
            <input type="file" name="model" accept=".glb,.gltf,model/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition-all cursor-pointer">

            @if(!empty($item?->model_path))
                <div class="mt-4 bg-white p-2 rounded-lg border border-indigo-200 shadow-sm">
                    <model-viewer
                        src="{{ $item->model_url }}"
                        style="width:100%; height:250px;"
                        camera-controls auto-rotate shadow-intensity="0.4"
                        class="rounded-lg bg-gray-50">
                    </model-viewer>
                    <div class="mt-2 flex items-center justify-between px-2">
                        <span class="text-xs text-indigo-600 font-medium truncate max-w-[200px]">{{ $item->model_path }}</span>
                        <span class="text-[10px] text-gray-400 uppercase font-bold">Mevcut Model</span>
                    </div>
                </div>
            @else
                <p class="mt-2 text-xs text-indigo-500 italic">Yeni ürün eklerken model dosyası yüklemeniz önerilir.</p>
            @endif
        </div>

        {{-- Ürün Görselleri --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                <i class="fa fa-images"></i> Ürün Görselleri (Çoklu)
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-400 transition-colors bg-gray-50/50">
                <div class="space-y-1 text-center">
                    <i class="fa fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                    <div class="flex text-sm text-gray-600">
                        <label class="relative cursor-pointer bg-transparent rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                            <span>Dosyaları Seçin</span>
                            <input name="images[]" type="file" class="sr-only" multiple accept="image/*">
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">Birden fazla görsel seçebilirsiniz</p>
                </div>
            </div>

            @if(!empty($item?->images_urls) && count($item->images_urls))
                <div class="mt-4 grid grid-cols-4 gap-2">
                    @foreach($item->images_urls as $url)
                        <div class="relative group aspect-square">
                            <img src="{{ $url }}" class="w-full h-full object-cover rounded-lg border border-gray-200 shadow-sm transition-transform group-hover:scale-105">
                        </div>
                    @endforeach
                </div>
                <p class="mt-2 text-[10px] text-gray-400 font-medium">* Yeni görseller eklenir, eskiler korunur.</p>
            @endif
        </div>

        {{-- Teknik Özellikler --}}
        <div>
            <div class="flex items-center justify-between mb-2">
                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                    <i class="fa fa-list-ul"></i> Teknik Özellikler (JSON)
                </label>
                <div class="flex gap-2">
                    <button type="button" onclick="fillSpecsTemplate()" class="text-[10px] px-2 py-1 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors font-bold text-gray-600">
                        TASLAK YÜKLE
                    </button>
                    <button type="button" onclick="clearSpecs()" class="text-[10px] px-2 py-1 bg-white border border-red-200 rounded hover:bg-red-50 transition-colors font-bold text-red-600">
                        TEMİZLE
                    </button>
                </div>
            </div>
            <textarea id="specs" name="specs" rows="8"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all font-mono text-xs bg-gray-900 text-green-400"
                      placeholder='{"ozellik": "deger"}'>{{ old('specs', !empty($item?->specs) ? json_encode($item->specs, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) : '') }}</textarea>
            <p class="mt-1 text-[10px] text-gray-400 italic">JSON formatında veri girişi yapınız. Teknik detaylar bu kısımdan okunur.</p>
        </div>
    </div>
</div>

<div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">
    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md shadow-indigo-200 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all">
        <i class="fa fa-save mr-2"></i> Kaydet
    </button>
    <a href="{{ route('admin.products3d.index') }}" class="px-6 py-2.5 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-all">
        İptal
    </a>
</div>

<script>
function fillSpecsTemplate() {
    const tpl = {
        boyutlar: { genislik: "65 mm", yukseklik: "10 mm", derinlik: "45 mm" },
        agirlik: "12 g",
        malzeme: "Lamineli Plastik Film (PET/PE)",
        renkler: ["Beyaz", "Pastel Mavi", "Pastel Yesil"],
        uyumluluk: ["Web", "Mobil", "AR"],
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
