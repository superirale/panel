<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Campaign;
use Illuminate\Http\Request;
use Session;
use App\Jobs\SendSMS;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $campaigns = Campaign::paginate(25);

        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('campaigns.create');
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
			'name' => 'required|min:3',
			'type' => 'required'
		]);
        $requestData = $request->all();

        Campaign::create($requestData);

        Session::flash('flash_message', 'Campaign added!');

        return redirect('campaigns');
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
        $campaign = Campaign::findOrFail($id);

        return view('campaigns.show', compact('campaign'));
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
        $campaign = Campaign::findOrFail($id);

        return view('campaigns.edit', compact('campaign'));
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
			'name' => 'required|min:3',
			'type' => 'required'
		]);
        $requestData = $request->all();

        $campaign = Campaign::findOrFail($id);
        $campaign->update($requestData);

        Session::flash('flash_message', 'Campaign updated!');

        return redirect('campaigns');
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
        Campaign::destroy($id);

        Session::flash('flash_message', 'Campaign deleted!');

        return redirect('campaigns');
    }

    public function runCampaign($campaign_id)
    {
        $campaign = Campaign::with(['lists' => function ($q)
        {
            $q->with('contacts');
        }, 'message', 'templates'])->findOrFail($campaign_id);

        foreach ($campaign->lists as $list) {
            foreach ($list->contacts as $contact) {

                $job = (new SendSMS($campaign, $contact))->onQueue('sms-sender');
                dispatch($job);
           }
        }

    }
}
