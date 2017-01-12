<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Services\PiplService;
use App\Http\Services\NumVerifyService;

class SearchController extends ApiController
{
	public function __construct()
	{
		$this->pipl = new PiplService();
		$this->num_verify = new NumVerifyService(/*getenv('NUMVERIFY_API_KEY')*/);
	}

	public function getContactDetails(Request $request)
	{
		if($request->input('phone') != null)
			$data['phone'] = $this->pipl->formatNumber($request->input('phone'), '+234');

		if($request->input('email') != null)
			$data['email'] = $request->input('email');

		if($request->input('first_name') != null)
			$data['first_name'] = $request->input('first_name');

		if($request->input('last_name') != null)
			$data['last_name'] = $request->input('last_name');

		$details = $this->pipl->search($data);

		return response()->json(['status' => 'success', 'data' => $details]);
	}


	public function validateNumber(Request $request)
	{
		if($request->input('phone') != null)
			$data['number'] = $this->num_verify->formatNumber($request->input('phone'), '+234');

		$details = $this->num_verify->validate($data);

		return response()->json(['status' => 'success', 'data' => $details]);
	}

}