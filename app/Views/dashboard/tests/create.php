<?=  $this->extend('dashboard/layout/app') ?>

<?= $this->section('content') ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New test</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">add new test</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">


                <div class="container h-100 ">

                    <div class="row justify-content-center  " style="margin-top: 45px;">
                        <div class="col-md-8 col-md-offset-4 ">
                            <h4> Add new test</h4>
                            <hr>
                            <form action="<?= base_url('dashboard/tests/store')?>" method="post">

                                <?= csrf_field() ?>


                                <?=  $this->include('dashboard/tests/_form') ?>






                                <div class="form-group mt-3">
                                    <button class="btn btn-primary btn-block" type="submit">save</button>
                                </div>

                                <br>


                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?= $this->endSection() ?>
