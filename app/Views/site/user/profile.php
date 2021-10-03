<?=  $this->extend('site/layout/app') ?>

<?= $this->section('content') ?>


<div class="content">
    <div class="row justify-content-center" style="margin-top: 45px;">
        <div class="col-md-8 col-md-offset-4 ">

            <h5>My Profile</h5>
            <br>



            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title ">My Profile</h3>
                    <a href="<?= site_url('site/user/edit') ?>"
                        class="btn btn-info float-right ">
                        Edit my profile
                    </a>

                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <!-- alerts   -->
                    <?= $this->include('dashboard/layout/alert') ?>

                    <div class="col ">

                        <div class="row">
                            <h5><strong>Name:</strong> </h5> <span>  <?= auth_user()['name']?> </span>
                        </div>


                        <div class="row">
                            <h5> <strong> Email:</strong></h5> <span> <?= auth_user()['email']?> </span>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.card -->

        </div>

    </div>

</div>


<?= $this->endSection() ?>