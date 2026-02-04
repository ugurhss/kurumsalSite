<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Product3DService;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

        // 3D model dosyası (zorunlu)
        $data['model_path'] = $this->moveToPublicAssets($request->file('model'), 'assets/products3d/models');

        // Çoklu görseller (opsiyonel)
        $data['images'] = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $data['images'][] = $this->moveToPublicAssets($img, 'assets/products3d/images');
            }
        }

        // specs JSON normalize
        $data['specs'] = $this->normalizeSpecs($data['specs'] ?? null);

        $data['is_active'] = $request->boolean('is_active');

        unset($data['model']); // güvenlik/temizlik amaçlı

        $this->products->create($data);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün eklendi');
    }

    public function update(Request $request, int $id)
    {
        $item = $this->products->get($id);
        abort_if(!$item, 404);

        $data = $this->validateData($request, isUpdate: true);

        // 3D model yenilenirse
        if ($request->hasFile('model')) {
            $oldPath = $item->model_path;
            $data['model_path'] = $this->moveToPublicAssets($request->file('model'), 'assets/products3d/models');

            if (!empty($oldPath)) {
                $this->deleteProductFile($oldPath);
            }
        }

        // Yeni görseller eklenirse: mevcut images üzerine ekle
        $images = is_array($item->images) ? $item->images : [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = $this->moveToPublicAssets($img, 'assets/products3d/images');
            }
        }
        $data['images'] = $images;

        // specs JSON normalize
        $data['specs'] = $this->normalizeSpecs($data['specs'] ?? null);

        $data['is_active'] = $request->boolean('is_active');

        unset($data['model']);

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
        $item = $this->products->get($id);
        if ($item) {
            if (!empty($item->model_path)) {
                $this->deleteProductFile($item->model_path);
            }

            $images = is_array($item->images) ? $item->images : [];
            foreach ($images as $path) {
                if (is_string($path) && $path !== '') {
                    $this->deleteProductFile($path);
                }
            }
        }

        $this->products->delete($id);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün silindi');
    }


    private function validateData(Request $request, bool $isUpdate): array
    {
        return $request->validate([
            'title'             => ['required','string','max:255'],
            'short_description' => ['nullable','string','max:500'],
            'description'       => ['nullable','string'],
            'model'             => [
                $isUpdate ? 'nullable' : 'required',
                'file',
                'max:51200', // 50MB
                function (string $attribute, mixed $value, \Closure $fail) {
                    if (!$value instanceof UploadedFile) {
                        return;
                    }

                    $ext = strtolower($value->getClientOriginalExtension() ?? '');
                    if (!in_array($ext, ['glb', 'gltf'], true)) {
                        $fail('3D model dosyası .glb veya .gltf olmalıdır.');
                    }
                },
            ],
            'images'            => ['nullable', 'array'],
            'images.*'          => ['image', 'max:8192'], // 8MB / görsel başına
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

    private function moveToPublicAssets(UploadedFile $file, string $subDir): string
    {
        $destinationPath = public_path($subDir);

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = strtolower($file->getClientOriginalExtension() ?: 'bin');

        $filename =
            now()->format('YmdHis')
            . '-' . Str::slug($baseName)
            . '-' . strtolower(Str::random(6))
            . '.' . $extension;

        $file->move($destinationPath, $filename);

        return trim($subDir, '/') . '/' . $filename;
    }

    private function deleteProductFile(string $path): void
    {
        $normalized = ltrim($path, '/');

        if (str_starts_with($normalized, 'assets/')) {
            $fullPath = public_path($normalized);
        } else {
            // eski kayıtlar: storage/app/public altında olabilir
            $fullPath = storage_path('app/public/' . $normalized);
        }

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }
}
