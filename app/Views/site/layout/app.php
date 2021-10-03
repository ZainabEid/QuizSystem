
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style scoped >
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')  ?>">
    
</head>
<body>
    <div class="container">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
      </li>
      <li class="nav-item d-none d-sm-inline-block ">
        <a href="<?= site_url('/home')?>" class="nav-link">Home</a>
      </li>
     
    </ul>


    <!-- Right navbar links  -->
    <?php if( auth_check()): ?>
    <ul class="navbar-nav ">
      
      <li class="nav-item d-none d-sm-inline-block mr-3 ">
      <a href="<?= site_url('site/user/profile') ?>" class="nav-link">Welcom <strong><?= ucfirst(auth_user()['name'])?></strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block ">
      <a class="nav-link" href="<?= site_url('auth/logout') ?>">| Logout</a>
      </li>
     
    </ul>
      
    <?php  endif; ?>


  </nav>
  <!-- /.navbar -->


        <?= $this->renderSection('content') ?>

    </div>
</body>
</html>

