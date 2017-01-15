<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CampaignMessage;
use Illuminate\Http\Request;
use Session;
use App\Campaign;
use App\Message;

class CampaignMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($campaign_id)
    {
        $messages = Message::pluck('name', 'id');
        $campaign = Campaign::with('message', 'templates', 'lists')->findOrFail($campaign_id);
        dd($campaign);
        return view('campaign-message.index', compact('messages', 'campaign_id'));
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

        return redirect('campaigns');
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
