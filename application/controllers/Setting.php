<?php
/**
 * 
 */
class Setting extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('SettingModel');
	}

	public function index(){
		
		$record['data']=$this->SettingModel->getrecord();
		$this->load->view('DashBoard/Setting.php',$record);

	}

	public function UpdateProfile(){

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$ProfilePicture=$this->input->post('ProfilePicture');
		// $data=$this->input->post();
		$data = array('name' => $name,
			'email'=>$email,
			'password'=>$password
		);
		if ($_FILES["ProfilePicture"]["name"]){

			if ( ! $this->upload->do_upload('ProfilePicture'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('Setting');
			}
			else
			{
				$upload_data = array('upload_data' => $this->upload->data());
				$data['ProfilePicture'] = $_FILES["ProfilePicture"]["name"];
				$this->session->set_userdata('ProfilePicture', $data['ProfilePicture']);
			}
		}
		
		if ($this->SettingModel->updatedata($data) == 1){
			$this->session->set_flashdata('msg', 'Profile  Updated successfully!');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
		}
		redirect('Setting');
	}

	public function deletedata(){
		if($this->SettingModel->deletealldata() == 1){
		    $this->session->set_flashdata('msg', 'Database cleaned successfully!');
		}
		else{
		    $this->session->set_flashdata('error', 'Please try again.');
		}
		redirect('Setting');
	}

	public function UpdateScraperSetting()
	{
		$data=$this->input->post();
		if($this->SettingModel->UpdateScraperSetting($data) == 1)
		{
			$this->session->set_flashdata('msg', 'Scraper Setting  Updated successfully!');
			redirect('Setting');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('Setting');
		}
	}
}





?>