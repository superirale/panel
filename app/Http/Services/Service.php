<?php
namespace App\Http\Services;


class Service
{

	function __construct()
	{
		// $this->key = $key;
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

		$params_string .= "&access_key=$this->key";
		$params_string .= "&key=$this->key";

		return $params_string;
	}

	public function makeRequest($params)
	{
		# code...
	}
}