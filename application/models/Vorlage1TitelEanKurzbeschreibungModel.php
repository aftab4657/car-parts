<?php

	/**
	 * 
	 */
	class Vorlage1TitelEanKurzbeschreibungModel extends CI_Model
	{

		public function CompatibilityListingexport(){

			return $this->db
			->get('vorlage1_titel_ean_kurzbeschreibung');
		}
		public function CompatibilityListing($limit,$offset){

			return $this->db
			->limit($limit,$offset)
			->get('vorlage1_titel_ean_kurzbeschreibung');
		}


		public function num_rows()
		{
			$va= $this->db->get('vorlage1_titel_ean_kurzbeschreibung');
			 $total= $va->num_rows();
			 return $total;
		}

		public function Delete($id)
		{
			return	$this->db
			->where('id', $id)
        	->delete('vorlage1_titel_ean_kurzbeschreibung');
		}

		public function updatedata($data)
			{
				$id = $data['id'];
				unset($data['id']);
				$this->db
				->where('id',$id)
				->update('vorlage1_titel_ean_kurzbeschreibung',$data);
				redirect('Vorlage1TitelEanKurzbeschreibung/ScrapedData');

			}
		

		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('vorlage1_titel_ean_kurzbeschreibung');
		}
	}
?>