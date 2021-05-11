<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrictions extends CI_Controller{

	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('RestrictionsModel');
		
	}

	public function ScrapedData()
	{
		$this->load->library('pagination');

		$rows=$this->RestrictionsModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('Restrictions/ScrapedData'),
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
		$Eboardimported['data']=$this->RestrictionsModel->Restrictions($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/RestrictionsView',$Eboardimported);
	}

	public function Exportdata()
	{
		$filename='restrictions'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->RestrictionsModel->Restrictionsexport();

		$file=fopen('php://output','w');
		$header=array("restrictions");
		fputcsv($file, $header);

		foreach ($tabledata->result_array() as $key => $value) {
			unset($value['id']);
			unset($value['url_id']);
			fputcsv($file, $value);
		}
		fclose($file);
		exit;


	}

	public function delete(){
		$id  = $this->input->post('id');
		if($this->RestrictionsModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('Restrictions/ScrapedData');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('Restrictions/ScrapedData');
		}
	
}

		public function updateeditdata()
			{
				$data=$this->input->post();
				$this->RestrictionsModel->updatedata($data);
			}

public function fetchdata()
	{
		$id = $this->input->post('id');
		$tabledata = $this->RestrictionsModel->fetchdata($id);
		echo json_encode($tabledata->result());
	}
}

?>