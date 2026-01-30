<?php

namespace App\Http\Controllers;
use App\Services\SlideService;
use App\Services\Product3DService;

class FrontendController extends Controller
{
    public function __construct(
        private SlideService $slideService,
        private Product3DService $product3DService
    ) {}

    public function index()
    {
        $slides = $this->slideService
            ->list(['is_active' => true], [], 100)
            ->sortBy('left_order')
            ->values();

        $products3d = $this->product3DService
            ->list(['is_active' => true], [], 100)
            ->values();

        return view('home', compact('slides', 'products3d'));
    }
}
