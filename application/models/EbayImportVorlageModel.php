<?php

	/**
	 * 
	 */
	class EbayImportVorlageModel extends CI_Model
	{

		public function EboardImporting($limit,$offset){

			return $this->db
			->limit($limit,$offset)
			->get('ebay_import_vorlage');
		}
		public function EboardImportingexport(){

			return $this->db
			->get('ebay_import_vorlage');
		}
		public function num_rows()
		{
			$va= $this->db->get('ebay_import_vorlage');
			 $total= $va->num_rows();
			 return $total;
		}

		public function Delete($id)
		{
			return	$this->db
			->where('id', $id)
        	->delete('ebay_import_vorlage');
		}

		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('ebay_import_vorlage');
		}

		public function updatedata($data)
			{
		// $user_id = $this->session->userdata('id');
			$id = $data['id'];
			unset($data['id']);
			$this->db
			->where('id',$id)
			->update('ebay_import_vorlage',$data);
			redirect('EbayImportVorlage/ScrapedData');

			}

	}



?>