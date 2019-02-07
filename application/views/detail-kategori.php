<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | PetMart</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> 
<?php include('navbar.php') ?>
  
</div>
<div id="body">
  <div id="content">
  <h2 class='text-center mt-5'>PetMart Products</h2>

    <div class="container">
    <div class="row">
    <?php foreach ($barang as $br) { ?>
        <div class="col-4 mt-5">
            <div class="card" style="width: 100%;">
            <img src="<?= base_url('assets/images/'.$br->nama_kategori.'/'.$br->gambar_barang)?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $br->nama_barang ?> </h5>
                <h5>Rp <?= $br->harga ?> </h5>
                <a href="<?= base_url('utama/detail/2')?>" class="btn btn-warning text-white">Detail</a>
            </div>
            </div>
        </div>
    <?php } ?>
    </div>
    </div>
  </div>
</body>
</html>
