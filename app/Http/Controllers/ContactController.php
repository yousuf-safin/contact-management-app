<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()
            ->orderBy(request('sort', 'name'), 'asc')
            ->when(request('search'), function($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                      ->orWhere('email', 'like', '%' . request('search') . '%');
            })
            ->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email',
        ]);

        Contact::create($request->only('name', 'email', 'phone', 'address'));

        return redirect('/contacts');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($request->only('name', 'email', 'phone', 'address'));

        return redirect('/contacts');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('/contacts');
    }
}

