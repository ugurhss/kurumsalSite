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
        // Basit doğrulama (image/mimes gibi hassas doğrulamayı istemiyordun)
        $data = $request->validate([
            'title'     => ['nullable','string','max:255'],
            'model'     => ['required','file','max:51200'], // 50MB (glb büyük olabilir)
            'is_active' => ['nullable','boolean'],
        ]);

        // Dosya kaydet
        $data['model_path'] = $request->file('model')->store('models3d', 'public');
        $data['is_active'] = isset($data['is_active']);

        unset($data['model']);

        $this->products->create($data);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün eklendi');
    }

    public function edit(int $id)
    {
        $item = $this->products->get($id);
        abort_if(!$item, 404);

        return view('admin.products3d.edit', compact('item'));
    }

    public function update(Request $request, int $id)
    {
        $item = $this->products->get($id);
        abort_if(!$item, 404);

        $data = $request->validate([
            'title'     => ['nullable','string','max:255'],
            'model'     => ['nullable','file','max:51200'],
            'is_active' => ['nullable','boolean'],
        ]);

        if ($request->hasFile('model')) {
            $data['model_path'] = $request->file('model')->store('models3d', 'public');
        }

        $data['is_active'] = isset($data['is_active']);

        unset($data['model']);

        $this->products->update($id, $data);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün güncellendi');
    }

    public function destroy(int $id)
    {
        $this->products->delete($id);

        return redirect()->route('admin.products3d.index')->with('success', '3D ürün silindi');
    }
}
