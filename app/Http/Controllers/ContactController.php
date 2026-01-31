<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(private ContactService $service)
    {
     
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => ['required','string','max:120'],
            'phone'   => ['required','string','max:30'],
            'email'   => ['required','email','max:190'],
            'message' => ['required','string','max:5000'],
        ]);

        $this->service->create($validated + ['status' => 'new']);

        return redirect()
            ->route('contact.create')
            ->with('success', 'Mesajınız alınmıştır. En kısa sürede sizinle iletişime geçeceğiz.');
    }

    public function index(Request $request)
    {
        $filters = array_filter([
            'status' => $request->get('status'),
            'email'  => $request->get('email'),
            'phone'  => $request->get('phone'),
            'name'   => $request->get('name'),
        ]);

        $contacts = $this->service->list($filters, [], 50);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(int $id)
    {
        $contact = $this->service->get($id);
        abort_if(!$contact, 404);

        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(int $id, Request $request)
    {
        $validated = $request->validate([
            'status' => ['required','string','in:new,replied,closed'],
        ]);

        $updated = $this->service->update($id, ['status' => $validated['status']]);
        abort_if(!$updated, 404);

        return back()->with('success', 'Durum güncellendi.');
    }
}
