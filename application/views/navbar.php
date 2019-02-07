<nav id="navbar-example2" class="">
  <a class="" href="<?= base_url('Utama/index')?>" id="logo"><img src="<?= base_url()?>assets/images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="<?= base_url('utama/petmart') ?>">Petmart</a></li>
    <li><a href="<?= base_url('utama/kategori') ?>">Kategori</a></li>
    <li><a href="<?= base_url('utama/contact') ?>">Contact us</a></li>
   
    <?php if ($this->session->userdata('login')) { ?>
      <li><a href="<?= base_url('utama/logout') ?>">Logout</a></li>
    <?php } else { ?>
      <li><a href="<?= base_url('utama/login') ?>">Login</a></li>
    <?php } ?>
    <li><a href="<?= base_url('utama/cart') ?>">Cart</a></li>
  </ul>
</nav>
