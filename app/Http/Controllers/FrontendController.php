<?php

namespace App\Http\Controllers;
use App\Services\SlideService;
use App\Services\Product3DService;
use App\Services\PartnerLogoService;

class FrontendController extends Controller
{
   public function __construct(
        private SlideService $slideService,
        private Product3DService $product3DService,
        private PartnerLogoService $partnerLogoService
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

        $logos = $this->partnerLogoService
            ->list(['is_active' => true], [], 200)
            ->values();

        return view('home', compact('slides', 'products3d', 'logos'));
    }

    public function reference()
    {
        $logos = $this->partnerLogoService
            ->list(['is_active' => true], [], 200)
            ->values();

        return view('references', compact('logos'));
    }

  public function products()
{
    $products3d = $this->product3DService
        ->list(['is_active' => true], [], 100)
        ->values();

    return view('products', compact('products3d'));
}


 public function show(int $id)
    {
        $product = $this->product3DService->get($id);

        abort_if(!$product || !$product->is_active, 404);

        return view('productsDetail', compact('product'));
    }
}