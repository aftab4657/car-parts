<?php
	/**
	 * 
	 */
	class ExportModel extends CI_Model
	{

 	public function GetAll()
 	{
 		$this->db->select('SellerName');
		$this->db->distinct();
		$query1=$this->db->get('merkmale_import_vorlage');

		$this->db->select('eBayKategorie1');
		$this->db->distinct();
		$query2=$this->db->get('ebay_import_vorlage');


		$data['sellersget'] = $query1->result();
		$data['categoryget'] = $query2->result();
		return $data;
 	}

 	public function ExportMerkmaleVorlage($filters)
 	{
 		$tabledata = $this->db->select('DISTINCT(Barcode),ItemNumber, Merkmale, SellerName, AvailableStock')
 		->get_where('merkmale_import_vorlage', $filters)->result();
 		$AllData['Merkmale'] = $tabledata;
 		return $AllData;
 	}


 	public function ExportCompatibilityList($filters)
 	{
 		$tabledata = $this->db->select('DISTINCT(Barcode), Attributwert, Attributname')
 		->get_where('compatibilitylist', $filters)->result();
 		$AllData['Compatibility'] = $tabledata;
 		return $AllData;
 	}

 	public function ExportEbayImport($filters)
 	{
 		$tabledata = $this->db->select('DISTINCT(Barcode),Titel,eBayKategorie1,Verkaufspreis,Kaufpreis,FullCategory,eBayVorlage,Artikelzustand')
 		->get_where('ebay_import_vorlage', $filters)->result();
 		$AllData['ebay_import_vorlage'] = $tabledata;
 		return $AllData;
 	}

 	public function ExportEigenesFeldFahrzeugListe($filters)
 	{
 	
		 $tabledata = $this->db->select('DISTINCT(Barcode),EigenesFeldName,EigenesFeldWert')
 		->get_where('eigenes_feld_fahrzeugliste_import_vorlage', $filters)->result();
 		$AllData['EigenesFeldFahrzeugListe'] = $tabledata;
 		return $AllData;	
 	}
 	public function ExportKeepaDataexport($filters)
 	{
 		 $tabledata = $this->db->select('DISTINCT(Barcode),Artikelname,ASIN,Hersteller,Artikelnummer,Hohe,Lange,Breite,Artikelgewicht,Versandgewicht,Barcode,Beschreibungzusatz,Kaufpreis,BilId1Pfad,BilId2Pfad,BilId3Pfad,BilId4Pfad,BilId5Pfad,eBayKategorie1')
 		->get_where('keepadata', $filters)->result();
 		$AllData['keepadata'] = $tabledata;
 		return $AllData;
 	}
 	public function ExportCompatibilityListing($filters)
 	{
 		 $tabledata = $this->db->select('DISTINCT(Barcode),Titel,HAN,Hersteller,Produktart,Fahrzeug,URL,mitLagerbestandarbeiten,KategorieLevel1,KategorieLevel2,KategorieLevel3')
 		->get_where('vorlage1_titel_ean_kurzbeschreibung', $filters)->result();
 		$AllData['vorlage1_titel_ean_kurzbeschreibung'] = $tabledata;
 		return $AllData;
 	}



}
?>