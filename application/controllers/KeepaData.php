<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeepaData extends CI_Controller{

	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('KeepaDataModel'); 
		$this->load->library('pagination');
		
	}

	public function ScrapedData()
	{
		

		$rows=$this->KeepaDataModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('KeepaData/ScrapedData'),
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
		$KeepaData['data']=$this->KeepaDataModel->KeepaDatalisting($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/KeepaDataView',$KeepaData);
	}

	public function updateeditdata()
	{
		$data=$this->input->post();
		$this->KeepaDataModel->updatedata($data);
	}

	public function Exportdata()
	{
		$filename='KeepaData'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->KeepaDataModel->KeepaDataexport();

		$file=fopen('php://output','w');
		$header=array("Artikelname","ASIN","Hersteller","Artikelnummer","Hohe","Lange","Breite","Artikelgewicht","Versandgewicht","Barcode","Beschreibungzusatz","Kaufpreis","BilId1Pfad","BilId2Pfad","BilId3Pfad","BilId4Pfad","BilId5Pfad","eBayKategorie1");
		fputcsv($file, $header);

		foreach ($tabledata->result_array() as $key => $value) {
			unset($value['id']);
			unset($value['url_id']);
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}
	public function EanForKeepa()
	{

		$rows=$this->KeepaDataModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('KeepaData/EanForKeepa'),
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
		$sell['data']=$this->KeepaDataModel->getall($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/EanForKeepaView',$sell);
		

	}

		public function delete(){
		$id  = $this->input->post('id');
		if($this->KeepaDataModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('KeepaData/ScrapedData');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('KeepaData/ScrapedData');
		}
	}

	
	

	public function fetchdata()
	{
		$id = $this->input->post('id');
		$tabledata = $this->KeepaDataModel->fetchdata($id);
		echo json_encode($tabledata->result());
	}
}
?>