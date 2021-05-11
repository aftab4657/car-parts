<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Setting  | eSync Setting </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.addons.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/horizontal-layout/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_horizontal-navbar.html -->

    <?php require_once 'header.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row"> 
          <div class="col-md-12">
            <?php 
                  if($this->session->flashdata('msg')){
                    echo '<div class="alert alert-success">'
                    .$this->session->flashdata("msg").
                    '</div>';
                  }

                  if($this->session->flashdata('error')){
                    echo '<div class="alert alert-danger">';
                    print_r($this->session->flashdata("error")['error']);
                    echo '</div>';
                  }
                  ?>
          </div>  
            <div class="col-lg-5 grid-margin stretch-card">
              <!--x-editable starts-->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Scraper Setting</h4>
              
                  <div class="template-demo">
                    <?php foreach ($data['setting'] as $row): ?>
                    <form id="ScraperSetting" method="post" action="<?php echo base_url('Setting/UpdateScraperSetting')?>"  >
                      <div class="form-group row">
                        <label class="col-6 col-lg-4 col-form-label">Current Scraper Status</label>
                        <div class="col-6 col-lg-8 d-flex align-items-center">
                          
                            <select class="form-control text-dark font-weight-bold" name="ScraperStatus" onchange="UpdateSetting()">
                              <option value="1" <?php if ($row->ScraperStatus == 1) echo 'selected'; ?> >On</option>
                              <option value="0"  <?php if ($row->ScraperStatus == 0) echo 'selected'; ?> >Off</option>
                            </select>

                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-6 col-lg-4 col-form-label">Current Scraping Choice</label>

                            <select name="ScrapingChoice" class="form-control text-dark font-weight-bold" onchange="UpdateSetting()">
                              <option value="1" <?php if ($row->ScrapingChoice == 1) echo 'selected'; ?> >Ignore EAN</option>
                              <option value="2"  <?php if ($row->ScrapingChoice == 2) echo 'selected'; ?> >Ignore Comp List</option>
                              <option value="3"  <?php if ($row->ScrapingChoice == 3) echo 'selected'; ?> >Ignore Both EAN/Comp List</option>
                              <option value="4"  <?php if ($row->ScrapingChoice == 4) echo 'selected'; ?> >Skip Url If Any Data is Missing</option>
                            </select>
                          
                      </div>
                    </form>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <!--x-editable ends-->
            </div>
            <div class="col-lg-7 grid-margin stretch-card">
              <!--form mask starts-->
              <div class="card">
                <div class="card-body">
                   <?php foreach ($data['profile'] as $row): ?>
                  <h4 class="card-title">Profile Setting</h4>
                  
                  <form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?php echo base_url('Setting/UpdateProfile'); ?>">
                    <div class="form-group">
                      <label>Name:</label>
                      <input class="form-control" name="name" type="text" value='<?php echo $row->name; ?>' />
                    </div>
                    <div class="form-group row">
                      <div class="col">
                        <label>Email:</label>
                        <input class="form-control" name="email"  value="<?php echo $row->email; ?>" />
                      </div>
                      <div class="col">
                        <label>Password:</label>
                        <input class="form-control" name="password" type="text" value="<?php echo $row->password; ?>" />
                      </div>

                    </div>
                    <div class="form-group">
                      <label>Profile Image:</label>
                      <input type="file" name="ProfilePicture" class="dropify" value="<?php echo $row->ProfilePicture; ?>" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                    <?php endforeach; ?>
                  </form>
                </div>
              </div>
              <!--form mask ends-->
            </div>

           

          
          </div>

<!--  ========================================= -->
          <div class="row">
            <div class="col-lg-5 grid-margin stretch-card">
              <!--x-editable starts-->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reset Scraped Data</h4>

                  <div class="template-demo">
                        <div class="col-6 col-lg-8 d-flex align-items-center">
                            <form id='reset-db' action="<?php echo site_url('Setting/deletedata') ?>">
                                <button onclick="deletedata()" type='button' class="btn btn-danger">Reset Database Data</button>
                            </form>
                        </div>
                      </div>

                  
                  </div>
                </div>
              </div>
              <!--x-editable ends-->
            </div>
          </div>
         <!--  ========================================= -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php require_once 'footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
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
  <script src="<?php echo base_url('assets//js/template.js')?>"></script>
  <script src="<?php echo base_url('assets/js/settings.js')?>"></script>
  <script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url('assets/js/formpickers.js')?>"></script>
  <script src="<?php echo base_url('assets/js/form-addons.js')?>"></script>
  <script src="<?php echo base_url('assets/js/x-editable.js')?>"></script>
  <script src="<?php echo base_url('assets/js/dropify.js')?>"></script>
  <script src="<?php echo base_url('assets/js/dropzone.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-file-upload.js')?>"></script>
  <script src="<?php echo base_url('assets/js/formpickers.js')?>"></script>
  <script src="<?php echo base_url('assets/js/form-repeater.js')?>"></script>
  <!-- End custom js for this page-->
<script type="text/javascript">

  function UpdateSetting(argument) {
    $('#ScraperSetting').submit();
  }

	function deletedata(){
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$('#reset-db').submit();
			}
		});
	}

</script>
</body>

</html>


