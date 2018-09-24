<?php
class Transactions extends CI_Model
{
  private $table = 'transactions';


  public function insert($data){
    $result = $this->db->insert($this->table, $data);
    return $result;
  }

  public function get($where = array(), $select = '*', $order = array()){
    foreach ($where as $wh) {
      $this->db->where($wh['col'], $wh['value']);
    }

    $this->db->select($select);

    foreach ($order as $or) {
      $this->db->order_by($or['sort'], $or['direction']);
    }

    return $this->db->get($this->table)->result();

  }

  public function getAll(){
    return $this->get(array(), '*', array(array('sort'=>'id','direction'=>'asc')));
  }

  public function getById($id){
    return $this->get(array(array('col' => 'id','value' => $id)));

  }

  public function update($data,$id){
    return $this->db->where('id',$id)->update($this->table, $data);
  }

  public function delete($id){
    return $this->db->where('id',$id)->delete($this->table);
  }

}