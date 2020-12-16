<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("user/template/head.php"); ?>
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<?php $this->load->view("user/template/header_products.php", array('from' => $from)) ?>
	</header><!-- End Header -->


	<main class="container-fluid section-bg">
		<div class="col">

			<section id="my-breadcrumb" class="mt-5">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>user/landing">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>user/products">Products</a></li>
						<li class="breadcrumb-item active" aria-current="page">Products Chcekout</li>
					</ol>
				</nav>
			</section>
			<div class="form-row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table mr-1"></i>
							Form pesanan
						</div>
						<div class="card-body">
							<form action="<?= base_url('user/Products/upload') ?>" method="post" enctype="multipart/form-data">
								<div class="form-row">
									<div class="col-md-12 mb-3">
										<h2>History Pemesanan</h2>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th> Nama Barang </th>
													<th> Jumlah Barang </th>
													<th> Lama Sewa </th>
													<th> Total </th>
													<th> Batas Bayar </th>
													<th> Status </th>
													<th> # </th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($barang as $b) : ?>
													<?php if ($ses['id'] == $b->id_user) { ?>
														<tr>
															<td><?= $b->nama_barang ?></td>
															<td><?= $b->jumlah_barang ?></td>
															<td><?= $b->lama_sewa ?></td>
															<td><?= $b->total ?></td>
															<td><?= $b->batas_bayar ?></td>
															<td>
																<?php if ($b->status_bayar == 1) : ?>
																	Lunas
																<?php else : ?>
																	Belum Lunas
																<?php endif ?>
															</td>
															
															<?php if ($wkt <= $b->batas_bayar && $b->status_bayar == 2) { ?>
																<td><a href="<?= base_url('user/Products/bayar/') . $b->id; ?>" class="btn btn-primary"><i class="fa fa-money"></i></a></td>

															<?php } ?>
														</tr>
													<?php } ?>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>

		</div>
	</main>




	<!-- ======= Footer ======= -->
	<?php $this->load->view("user/template/footer.php") ?>

</body>

</html>
