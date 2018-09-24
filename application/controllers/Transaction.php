<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('id') == 0) {
      redirect('users/logout');
    }
    $categories = $this->load->model('categories');
    $transactions = $this->load->model('transactions');
  }
  /**
   * Generic redirector
   */
  public function index()
  {
    $cats = $this->categories->getAll();
    $categories = array();
    foreach ($cats as $cat) {
      $categories[$cat->id]['category_name'] = $cat->category_name;
      $categories[$cat->id]['category_color'] = $cat->category_color;
      $categories[$cat->id]['category_icon'] = $cat->category_icon;
    }
    $this->load->view('pages/transactions/list', array('title'=> 'List of All Transactions', 'transactions' => $this->transactions->get(array(array('col'=>'uid','value'=>$this->session->userdata('id')))), 'categories'=> $categories));
  }

  /**
   * Create new Transaction
   */
  public function create()
  {
    $error = array();
    $result = array();
    $old = $this->input->post();
    if($this->input->post('create-form')) {
      $result = $this->transactions->insert(
      array(
        'transaction_type' => trim($this->input->post('transaction_type'))
      , 'transaction_date' => date("Y-m-d", strtotime($this->input->post('transaction_date')))
      , 'category_id' => trim($this->input->post('category'))
      , 'amount' => trim($this->input->post('amount'))
      , 'uid' => $this->session->userdata('id')
      , 'notes' => trim($this->input->post('notes'))
      , 'created_at' => date('Y-m-d H:i:s')
      , 'created_by' => $this->session->userdata('id')
      ));
      if($result) {
        $old = array();
        $result = 'Successfully saved transaction!';
      }
    }
    $this->load->view('pages/transactions/create', array('title'=> 'Create New Transaction', 'categories'=> $this->categories->getAll(), 'errors'=> $error,'result' => $result, 'old' => $old ));
  }

  /**
   * Create new Transaction
   */
  public function edit($id)
  {
    $error = array();
    $result = array();
    if($this->input->post('create-form')) {
      $result = $this->transactions->update(
      array(
        'transaction_type' => trim($this->input->post('transaction_type'))
      , 'transaction_date' => date("Y-m-d", strtotime($this->input->post('transaction_date')))
      , 'category_id' => trim($this->input->post('category'))
      , 'amount' => trim($this->input->post('amount'))
      , 'notes' => trim($this->input->post('notes'))
      , 'updated_at' => date('Y-m-d H:i:s')
      , 'updated_by' => $this->session->userdata('id')
      ), $id);
      if($result) {
        $result = 'Successfully updated transaction!';
      }
    }
    $data = $this->transactions->getById($id);
    $this->load->view('pages/transactions/edit', array('title'=> 'Edit Transaction', 'categories'=> $this->categories->getAll(), 'errors'=> $error,'result' => $result, 'data' => $data[0] ));
  }

  /**
   * Create new Transaction
   */
  public function delete($id)
  {
    $categories = array();
    $result = $this->transactions->getById($id);
    $error = 'Failed to update transaction!';
    if(count($result)) {
      $result = $this->transactions->delete($id);
      if($result) {
        $result = 'Transaction successfully Deleted!';
        $error = null;
      }
    }

    $cats = $this->categories->getAll();
    foreach ($cats as $cat) {
      $categories[$cat->id]['category_name'] = $cat->category_name;
      $categories[$cat->id]['category_color'] = $cat->category_color;
      $categories[$cat->id]['category_icon'] = $cat->category_icon;
    }
    $this->load->view('pages/transactions/list', array('title'=> 'List of All Transactions', 'error'=> $error, 'result' => $result, 'transactions' => $this->transactions->get(array(array('col'=>'uid','value'=>$this->session->userdata('id')))), 'categories'=> $categories));
  }
}
