<?php
	
	/**
	 * 
	 */
	class EigenesFeldFahrzeugListeImportVorlageModel extends CI_Model
	{
		public function EigenesFeldFahrzeugListe($limit,$offset){

			return $this->db
			->limit($limit,$offset)
			->get('eigenes_feld_fahrzeugliste_import_vorlage');
		}
		public function EigenesFeldFahrzeugListeexport(){

			return $this->db
			->get('eigenes_feld_fahrzeugliste_import_vorlage');
		}
		public function num_rows()
		{
			$va= $this->db->get('eigenes_feld_fahrzeugliste_import_vorlage');
			 $total= $va->num_rows();
			 return $total;
		}

		public function Delete($id)
		{
			return	$this->db
			->where('id', $id)
        	->delete('eigenes_feld_fahrzeugliste_import_vorlage');
		}

		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('eigenes_feld_fahrzeugliste_import_vorlage');
		}
		

		public function updatedata($data)
			{
				$id = $data['id'];
			unset($data['id']);
		$this->db
		->where('id',$id)
		->update('eigenes_feld_fahrzeugliste_import_vorlage',$data);
		redirect('EigenesFeldFahrzeugListeImportVorlage/ScrapedData');

			}

	}

?>