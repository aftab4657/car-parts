<!DOCTYPE html>
<html lang="en">
<?php require_once 'translation/Login.php'; ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Welcome to eSync | Login</title>
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <div class="container-scroller">
  <?php require_once 'SimpleHeader.php'; ?>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <!-- <img src="<?php // echo base_url('assets/images/logo.svg')?>" alt="logo"> -->
                </div>
                <h4><?php echo($mylanguage[0]); ?></h4>
                <h6 class="font-weight-light"><?php echo($mylanguage[1]); ?></h6>
                <?php
                 	
                 	if (validation_errors())
                 	echo '<div class="text-danger">'
                			.validation_errors().
                			'</div>';
                	if($this->session->flashdata('msg')){
                		echo '<div class="alert alert-danger">'
                			.$this->session->flashdata("msg").
                			'</div>';
                	}
                ?>
                <form class="pt-3" method="POST" action="<?php echo base_url('Login/Authenticate')?>">
                  <div class="form-group">
                    <input type="username" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="<?php echo($mylanguage[2]); ?>">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="<?php echo($mylanguage[3]); ?>">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"><?php echo($mylanguage[4]); ?></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js')?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('assets/js/template.js')?>"></script>
  <script src="<?php echo base_url('assets/js/settings.js')?>"></script>
  <script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
  <!-- endinject -->
</body>

</html>
