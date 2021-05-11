<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ebay Import Vorlage | eSync Ebay Import Vorlage</title>
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
              <h4 class="card-title">Ebay Import Vorlage</h4>


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
                <div class="col-md-12 small text-right"><a href="<?php echo base_url('EbayImportVorlage/Exportdata')?>"> Export Data</a></div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Barcode</th>
                        <th>Titel</th>
                        <th>eBayKategorie1</th>
                        <th>Verkaufspreis</th>
                        <th>Kaufpreis</th>
                        <th>FullCategory</th>
                        <th>eBayVorlage</th>
                        <th>Artikelzustand</th>
                        <th>Action</th>
                        <!-- <th>Status</th>
                        <th>Last Update Date</th>
                        <th>Last Update Time</th>
                        <th>Actions</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data->result() as $row): ?>
                        
                        <tr>
                          <td><?php echo $row->Barcode; ?></td>
                          <td><?php echo $row->Titel; ?></td>
                          <td><?php echo $row->eBayKategorie1; ?></td>
                          <td><?php echo $row->Verkaufspreis; ?></td>
                          <td><?php echo $row->Kaufpreis; ?></td>
                          <td><?php echo $row->FullCategory; ?></td>
                          <td><?php echo $row->eBayVorlage; ?></td>
                          <td><?php echo $row->Artikelzustand; ?></td>
                           <td>
                            <button type="button" class="btn btn-outline-warning btn-sm" onclick="FetchData(<?php echo $row->id; ?>)" data-toggle="modal" data-target="#exampleModalXl" >Edit</button>
                            <button class="btn btn-outline-danger btn-sm" onclick="deletedata(<?php echo $row->id; ?>)">Delete</button>
                          </td>
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
    <!-- main-panel ends -->
  </div>

<div class="modal fade" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0 pb-0">
        <form action="<?php  echo base_url('EbayImportVorlage/updateeditdata'); ?>" method="post">
          <input type="hidden" name="id" id="id">
          <div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label   ">Barcode:</label>
                <input type="text" style="border-color: #a5a5a5" class="form-control" name="Barcode" id="Barcode">
              </div>

             <div class="col-6">
              <label for="recipient-name" class="col-form-label" >Titel:</label>
              <input type="text"  style="border-color: #a5a5a5" class="form-control" name="Titel" id="Titel">
            </div>
          </div>

          <div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label">eBayKategorie1:</label>
                <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="eBayKategorie1" id="eBayKategorie1">
              </div>

             <div class="col-6">
              <label for="recipient-name" class="col-form-label">Verkaufspreis:</label>
              <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Verkaufspreis" id="Verkaufspreis">
            </div>
          </div><div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label">Kaufpreis:</label>
                <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Kaufpreis" id="Kaufpreis">
              </div>

             <div class="col-6">
              <label for="recipient-name" class="col-form-label">FullCategory:</label>
              <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="FullCategory" id="FullCategory">
            </div>
          </div><div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label">eBayVorlage:</label>
                <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="eBayVorlage" id="eBayVorlage">
              </div>

             <div class="col-6">
              <label for="recipient-name" class="col-form-label">Artikelzustand:</label>
              <input type="text" style="border-color: #a5a5a5" class="form-control" name="Artikelzustand" id="Artikelzustand">
            </div>
          </div>
 <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal ">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Update</button>
      </div>
         
        </form>
      </div>
     
    </div>
  </div>
</div>

  <form id="deleteform" action="<?php echo base_url('EbayImportVorlage/delete'); ?>" method="post">
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
<!-- End custom js for this page-->
</body>

</html>
<script>
  $('.content-wrapper').css('max-width','100%');

  function FetchData(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>EbayImportVorlage/fetchdata",
            data: {id: id},
            success: function(response)
            {
                var jsonData = JSON.parse(response);
        $('#Barcode').val(jsonData[0]['Barcode']);
        $('#Titel').val(jsonData[0]['Titel']);
        $('#eBayKategorie1').val(jsonData[0]['eBayKategorie1']);
        $('#Verkaufspreis').val(jsonData[0]['Verkaufspreis']);
        $('#Kaufpreis').val(jsonData[0]['Kaufpreis']);
        $('#FullCategory').val(jsonData[0]['FullCategory']);
        $('#eBayVorlage').val(jsonData[0]['eBayVorlage']);
        $('#Artikelzustand').val(jsonData[0]['Artikelzustand']);
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