<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

	<div class="card mb-3">
        <div class="card-header">
		<a href="<?php echo site_url('user/login') ?>"><i class="fas fa-arrow-left"></i> Back</a>
           
        </div>

		<div class="card-header">
		
           <b>Isikan data diri</b>
        </div>

		<div class="card-body">

        <form action="<?php base_url('user/register/tambah') ?>" method="post" enctype="multipart/form-data" >
		
		<div class="form-group">
			<label for="nama_user">Nama </label>
				<input class="form-control <?php echo form_error('nama_user') ? 'is-invalid':'' ?>"
								 type="text" name="nama_user" placeholder=" isikan nama lengkap anda " />
					<div class="invalid-feedback">
						<?php echo form_error('nama_user') ?>
					</div>
		</div>

		<div class="form-group">
			<label for="alamat">Alamat </label>
				<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder=" isikan alamat anda " />
					<div class="invalid-feedback">
						<?php echo form_error('alamat') ?>
					</div>
		</div>

		<div class="form-group">
			<label for="no_telp">No Telepon</label>
				<input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>"
								 type="text" name="no_telp" placeholder=" isikan no telp anda " />
					<div class="invalid-feedback">
						<?php echo form_error('no_telp') ?>
					</div>
		</div>		

		<div class="form-group">
			<label for="username">Username </label>
				<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder=" isikan Username " />
					<div class="invalid-feedback">
						<?php echo form_error('username') ?>
					</div>
		</div>

		<div class="form-group">
			<label for="password">Password </label>
				<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="text" name="password" placeholder=" isikan Password " />
					<div class="invalid-feedback">
						<?php echo form_error('password') ?>
					</div>
		</div>
            
			<input class="btn btn-success" type="submit" name="btn" value="Save" />
		</form>

	</div>

					


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
			

			</div>
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

