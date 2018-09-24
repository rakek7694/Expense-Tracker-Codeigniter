<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    if($this->uri->segment(2) != 'logout' && $this->session->userdata('id') > 0) {
      redirect('dashboard');
    }
    $users = $this->load->model('users');
  }
  /**
   * Generic redirector
   */
	public function index()
	{
    if($this->input->post('login-from')) {
      $this->login();
    }
		$this->load->view('pages/login',array('title'=> 'Login'));
	}

	/**
   * Generic Login
   */
	public function login()
	{
    $error = array();
    $result = array();

    if($this->input->post('login-from')) {
      if(strlen($this->input->post('password')) < 6) {
        $error['password'] = 'Invalid Password!';
      }

      if (strpos($this->input->post('username'), '@') !== false) {
        $result = $this->users->get(array(array('col' => 'email', 'value' => trim($this->input->post('username')))));
        if (count($result) == 0) {
          $error['username'] = 'Email not found!';
        }
      } else {
        $result = $this->users->get(array(array('col' => 'username', 'value' => trim($this->input->post('username')))));
        if (count($result) == 0) {
          $error['username'] = 'Username not found!';
        }
      }

      if(count($error) == 0 && md5(trim($this->input->post('password'))) == $result[0]->password) {
        $this->session->set_userdata(array('id' => $result[0]->id, 'username' => $result[0]->username, 'email' => $result[0]->email));
        redirect('dashboard');
      } else {
        $error['password'] = 'Invalid Password!';
      }
    }
		$this->load->view('pages/login', array('title'=> 'Login', 'errors'=> $error,'result' => $result, 'old' => $this->input->post()));
	}

	/**
   * Generic Register
   */
	public function register()
	{
    $error = array();
    $result = array();

	  if($this->input->post('register-from')) {
	    if($this->input->post('password') != $this->input->post('repassword')) {
	      $error['password'] = 'Password didn\'t matches.';
      }
      if(strlen($this->input->post('password')) < 6) {
	      $error['password'] = 'Password length must be six.';
      }
      if(count($this->users->get(array(array('col' => 'username', 'value'=> trim($this->input->post('username')))))) > 0) {
        $error['username'] = 'Username already exist.';
      }
      if(count($this->users->get(array(array('col' => 'email', 'value'=> trim($this->input->post('email')))))) > 0) {
        $error['email'] = 'Email already exist.';
      }
      if(count($error) == 0) {
        $result = $this->users->insert(
          array(
            'username' => trim($this->input->post('username'))
          , 'email' => trim($this->input->post('email'))
          , 'password' => md5(trim($this->input->post('password')))
          ));
      }
      if($result) {
        $result = 'Successfully registered, you can login now!';
      }
    }

		$this->load->view('pages/register', array('title'=> 'Register', 'errors'=> $error,'result' => $result, 'old' => $this->input->post()));
	}

	/**
   * Generic Forgot Password
   */
	public function forgotpassword()
	{
    $error = array();
    $result = array();
    if($this->input->post('forgotpassword-from')) {
      if (strpos($this->input->post('username'), '@') !== false) {
        $result = $this->users->get(array(array('col' => 'email', 'value' => trim($this->input->post('username')))));
        if (count($result) == 0) {
          $error['username'] = 'Email not found!';
        }
      } else {
        $result = $this->users->get(array(array('col' => 'username', 'value' => trim($this->input->post('username')))));
        if (count($result) == 0) {
          $error['username'] = 'Username not found!';
        }
      }
      if(count($error) == 0) {
        //TODO: this doesn't works because not SMTP (email service) running at local
        $result = 'Try again later';
      }
    }
    $this->load->view('pages/forgotpassword', array('title'=> 'Forgot Password', 'errors'=> $error,'result' => $result, 'old' => $this->input->post()));
	}

	/**
   * Generic Forgot Password
   */
	public function logout()
	{
    $this->session->set_userdata(array('id' => null, 'username' => null, 'email' => null));
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('email');
    redirect('/');
	}
}
