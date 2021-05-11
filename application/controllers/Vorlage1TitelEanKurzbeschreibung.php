<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vorlage1TitelEanKurzbeschreibung extends CI_Controller
{
	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('Vorlage1TitelEanKurzbeschreibungModel');
		
	}
	public function ScrapedData()
	{
		$this->load->library('pagination');

		$rows=$this->Vorlage1TitelEanKurzbeschreibungModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('Vorlage1TitelEanKurzbeschreibung/ScrapedData'),
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
		$Eboardimported['data']=$this->Vorlage1TitelEanKurzbeschreibungModel->CompatibilityListing($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/Vorlage1TitelEanKurzbeschreibungView',$Eboardimported);
	
		
	}


		public function updateeditdata()
		{
		// $Barcode=$this->input->post('Barcode');
		// $Titel=$this->input->post('Titel');
		// $HAN=$this->input->post('HAN');
		// $Hersteller=$this->input->post('Hersteller');
		// $Produktart=$this->input->post('Produktart');
		// $Fahrzeug=$this->input->post('Fahrzeug');
		// $URL=$this->input->post('URL');
		// $mitLagerbestandarbeiten=$this->input->post('mitLagerbestandarbeiten');
		// $KategorieLevel1=$this->input->post('KategorieLevel1');
		// $KategorieLevel2=$this->input->post('KategorieLevel2');
		// $KategorieLevel3=$this->input->post('KategorieLevel3');
		// $data = array('Barcode' => $Barcode,
		// 'Titel'=>$Titel,
		// 'HAN'=>$HAN,
		// 'Hersteller'=>$Hersteller,
		// 'Produktart'=>$Produktart,
		// 'Fahrzeug'=>$Fahrzeug,
		// 'URL'=>$URL,
		// 'mitLagerbestandarbeiten'=>$mitLagerbestandarbeiten,
	 //    'KategorieLevel1'=>$KategorieLevel1,
	 //    'KategorieLevel2'=>$KategorieLevel2,
	 //    'KategorieLevel3'=>$KategorieLevel3
	 //      );
			$data=$this->input->post();
		$this->Vorlage1TitelEanKurzbeschreibungModel->updatedata($data);
	}
	public function Exportdata()
	{
		$filename='vorlage1_titel_ean_kurzbeschreibung'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->Vorlage1TitelEanKurzbeschreibungModel->CompatibilityListingexport();

		$file=fopen('php://output','w');
		$header=array("Barcode","Titel","HAN","Hersteller","Produktart","Fahrzeug","URL","mitLagerbestandarbeiten","KategorieLevel1","KategorieLevel2","KategorieLevel3");
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
		$tabledata = $this->Vorlage1TitelEanKurzbeschreibungModel->fetchdata($id);
		echo json_encode($tabledata->result());
	}

	public function delete(){
		$id  = $this->input->post('id');
		echo $id;
		if($this->Vorlage1TitelEanKurzbeschreibungModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('Vorlage1TitelEanKurzbeschreibung/ScrapedData');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('Vorlage1TitelEanKurzbeschreibung/ScrapedData');
		}

}
}
?>