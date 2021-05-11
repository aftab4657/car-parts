<?php

class LogsModel extends CI_Model
	{

		public function getLogs($limit,$offset){
			return $this->db
			->order_by('date_time', 'desc')
			->limit($limit,$offset)
			->get('logs');
		}

		public function num_rows()
		{
			$va= $this->db->get('logs');
			 $total= $va->num_rows();
			 return $total;
		}
}
?>