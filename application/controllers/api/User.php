<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/controllers/common/Upload.php';
class User extends MY_Controller {

	public function upload () {
		$img = new Upload('filename');
		$bool = $img->uploadUrl('filename');
		echo json_encode([
			"code" => $bool ? 0 : 1,
			"data" => $img->getUrl()
		]);
	}

  public function login() {
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->login($param);
		echo json_encode($result);
	}
  public function logout() {
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->logout($param);
		echo json_encode($result);
	}

	public function modify_user() {
		$this->checkSession();
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->modify_user($param);
		echo json_encode($result);
	}
	public function register() {
		$param = $this->input->post(NULL, TRUE);
		$result = $this->user_model->register($param);
		echo json_encode($result);
	}

	public function user_list() {
		$this->checkSession();
		$result = $this->user_model->user_list();
		echo json_encode($result);
	}
}
