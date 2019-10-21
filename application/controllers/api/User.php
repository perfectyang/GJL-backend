<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

  public function login()
	{
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->login($param);
		echo json_encode($result);
	}

	public function modify_user() {
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->modify_user($param);
		echo json_encode($result);
	}
	public function register() {
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->register($param);
		echo json_encode($result);
	}

	public function user_list()
	{
		$result['list'] = $this->user_model->get_user();
		$result['code'] = 0;
		$result['msg'] = '操作成功';
		echo json_encode($result);
	}


}
