<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

			

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/barang/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/barang/tambah') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama_barang">Nama Barang*</label>
								<input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
								 type="text" name="nama_barang" placeholder=" Nama Barang " />
								<div class="invalid-feedback">
									<?php echo form_error('nama_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="stok_barang">Jumlah Stok*</label>
								<input class="form-control <?php echo form_error('stok_barang') ? 'is-invalid':'' ?>"
								 type="text" name="stok_barang" min="0" placeholder="Jumlah Stock" />
								<div class="invalid-feedback">
									<?php echo form_error('stok_barang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Harga*</label>
								<input class="form-control-file <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="number" name="harga"  min="0" placeholder="  Harga "  />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>

							<div class="form-group">
                                <label for="kategori">Kategori :</label>
                                
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($kategori as $d) : ?>
                                            <option value="<?= $d['id']; ?>"><?= $d['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                
                            </div>

							<div class="form-group">
								<label for="foto">Photo</label>
								<input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
								 type="file" name="foto" />
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
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
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

        <?php $this->load->view("admin/_partials/js.php") ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

        <script>
        $('#id_kategori').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
        </script>

</body>

</html>