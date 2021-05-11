<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() { 
        parent::__construct(); 
        if($this->session->userdata('id')){
			redirect('Home');
		}
        $this->load->library('form_validation'); 
        $this->load->model('LoginModel'); 
    }

    public function index()
	{
		$this->load->view('DashBoard/Login');
	}

	public function Authenticate()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run()){
			$res = $this->LoginModel->Authenticate($this->input->post());
			if($res){
				redirect('Home');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid Credentials');
				 redirect('Login');
			}
		}
		else{
			$this->index();
		}

	}
}
