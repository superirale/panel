<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CampaignMessage;
use Illuminate\Http\Request;
use Session;

class CampaignMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $campaignmessage = CampaignMessage::paginate(25);

        return view('campaign-message.index', compact('campaignmessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('campaign-message.create');
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
			'message_id' => 'required|integer'
		]);
        $requestData = $request->all();
        
        CampaignMessage::create($requestData);

        Session::flash('flash_message', 'CampaignMessage added!');

        return redirect('campaign-message');
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
        $campaignmessage = CampaignMessage::findOrFail($id);

        return view('campaign-message.show', compact('campaignmessage'));
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
        $campaignmessage = CampaignMessage::findOrFail($id);

        return view('campaign-message.edit', compact('campaignmessage'));
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
			'message_id' => 'required|integer'
		]);
        $requestData = $request->all();
        
        $campaignmessage = CampaignMessage::findOrFail($id);
        $campaignmessage->update($requestData);

        Session::flash('flash_message', 'CampaignMessage updated!');

        return redirect('campaign-message');
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
        CampaignMessage::destroy($id);

        Session::flash('flash_message', 'CampaignMessage deleted!');

        return redirect('campaign-message');
    }
}
