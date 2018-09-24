<?php
class Categories extends CI_Model
{
  private $table = 'categories';


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
    $this->db->where('id',$id);
    $result = $this->db->update($this->table, $data);
    return $result;
  }

}