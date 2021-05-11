<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Export | eSync Export</title>
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
                echo '<div class="alert alert-danger">'
                .$this->session->flashdata("msg").
                '</div>';
              }
              ?>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Export by Seller/Category</h4>
                  <form class="FormEan" method="get", action="<?php echo base_url('Export/ExportData') ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sellers</label>
                          <select class="js-example-basic-single" name="seller" id="seller" style="width:100%; border-color: #a5a5a5 !important">
                            <option selected="" value="" >Choose Sellers</option>
                            <?php foreach ($data['sellersget']as $row): ?>
                              <option value=<?php echo $row->SellerName ?>><?php
                              echo $row->SellerName?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6 form-group">
                        <label>Category</label>
                        <select class="js-example-basic-single" name="category" id="category" style="width:100% ; border-color: #a5a5a5 !important">
                          <option selected="" value="">Choose Category</option>
                          <?php foreach ($data['categoryget'] as $row): ?>
                            <option value=<?php echo $row->eBayKategorie1 ?>><?php echo $row->eBayKategorie1 ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                            <button type="button" onclick="Varification()" class="btn btn-primary mr-2">Export</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>


              <div class="card mt-3">
                <div class="card-body">
                  <h4 class="card-title">Export by Ean</h4>
                  <form class="form-sample" method="post", action="<?php echo base_url('Export/ExportData') ?>">


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <textarea class="form-control" rows="10" id="urls" name="urls" placeholder="Paste URLs"></textarea>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Export</button>
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
<script type="text/javascript">
  
  function Varification() {
    var seller=$('#seller').val();
    var category=$('#category').val();

    if(seller || category){
      $('.FormEan').submit();
    }
    else
    {
      alert('Warning');
    }




  }

</script>
