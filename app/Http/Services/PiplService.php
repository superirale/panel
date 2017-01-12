<?php
namespace App\Http\Services;

use \GuzzleHttp\Client;

class PiplService
{

	function __construct()
	{
		$this->client = new Client();
		$this->url = "https://api.pipl.com/search/";
		$this->key = getenv('PIPL_API_KEY');
		//https://api.pipl.com/search/?email=superirale%40gmail.com&phone=8169315298&first_name=Irale&last_name=Omokhudu&middle_name=Usman&country=Nigeria&state=Lagos&city=Lagos&username=superirale&age=29&key=xubetp0wdiewo43wp9ieieeb
	}


	public function formatNumber($phone, $dial_code)
	{
		$phone = substr($phone, 1);
		return $phone = $dial_code.$phone;

	}

	public function setParams($params_arrays)
	{
		$params_string = '?';
		$count = 0;
		foreach ($params_arrays as $key => $value) {
			if($count > 0){
				$params_string .= "&";
			}
			$params_string .= "$key=$value";

			$count++;
		}

		$params_string .= "&key=$this->key";

		return $params_string;
	}

	public function search($params)
	{
		$params = $this->setParams($params);

		$res = $this->client->get($this->url.$params);

		return json_decode($res->getBody());
	}
}