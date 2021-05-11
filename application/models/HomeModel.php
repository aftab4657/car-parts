<?php

	/**
	 * 
	 */
	class HomeModel extends CI_Model
	{
		
		public function SaveUrlDB($data)
		{
			$urls = $data['urls'];
			$urls = explode(PHP_EOL, $urls);
			$this->db->insert('category', ['name' => $data['category']]);
			$last_id = $this->db->insert_id();
			$draft_status = "pending";
			if($data['draft']){
				$draft_status = "draft";
			}

			foreach($urls as $url){
				$url = trim($url);
				if ($url != ""){
					$this->db->insert('urls', ['url' => $url, 'scraping_status' => $draft_status, 'category_id' => $last_id,
											   'seller' => $data['username']	]);
				}
			}

			return 1;
		}

		public function UrlListingpage($limit,$offset)
		{

			return $this->db
    		->limit($limit,$offset)
			->get('urls');

		}

		public function num_rows()
		{
			$va= $this->db->get('urls');
			 $total= $va->num_rows();
			 return $total;
		}
		public function Delete($id)
		{
			return	$this->db
			->where('id', $id)
        	->delete('urls');
		}

		public function urlsexport(){

			return $this->db
			->get('urls');
		}

		public function UrlListing(){
			return	$this->db->get('urls');
		}

	}


?>