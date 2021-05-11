<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompatibilityList extends CI_Controller{

	function __construct()
	 { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('CompatibilityListModel'); 
		
	}

	public function ScrapedData()
	{
		$this->load->library('pagination');

		$rows=$this->CompatibilityListModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('CompatibilityList/ScrapedData'),
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
		$compatibilitylist['data']=$this->CompatibilityListModel->CompatibilityListing($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/CompatibilityListView',$compatibilitylist);
	}
	public function Exportdata()
	{
		$filename='CompatibilityList'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->CompatibilityListModel->CompatibilityListingexport();

		$file=fopen('php://output','w');
		$header=array("Barcode","Attributwert","Attributname");
		fputcsv($file, $header);

		foreach ($tabledata->result_array() as $key => $value) {
			unset($value['id']);
			unset($value['url_id']);
			fputcsv($file, $data);
		}
		fclose($file);
		exit;


	}
	public function delete(){
		$id  = $this->input->post('id');
		if($this->CompatibilityListModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('CompatibilityList/ScrapedData');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('CompatibilityList/ScrapedData');
		}
	}

	public function fetchdata()
	{
		$id = $this->input->post('id');
		$tabledata = $this->CompatibilityListModel->fetchdata($id);
		echo json_encode($tabledata->result());
	}

	public function updateeditdata()
	{
		// $Barcode=$this->input->post('Barcode');
		// $Attributwert=$this->input->post('Attributwert');
		// $Attributname=$this->input->post('Attributname');
		// // $data=$this->input->post();
		// $data = array('Barcode' => $Barcode,
		// 'Attributwert'=>$Attributwert,
		// 'Attributname'=>$Attributname
		
		//  );
		$data=$this->input->post();
		$this->CompatibilityListModel->updatedata($data);
	}

	
}
?>