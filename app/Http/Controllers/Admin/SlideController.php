<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SlideService;
use Illuminate\Http\Request;
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

        $data['image_left_path'] = $request->file('image_left')->store('slides', 'public');
        $data['image_right_path'] = $request->file('image_right')->store('slides', 'public');
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
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255', Rule::unique('slides', 'title')->ignore($id)],
            'image_left'  => ['nullable', 'image', 'max:10240'],
            'image_right' => ['nullable', 'image', 'max:10240'],
            'left_order'  => ['required', 'integer', 'min:1'],
            'right_order' => ['required', 'integer', 'min:1'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image_left')) {
            $data['image_left_path'] = $request->file('image_left')->store('slides', 'public');
        }

        if ($request->hasFile('image_right')) {
            $data['image_right_path'] = $request->file('image_right')->store('slides', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        unset($data['image_left'], $data['image_right']);

        $this->slides->update($id, $data);

        return redirect()->route('admin.slider.index')->with('success', 'Slide güncellendi');
    }



    public function destroy(int $id)
    {
        $this->slides->delete($id);

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slide silindi');
    }

}
