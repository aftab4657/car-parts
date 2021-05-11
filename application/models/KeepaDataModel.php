<?php
	/**
	 * 
	 */
	class KeepaDataModel extends CI_Model
	{
		public function KeepaDatalisting($limit,$offset){

			return $this->db
			->limit($limit,$offset)
			->get('keepadata');
		}
		public function getall($limit,$offset)
		{
			return $this->db
			->limit($limit,$offset)
			->get('eanforkeepa');
		}
		public function KeepaDataexport()
		{
			return $this->db
			->get('keepadata');
		}


		public function num_rows()
		{
			$va= $this->db->get('keepadata');
			 $total= $va->num_rows();
			 return $total;
		}
		public function updatedata($data)
		{
		   $id = $data['id'];
			unset($data['id']);
		$this->db
		->where('id',$id)
		->update('keepadata',$data);
		redirect('KeepaData/ScrapedData');

		}


		public function fetchdata($id){

			return $this->db
			->where('id',$id)
			->get('keepadata');
		}

		public function delete($id)
		{
		 return	$this->db
			->where('id', $id)
        	->delete('keepadata');
		}

	}
?>