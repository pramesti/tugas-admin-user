<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | Detail</title>
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
<div class="content py-5">
<div class="container card p-5 mt-5">
<div class="col-12">
<h3 class="mb-4">Informasi Pembeli</h3>
<form method="post" action="<?= base_url('utama/bayar');?>">
<input type="hidden" name="id_pembeli" value="<?= $this->session->userdata('id') ?>">
<div class="form-group">
<label for="exampleFormControlInput1">Nama</label>
<input type="text" name="nama" readonly value="<?= $this->session->userdata('nama'); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Helmi Zulfikar">
</div>
<div class="row">
<div class="col-8">
<div class="form-group">
<label for="exampleFormControlInput1">No. HP</label>
<input type="number" name="no_tlp" readonly value="<?= $this->session->userdata('no_telp'); ?>" class="form-control" id="exampleFormControlInput1" placeholder="082139593342">
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="exampleFormControlInput1">Kode Pos</label>
<input type="number" name="kodepos" readonly value="<?= $this->session->userdata('kodepos'); ?>" class="form-control" id="exampleFormControlInput1" placeholder="66155">
</div>
</div>
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1">Alamat</label>
<textarea class="form-control" name="alamat" readonly id="exampleFormControlTextarea1" rows="3" placeholder="Jl. Danau Laut Tawar G4H17, Sawojajar, Malang"><?= $this->session->userdata('alamat'); ?></textarea>
</div>
<div class="row">
<div class="col-4">
<div class="form-group">
<label for="exampleFormControlInput1">Tanggal Pembelian</label>
<input type="date" name="tgl_pembelian" readonly value="<?= date("Y-m-d") ?>" class="form-control" id="exampleFormControlInput1" placeholder="Helmi Zulfikar">
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="exampleFormControlInput1">Total Barang</label>
<input type="number" name="totalitems" readonly value="<?= $this->cart->total_items(); ?>" class="form-control" id="exampleFormControlInput1" placeholder="66155">
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="exampleFormControlInput1">Total Bayar</label>
<input type="number" name="grandtotal" readonly value="<?= $this->cart->total(); ?>" class="form-control" id="exampleFormControlInput1" placeholder="66155">
</div>
</div>
</div>
<button type="submit" class="btn btn-block btn-warning text-white "> Bayar </button>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
