<?php

	/**
	 * 
	 */
	class MerkmaleImportVorlageModel extends CI_Model
	{
		public function MerkmaleImportVorlage($limit,$offset){

			return $this->db
			->limit($limit,$offset)
			->get('merkmale_import_vorlage');
		}

		public function MerkmaleImportVorlageexport(){

			return $this->db
			->get('merkmale_import_vorlage');
		}

		public function Delete($id)
		{
			return	$this->db
			->where('id', $id)
        	->delete('merkmale_import_vorlage');
		}
		public function num_rows()
		{
			$va= $this->db->get('merkmale_import_vorlage');
			 $total= $va->num_rows();
			 return $total;
		}

		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('merkmale_import_vorlage');
		}

		public function updatedata($data)
			{
				$id = $data['id'];
			unset($data['id']);
		$this->db
		->where('id',$id)
		->update('merkmale_import_vorlage',$data);
		redirect('MerkmaleImportVorlage/ScrapedData');

			}
		
		

	}

?>