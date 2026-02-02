<?php

namespace App\Http\Controllers;

use App\Services\QuoteService;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct(private QuoteService $quoteService)
    {
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required','string','max:120'],
            'phone'     => ['required','string','max:30'],
            'email'     => ['required','email','max:190'],
            'company'   => ['required','string','max:190'],
            'city'      => ['required','string','max:100'],
            'product'   => ['required','string','max:190'],
            'details'   => ['required','string','max:5000'],
        ]);

        $this->quoteService->create($validated + ['status' => 'new']);

        return back()->with('success', 'Teklif talebiniz alındı. En kısa sürede dönüş sağlayacağız.');
    }

    // Admin tarafı örnekleri:

    public function index(Request $request)
    {
        $filters = array_filter([
            'status' => $request->get('status'),
            'email'  => $request->get('email'),
            'phone'  => $request->get('phone'),
        ]);

        $quotes = $this->quoteService->list($filters, [], 50);

        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(int $id)
    {
        $quote = $this->quoteService->get($id);
        abort_if(!$quote, 404);

        return view('admin.quotes.show', compact('quote'));
    }

    public function update(int $id, Request $request)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:new,contacted,closed'],
        ]);

        $updated = $this->quoteService->update($id, $validated);
        abort_if(!$updated, 404);

        return back()->with('success', 'Güncellendi.');
    }

    public function destroy(int $id)
    {
        $ok = $this->quoteService->delete($id);
        abort_if(!$ok, 404);

        return back()->with('success', 'Silindi.');
    }
}
