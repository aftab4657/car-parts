<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EbayImportVorlage extends CI_Controller
{

	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('EbayImportVorlageModel'); 
	}

	public function ScrapedData()
	{
		$this->load->library('pagination');

		$rows=$this->EbayImportVorlageModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('EbayImportVorlage/ScrapedData'),
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
		$Eboardimported['data']=$this->EbayImportVorlageModel->EboardImporting($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/EbayImportVorlageView',$Eboardimported);
	}

	public function updateeditdata()
	{
		$data=$this->input->post();
		$this->EbayImportVorlageModel->updatedata($data);
	}
	public function Exportdata()
	{
		$filename='ebay_import_vorlage'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->EbayImportVorlageModel->EboardImportingexport();

		$file=fopen('php://output','w');
		$header=array("Barcode","Titel","eBayKategorie1","Verkaufspreis","Kaufpreis","FullCategory","eBayVorlage","Artikelzustand");
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
		$tabledata = $this->EbayImportVorlageModel->fetchdata($id);
		echo json_encode($tabledata->result());
	}



		public function delete(){
		$id  = $this->input->post('id');
		if($this->EbayImportVorlageModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('EbayImportVorlage/ScrapedData');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('EbayImportVorlage/ScrapedData');
		}
	

}	
}
?>