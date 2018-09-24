<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('id') == 0) {
      redirect('users/logout');
    }
    $transactions = $this->load->model('transactions');
  }

	public function index()
	{
	  $expenses = $this->transactions->get(array(array('col'=>'transaction_type','value'=>'expense'), array('col'=>'uid','value'=>$this->session->userdata('id'))), 'sum(amount) AS total_amount');
    $incomes = $this->transactions->get(array(array('col'=>'transaction_type','value'=>'income'), array('col'=>'uid','value'=>$this->session->userdata('id'))), 'sum(amount) AS total_amount');
		$this->load->view('pages/dashboard', array('title' => 'Dashboard', 'expenses' => round($expenses[0]->total_amount,2), 'incomes' => round($incomes[0]->total_amount,2)));
	}
}
