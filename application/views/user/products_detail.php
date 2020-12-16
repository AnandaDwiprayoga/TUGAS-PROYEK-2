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
						<li class="breadcrumb-item active" aria-current="page">Products Detail</li>
					</ol>
				</nav>
			</section>

			<section id="products-detail">
				<figure class="products-detail_left">
					<img src="<?= base_url() . "upload/" . $barang['foto'] ?>" class="img-fluid my-img-fluid" alt="">
					<a href="<?php echo base_url() . "upload/" . $barang['foto'] ?>" data-lightbox="portfolio" data-title="App 1" class="link-preview"><i class="fa fa-eye"></i></a>
				</figure>

				<div class="products-detail_right">
					<h1 class="detail-right__header"><?= $barang['nama_barang'] ?></h1>
					<h2 class="detail-right__price">Rp <?= $barang['harga'] ?>/Hari</h2>
					<h3 class="detail-right__stock">Stock : <?= $barang['stok_barang'] ?></h3>
					<p class="detail-right__address">Jl Jend Sudirman 71 S Widjojo Lt 7,Senayan</p>
					<?php if ($ses != null) : ?>
						<a href="<?= base_url('user/Products/checkout/') . $this->uri->segment(3); ?>" class="detail-right__btn">Sewa Sekarang</a>
					<?php else : ?>
						<a href="<?= base_url('user/login') ?>" class="detail-right__btn" >Sewa Sekarang</a>
					<?php endif; ?>
				</div>
			</section>
		</div>
	</main>




	<!-- ======= Footer ======= -->
	<?php $this->load->view("user/template/footer.php") ?>

</body>

</html>
