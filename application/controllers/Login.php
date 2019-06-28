<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
		$this->load->database();
		$this->load->model('login_model');
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

	public function submit()
	{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
         
        $user_check = $this->login_model->login($username)->row();
        if (password_verify($password, $user_check->u_password)) {
        	//update last_login
        	$last_login['u_last_login'] = date('Y-m-d H:i:s');
        	$this->login_model->last_login($user_check->u_id, $last_login);
        	//set session
            $array_items = get_object_vars($user_check);            
            $this->session->set_userdata($array_items);
			//print_r($this->session->userdata());
            redirect(site_url('dashboard'));
        } else {
            redirect(site_url('login'));
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect(site_url('login'));
	}
}
