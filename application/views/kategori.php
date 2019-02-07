<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | Kategory</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<style>
.gambar{
  width: 200px;
  height: 25vh;
}
</style>
<body>
<div id="header">   
  <?php include('navbar.php') ?>

</div>
<div id="body">
  <div id="content">
    <div class="container py-5 my-5 mx-2">
      <h2 class="text-center mb-1">Kategori</h2>
    <div class="row">
      
      <div class="col-6 pt-3">
        <div class="card text-center">
          <a href="<?= base_url('utama/kategori/anjing') ?>">
          <br>
          <img src="<?= base_url('assets/images/dog.png')?>" class="card-img-top img-gallery gambar" alt="...">
          <div class="card-body">
            <h4>ANJING</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-6 pt-3">
        <div class="card text-center">
          <a href="<?= base_url('utama/kategori/kucing') ?>">
          <br>
          <img src="<?= base_url('assets/images/cat.png')?>" class="card-img-top img-gallery gambar" alt="...">
          <div class="card-body">
            <h4>KUCING</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-6 pt-3">
        <div class="card text-center">
          <a href="<?= base_url('utama/kategori/ikan') ?>">
          <br>
          <img src="<?= base_url('assets/images/fish.png')?>" class="card-img-top img-gallery gambar" alt="..."   style="">
          <div class="card-body">
            <h4>IKAN</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-6 pt-3">
        <div class="card text-center">
          <a href="<?= base_url('utama/kategori/burung') ?>">
          <br>
          <img src="<?= base_url('assets/images/bird.png')?>" class="card-img-top img-gallery gambar" alt="..." >
          <div class="card-body">
            <h4>BURUNG</h4>
          </div>
          </a>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

</body>
</html>
