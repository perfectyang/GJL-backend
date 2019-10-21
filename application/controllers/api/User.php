<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function user_list()
	{
		$result['list'] = $this->user_model->get_user();
		$result['code'] = 0;
		$result['msg'] = '操作成功';
		echo json_encode($result);
	}

	public function test()
	{
		$params = $this->input->post();
		echo json_encode($params);
	}

	public function send_post($url, $post_data) {
	  $postdata = http_build_query($post_data);
	  $options = array(
	    'http' => array(
	        'method' => 'POST',
					'header' => 'Content-type:application/x-www-form-urlencoded',
	        'content' => $postdata,
	        'timeout' => 15 * 60 // 超时时间（单位:s）
	    )
	  );
	  $context = stream_context_create($options);
	  $result = file_get_contents($url, false, $context);
	  return $result;
	}

	public function beatifulPic() {
		$params = [
			'api_key' => 'PjmG56GnyezVdkkBku_bs8ode5YZUUw0',
			'api_secret' => 'CveS2mk8TjA6iB6q4HEbmeNydH7NXjAw',
			'image_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1554094692715&di=a2addfb8807be073a5cc392fa02f06c9&imgtype=0&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01859456ebb5f532f875a944d10641.jpg%402o.jpg',
			'whitening' => 100,
			'smoothing' => 100
		];
		$result = $this->send_post('https://api-cn.faceplusplus.com/facepp/v1/beautify', $params);
		print_r($result);
	}

}
