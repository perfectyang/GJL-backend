<?php

 class MY_Controller extends CI_Controller {
     public function __construct() {
         parent::__construct();
     }

     public function checkSession() {
       $user_info = $this->session->userdata("user_info");
       if (!$user_info) {
        $data = [
          "code" => 1,
          "data" => [],
          "message" => "token_id已失效"
        ];
        echo json_encode($data);
        exit();
       }
     }
  }
