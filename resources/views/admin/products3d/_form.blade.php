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

<div style="display:grid;gap:12px;max-width:520px;">
    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Başlık (opsiyonel)</label>
        <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
               style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">3D Model Dosyası (.glb/.gltf)</label>
        <input type="file" name="model" accept=".glb,.gltf,model/*">

        @if(!empty($item?->model_path))
            <div style="margin-top:6px;">
                <small>Mevcut: {{ $item->model_path }}</small>
            </div>
        @endif
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
