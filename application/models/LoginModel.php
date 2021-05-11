<?php

	/**
	 * 
	 */
	class LoginModel extends CI_Model
	{
		
		function Authenticate($credentials)
		{
			$this->db->where('username', $credentials['username']);
			$this->db->where('password', $credentials['password']);
			$query = $this->db->get('login');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row) {
					$this->session->set_userdata('id', $row->id);
					$this->session->set_userdata('name', $row->name);
					$this->session->set_userdata('ProfilePicture', $row->ProfilePicture);
					return $row;
				}
			}
			else {
				return false;
			}
		}
	}


?>