<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home | eSync Urls Listing</title>
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
              <h4 class="card-title">URLs Listing</h4>

              <div class="row">
                <div class="col-12">
                  <?php 
                  if($this->session->flashdata('msg')){
                  echo '<div class="alert alert-success">'
                    .$this->session->flashdata("msg").
                  '</div>';
                }
                ?>
                 <div class="col-md-12 small text-right"><a href="<?php echo base_url('Home/Exportdata')?>"> Export Data</a></div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Seller</th>
                        <th>Category</th>
                        <th>Url</th>
                        <th>Status</th>
<!--                         <th>Last Update Date</th>
                        <th>Last Update Time</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data->result() as $row): ?>
                        
                        <tr>
                          <td><?php echo $row->seller; ?></td>
                          <td><?php echo $row->category_id; ?></td>
                          <td><?php echo $row->url; ?></td>
                          <td><label class="badge <?php if($row->scraping_status =="pending")echo 'badge-warning'; else echo 'badge-success'; ?>"><?php echo $row->scraping_status; ?></label> </td>
<!--                           <td><?php echo $row->last_update_date; ?></td>
                          <td><?php echo $row->last_update_time; ?></td> -->
                          <td>
                            <!--  <button type="button" class="btn btn-outline-warning btn-sm" onclick="FetchData(<?php echo $row->id; ?>)" data-toggle="modal" data-target="#exampleModalXl" >Edit</button> -->
                            <button class="btn btn-outline-danger btn-sm" onclick="deletedata(<?php echo $row->id; ?>)">Delete</button>
                          </td>
                          <!-- <td>
                            <button class="btn btn-outline-primary">View</button>
                          </td> -->
                        </tr>
                      <?php endforeach; ?>
    
                    </tbody>
                  </table>
                  <?= $this->pagination->create_links(); ?>
                </div>
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

    <div class="modal fade" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header pb-0">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0 pb-0">
        <form action="<?php  echo base_url('EbayImportVorlage/updateeditdata'); ?>" method="post">
          <input type="hidden" name="id" id="id">
          <div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label">Seller:</label>
                <input type="text" class="form-control" name="Seller" id="Seller">
              </div>

             <div class="col-6">
              <label for="recipient-name" class="col-form-label">Category:</label>
              <input type="text" class="form-control" name="category_id" id="category_id">
            </div>
          </div>

          <div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label">Url:</label>
                <input type="text" class="form-control" name="url" id="url">
              </div>
              <div class="col-6">
           <div class="form-check form-group form-check-flat form-check-primary">
              <label class="form-check-label">
              <input type="checkbox" class="form-check-input" id="draft" name="draft", value="draft">
                      Add in Draft
                </label>
               </div>
             </div>
          </div>
          </div>
          <?= $this->pagination->create_links(); ?>
 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
         
        </form>
      </div>
     
    </div>
  </div>
</div>

    <form id="deleteform" action="<?php echo base_url('Home/delete'); ?>" method="post">
    <input type="hidden" name="id" id="delete-id">
  </form>
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
<script src="<?php echo base_url('assets/js/data-table.js')?>"></script>
<!-- End custom js for this page-->
</body>

</html>
<script type="text/javascript">
  $('.content-wrapper').css('max-width','100%');
  
  function deletedata(id){
  console.log('hy');
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
