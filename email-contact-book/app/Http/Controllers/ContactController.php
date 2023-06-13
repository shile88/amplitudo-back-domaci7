<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()->where('created_by', '=',auth()->user()->id)->paginate(7);

        return view('contacts.index', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = $avatar->store('avatars');
            $validatedData['avatar'] = 'storage/' . $path;
        }
        Contact::query()->create($validatedData);

        return redirect()->route('contacts.index');
    }
}
