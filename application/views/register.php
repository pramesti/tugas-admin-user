<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CI Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="header">
  <?php include('navbar.php') ?>

    </div>
    <div class='container' style='margin-top: 40px;'>
        <div class='row'>
            <div class='col-md-4'>
            </div>
            <div class='col-md-4'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <!-- validation message for a successful registration -->
                        <?php if ($this->session->flashdata('success')) {?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                          <?php  } ?>

                        <!-- validation messages for taking inputs -->
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>','</div>');
                        ?>

                        <?php echo form_open('utama/registerUser') ?>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="fname">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="fname" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="email">Kode pos</label>
                                <input type="number" class="form-control" name="kodepos" id="email" placeholder="Kode Pos">
                            </div>
                            <div class="form-group">
                                <label for="contact">Kontak</label>
                                <input type="number" class="form-control" name="kontak" id="contact" placeholder="Kontak">
                            </div>
                            <div class="form-group">
                                <label for="contact">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="addres" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" id="password" placeholder="Password">
                            </div>
                            <button class="btn btn-warning" name='reg'>REGISTER</button>
                            <a href="<?php echo site_url('Home/Login') ?>" class="btn btn-link">Sign In</a>

                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
