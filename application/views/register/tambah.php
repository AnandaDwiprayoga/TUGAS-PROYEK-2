<html lang="en">

<head>
<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		
	<?php if($this->session->flashdata('flash-data')){?>
      <div class="row mt-4">
          <div class="col -md-6">
              <div class="alert alert-succes alert-dismissible fade show" role="alert">
                  Register <strong> berhasil </strong> <?= $this->session->flashdata('flash-data');?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          </div>
      </div>
    <?php } ?>
		
	<div class="card">
        <div class="card-header">
           <b>Isikan data diri</b>
        </div>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'user/register/tambah'?>">
            <div class="modal-body"> 
            <?php if(validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
            <?= validation_errors()?> 
            </div>
            <?php } ?>
            <form action="" method="post">

            <div class="form-group">
                <label form="id"><b>Id </b> </label>
                <input type="text" class="form-control" id="id" name="id">
            </div>

            <div class="form-group">
                <label form="nama_user"><b>Nama</b> </label>
                <input type="text" class="form-control" id="nama_user" name="nama_user">
            </div>

            <div class="form-group">
                <label form="alamat"><b>Alamat</b> </label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            <div class="form-group">
                <label form="no_telp"><b>No telp </b> </label>
                <input type="text" class="form-control" id="no_telp" name="no_telp">
            </div>
            
            <div class="form-group">
                <label form="username"><b>Username </b> </label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label form="password"><b>Password </b> </label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            
            </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>
			
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
		

	
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>
    
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

</body>

</html>