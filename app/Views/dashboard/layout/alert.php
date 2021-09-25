<!-- alert  -->
<?php if(!empty(session()->getFlashdata('fail'))) : ?>
<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
<?php endif?>

<?php if(!empty(session()->getFlashdata('success'))) : ?>
<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif?>