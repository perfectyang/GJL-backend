<?php

class User_model extends MY_Model {

    public function user_list() {
      return $this->query_sql('account', "*", []);
    }

    public function modify_user($param) {
      $id = $param["id"];
      unset($param["id"]);
      $result = $this->update_sql('account', $param, 'id='.$id);
      return $result;
    }


    public function register($param) {
      unset($param['token_id']);
      $result = $this->insert_sql('account', $param);
      return $result;
    }


    public function login($param) {
      $result = $this->query_sql('account', "*", ['user_name' => $param["user_name"], 'pwd' => $param["pwd"]]);
      if (!$result['code']) {
        $info = $result["data"][0];
        $back["data"] = [
          "user_name" => $info["user_name"],
          "avatar" => $info["avatar"] ? $info["avatar"] : "",
          "token_id" => '1111'
        ];
        $this->session->set_userdata('user_info', $back);
      }
      return $result;
    }

    public function logout($param) {
      $back = [
        "code" => 1,
        "data" => [],
        "message" => "退出成功"
      ];
      $this->session->unset_userdata('user_info', $back);
      return $this->formate_result($back);
    }
}
