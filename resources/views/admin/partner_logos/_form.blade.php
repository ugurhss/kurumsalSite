@csrf

<div class="space-y-6">
    {{-- Logo Adı --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Logo Adı (Alt Text)</label>
        <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
               placeholder="Örn: ABC Holding">
    </div>

    {{-- Logo Dosyası --}}
    <div class="space-y-4">
        <label class="block text-sm font-semibold text-gray-700">Logo Dosyası</label>

        <div class="flex items-center justify-center w-full">
            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <i class="fa fa-cloud-upload-alt text-gray-400 text-2xl mb-2"></i>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Seçmek için tıklayın</span></p>
                    <p class="text-xs text-gray-400">SVG, PNG, JPG veya WebP</p>
                </div>
                <input type="file" name="logo" class="hidden" accept="image/*,.svg" />
            </label>
        </div>

        @if(!empty($item?->logo_path))
            <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm inline-block">
                <p class="text-[10px] font-bold text-gray-400 uppercase mb-2">Mevcut Logo</p>
                <img src="{{ $item->logo_url }}"
                     alt="{{ $item->name ?? 'Logo' }}"
                     class="max-h-16 object-contain bg-gray-50 p-2 rounded border border-gray-100">
                <p class="mt-2 text-[10px] text-gray-400 truncate max-w-[200px]">{{ $item->logo_path }}</p>
            </div>
        @endif
    </div>

    {{-- Aktif Durum --}}
    <div>
        <label class="inline-flex items-center cursor-pointer group">
            <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                   {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
            <span class="ml-3 text-sm font-semibold text-gray-700 group-hover:text-indigo-600 transition-colors">Aktif (Sitede Görünür)</span>
        </label>
    </div>
</div>

<div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">
    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all flex items-center gap-2">
        <i class="fa fa-save"></i> Kaydet
    </button>
    <a href="{{ route('admin.partner_logos.index') }}" class="px-6 py-2.5 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-all">
        İptal
    </a>
</div>
