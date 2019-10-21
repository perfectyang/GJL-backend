<?php

class User_model extends CI_Model {
    public function get_user() {
      $sql="select * from account";
      return $this->query($sql);
    }
    public function query($sql) {
      $query = $this->db->query($sql);
      $result = $query->result_array();
      return $result;
    }
}
