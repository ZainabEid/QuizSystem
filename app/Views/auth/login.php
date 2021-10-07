<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')  ?>">
</head>

<body>

    <div class="container h-100 ">

        <div class="row justify-content-center  " style="margin-top: 45px;">
            <div class="col-md-4 col-md-offset-4 ">
                <h4> Sign In</h4>
                <hr>
                <form action="<?= base_url('auth/check')?>" method="post">
                    <?= csrf_field() ?>

                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif?>

                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif?>


                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email"
                            value="<?= set_value('email')?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>

                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password"
                            value="<?= set_value('password')?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'password') : '' ?></span>

                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-block" type="submit">Sign In</button>
                    </div>

                    <br>

                    <a href="<?= site_url('auth/register') ?>">Have no account , create new account</a>


                </form>
            </div>
            <br>
            <div class="col-md-4 col-md-offset-4 ">

                <h4>  Credentials</h4>
                <hr>
               <div class="row">
                   <h5>Login as admin:  </h5>
                   <p> <strong>email:</strong>  "super_teacher@quizsystem.com"</p>
                   <p> <strong>password:</strong> "password"</p>
                   <br>

               </div>

               <hr>

               <div class="row">
                   <h5>Login as student:  </h5>
                   <p> <strong>email:</strong>  "sarah_mossa@gmail.com"</p>
                   <p> <strong>password:</strong> "password"</p>
                   <br>

               </div>
               <hr>
            </div>

        </div>
    </div>

</body>

</html>