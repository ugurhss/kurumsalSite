<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PartnerLogoService;
use Illuminate\Http\Request;

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
            'logo'      => ['required', 'file', 'max:4096'], // SVG/PNG/WEBP vs. (mime koymadım)
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['logo_path'] = $request->file('logo')->store('partner-logos', 'public');
        $data['is_active'] = isset($data['is_active']);

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
            'logo'      => ['nullable', 'file', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('partner-logos', 'public');
        }

        $data['is_active'] = isset($data['is_active']);

        unset($data['logo']);

        $this->logos->update($id, $data);

        return redirect()->route('admin.partner_logos.index')->with('success', 'Logo güncellendi');
    }

    public function destroy(int $id)
    {
        $this->logos->delete($id);

        return redirect()->route('admin.partner_logos.index')->with('success', 'Logo silindi');
    }
}
