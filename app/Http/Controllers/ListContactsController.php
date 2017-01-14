<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ListContact;
use Illuminate\Http\Request;
use Session;

class ListContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $listcontacts = ListContact::paginate(25);

        return view('list-contacts.index', compact('listcontacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('list-contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'contact_id' => 'required|integer',
			'list_id' => 'required|integer'
		]);
        $requestData = $request->all();
        
        ListContact::create($requestData);

        Session::flash('flash_message', 'ListContact added!');

        return redirect('list-contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $listcontact = ListContact::findOrFail($id);

        return view('list-contacts.show', compact('listcontact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $listcontact = ListContact::findOrFail($id);

        return view('list-contacts.edit', compact('listcontact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'contact_id' => 'required|integer',
			'list_id' => 'required|integer'
		]);
        $requestData = $request->all();
        
        $listcontact = ListContact::findOrFail($id);
        $listcontact->update($requestData);

        Session::flash('flash_message', 'ListContact updated!');

        return redirect('list-contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        ListContact::destroy($id);

        Session::flash('flash_message', 'ListContact deleted!');

        return redirect('list-contacts');
    }
}
