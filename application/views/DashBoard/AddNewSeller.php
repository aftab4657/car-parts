<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sellers | eSync Sellers</title>
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
    <!-- partial:../../partials/_horizontal-navbar.html -->
    <?php require_once 'header.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-12 grid-margin">
              <?php 
                if($this->session->flashdata('msg')){
                  echo '<div class="alert alert-success">'
                        .$this->session->flashdata("msg").
                      '</div>';
                  }
              ?>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">New Sellers</h4>
                <form class="form-sample" method="post", action="<?php echo base_url('Sellers/SaveSellerDB') ?>">
                  <p class="card-description">
                    Seller Information
                  </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Caption</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="caption" id="caption" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Shop Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="shopname" id="shopname" />
                        </div>
                      </div>
                    </div>
                   <!--  <div class="col-md-12 form-group">
                      <label>Choose Existing Category</label>
                      <select class="js-example-basic-single" name="existing_category" id="existing_category" style="width:100%">
                        <option selected="" >Choose Category</option>
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="AM">America</option>
                        <option value="CA">Canada</option>
                        <option value="RU">Russia</option>
                      </select>
                    </div> -->
                  </div>
                  <!-- <p class="card-description">
                    URLs
                  </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <textarea class="form-control" rows="10" id="urls" name="urls" placeholder="Paste URLs"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex flex-column">
                        <div class="form-group">

                          <input type="file" name="csv" id="csv" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload CSV file"  >
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Csv</button>
                            </span>
                          </div>
                        </div> -->
                        <div class="form-check form-group form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="scraping_status" name="scraping_status", value="draft">
                            Add in Draft
                          </label>
                        </div>
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary mr-2">Upload</button>
                          <button class="btn btn-light" type="reset">Reset</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
              </div>
            </div>
          </div>

        </div>
      </div>

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
<script src="<?php echo base_url('assets/js/template.js')?>"></script>
<script src="<?php echo base_url('assets/js/settings.js')?>"></script>
<script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url('assets/js/file-upload.js')?>"></script>
<script src="<?php echo base_url('assets/js/typeahead.js')?>"></script>
<script src="<?php echo base_url('assets/js/select2.js')?>"></script>
<!-- End custom js for this page-->

</body>

</html>
