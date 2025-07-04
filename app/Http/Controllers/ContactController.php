<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{

    function show(Request  $request): Response
    {
        $contacts = $request->user()->contacts()->orderBy('first_name', 'asc')->get();
        return Inertia::render('ContactList', ['contacts' => $contacts]);
    }


    function create(): Response
    {
        return Inertia::render('ContactAdd');
    }

    function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|email|max:50',
            'phone_number' => 'required|string|max:20',
        ]);

        $request->user()->contacts()->create($validated);

        return redirect('contacts');
    }

    public function edit(Request $request, $id)
    {
        $contact = $request->user()->contacts()->findOrFail($id);

        return Inertia::render('ContactEdit', ['contact' => $contact]);
    }

    function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'phone_number' => 'required|string|max:20',
        ]);

        $contact = $request->user()->contacts()->findOrFail($id);
        $contact->update($validated);

        return redirect('contacts');
    }

    function destroy($id): RedirectResponse
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('contacts');
    }
}
