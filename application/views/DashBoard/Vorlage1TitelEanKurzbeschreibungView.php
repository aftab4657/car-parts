<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vorlage 1 Titel Ean Kurzbeschreibung | eSync Vorlage 1 Titel Ean Kurzbeschreibung</title>
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
              <h4 class="card-title">Vorlage 1 Titel Ean Kurzbeschreibung</h4>
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

                <div class="col-md-12 small text-right"><a href="<?php echo base_url('Vorlage1TitelEanKurzbeschreibung/Exportdata')?>"> Export Data</a></div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Barcode</th>
                        <th>Titel</th>
                        <th>HAN</th>
                        <th>Hersteller</th>
                        <th>Produktart</th>
                        <th>Fahrzeug</th>
                        <th>URL</th>
                        <th>mitLagerbestandarbeiten</th>
                        <th>KategorieLevel1</th>
                        <th>KategorieLevel2</th>
                        <th>KategorieLevel3</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data->result() as $row): ?>
                        
                        <tr>
                          <td><?php echo $row->Barcode; ?></td>
                          <td><?php echo $row->Titel; ?></td>
                          <td><?php echo $row->HAN; ?></td>
                          <td><?php echo $row->Hersteller; ?></td>
                          <td><?php echo $row->Produktart; ?></td>
                          <td><?php echo $row->Fahrzeug; ?></td>
                          <td><?php echo $row->URL; ?></td>
                          <td><?php echo $row->mitLagerbestandarbeiten; ?></td>
                          <td><?php echo $row->KategorieLevel1; ?></td>
                          <td><?php echo $row->KategorieLevel2; ?></td>
                          <td><?php echo $row->KategorieLevel3; ?></td>
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
        <form  action="<?php  echo base_url('Vorlage1TitelEanKurzbeschreibung/updateeditdata'); ?>" method="post">
            <input type="hidden" name="id" id="id">

      
              <div class="row">
              <div class="col-6">
                <label for="recipient-name" class="col-form-label">Barcode:</label>
                <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Barcode" id="Barcode">
              </div>

              <div class="col-6">
                <label for="recipient-name" class="col-form-label">Titel:</label>
                <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Titel" id="Titel">
              </div>
            </div>
                <div class="row">
                  <div class="col-6">
                 <label for="recipient-name" class="col-form-label">HAN:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="HAN" id="HAN">
               </div>

                <div class="col-6">
                 <label for="recipient-name" class="col-form-label">Hersteller:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Hersteller" id="Hersteller">
               </div>
             </div>
               <div class="row">
               <div class="col-6">
                 <label for="recipient-name" class="col-form-label">Produktart:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Produktart" id="Produktart">
               </div>

                <div class="col-6">
                 <label for="recipient-name" class="col-form-label">Fahrzeug:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="Fahrzeug" id="Fahrzeug">
               </div>
             </div>
             <div class="row">
               <div class="col-6">
                 <label for="recipient-name" class="col-form-label">URL:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="URL" id="URL">
               </div>

                <div class="col-6">
                 <label for="recipient-name" class="col-form-label">mitLagerbestandarbeiten:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="mitLagerbestandarbeiten" id="mitLagerbestandarbeiten">
               </div>
             </div>
             <div class="row">
               <div class="col-6">
                 <label for="recipient-name" class="col-form-label">KategorieLevel1:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="KategorieLevel1" id="KategorieLevel1">
               </div>

                <div class="col-6">
                 <label for="recipient-name" class="col-form-label">KategorieLeve2:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="KategorieLevel2" id="KategorieLevel2">
               </div>
             </div>
             <div class="row">
               <div class="col-6">
                 <label for="recipient-name" class="col-form-label">KategorieLevel3:</label>
                 <input type="text"  style="border-color: #a5a5a5"  class="form-control" name="KategorieLevel3" id="KategorieLevel3">
               </div>
               </div>
            
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success btn-sm">Update</button>
            </div>
          </div>


          </form>


     <form id="deleteform" action="<?php echo base_url('Vorlage1TitelEanKurzbeschreibung/delete'); ?>" method="post">
    <input type="hidden" name="id" id="delete-id">
  </form>
    <!-- main-panel ends -->
  <!-- page-body-wrapper ends -->
</div>
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
<!-- <script src="<?php echo base_url('assets/js/custom.js')?>"></script> -->
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
            url: '<?php echo base_url();?>Vorlage1TitelEanKurzbeschreibung/fetchdata',
            data: {id: id},
            success: function(response)
            {
                var jsonData = JSON.parse(response);
        $('#Barcode').val(jsonData[0]['Barcode']);
        $('#Titel').val(jsonData[0]['Titel']);
        $('#HAN').val(jsonData[0]['HAN']);
        $('#Hersteller').val(jsonData[0]['Hersteller']);
        $('#Produktart').val(jsonData[0]['Produktart']);
        $('#Fahrzeug').val(jsonData[0]['Fahrzeug']);
        $('#URL').val(jsonData[0]['URL']);
        $('#mitLagerbestandarbeiten').val(jsonData[0]['mitLagerbestandarbeiten']);
        $('#KategorieLevel1').val(jsonData[0]['KategorieLevel1']);
        $('#KategorieLevel2').val(jsonData[0]['KategorieLevel2']);
        $('#KategorieLevel3').val(jsonData[0]['KategorieLevel3']);
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