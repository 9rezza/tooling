<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$data['tittle'] = "Tooling - Login";
		$this->load->view('login/index',$data);
	}
}
