<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CampaignTemplate;
use Illuminate\Http\Request;
use Session;
use App\Template;
use App\Campaign;

class CampaignTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($campaign_id)
    {
        $templates = Template::pluck('name', 'id');
        Campaign::findOrFail($campaign_id);

        return view('campaign-templates.index', compact('templates', 'campaign_id'));
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
			'template_id' => 'required|integer'
		]);
        $requestData = $request->all();


        CampaignTemplate::create($requestData);

        Session::flash('flash_message', 'CampaignTemplate added!');

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
        $campaigntemplate = CampaignTemplate::findOrFail($id);

        return view('campaign-templates.show', compact('campaigntemplate'));
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
        $campaigntemplate = CampaignTemplate::findOrFail($id);

        return view('campaign-templates.edit', compact('campaigntemplate'));
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
			'template_id' => 'required|integer'
		]);
        $requestData = $request->all();

        $campaigntemplate = CampaignTemplate::findOrFail($id);
        $campaigntemplate->update($requestData);

        Session::flash('flash_message', 'CampaignTemplate updated!');

        return redirect('campaign-templates');
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
        CampaignTemplate::destroy($id);

        Session::flash('flash_message', 'CampaignTemplate deleted!');

        return redirect('campaign-templates');
    }
}
