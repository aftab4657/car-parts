<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MerkmaleImportVorlage extends CI_Controller{

	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('MerkmaleImportVorlageModel');
		
	}

	public function updateeditdata()
	{
		$data=$this->input->post();
		$this->MerkmaleImportVorlageModel->updatedata($data);
	}

	public function ScrapedData(){
		$this->load->library('pagination');

		$rows=$this->MerkmaleImportVorlageModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('MerkmaleImportVorlage/ScrapedData'),
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
		$Eboardimported['data']=$this->MerkmaleImportVorlageModel->MerkmaleImportVorlage($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/MerkmaleImportVorlageView',$Eboardimported);
	}

	public function Exportdata()
	{
		$filename='merkmale_import_vorlage'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->MerkmaleImportVorlageModel->MerkmaleImportVorlageexport();

		$file=fopen('php://output','w');
		$header=array("Barcode","ItemNumber","Merkmalname","Merkmalwertname1","SellerName","AvailableStock");
		fputcsv($file, $header);

		foreach ($tabledata->result_array() as $key => $value) {
			unset($value['id']);
			unset($value['url_id']);
			fputcsv($file, $value);
		}
		fclose($file);
		exit;


	}

	public function fetchdata()
	{
		$id = $this->input->post('id');
		$tabledata = $this->MerkmaleImportVorlageModel->fetchdata($id);
		echo json_encode($tabledata->result());
	}
	public function delete(){
		$id  = $this->input->post('id');
		if($this->MerkmaleImportVorlageModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('MerkmaleImportVorlage/ScrapedData');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('MerkmaleImportVorlage/ScrapedData');
		}
	

}

	
}
?>