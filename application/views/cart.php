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
  <div class="container-fluid p-5 mt-5">
    <div class="row">
        <div class="col-8">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                <?php $no=1; foreach ($cart as $ct) {  ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ct['name'] ?></td>
                    <td><?= $ct['qty'] ?></td>
                    <td>Rp <?= $this->cart->format_number($ct['price']) ?></td>
                    <td>Rp <?= $this->cart->format_number($ct['subtotal']) ?></td>
                    <td> <a href="<?= base_url('utama/remove_cart/'.$ct['rowid']) ?>">delete</a> </td>
                </tr>
                <?php } ?>
            </table>

        </div>
        <div class="col-4">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2"><h3>Ringkasan Belanja</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Total Harga</td>
                    <th>Rp <?= $this->cart->format_number($this->cart->total()) ?></th>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <a href="<?= base_url('utama/checkout') ?>" class="btn btn-block btn-warning text-white">Checkout</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>
