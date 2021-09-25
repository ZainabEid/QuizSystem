<?=  $this->extend('dashboard/layout/app') ?>

<?= $this->section('content') ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title ">My Profile</h3>
                <a href="<?= site_url('dashboard/users/admins/'.auth_user()['id'].'edit') ?>" class="btn btn-info float-right">Edit
                    my profile</a>

            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <!-- alerts   -->
                <?= $this->include('dashboard/layout/alert') ?>

                <div class="col-4 d-flex  justify-content-center">
                    <div class="row">

                        <h5><strong>Name:</strong> </h5> <?= auth_user()['name']?>
                    </div>

                    
                    <div class="row">


                        <h5> <strong> Email:</strong></h5> <span><?= auth_user()['email']?></span>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card -->

</div>
<!-- /.row -->

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


<?= $this->endSection() ?>