<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>All Sellers | eSync All Sellers</title>
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
              <h4 class="card-title">All Sellers</h4>
              <div class="row">
                <div class="col-12">
                  <?php 
                  if($this->session->flashdata('msg')){
                  echo '<div class="alert alert-danger">'
                    .$this->session->flashdata("msg").
                  '</div>';
                }
                ?>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Caption</th>
                        <th>Shop Name</th>
                        <th>Scraping Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data->result() as $row): ?>
                        
                        <tr>
                          <td><?php echo $row->caption; ?></td>
                          <td><?php echo $row->shopname; ?></td>
                          <td><label class="badge <?php if($row->scraping_status =="pending")echo 'badge-warning'; elseif($row->scraping_status =="draft")echo 'badge-primary'; else echo 'badge-success'; ?>"><?php echo $row->scraping_status; ?></label> </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src=<?php echo base_url('assets/js/todolist.js')?>></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url('assets/js/alerts.js')?>"></script>
<!-- End custom js for this page-->
</body>

</html>
<script type="text/javascript">
  
  $('.content-wrapper').css('max-width','100%');
</script>

