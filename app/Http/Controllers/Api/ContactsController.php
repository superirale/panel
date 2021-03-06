<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers;

class ContactsController extends ApiController
{

	public function index()
	{
		$contacts = Contact::all();
		return response()->json($contacts);
	}

	public function show($id)
    {
        $Contact = Contact::find($id);

        return response()->json($Contact);
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->all());

        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        $updated = $contact->update($request->all());

        return response()->json(['updated' => $updated]);
    }

    public function delete($id)
    {
        $deletedRows = Contact::destroy($id);

        $deleted = $deletedRows == 1;

        return response()->json(['deleted' => $deleted]);
    }
}