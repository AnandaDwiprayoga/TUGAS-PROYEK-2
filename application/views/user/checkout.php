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
				<div class="col-md-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table mr-1"></i>
							Detail Checkout
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="col-md-12 mb-3">
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<img src="<?= base_url() . "upload/" . $barang['foto'] ?>" class="img-fluid" alt="">
										</div>
										<div class="col-md-6 mb-3">
											<h1 class="detail-right__header"><?= $barang['nama_barang'] ?></h1>
											<h2 class="detail-right__price">Rp <?= $barang['harga'] ?>/Hari</h2>
											<h3 class="detail-right__stock">Stock : <?= $barang['stok_barang'] ?></h3>
											<p class="detail-right__address">Jl Jend Sudirman 71 S Widjojo Lt 7,Senayan</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table mr-1"></i>
							Form Checkout
						</div>
						<div class="card-body">
							<form action="<?= base_url('user/Products/pesan') ?>" method="post">
								<div class="form-row">
									<div class="col-md-12 mb-3">
										<h2>Form Checkout</h2>
										<div class="form-row">
											<div class="col-md-6">
												<label for="">Jumlah Barang</label>
												<input type="hidden" name="idb" value="<?= $this->uri->segment(4); ?>">
												<input type="hidden" name="idu" value="<?= $ses['id']; ?>">
												<input type="hidden" name="hrg" value="<?= $barang['harga'] ?>">
												<input class="form-control md-6" name="jumlah" type="number" min="0" max="<?= $barang['stok_barang'] ?>">
											</div>
											<div class="col-md-6">
												<label for="">Lama Sewa</label>
												<input class="form-control md-6" name="lama" type="number" min="0">
											</div>
										</div>
										<button class="btn btn-primary float-right ml-2 mt-4" type="submit"> Bayar </button>
										<button class="btn btn-danger float-right ml-2 mt-4" type="submit"> Cancel </button>
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>




	<!-- ======= Footer ======= -->
	<?php $this->load->view("user/template/footer.php") ?>

</body>

</html>
