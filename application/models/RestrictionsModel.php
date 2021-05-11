<?php

	/**
	 * 
	 */
	class RestrictionsModel extends CI_Model
	{
		public function Restrictions($limit,$offset)
		{

			return $this->db
    		->limit($limit,$offset)
			->get('restrictions');

		}
		public function Restrictionsexport(){

			return $this->db
			->get('restrictions');
		}


		public function num_rows()
		{
			$va= $this->db->get('restrictions');
			 $total= $va->num_rows();
			 return $total;
		}
		public function Delete($id)
		{
			return	$this->db
			->where('id', $id)
        	->delete('restrictions');
		}

		public function updatedata($data)
			{
				$id = $data['id'];
			unset($data['id']);
		$this->db
		->where('id',$id)
		->update('restrictions',$data);
		redirect('restrictions/ScrapedData');

			}


		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('restrictions');
		}
	}

?>