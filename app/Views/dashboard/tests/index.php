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
                        <li class="breadcrumb-item active">Tests </li>
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
                <h3 class="card-title">All Tests</h3>
                <a href="<?= site_url('dashboard/tests/create') ?>" class="btn btn-info float-right">add new Test</a>

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

                        <?php if( isset ($tests) && count($tests) > 0) : ?>

                        <?php foreach($tests as $index => $test) : ?>


                        <tr>
                            <td> <?= $index + 1 ?> </td>
                            <td><?= $test['name'] ?></td>

                            <td>
                                <div class="row d-flex ">
                                    
                                    <a href="<?= site_url('dashboard/tests/'.$test['id'].'/edit')?>"
                                        class="btn btn-warning mr-3"><i class="fa fa-edit"></i>edit</a> 
                                    <?= form_open(site_url('dashboard/tests/'.$test['id'].'/destroy'),['method'=>'post','class'=>'delete'])?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>  Delete</button>
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
               
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>


<?= $this->endSection() ?>