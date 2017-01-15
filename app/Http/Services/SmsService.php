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
	}

	public function send($message, $phone)
	{
		$data = [
			'msg' => $message->body,
			'to' => $phone,
			'user' => "superirale",
			'pass' => "omokhudu",
			'from' => 'Tushworks'
		];
		$params = $this->setParams($data);
		$this->url .= $params;

		$this->makeAsyncRequest("POST", $this->url, "http://cloud.nuobjects.com");
	}
}