<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | Detail</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="content py-5">
  <div class="container card p-5 mt-5">
    <div class="col-12">
    <h1 class="text-capitalize"><?= $barang->nama_barang ?></h1>
    </div>
    <div class="row">
        <div class="col-6">
        <img src="<?= base_url('assets/images/'.$barang->nama_kategori.'/'.$barang->gambar_barang)?>" width="400" alt="">
        </div>
        <div class="col-6 ">
            <table class="table">
                <tbody>
                    <tr>
                    <th scope="row">Harga</th>
                    <td>Rp <?= $this->cart->format_number($barang->harga) ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Deskripsi</th>
                    <td><?= $barang->deskripsi ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Stok</th>
                    <td><?= $barang->stok ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('utama/beli/'.$barang->id_barang) ?>" class="btn btn-warning text-white">Beli</a>
        </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>
