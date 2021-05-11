<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller{
	function __construct()
	{ 

		parent::__construct(); 
		if(!$this->session->userdata('id')){
			redirect('Login');
			
		}

		$this->load->model('ExportModel');
		
		// $this->load->model('CompatibilityListModel'); 
		
	}

	public function ScrapedData()
	{
		$Sellers['data']=$this->ExportModel->GetAll();
		$this->load->view('DashBoard/ExportView',$Sellers);
	}
	public function ExportData()
	{



		$seller = "";
		$category = "";
		$filters = [];
		if ($this->input->get('seller')){
			$seller=$this->input->get('seller');
			$filters['SellerName'] = $seller;
		}

		if ($this->input->get('category')){
			$category=$this->input->get('category');
			$filters['eBayKategorie1'] = $category;
		}

		if($seller && $category){
			echo "<a href='".base_url('Export/ExportCompatibilityList?SellerName='.$seller.'&eBayKategorie1='.$category)."'>Export Compatibility List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/ExportMerkmaleVorlage?SellerName='.$seller.'&eBayKategorie1='.$category)."'>Export Merkmale Vorlage List  </a>";

			echo "<br>";
			echo "<a href='".base_url('Export/Exportebay_import_vorlage?SellerName='.$seller.'&eBayKategorie1='.$category)."'>Export ebay_import_vorlage List  </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/Exporteigenes_feld_fahrzeugliste_import_vorlage?SellerName='.$seller.'&eBayKategorie1='.$category)."'>Export eigenes_feld_fahrzeugliste_import_vorlage List  </a>";

			echo "<br>";
			echo "<a href='".base_url('Export/Exportvorlage1_titel_ean_kurzbeschreibung?SellerName='.$seller.'&eBayKategorie1='.$category)."'>Export vorlage1_titel_ean_kurzbeschreibung List  </a>";
			
			echo "<br>";
// 			echo "<a href='".base_url('Export/Exportkeepadata?SellerName='.$seller.'&eBayKategorie1='.$category)."'>Export keepadata List  </a>";
		}
		elseif ($seller) {
			echo "<a href='".base_url('Export/ExportCompatibilityList?SellerName='.$seller)."'>Export Compatibility List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/Exportebay_import_vorlage?SellerName='.$seller)."'>Export ebay_import_vorlage List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/ExportMerkmaleVorlage?SellerName='.$seller)."'>Export Merkmale Vorlage List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/Exporteigenes_feld_fahrzeugliste_import_vorlage?SellerName='.$seller)."'>Export eigenes_feld_fahrzeugliste_import_vorlage List </a>";

			echo "<br>";
			echo "<a href='".base_url('Export/Exportvorlage1_titel_ean_kurzbeschreibung?SellerName='.$seller)."'>Export vorlage1_titel_ean_kurzbeschreibung List </a>";
			
			echo "<br>";
// 			echo "<a href='".base_url('Export/Exportkeepadata?SellerName='.$seller)."'>Export keepadata List </a>";
		}
		else{
			echo "<a href='".base_url('Export/ExportCompatibilityList?eBayKategorie1='.$category)."'>Export Compatibility List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/ExportMerkmaleVorlage?eBayKategorie1='.$category)."'>Export Merkmale Vorlage List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/Exportebay_import_vorlage?eBayKategorie1='.$category)."'>Export ebay_import_vorlage List </a>";
			echo "<br>";
			echo "<a href='".base_url('Export/Exporteigenes_feld_fahrzeugliste_import_vorlage?eBayKategorie1='.$category)."'>Export eigenes_feld_fahrzeugliste_import_vorlage List </a>";

			echo "<br>";
			echo "<a href='".base_url('Export/Exportvorlage1_titel_ean_kurzbeschreibung?SellerName='.$category)."'>Export vorlage1_titel_ean_kurzbeschreibung List </a>";
			
			echo "<br>";
// 			echo "<a href='".base_url('Export/Exportkeepadata?SellerName='.$category)."'>Export keepadata List </a>";
		}

	

	}

	public function ExportMerkmaleVorlage()
	{
		$filters = [];
		if ($this->input->get('SellerName')){
			$seller=$this->input->get('SellerName');
			$filters['SellerName'] = $seller;
		}

		if ($this->input->get('eBayKategorie1')){
			$category=$this->input->get('eBayKategorie1');
			$filters['eBayKategorie1'] = $category;
		}

		$tabledata=$this->ExportModel->ExportMerkmaleVorlage($filters);
		$filename='JTL_Wawi_Merkmale_Import_Vorlage.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$file=fopen('php://output','w');
		$header=array("EAN/Barcode","Item Number","Merkmalname","Merkmalwertname 1","Seller Name","Available Stock");
		fputcsv($file, $header);

		foreach ($tabledata['Merkmale'] as $key => $value) {
		    $dt = explode("$",$value->Merkmale);
		    foreach ($dt as $key => $v) {
		        $d = explode(";",$v);
		        fputcsv($file, [$value->Barcode, $value->ItemNumber, $d[0], $d[1], $value->SellerName, $value->AvailableStock] );
		    }
			
		}
		fclose($file);

		exit;
	}

	public function ExportCompatibilityList()
	{
		$filters = [];
		if ($this->input->get('SellerName')){
			$seller=$this->input->get('SellerName');
			$filters['SellerName'] = $seller;
		}
		if ($this->input->get('eBayKategorie1')){
			$category=$this->input->get('eBayKategorie1');
			$filters['eBayKategorie1'] = $category;
		}
		$tabledata=$this->ExportModel->ExportCompatibilityList($filters);
		$filename='CompatibilityList.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");	
		$file=fopen('php://output','w');
		$header=array("EAN/Barcode","Attributwert","Attributname");
		fputcsv($file, $header);

		foreach ($tabledata['Compatibility'] as $key => $value) {
			$value = (array)$value;
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}

	public function Exportebay_import_vorlage()
	{
		$filters = [];
		if ($this->input->get('SellerName')){
			$seller=$this->input->get('SellerName');
			$filters['SellerName'] = $seller;
		}
		if ($this->input->get('eBayKategorie1')){
			$category=$this->input->get('eBayKategorie1');
			$filters['eBayKategorie1'] = $category;
		}

		$tabledata=$this->ExportModel->ExportEbayImport($filters);
		$filename='JTL_Wawi_eBay_Import_Vorlage.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");		
		$file=fopen('php://output','w');
		$header=array("EAN/Barcode","Titel","eBay Kategorie 1","Verkaufspreis","Kaufpreis","FullCategory","eBay Vorlage","Artikelzustand");
		fputcsv($file, $header);

		foreach ($tabledata['ebay_import_vorlage'] as $key => $value) {
			$value = (array)$value;
			fputcsv($file, $value);
		}
		fclose($file);
		exit;

	}

	public function Exporteigenes_feld_fahrzeugliste_import_vorlage()
	{
		$filters = [];
		if ($this->input->get('SellerName')){
			$seller=$this->input->get('SellerName');
			$filters['SellerName'] = $seller;
		}
		if ($this->input->get('eBayKategorie1')){
			$category=$this->input->get('eBayKategorie1');
			$filters['eBayKategorie1'] = $category;
		}
		$filename='JTL_Wawi_Eigenes_Feld_Fahrzeugliste_Import_Vorlage.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->ExportModel->ExportEigenesFeldFahrzeugListe($filters);

		$file=fopen('php://output','w');
		$header=array("EAN/Barcode","Eigenes Feld Name","Eigenes Feld Wert");
		fputcsv($file, $header);

		foreach ($tabledata['EigenesFeldFahrzeugListe'] as $key => $value) {
			$value=(array)$value;
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}

	public function Exportkeepadata()
	{
		$filters = [];
		if ($this->input->get('SellerName')){
			$seller=$this->input->get('SellerName');
			$filters['SellerName'] = $seller;
		}
		if ($this->input->get('eBayKategorie1')){
			$category=$this->input->get('eBayKategorie1');
			$filters['eBayKategorie1'] = $category;
		}
		$filename='KeepaData.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->ExportModel->ExportKeepaDataexport($filters);

		$file=fopen('php://output','w');
		$header=array("Artikelname","ASIN","Hersteller","Artikelnummer","Hohe","Lange","Breite","Artikelgewicht","Versandgewicht","Ean/Barcode","Beschreibungzusatz","Kaufpreis","BilId1Pfad","BilId2Pfad","BilId3Pfad","BilId4Pfad","BilId5Pfad","eBayKategorie1");
		fputcsv($file, $header);

		foreach ($tabledata['keepadata'] as $key => $value) {
			$value=(array)$value;
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}
	public function Exportvorlage1_titel_ean_kurzbeschreibung()
	{
		$filters = [];
		if ($this->input->get('SellerName')){
			$seller=$this->input->get('SellerName');
			$filters['SellerName'] = $seller;
		}
		if ($this->input->get('eBayKategorie1')){
			$category=$this->input->get('eBayKategorie1');
			$filters['eBayKategorie1'] = $category;
		}
		$filename='JTL_Wawi_Vorlage1_Titel_EAN_Kurzbeschreibung.csv';
		header("Content-Description:File Transfer");
		header("Content-Disposition:attachment;filename=$filename");
		header("Content-Type:application/csv;");

		$tabledata=$this->ExportModel->ExportCompatibilityListing($filters);

		$file=fopen('php://output','w');
		$header=array("EAN/Barcode","Titel","HAN","Hersteller","Produktart","Fahrzeug","URL","mit Lagerbestand arbeiten","Kategorie Level 1","Kategorie Level 2","Kategorie Level 3");
		fputcsv($file, $header);

		foreach ($tabledata['vorlage1_titel_ean_kurzbeschreibung'] as $key => $value) {
			$value=(array)$value;
			fputcsv($file, $value);
		}
		fclose($file);
		exit;


	}

}
?>