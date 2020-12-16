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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">

					<a href="<?php echo site_url('admin/pembayaran/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">


						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" height="100%" cellspacing="0">
								<thead>
									<tr>

										<th>Nama Barang</th>
										<th>Nama User</th>
										<th>Jumlah Barang</th>
										<th>Lama Sewa</th>
										<th>Total</th>
										<th>Batas Bayar</th>

									</tr>
									<?php
									$total = 0;
									foreach ($detail as $b) : ?>
								</thead>
								<tbody>

									<tr>
										
									<td width="150">
											<?php echo $b['nama_barang'] ?>
										</td>
										
										<td width="150">
											<?php echo $b['nama_user'] ?>
										</td>
										
										<td width="150">
											<?php echo $b['jumlah_barang'] ?>
										</td>

										
										<td width="150">
											<?php echo $b['lama_sewa'] ?>
										</td>
										
										
										<td>
											Rp. <?php echo number_format($b['total'], 0, ',', '.'); ?>

										</td>
										<td width="150">
											<?php echo $b['batas_bayar'] ?>
										</td>


									</tr> 

								<?php endforeach; ?>
								
								</tbody>
							</table>
						</div>
					</div>
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
			function deleteConfirm(url) {
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}
		</script>

</body>

</html>
