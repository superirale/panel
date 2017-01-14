<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CampaignList;
use Illuminate\Http\Request;
use Session;

class CampaignListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $campaignlists = CampaignList::paginate(25);

        return view('campaign-lists.index', compact('campaignlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('campaign-lists.create');
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
			'campaign_id' => 'required|integer',
			'list_id' => 'required|integer'
		]);
        $requestData = $request->all();
        
        CampaignList::create($requestData);

        Session::flash('flash_message', 'CampaignList added!');

        return redirect('campaign-lists');
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
        $campaignlist = CampaignList::findOrFail($id);

        return view('campaign-lists.show', compact('campaignlist'));
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
        $campaignlist = CampaignList::findOrFail($id);

        return view('campaign-lists.edit', compact('campaignlist'));
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
			'campaign_id' => 'required|integer',
			'list_id' => 'required|integer'
		]);
        $requestData = $request->all();
        
        $campaignlist = CampaignList::findOrFail($id);
        $campaignlist->update($requestData);

        Session::flash('flash_message', 'CampaignList updated!');

        return redirect('campaign-lists');
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
        CampaignList::destroy($id);

        Session::flash('flash_message', 'CampaignList deleted!');

        return redirect('campaign-lists');
    }
}
