 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('/dashboard')?>" class="nav-link">Home</a>
      </li>
     
    </ul>


    <!-- Right navbar links  -->
    <?php if( auth_check()): ?>
      <ul class="navbar-nav mr-5">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('auth/logout') ?>"> Logout</a>
      </li>
     
    </ul>
    <?php  endif; ?>


  </nav>
  <!-- /.navbar -->