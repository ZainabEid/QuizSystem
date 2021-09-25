<?=  $this->extend('site/layout/app') ?>

<?= $this->section('content') ?>


<div class="content">
    <div class="row justify-content-center" style="margin-top: 45px;">
        <div class="col-md-8 col-md-offset-4">

            <h5>Choose Test</h5>
            <br>


            <?php foreach($tests as $test) :?>

            <div class="d-inline p-2 m-2 bg-primary " style="width: 100px; height: 100px; border: solid 1px darkblue;">
                <a style=" text-decoration  : none;" class="text-white" href="<?= site_url('site/tests/'.$test['id'].'/take') ?>"> <?= $test['name']?></a>
            </div>


            <?php endforeach; ?>

        </div>

    </div>

</div>


<?= $this->endSection() ?>