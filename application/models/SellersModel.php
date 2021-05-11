<?php

	/**
	 * 
	 */
	class SellersModel extends CI_Model
	{

		public function AddNewSeller($data)
		{
			$this->db->insert('seller',$data);
			return 1;

		}

		public function getSellers($limit,$offset)
		{
			return $this->db
			->limit($limit,$offset)
			->get('seller');
		}

		public function num_rows()
		{
			$va= $this->db->get('seller');
			 $total= $va->num_rows();
			 return $total;
		}

		

	}


?>