<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller{

	function __construct() { 
		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
		}
		$this->load->model('SellersModel'); 
		
	}
	

	public function AddNewSeller()
	{
		$this->load->view('DashBoard/AddNewSeller');
	}

	public function SaveSellerDB()
	{
		$data=$this->input->post();
		
		if ($this->SellersModel->AddNewSeller($data) == 1){
			$this->session->set_flashdata('msg', 'Sellers uploaded successfully!');
			
			redirect("Sellers/AddNewSeller");
		}
		else{
			$this->session->set_flashdata('msg', 'Please upload again. Internal Server Error.');
			redirect("Sellers/AddNewSeller");
		}

	}
	
	
		public function FixData()
	{
        
        $res = $this->db->where('id >', 20327)->select('DISTINCT(Barcode), id, eBayKategorie1, SellerName')->get('ebay_import_vorlage');
        // foreach($res->result() as $row){
        //     $row = (array) $row;
        //     $ean = $row['Barcode'];
        //     echo $id;
        //     echo "<br>";
        //     unset($row['id']);
        //     unset($row['Barcode']);
        //     $this->db->where('Barcode', $ean)->set($row)->update('compatibilitylist');
        // }
        echo json_encode($res->result());
	}
	
	
	public function FixUpdate()
	{
        
        $row = $this->input->post();
            $row = (array) $row;
            $ean = $row['Barcode'];
            unset($row['id']);
            unset($row['Barcode']);
            $this->db->where('Barcode', $ean)->set($row)->update('compatibilitylist');

        echo json_encode("Success");
	}

	public function AllSellers()
	{
		$this->load->library('pagination');

		$rows=$this->SellersModel->num_rows();
	    
	    $config=[
	    	'base_url'=> base_url('Sellers/AllSellers'),
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
		$sell['data']=$this->SellersModel->getSellers($config['per_page'],$this->uri->segment(3));
		$this->load->view('DashBoard/AllSellersView',$sell);
		

	}
}
?>