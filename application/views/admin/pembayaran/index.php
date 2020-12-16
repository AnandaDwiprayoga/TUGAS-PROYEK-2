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


					</div>
					<div class="card-body">


						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" height="100%" cellspacing="0">
								<thead>
									<tr>
										<th>#</th>
										<th>Tanggal Pembayaran</th>
										<th>Status Pembayaran</th>
										<th>Bukti Pembayaran</th>
										<th>Detail Sewa</th>

									</tr>
									<?php foreach ($bayar as $b) : ?>


								</thead>
								<tbody>
									<tr>
										<?php if ($b['bukti_bayar'] != NULL) { ?>

											<td width="300">
												<a href="<?php echo base_url('admin/pembayaran/edit/' . $b['id']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/pembayaran/delete/' . $b['id']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											</td>
										<?php } else {  ?>

											<td width="300">
												
												<a onclick="deleteConfirm('<?php echo site_url('admin/pembayaran/delete/' . $b['id']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											</td>
											<?php } ?>



										<td width="150">
											<?php echo $b['tanggal_bayar'] ?>
										</td>


										<?php if ($b['status_bayar'] == 1) { ?>
											<td width="150">Lunas</td>
										<?php } else { ?>
											<td width="150">Belum Lunas</td>
										<?php } ?>



										<?php if ($b['bukti_bayar'] == NULL) { ?>
											<td>- </td>
										<?php } else { ?>
											<td>
												<img src="<?php echo base_url('upload/' . $b['bukti_bayar']) ?>" width="100 " />
											</td>

										<?php } ?>

										<td width="300">

											<a href="<?php echo site_url('admin/pembayaran/detail/' . $b['id_detail_penyewaan']) ?>" class="btn btn-small text-success"><i class="fa fa-info-circle"></i> Detail</a>

										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
							</table>
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
