<?php
/**
 * 
 */
class SettingModel extends CI_Model
{
	
	public function getrecord(){
		$settingdata=$this->db->get('settings');
		$user_id = $this->session->userdata('id');
		$user_id = $this->session->userdata('id');
		$query = $this->db
		->where('id', $user_id )
		->get('login');
		$data['profile'] = $query->result();
		$data['setting'] = $settingdata->result();

	return $data;
		// $this->db->where('id',$this->session->id());
		// return $this->db->get('login');
	}

	public function updatedata($data)
	{
		$user_id = $this->session->userdata('id');
		$this->db
		->where('id',$user_id)
		->update('login',$data);
		return 1;

	}

	public function deletealldata(){
		$tables = array('category','compatibilitylist','ebay_import_vorlage','eigenes_feld_fahrzeugliste_import_vorlage','merkmale_import_vorlage','restrictions','seller','logs', 'urls','vorlage1_titel_ean_kurzbeschreibung');
         foreach($tables as $table){
		$this->db->empty_table($table);
	     }
	    return 1;
	}

	public function UpdateScraperSetting($data)
	{
		
		$this->db->update('settings',$data );
		return 1;
	}
}
?>