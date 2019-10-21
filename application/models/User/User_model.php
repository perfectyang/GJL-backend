<?php

class User_model extends MY_Model {

    public function get_user() {
      // $sql="select * from account";
      return $this->query_sql('account', "*", []);
    }

    public function modify_user($param) {
      $id = $param["id"];
      unset($param["id"]);
      $result = $this->update_sql('account', $param, 'id='.$id);
      return $result;
    }


    public function register($param) {
      $result = $this->insert_sql('account', ["user_name" => $param["user_name"], "pwd" => $param["pwd"]]);
      return $result;
    }


    public function login($param) {
      $result = $this->query_sql('account', "*", ['user_name' => $param["user_name"], 'pwd' => $param["pwd"]]);
      $len = count($result);
      $back = [
        "code" => $len
      ];
      if ($len) {
        $info = $result[0];
        $back["data"] = [
          "user_name" => $info["user_name"],
          "avatar" => $info["avatar"] ? $info["avatar"] : ""
        ];
      } else {
        $back["data"] = [];
      }
      return $this->formate_result($back);
    }
}
