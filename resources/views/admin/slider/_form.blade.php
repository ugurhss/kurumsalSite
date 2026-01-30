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
        <label style="display:block;font-weight:600;margin-bottom:6px;">Başlık</label>
        <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
               style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Sol Görsel</label>
        <input type="file" name="image_left" accept="image/*">

        @if(!empty($item?->image_left_path))
            <div style="margin-top:6px;">
                <small>Mevcut: {{ $item->image_left_path }}</small>
            </div>
        @endif
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Sağ Görsel</label>
        <input type="file" name="image_right" accept="image/*">

        @if(!empty($item?->image_right_path))
            <div style="margin-top:6px;">
                <small>Mevcut: {{ $item->image_right_path }}</small>
            </div>
        @endif
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Sol Sıra</label>
        <input type="number" name="left_order" min="1"
               value="{{ old('left_order', $item->left_order ?? 1) }}"
               style="width:160px;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div>
        <label style="display:block;font-weight:600;margin-bottom:6px;">Sağ Sıra</label>
        <input type="number" name="right_order" min="1"
               value="{{ old('right_order', $item->right_order ?? 2) }}"
               style="width:160px;padding:10px;border:1px solid #ddd;border-radius:8px;">
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

        <a href="{{ route('admin.slider.index') }}" style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;text-decoration:none;">
            İptal
        </a>
    </div>
</div>
