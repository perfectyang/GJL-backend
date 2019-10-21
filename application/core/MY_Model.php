
<?php


class MY_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function formate_result ($param) {
      $data = [
        "code" => $param["code"] ? 0 : 1,
        "data" => $param["data"],
        "message" => $param["code"] ? "success" : "failure"
      ];
      return $data;
    }

    // 查询

    public function query_sql($table, $field = '*' , $where = array() , $limit = 1 , $offset = Null , $order = '' , $group = '') {
      $this->db->from($table);
      $this->db->select( $field );
      $this->db->like( $where );
      $this->db->where( $where );
      if (intval( $limit ) > 0) {
        $this->db->limit( $limit , $offset);
      }
      if ( !empty( $order)) {
        $this->db->order_by( $order);
      }
      if ( !empty( $group )) {
        $this->db->group_by( $group );
      }
      $rec = $this->db->get();
      return $rec->result_array();
  }

    // 增加
    public function insert_sql($table, $arr) {
      $sql = $this->db->insert_string($table, $arr);
      $this->db->query($sql);
      $result['code'] = $this->db->affected_rows();
      $result["data"] = [
        "id" => $this->db->insert_id()
      ];
      return $this->formate_result($result);
    }

    // 修改
    public function update_sql($table, $arr, $where) {
      $sql = $this->db->update_string($table, $arr, $where);
      $this->db->query($sql);
      return $this->formate_result([
        "code" => $this->db->affected_rows(),
        "data" => []
      ]);
    }

    // 删除
    public function delete_sql($table, $arr) {
      $this->db->delete($table, $arr);
      return $this->formate_result([
        "code" => $this->db->affected_rows(),
        "data" => []
      ]);
    }

 }
