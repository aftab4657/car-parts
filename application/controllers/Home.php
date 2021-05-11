<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('HomeModel'); 
	}

	public function index()
	{

		$this->load->library('pagination');

		$rows=$this->HomeModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('Home/index'),
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
		$Eboardimported['data']=$this->HomeModel->UrlListingpage($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/UrlsListing',$Eboardimported);
	}
	public function Exportdata()
	{
		$filename='Urls'.date('ymd').'.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->HomeModel->urlsexport();

		$file=fopen('php://output','w');
		$header=array("url","seller","category_id","scraping_status");
		fputcsv($file, $header);

		foreach ($tabledata->result_array() as $key => $value) {
			unset($value['id']);
			unset($value['url_id']);
			unset($value['status']);
			fputcsv($file, $value);
		}
		fclose($file);
		exit;


	}

	public function UploadNewUrls()
	{
		$this->load->view('DashBoard/UploadUrls');
	}
	public function delete(){
		$id  = $this->input->post('id');
		if($this->HomeModel->delete($id))
		{
			$this->session->set_flashdata('msg', 'Data  deleted successfully!');
			redirect('Home');
		}
		else{
			$this->session->set_flashdata('error', 'Please try again.');
			redirect('Home');
		}

}

	public function SaveUrlDB()
	{
		$data = $this->input->post();
		// $myString = "Prepare yourself to be caught
		// You in the hood gettin' shot
		// We going throw hell of blows
		// got my whole frame froze";
		if ($this->HomeModel->SaveUrlDB($data) == 1){
			$this->session->set_flashdata('msg', 'Urls uploaded successfully!');
			redirect('Home');
		}
		else{
			$this->session->set_flashdata('msg', 'Please upload again. Internal Server Error.');
			redirect("Home/UploadNewUrls");
		}
		

		// print_r($myArray);
		// // $data = explode('\n\r', $_POST['urls']);
		// print_r($myArray);

		// print_r($this->input->post());
		// if(!empty($_FILES['csv_file']['csv']))
		// {
		// 	$file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
		// 	while($row = fgetcsv($file_data))
		// 	{
		// 		$row_data[] = array(
		// 			'student_phone'  => $row[0]
		// 		);
		// 	}
		// 	$output = array(
		// 		'row_data'  => $row_data
		// 	);

		// 	echo json_encode($output);
		// }

	}
	




	public function logout()
	{
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		redirect('Login');

	}

}
