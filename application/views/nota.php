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
        <div class="col-12">
        <?php foreach ($detail as $dtNota) { } ?>
        <h4 class="mb-3">Detail Pembelian</h4>
        <h6 class="float-left">Pembeli : <?= $dtNota->nama ?></h6>
        <h6 class="float-right">Tanggal Pembelian : <?= $dtNota->tgl_pembelian ?></h6>
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($detail as $dt) { ?>
                <tr>
                    <td><?= $dt->nama_barang ?></td>
                    <td>Rp <?= $this->cart->format_number($dt->harga) ?></td>
                    <td><?= $dt->jumlah ?></td>
                    <td>Rp <?= $this->cart->format_number($dt->harga*$dt->jumlah) ?></td>
                </tr>
                <?php } ?>
                <tr>
                <th colspan="2">TOTAL</th>
                <td><?= $dtNota->totalitems ?></td>
                <td>Rp <?= $this->cart->format_number($dtNota->grandtotal) ?></td>
                </tr>
            </table>
            <a href="<?= base_url('') ?>" class="btn btn-block btn-warning text-white">Back Home</a>

        </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>
