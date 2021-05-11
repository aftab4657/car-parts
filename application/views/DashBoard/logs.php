<!DOCTYPE html>
<html>
<head>

		<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Logs | eSync Logs</title>
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
							<h4 class="card-title">Logs</h4>
							<div class="row">
								<div class="col-12">

									<div class="table-responsive">
										<table class="table">
											<thead>

												<tr>
													<th>Urls</th>
													<th>Errors</th>
                   								 </tr>
                							</thead>
                	<tbody>
                		
                		<?php foreach ($data->result() as $row): ?>

                		<tr>
                			<td><?php echo $row->url; ?></td>
                			<td><?php echo $row->error; ?></td>
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
</html>