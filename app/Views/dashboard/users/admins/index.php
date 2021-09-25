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
                        <li class="breadcrumb-item active">All admins </li>
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
                <h3 class="card-title">All Admins</h3>
                <a href="<?= site_url('dashboard/users/admins/create') ?>" class="btn btn-info float-right">add new admin</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <!-- alerts   -->
            <?= $this->include('dashboard/layout/alert') ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if( isset ($admins) && count($admins) > 0) : ?>

                        <?php foreach($admins as $index => $admin) : ?>


                        <tr>
                            <td> <?= $index + 1 ?> </td>
                            <td><?= $admin['name'] ?></td>

                            <td>
                                <div class="row d-flex">
                                    
                                    <a href="<?= site_url('dashboard/users/admins/'.$admin['id'].'/edit')?>"
                                        class="btn btn-warning mr-3">edit</a>
                                    <?= form_open(site_url('dashboard/users/admins/'.$admin['id'].'/destroy'),['method'=>'post','class'=>'delete'])?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?');">Delete</button>
                                    <?= form_close() ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>


                        <?php else: ?>
                        <tr>
                            <td colspan="7">
                                <p> there is not data</p>
                            </td>
                        </tr>

                        <?php endif; ?>



                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <!-- paginataion links / -->
                <!-- <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul> -->
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>


<?= $this->endSection() ?>