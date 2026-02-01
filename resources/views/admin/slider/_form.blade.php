@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Başlık --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Başlık</label>
        <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
               placeholder="Slide başlığını girin">
    </div>

    {{-- Sol Görsel --}}
    <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Sol Görsel</label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-400 transition-colors">
            <div class="space-y-1 text-center">
                <i class="fa fa-image text-gray-400 text-3xl mb-2"></i>
                <div class="flex text-sm text-gray-600">
                    <label for="image_left" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                        <span>Dosya Seç</span>
                        <input id="image_left" name="image_left" type="file" class="sr-only" accept="image/*">
                    </label>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
            </div>
        </div>
        @if(!empty($item?->image_left_path))
            <div class="mt-2 flex items-center gap-2 p-2 bg-gray-50 rounded border border-gray-200">
                <i class="fa fa-paperclip text-gray-400"></i>
                <span class="text-xs text-gray-500 truncate">{{ $item->image_left_path }}</span>
            </div>
        @endif
    </div>

    {{-- Sağ Görsel --}}
    <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Sağ Görsel</label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-400 transition-colors">
            <div class="space-y-1 text-center">
                <i class="fa fa-image text-gray-400 text-3xl mb-2"></i>
                <div class="flex text-sm text-gray-600">
                    <label for="image_right" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                        <span>Dosya Seç</span>
                        <input id="image_right" name="image_right" type="file" class="sr-only" accept="image/*">
                    </label>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
            </div>
        </div>
        @if(!empty($item?->image_right_path))
            <div class="mt-2 flex items-center gap-2 p-2 bg-gray-50 rounded border border-gray-200">
                <i class="fa fa-paperclip text-gray-400"></i>
                <span class="text-xs text-gray-500 truncate">{{ $item->image_right_path }}</span>
            </div>
        @endif
    </div>

    {{-- Sıralama --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Sol Sıra</label>
        <input type="number" name="left_order" min="1"
               value="{{ old('left_order', $item->left_order ?? 1) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Sağ Sıra</label>
        <input type="number" name="right_order" min="1"
               value="{{ old('right_order', $item->right_order ?? 2) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
    </div>

    {{-- Aktif/Pasif --}}
    <div class="md:col-span-2">
        <label class="inline-flex items-center cursor-pointer group">
            <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                   {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
            <span class="ml-3 text-sm font-semibold text-gray-700 group-hover:text-indigo-600 transition-colors">Aktif Durum</span>
        </label>
    </div>
</div>

<div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">
    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md shadow-indigo-200 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all">
        <i class="fa fa-save mr-2"></i> Kaydet
    </button>

    <a href="{{ route('admin.slider.index') }}" class="px-6 py-2.5 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-all">
        İptal
    </a>
</div>

<script>
    // Basit bir dosya ismi gösterme scripti
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const container = e.target.closest('.space-y-2');
                let display = container.querySelector('.file-display');
                if (!display) {
                    display = document.createElement('div');
                    display.className = 'mt-2 flex items-center gap-2 p-2 bg-indigo-50 rounded border border-indigo-100 file-display';
                    container.appendChild(display);
                }
                display.innerHTML = `<i class="fa fa-file-image text-indigo-400"></i><span class="text-xs text-indigo-600 font-medium truncate">${fileName}</span>`;
            }
        });
    });
</script>
