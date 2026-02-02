<?php

namespace App\Http\Controllers;

use App\Services\SupplierApplicationService;
use Illuminate\Http\Request;

class SupplierApplicationController extends Controller
{
    public function __construct(private SupplierApplicationService $service)
    {
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required','string','max:120'],
            'company'   => ['required','string','max:190'],
            'phone'     => ['required','string','max:30'],
            'email'     => ['required','email','max:190'],
            'city'      => ['required','string','max:100'],
            'product'   => ['required','string','max:190'],
            'details'   => ['required','string','max:5000'],
        ]);

        $this->service->create($validated + ['status' => 'new']);

        return redirect()
            ->route('supplier.apply.create')
            ->with('success', 'Başvurunuz alınmıştır. En kısa sürede sizinle iletişime geçeceğiz.');
    }

    public function index(Request $request)
    {
        $filters = array_filter([
            'status' => $request->get('status'),
            'email'  => $request->get('email'),
            'phone'  => $request->get('phone'),
            'city'   => $request->get('city'),
        ]);

        $applications = $this->service->list($filters, [], 50);

        return view('admin.supplier_applications.index', compact('applications'));
    }

    public function show(int $id)
    {
        $application = $this->service->get($id);
        abort_if(!$application, 404);

        return view('admin.supplier_applications.show', compact('application'));
    }

    public function updateStatus(int $id, Request $request)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:new,reviewed,approved,rejected'],
        ]);

        $updated = $this->service->update($id, [
            'status' => $validated['status'],
        ]);

        abort_if(!$updated, 404);

        return back()->with('success', 'Durum güncellendi.');
    }
}
