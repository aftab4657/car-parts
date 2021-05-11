<?php
	/**
	 * 
	 */
	class CompatibilityListModel extends CI_Model
	{
		public function CompatibilityListing($limit,$offset){

			return $this->db
			->limit($limit,$offset)
			->get('compatibilitylist');
		}

		public function CompatibilityListingexport(){

			return $this->db
			->get('compatibilitylist');
		}

		public function Delete($id)
		{
		 return	$this->db
			->where('id', $id)
        	->delete('compatibilitylist');
		}

		public function num_rows()
		{
			$va= $this->db->get('compatibilitylist');
			 $total= $va->num_rows();
			 return $total;
		}
 
		public function updatedata($data)
	{
		   $id = $data['id'];
			unset($data['id']);
		$this->db
		->where('id',$id)
		->update('compatibilitylist',$data);
		redirect('compatibilitylist/ScrapedData');

	}


		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('compatibilitylist');
		}

	}

?>