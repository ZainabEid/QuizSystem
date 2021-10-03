<?=  $this->extend('site/layout/app') ?>

<?= $this->section('content') ?>


<div class="content">
    <div class="row justify-content-center" style="margin-top: 45px;">
        <div class="col-md-8 col-md-offset-4 ">

            <h5> Update My Data</h5>
            <br>

            <hr>
            <form action="<?= base_url('site/user/update')?>" method="post">

                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT" />




                <!-- name  -->
                <div class="form-group mt-3">
                    <label for="email">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                        value="<?=  isset( auth_user()['name'] ) ? auth_user()['name'] : set_value('name')?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : '' ?></span>
                </div>

                <!-- email  -->
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                        value="<?=  isset(auth_user()['email']) ? auth_user()['email'] : set_value('email')?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>

                </div>

                <!-- password  -->
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation,'password') : '' ?></span>

                </div>

                <!-- password confirmation  -->
                <div class="form-group mt-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation"
                        placeholder="Enter your password again">
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation,'password_confirmation') : '' ?></span>

                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary btn-block" type="submit">update</button>
                </div>

                <br>


            </form>

        </div>

    </div>

</div>


<?= $this->endSection() ?>