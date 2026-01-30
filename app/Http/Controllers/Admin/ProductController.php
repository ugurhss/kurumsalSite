<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Product3DService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private Product3DService $products) {}

    public function index()
    {
        $items = $this->products->list([], [], 200);
        return view('admin.products3d.index', compact('items'));
    }

    public function create()
    {
        return view('admin.products3d.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, isUpdate: false);

        // GLB dosyası (zorunlu)
        $data['model_path'] = $request->file('model')->store('models3d', 'public');

        // Çoklu görseller (opsiyonel)
        $data['images'] = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $data['images'][] = $img->store('products3d/images', 'public');
            }
        }

        // specs JSON normalize
        $data['specs'] = $this->normalizeSpecs($data['specs'] ?? null);

        $data['is_active'] = $request->boolean('is_active');

        unset($data['model'], $data['images_files']); // güvenlik amaçlı

        $this->products->create($data);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün eklendi');
    }

 public function update(Request $request, int $id)
    {
        $item = $this->products->get($id);
        abort_if(!$item, 404);

        $data = $this->validateData($request, isUpdate: true);

        // GLB yenilenirse
        if ($request->hasFile('model')) {
            $data['model_path'] = $request->file('model')->store('models3d', 'public');
        }

        // Yeni görseller eklenirse: mevcut images üzerine ekle
        $images = is_array($item->images) ? $item->images : [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = $img->store('products3d/images', 'public');
            }
        }
        $data['images'] = $images;

        // specs JSON normalize
        $data['specs'] = $this->normalizeSpecs($data['specs'] ?? null);

        $data['is_active'] = $request->boolean('is_active');

        unset($data['model'], $data['images_files']);

        $this->products->update($id, $data);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün güncellendi');
    }

    public function edit(int $id)
    {
        $item = $this->products->get($id);
        abort_if(!$item, 404);

        return view('admin.products3d.edit', compact('item'));
    }

  

    public function destroy(int $id)
    {
        $this->products->delete($id);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün silindi');
    }


      private function validateData(Request $request, bool $isUpdate): array
    {
        return $request->validate([
            'title'             => ['required','string','max:255'],
            'short_description' => ['nullable','string','max:500'],
            'description'       => ['nullable','string'],
            'model'             => [$isUpdate ? 'nullable' : 'required', 'file', 'max:51200'], // 50MB
            'images'            => ['nullable'],
            'images.*'          => ['file','max:8192'], // 8MB / görsel başına
            'specs'             => ['nullable','json'], // JSON textarea
            'price_note'        => ['nullable','string','max:255'],
            'quote_url'         => ['nullable','url','max:255'],
            'is_active'         => ['nullable','boolean'],
        ]);
    }

    private function normalizeSpecs(?string $specsRaw): array
    {
        if ($specsRaw === null || trim($specsRaw) === '') {
            return [];
        }

        $decoded = json_decode($specsRaw, true);

        // Geçersiz JSON ise boş array (istersen validation ile hata da attırırız)
        if (!is_array($decoded)) {
            return [];
        }

        return $decoded;
    }
}
