<?php

	/**
	 * 
	 */
	class ApiModel extends CI_Model
	{
		
		public function getUrls($limit)
		{
			$data = $this->db->select("id")->select('url')->where(['scraping_status' => "pending"])->get('urls', $limit);
			return $data->result();
		}
		
		public function GetEanForKeepa($limit)
		{
			$data = $this->db->select("id")->select('ean')->where(['status' => "pending"])->get('eanforkeepa', $limit);
			return $data->result();
		}


		public function GetShop($limit)
		{
			$data = $this->db->select("id")->select('shopname')->where(['scraping_status' => "pending"])->get('seller', $limit);
			return $data->result();
		}

		public function UploadData($data)
		{
			foreach ($data->restrictions as $res) {
				$this->db->insert('restrictions', $res);
			}

			foreach ($data->CompatibilityList as $res) {
				$this->db->insert('compatibilitylist', $res);
			}

			foreach ($data->eBay_Import_Vorlage as $res) {
				$this->db->insert('ebay_import_vorlage', $res);
			}

			foreach ($data->Eigenes_Feld_Fahrzeugliste_Import_Vorlage as $res) {
				$this->db->insert('eigenes_feld_fahrzeugliste_import_vorlage', $res);
			}

			foreach ($data->Merkmale_Import_Vorlage as $res) {
				$this->db->insert('merkmale_import_vorlage', $res);
  
			}

			foreach ($data->Vorlage1_Titel_EAN_Kurzbeschreibung as $res) {
				$this->db->insert('vorlage1_titel_ean_kurzbeschreibung', $res);
				$this->db->insert('eanforkeepa', ['ean' => $res->Barcode, 'status' => 'pending']);
			}

			foreach ($data->processed_url as $res) {
					$this->db->where('id', $res->urlid);
					$this->db->update('urls', ['scraping_status' => 'scraped', 'last_update_date' => date('Y-m-d'), 'last_update_time' => date('H:i:s')]);
			}


			return 1;
		}


        public function UploadKeepaData($data)
        {
            foreach ($data->KeepaData as $res) {
				$this->db->where('Barcode', $res->Barcode);
   				$q = $this->db->get('keepadata');
   				if ( $q->num_rows() == 0 ){
					$this->db->insert('keepadata', $res);
   				}
   				$this->db->where('ean', $res->Barcode);
				$this->db->update('eanforkeepa', ['status' => 'scraped']);
			}
			return 1;
        }

		public function UploadSellerUrls($data)
		{

			foreach ($data->seller_url as $res) {
				$this->db->where('url', $res->url);
   				$q = $this->db->get('urls');
   				if ( $q->num_rows() == 0 ) {
   					$this->db->insert('urls', $res);
   				}
				
			}

			return 1;
		}

		public function ChangeSellerStatus($data)
		{
			foreach ($data->seller_url as $res) {
				$this->db->where('id', $res->id);
				$this->db->update('seller', ['scraping_status' => 'scraped']);
			
		    }
		    return 1;

    	}

    	public function get_setting()
		{
			$data = $this->db->get('settings');
			return $data->result();
		}

	}


	?>