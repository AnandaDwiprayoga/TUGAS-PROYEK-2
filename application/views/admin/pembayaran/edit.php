<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>


				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/pembayaran/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/pembayaran/edit') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $bayar['id'] ?>" />

							<div class="form-group">
								<label for="nama">Status Pembayaran*</label>
								
							</div>
							<div class="form-group">
								
							<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status_bayar" id="status_bayar" value="1">
									<label class="form-check-label" for="status_bayar">Lunas</label>
								</div>

								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status_bayar" id="status_bayar" value="2">
									<label class="form-check-label" for="status_bayar">Belum Lunas</label>
								</div>
							
								
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->


			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
