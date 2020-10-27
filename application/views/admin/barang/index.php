
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
				
						<a href="<?php echo base_url('admin/barang/tambah/') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
					

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" height="100%" cellspacing="0">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Stok</th>
										<th>Kategori</th>
                                        <th>Foto</th>
							

									</tr>
									<?php foreach ($barang as $b ) : ?>


								</thead>
								<tbody>
                                
										<tr>	
										<td width="300">
											<a href="<?php echo base_url('admin/barang/edit/'.$b['id']) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <a href="<?php echo site_url('admin/barang/detail/'.$b['id']) ?>"
											 class="btn btn-small text-success" ><i class="fa fa-info-circle"></i> Detail</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/barang/delete/' .$b['id']) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>

										<td width="150">
											<?php echo $b['nama_barang'] ?>
										</td>
                                        <td>
											<?php echo $b['harga']; ?>
										</td>
										<td>
											<?php echo $b['kategori']['name']; ?>
										</td>
										<td>
										<?php echo $b['stok_barang']; ?>
										</td>
										<td >
											<img src="<?php echo base_url('upload/'.$b['foto']) ?>" width="100 " />
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
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

</body>

</html>