<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller{

	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('LogsModel'); 
		
	}
public function Scraper()
	{
		$this->load->library('pagination');

		$rows=$this->LogsModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('Logs/Scraper'),
	    	'per_page'=> 10,
	    	'total_rows'=>$rows,
	    	'full_tag_open'=>"<ul class='pagination'>",
	    	'full_tag_close'=>"</ul>",
	    	'next_tag_open'=>"<li class='page-item'>",
	    	'next_tag_close'=>"</li>",
	    	'prev_tag_open'=>"<li class='page-item'>",
	    	'prev_tag_close'=>"</li>",
	    	'num_tag_open'=>"<li class='page-item'>",
	    	'num_tag_close'=>"</li>",
	    	'cur_tag_open'=>"<li class='page-item active'><a class='page-link'>",
	    	'cur_tag_close'=>"</a></li>",
	    ];
	    $config['attributes'] = array('class' => 'page-link');

	    $this->pagination->initialize($config);
		$logslist['data']=$this->LogsModel->getLogs($config['per_page'],$this->uri->segment(3));

		$this->load->view('DashBoard/logs',$logslist);
	}
}
?>