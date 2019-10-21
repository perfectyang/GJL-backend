<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertiser extends CI_Controller {

	public function advertiserLogin()
	{
		$result['data'] = [
      'active' => 1,
      'advertiser_id' => 1301,
      'advertiser_name' => "py",
      'is_insider' => 1,
      'lang' => 1,
      'nickname' => "杨国唯",
      'pid' =>  0,
      'token_id' => "36d31239e248fc642740e3b7e8ec2ae525a6bba7eztalk",
      'user_desc' => null,
      'user_logo' => "http://img.qdtech.ai/upload/decision/c1/80/c180fb07535a202f4a17c515854de47c.jpg",
      'user_type' => "advertiser",
      'valid_end_time' => 1557936000,
      'valid_start_time'=> 1539964800
    ];
    $result['code'] = 0;
    $result['message'] = '登录成功';
		echo json_encode($result);
	}
}
