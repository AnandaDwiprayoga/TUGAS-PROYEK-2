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
				<div class="col-md-3">	
				</div>
				<div class="col-md-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table mr-1"></i>
							Form Bukti Transfer
						</div>
						<div class="card-body">
							<form action="<?= base_url('user/Products/uploadBT') ?>" method="post" enctype="multipart/form-data">
								<div class="form-row">
									<div class="col-md-12 mb-3">
										<h2>Upload Bukti Transfer</h2>
										<div class="form-row">
											<div class="col-md-12">
												<label for="">Bukti Transfer</label>
												<input type="hidden" name="id" value="<?= $this->uri->segment(4); ?>">
												<input class="form-control md-6" name="file" type="file">
											</div>
										</div>
										<button class="btn btn-primary float-right ml-2 mt-4" type="submit"> Kirim </button>
										<button class="btn btn-danger float-right ml-2 mt-4" type="submit"> Cancel </button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>

		</div>
	</main>




	<!-- ======= Footer ======= -->
	<?php $this->load->view("user/template/footer.php") ?>

</body>

</html>
