<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header"> 
<?php include('navbar.php') ?>  
</div>
<br>
<br>
    <div class="container">
    <div class="row align-items-center mt-5">
    <div class="col">
    </div>
    <div class="col-6">
      <div class="card p-5">           
          <form method="post" action="<?= base_url('utama/act_login');?>">
              <h2 class="text-center">LOGIN</h2>
              <div class="form-group mt-5">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <input type="submit" class="btn btn-warning" value="Login"/>
          </form>
              <p class="hint-text">Don't have an account? <a href="<?php echo site_url('Utama/Register') ?>">Sign up here</a></p>
      </div>
    </div>
    <div class="col">
    </div>    
    </div>
</body>
</html>