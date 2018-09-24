<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_transactions_table extends CI_Migration {

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
      'uid' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'constraint' => 11
      ),
      'transaction_type' => array(
        'type' => "ENUM('expense','income')"
      ),
      'category_id' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'constraint' => 11
      ),
      'amount' => array(
        'type' => 'float'
      ),
      'notes' => array(
        'type' => 'TEXT'
      ),
      'created_at' => array(
        'type' => 'DATETIME'
      ),
      'transaction_date' => array(
        'type' => 'DATE'
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
    $this->dbforge->create_table('Transaction',TRUE);
  }

  public function down()
  {
    $this->dbforge->drop_table('Transaction', TRUE);
  }
}