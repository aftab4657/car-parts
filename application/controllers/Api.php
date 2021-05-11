<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->model('ApiModel'); 
	}

	public function UrlsListing($limit = 50)
	{
		$token = $this->input->get('key');
		if ($token == 'AndreasSchadeeSyncApiTokenDeveloperAftabAnsari'){
			echo json_encode($this->ApiModel->getUrls($limit));
		}
		else{
			echo json_encode(['Token' => 'Invalid Token', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
		}
		
	}
	
	
	public function ChromeExtensionAPI()
	{
        // This is the server-side script
        
        // Set the content type
        header('Access-Control-Allow-Origin: https://www.autodoc.de');
        $json = file_get_contents('php://input');

        // Converts it into a PHP object
        $data = json_decode($json);
        // Send the data back
        echo (json_encode($data));
		
	}
	
	
	
	public function GetEanForKeepa($limit = 50)
	{
		$token = $this->input->get('key');
		if ($token == 'AndreasSchadeeSyncApiTokenDeveloperAftabAnsari'){
			echo json_encode($this->ApiModel->GetEanForKeepa($limit));
		}
		else{
			echo json_encode(['Token' => 'Invalid Token', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
		}
		
	}


	public function GetShop($limit = 2)
	{
		$token = $this->input->get('key');
		if ($token == 'AndreasSchadeeSyncApiTokenDeveloperAftabAnsari'){
			echo json_encode($this->ApiModel->GetShop($limit));
		}
		else{
			echo json_encode(['Token' => 'Invalid Token', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
		}
		
	}

	public function UploadData()
	{
		try{
			$token = file_get_contents('php://input');
			$token = json_decode($token);
			if ($token->key === 'AndreasSchadeeSyncApiTokenDeveloperAftabAnsari'){
				$data = json_decode($token->data);
				if ($this->ApiModel->UploadData($data))
				echo json_encode(['Success' => 'Data Uploaded in Restriction Successfully']);
				else
					echo json_encode(['Problem' => 'Problem on server end', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
			}	
			else{
				echo json_encode(['Token' => 'Invalid Token', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
			}
		}
		catch(Exception $e) {
			echo json_encode(['Problem' => 'Problem on server end', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
		}

	}
	
	public function UploadKeepaData()
	{
		try{
			$token = file_get_contents('php://input');
			$token = json_decode($token);
			if ($token->key === 'AndreasSchadeeSyncApiTokenDeveloperAftabAnsari'){
				$data = json_decode($token->data);
				if ($this->ApiModel->UploadKeepaData($data))
				echo json_encode(['Success' => 'Data Uploaded in Restriction Successfully']);
				else
					echo json_encode(['Problem' => 'Problem on server end', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
			}	
			else{
				echo json_encode(['Token' => 'Invalid Token', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
			}
		}
		catch(Exception $e) {
			echo json_encode(['Problem' => 'Problem on server end', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
		}

	}


	public function UploadSellerUrls()
	{
		try{
			$token = file_get_contents('php://input');
			$token = json_decode($token);
			if ($token->key === 'AndreasSchadeeSyncApiTokenDeveloperAftabAnsari'){
				$data = json_decode($token->data);
				if ($this->ApiModel->UploadSellerUrls($data))
				echo json_encode(['Success' => 'Data Uploaded in Restriction Successfully']);
				else
					echo json_encode(['Problem' => 'Problem on server end', 'Auther' => 'Andreas Schade', 'Developer' => 'Aftab Ansari']);
			}	
			else{
				echo json_encode(['Token' => 'Invalid Token', 'Auther' => 'Andreas Schade', 'Developer' => 'M.Aftab Ansari']);
			}
		}
		catch(Exception $e) {
			echo json_encode(['Problem' => 'Problem on server end', 'Auther' => 'Andreas Schade', 'Developer' => 'Aftab Ansari']);
		}

	}


	public function Choice()
	{
		$data = $this->ApiModel->get_setting();
		$choice = '';
		foreach ($data as $row) {
			$choice = $row->ScrapingChoice;
		}
		echo json_encode($choice);
	}

	public function Terminate()
	{
		$data = $this->ApiModel->get_setting();
		$terminate = '';
		foreach ($data as $row) {
			$terminate = $row->ScraperStatus;
		}
		echo json_encode($terminate);
	}



}
