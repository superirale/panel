<?php
namespace App\Http\Services;
use GuzzleHttp\Client;
use App\Http\Services\Service;

class SmsService extends Service
{
	protected $url;

	function __construct()
	{
		$this->url = "http://cloud.nuobjects.com/api/send/";
		$this->base_uri = "http://cloud.nuobjects.com";
	}

	public function send($message, $phone, $type)
	{
		$data = [
			'user' => "superirale",
			'pass' => "omokhudu",
			'msg' => urlencode($message->body),
			'to' => $phone,
			'from' => 'TushworksNG'
		];

		$params = $this->setParams($data);
		$this->url .= $params;

		return $this->makeAsyncRequest($type, $this->url, $this->base_uri);
	}
}