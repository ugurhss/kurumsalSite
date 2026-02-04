<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SlideService;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class SlideController extends Controller
{
    public function __construct(private SlideService $slides) {}

    public function index()
    {
        $items = $this->slides->list([], [], 100);

        return view('admin.slider.index', compact('items'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255', Rule::unique('slides', 'title')],
            'image_left'  => ['required', 'image', 'max:10240'],
            'image_right' => ['required', 'image', 'max:10240'],
            'left_order'  => ['required', 'integer', 'min:1'],
            'right_order' => ['required', 'integer', 'min:1'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        $data['image_left_path'] = $this->moveToPublicAssets($request->file('image_left'), 'assets/slides');
        $data['image_right_path'] = $this->moveToPublicAssets($request->file('image_right'), 'assets/slides');
        $data['is_active'] = $request->boolean('is_active');

        unset($data['image_left'], $data['image_right']);

        $this->slides->create($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slide oluşturuldu');
    }


    public function edit(int $id)
    {
        $item = $this->slides->get($id);

        abort_if(!$item, 404);

        return view('admin.slider.edit', compact('item'));
    }

    public function update(Request $request, int $id)
    {
        $item = $this->slides->get($id);
        abort_if(!$item, 404);

        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255', Rule::unique('slides', 'title')->ignore($id)],
            'image_left'  => ['nullable', 'image', 'max:10240'],
            'image_right' => ['nullable', 'image', 'max:10240'],
            'left_order'  => ['required', 'integer', 'min:1'],
            'right_order' => ['required', 'integer', 'min:1'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image_left')) {
            $oldPath = $item->image_left_path;
            $data['image_left_path'] = $this->moveToPublicAssets($request->file('image_left'), 'assets/slides');
            if (!empty($oldPath)) {
                $this->deleteSlideFile($oldPath);
            }
        }

        if ($request->hasFile('image_right')) {
            $oldPath = $item->image_right_path;
            $data['image_right_path'] = $this->moveToPublicAssets($request->file('image_right'), 'assets/slides');
            if (!empty($oldPath)) {
                $this->deleteSlideFile($oldPath);
            }
        }

        $data['is_active'] = $request->boolean('is_active');

        unset($data['image_left'], $data['image_right']);

        $this->slides->update($id, $data);

        return redirect()->route('admin.slider.index')->with('success', 'Slide güncellendi');
    }



    public function destroy(int $id)
    {
        $item = $this->slides->get($id);
        if ($item) {
            if (!empty($item->image_left_path)) {
                $this->deleteSlideFile($item->image_left_path);
            }
            if (!empty($item->image_right_path)) {
                $this->deleteSlideFile($item->image_right_path);
            }
        }

        $this->slides->delete($id);

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slide silindi');
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

    private function deleteSlideFile(string $path): void
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
