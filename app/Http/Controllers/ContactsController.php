<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends ApiController
{

	public function all()
	{
		$contacts = Contact::all();
		return response()->json($contacts);
	}

	public function read($id)
    {
        $Contact = Contact::find($id);

        return response()->json($Contact);
    }

    public function create(Request $request)
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