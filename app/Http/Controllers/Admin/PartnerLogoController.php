<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PartnerLogoService;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PartnerLogoController extends Controller
{
    public function __construct(private PartnerLogoService $logos) {}

    public function index()
    {
        $items = $this->logos->list([], [], 300);
        return view('admin.partner_logos.index', compact('items'));
    }

    public function create()
    {
        return view('admin.partner_logos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'logo'      => ['required', 'file', 'mimes:svg,png,jpg,jpeg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['logo_path'] = $this->moveToPublicAssets($request->file('logo'), 'assets/partner-logos');
        $data['is_active'] = $request->boolean('is_active');

        unset($data['logo']);

        $this->logos->create($data);

        return redirect()->route('admin.partner_logos.index')->with('success', 'Logo eklendi');
    }

    public function edit(int $id)
    {
        $item = $this->logos->get($id);
        abort_if(!$item, 404);

        return view('admin.partner_logos.edit', compact('item'));
    }

    public function update(Request $request, int $id)
    {
        $item = $this->logos->get($id);
        abort_if(!$item, 404);

        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'logo'      => ['nullable', 'file', 'mimes:svg,png,jpg,jpeg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('logo')) {
            $oldPath = $item->logo_path;
            $data['logo_path'] = $this->moveToPublicAssets($request->file('logo'), 'assets/partner-logos');

            if (!empty($oldPath)) {
                $this->deleteLogoFile($oldPath);
            }
        }

        $data['is_active'] = $request->boolean('is_active');

        unset($data['logo']);

        $this->logos->update($id, $data);

        return redirect()->route('admin.partner_logos.index')->with('success', 'Logo güncellendi');
    }

    public function destroy(int $id)
    {
        $item = $this->logos->get($id);
        if ($item?->logo_path) {
            $this->deleteLogoFile($item->logo_path);
        }

        $this->logos->delete($id);

        return redirect()->route('admin.partner_logos.index')->with('success', 'Logo silindi');
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

    private function deleteLogoFile(string $path): void
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
