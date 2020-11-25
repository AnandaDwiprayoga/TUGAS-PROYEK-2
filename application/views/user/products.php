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
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </section>

        <section id="products-content">
            <div class="content__left">
                <ul class="content-left__category">
                    <li class="list-category-active" data-filter="*">All Category</li>
                    <?php foreach($kategories as $kategori) : ?>
                        <li data-filter=".filter-<?= str_replace(' ', '_', $kategori['nama_kategori']) ?>"><?= $kategori['nama_kategori'] ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="content__right">
                <?php foreach($barangs as $barang) : ?>
                    <div class="item-products filter-<?= str_replace(' ', '_', $barang['nama_kategori']) ?>">
                        <img src="<?= base_url() ."upload/". $barang['foto'] ?>" alt="">
                        <div class="item-products__content">
                            <h4><?= $barang['nama_barang'] ?></h4>
                            <p>Rp <?= $barang['harga'] ?>/Hari</p>
                            <a class="my-cta-btn text-center" href="<?= base_url()?>user/products_detail/<?=$barang['id']?>">Detail</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
      </div>
  </main>




  <!-- ======= Footer ======= -->
  <?php $this->load->view("user/template/footer.php") ?>

</body>

</html>
