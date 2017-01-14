<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CampaignList;
use Illuminate\Http\Request;
use Session;
use App\ContactList;

class CampaignListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($campaign_id)
    {
        $lists = ContactList::all()->toJson();

        return view('campaign-lists.index', compact('lists', 'campaign_id'));
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

        $requestData = $request->all();

        for ($i=0; $i < count($requestData['ids']); $i++) {

            $list = ContactList::find($requestData['ids'][$i]);

            if(!isset($list->id)){
                $list = ContactList::create(['name' => $requestData['ids'][$i]]);
            }

            CampaignList::create([
                    'list_id' => $list->id,
                    'campaign_id' => $requestData['campaign_id']
                ]);
        }


        return response()->json(['status' => 'success']);

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
