<?php
namespace App\Http\Services;

use \GuzzleHttp\Client;
use App\Http\Services\Service;

class NumverifyService extends Service
{

	function __construct()
	{
		$this->client = new Client();
		$this->url = "http://apilayer.net/api/validate";
		$this->key = getenv('NUMVERIFY_API_KEY');

    // ? access_key = 5ecb7bb28362f3332f50519816ee983e
    // & number = 14158586273
    // & country_code =
    // & format = 1
	}


	public function validate($params)
	{
		$params = $this->setParams($params);

		$res = $this->client->get($this->url.$params);

		return json_decode($res->getBody());
	}
}