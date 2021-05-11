<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Keep Data | eSync Keep Data</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.addons.css')?>">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/horizontal-layout/style.css')?>">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>

<body>
	<div class="container-scroller">

		<?php require_once 'header.php'; ?>

		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Keep Data</h4>
							<div class="row">
								<div class="col-12">
									<?php 
									if($this->session->flashdata('msg')){
										echo '<div class="alert alert-success">'
										.$this->session->flashdata("msg").
										'</div>';
									}

									if($this->session->flashdata('error')){
										echo '<div class="alert alert-danger">'
										.$this->session->flashdata("error").
										'</div>';
									}
									?>

									<div class="col-md-12 small text-right"><a href="<?php echo base_url('KeepaData/Exportdata')?>"> Export Data</a></div>

									<div class="table-responsive">
										<table class="table">
											<thead>

												<tr>
													<th>Artikelname</th>
													<th>ASIN</th>
													<th>Hersteller</th>
													<th>Artikelnummer</th>
													<th>Hohe</th>
                        <th>Lange</th>
                        <th>Breite</th>
                        <th>Artikelgewicht</th>
                        <th>Versandgewicht</th>
                        <th>Barcode</th>
                        
                        <th>Beschreibungzusatz</th>
                        <th>Kaufpreis</th>
                        <th>BilId1Pfad</th>
                        <th>BilId2Pfad</th>
                        
                        <th>BilId3Pfad</th>
                        <th>BilId4Pfad</th>
                        <th>BilId5Pfad</th>
                        <th>eBayKategorie1</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($data->result() as $row): ?>

                		<tr>
                			<td><?php echo $row->Artikelname; ?></td>
                			<td><?php echo $row->ASIN; ?></td>
                			<td><?php echo $row->Hersteller; ?></td>
                			<td><?php echo $row->Artikelnummer; ?></td>
                			<td><?php echo $row->Hohe; ?></td>
                			<td><?php echo $row->Lange; ?></td>
                			<td><?php echo $row->Breite; ?></td>
                			<td><?php echo $row->Artikelgewicht; ?></td>
                			<td><?php echo $row->Versandgewicht; ?></td>
                			<td><?php echo $row->Barcode; ?></td>
                			<td><?php echo $row->Beschreibungzusatz; ?></td>
                			<td><?php echo $row->Kaufpreis; ?></td>
                			<td><?php echo $row->BilId1Pfad; ?></td>
                			<td><?php echo $row->BilId2Pfad; ?></td>
                			<td><?php echo $row->BilId3Pfad; ?></td>
                			<td><?php echo $row->BilId4Pfad; ?></td>
                			<td><?php echo $row->BilId5Pfad; ?></td>
                			<td><?php echo $row->eBayKategorie1; ?></td>               			
         
                          <td>
                          	<button type="button" class="btn btn-outline-warning btn-sm" onclick="FetchData(<?php echo $row->id; ?>)" data-toggle="modal" data-target="#exampleModalXl" >Edit</button>
                          	<button class="btn btn-outline-danger btn-sm" onclick="deletedata(<?php echo $row->id; ?>)">Delete</button>
                          </td>
                      </tr>
                  <?php endforeach; ?>

              </tbody>
          </table>

          

      </div>
      <?= $this->pagination->create_links(); ?>
  </div>
</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<?php require_once 'footer.php' ?>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>

<!-- <div class="modal-dialog modal-xl">...</div> -->

<div class="modal fade" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header pb-0">
				<h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pt-0 pb-0">
				<form action="<?php echo base_url('KeepaData/updateeditdata'); ?>" method="post">
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Artikelname:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="Artikelname" id="Artikelname">
						</div>

						<div class="col-6">
							<label for="recipient-name" class="col-form-label">ASIN:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="ASIN" id="ASIN">
						</div>
					</div>
										<div class="row">
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Hersteller:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="Hersteller" id="Hersteller">
						</div>

						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Artikelnummer:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="Artikelnummer" id="Artikelnummer">
						</div>

						
					</div>
										<div class="row">

											<div class="col-6">
							<label for="recipient-name" class="col-form-label">Hohe:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="Hohe" id="Hohe">
						</div>
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Lange:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="Lange" id="Lange">
						</div>

					</div>
										<div class="row">
									<div class="col-6">
							<label for="recipient-name" class="col-form-label">Breite:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="Breite" id="Breite">
						</div>
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Artikelgewicht:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="Artikelgewicht" id="Artikelgewicht">
						</div>
					</div>

					
								<div class="row">
								<div class="col-6">
							<label for="recipient-name" class="col-form-label">Versandgewicht:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="Versandgewicht" id="Versandgewicht">
						</div>
								<div class="col-6">
							<label for="recipient-name" class="col-form-label">Barcode:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="Barcode" id="Barcode">
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Beschreibungzusatz:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="Beschreibungzusatz" id="Beschreibungzusatz">
						</div>

						<div class="col-6">
							<label for="recipient-name" class="col-form-label">Kaufpreis:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="Kaufpreis" id="Kaufpreis">
						</div>
					</div>
										<div class="row">
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">BilId1Pfad:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="BilId1Pfad" id="BilId1Pfad">
						</div>

						<div class="col-6">
							<label for="recipient-name" class="col-form-label">BilId2Pfad:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="BilId2Pfad" id="BilId2Pfad">
						</div>
					</div>
										<div class="row">
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">BilId3Pfad:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="BilId3Pfad" id="BilId3Pfad">
						</div>

						<div class="col-6">
							<label for="recipient-name" class="col-form-label">BilId4Pfad:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="BilId4Pfad" id="BilId4Pfad">
						</div>
					</div>
										<div class="row">
						<div class="col-6">
							<label for="recipient-name" class="col-form-label">BilId5Pfad:</label>
							<input type="text" style="border-color: #a5a5a5" class="form-control custom-border" name="BilId5Pfad" id="BilId5Pfad">
						</div>

						<div class="col-6">
							<label for="recipient-name" class="col-form-label">eBayKategorie1:</label>
							<input type="text"  style="border-color: #a5a5a5"  class="form-control custom-border" name="eBayKategorie1" id="eBayKategorie1">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success btn-sm">Update</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>




<form id="deleteform" action="<?php echo base_url('KeepaData/delete'); ?>" method="post">
	<input type="hidden" name="id" id="delete-id">
</form>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js')?>"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
<script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
<script src="<?php echo base_url('assets/js/template.js')?>"></script>
<script src="<?php echo base_url('assets/js/settings.js')?>"></script>
<script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url('assets/js/data-table.js')?>"></script>
<script src="<?php echo base_url('assets/js/alerts.js')?>"></script>
<!-- End custom js for this page-->
</body>

</html>
<script type="text/javascript">
	$('.content-wrapper').css('max-width','100%');

	function FetchData(id) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>KeepaData/fetchdata",
			data: {id: id},
			success: function(response)
			{
				var jsonData = JSON.parse(response);
				$('#Artikelname').val(jsonData[0]['Artikelname']);
				$('#ASIN').val(jsonData[0]['ASIN']);
				$('#Hersteller').val(jsonData[0]['Hersteller']);
				$('#Artikelnummer').val(jsonData[0]['Artikelnummer']);
				$('#Hohe').val(jsonData[0]['Hohe']);
				$('#Lange').val(jsonData[0]['Lange']);
				$('#Breite').val(jsonData[0]['Breite']);
				$('#Artikelgewicht').val(jsonData[0]['Artikelgewicht']);
				$('#Versandgewicht').val(jsonData[0]['Versandgewicht']);
				$('#Barcode').val(jsonData[0]['Barcode']);
				$('#Beschreibungzusatz').val(jsonData[0]['Beschreibungzusatz']);
				$('#Kaufpreis').val(jsonData[0]['Kaufpreis']);
				$('#BilId1Pfad').val(jsonData[0]['BilId1Pfad']);
				$('#BilId2Pfad').val(jsonData[0]['BilId2Pfad']);
				$('#BilId3Pfad').val(jsonData[0]['BilId3Pfad']);
				$('#BilId4Pfad').val(jsonData[0]['BilId4Pfad']);
				$('#BilId5Pfad').val(jsonData[0]['BilId5Pfad']);
				$('#eBayKategorie1').val(jsonData[0]['eBayKategorie1']);
				$('#id').val(jsonData[0]['id']);

			},
			error: function(){
				console.log('error');
			}
		});
	}


	function deletedata(id){
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$('#delete-id').val(id);
				$('#deleteform').submit();
			}
		});
	}
</script>