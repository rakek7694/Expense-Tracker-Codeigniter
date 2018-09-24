<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories_table extends CI_Migration {

  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }

  public function up()
  {
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'category_icon' => array(
        'type' => 'VARCHAR',
        'constraint' => 200
      ),
      'category_color' => array(
        'type' => 'VARCHAR',
        'constraint' => 12
      ),
      'category_name' => array(
        'type' => 'VARCHAR',
        'constraint' => 100
      ),
      'created_at' => array(
        'type' => 'DATETIME'
      ),
      'created_by' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'constraint' => 11
      ),
      'updated_at' => array(
        'type' => 'DATETIME'
      ),
      'updated_by' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'constraint' => 11
      )
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id',TRUE);
    $this->dbforge->create_table('categories',TRUE);

    $result = $this->db->insert('categories', array('id' => 1, 'category_icon' => 'category_icon_food', 'category_color' => 'cyan', 'category_name' => 'Restaurant', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 2, 'category_icon' => 'category_icon_car', 'category_color' => 'pink', 'category_name' => 'Transportation', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 3, 'category_icon' => 'category_icon_apple', 'category_color' => 'purple', 'category_name' => 'Vegetables & Fruits', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 4, 'category_icon' => 'category_icon_entertainment', 'category_color' => 'indigo', 'category_name' => 'Party', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 5, 'category_icon' => 'category_icon_gas', 'category_color' => 'teal', 'category_name' => 'Fuel', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 6, 'category_icon' => 'category_icon_shopping', 'category_color' => 'amber', 'category_name' => 'Shipping', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 7, 'category_icon' => 'category_icon_money', 'category_color' => 'orange', 'category_name' => 'Salary', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
    $result = $this->db->insert('categories', array('id' => 8, 'category_icon' => 'category_icon_coffee', 'category_color' => 'brown', 'category_name' => 'Extra Income', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1));
  }

  public function down()
  {
    $this->dbforge->drop_table('categories', TRUE);
  }
}