<?php
namespace App\Http\Services;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Service
{


	function __construct()
	{

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
			$params_string .="$key=$value";

			$count++;
		}



		return $params_string;
	}

	public function makeRequest($type, $url, $base_uri, $data = [])
	{

		$client =new Client();
		$result = $client->request($type, $url, $data);

		return $result;
	}

	public function makeAsyncRequest($type, $url, $base_uri, $data = [])
	{
		// $promise = (new Client(['base_url' => $base_uri]))->requestAsync($type, $url, $data);


		$request = new \GuzzleHttp\Psr7\Request($type, $url, $data);

		$promise = $client->sendAsync($request)->then(function ($response) {
		    echo 'I completed! ' . $response->getBody();
		});

	}
}