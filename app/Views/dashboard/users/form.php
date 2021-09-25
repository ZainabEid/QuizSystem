

<!-- name  -->
<div class="form-group mt-3">
    <label for="email">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?=  isset($user['name']) ? $user['name'] : set_value('name')?>">
    <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : '' ?></span>
</div>

<!-- email  -->
<div class="form-group mt-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter your email"
    value="<?=  isset($user['email']) ? $user['email'] : set_value('email')?>">
    <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>

</div>

<!-- password  -->
<div class="form-group mt-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your password">
    <span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : '' ?></span>

</div>

<!-- password confirmation  -->
<div class="form-group mt-3">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your password again">
    <span class="text-danger"><?= isset($validation) ? display_error($validation,'password_confirmation') : '' ?></span>

</div>