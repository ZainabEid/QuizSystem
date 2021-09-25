<?=  $this->extend('site/layout/app') ?>

<?= $this->section('content') ?>


<div class="content">
    <div class="row justify-content-center" style="margin-top: 45px;">
        <div class="col-md-8 col-md-offset-4">

            <!-- test name  -->
            <h5>Take Test : <strong><?= $test['name']?></strong></h5>
            <br>

          
             
            <!-- form start  -->
            <form action="<?= site_url('site/tests/'.$test['id'].'/check') ?>" method="post">
        

            <?= csrf_field() ?>

            <span class="text-danger"><?= isset($validation) ? 'please answer questions' : '' ?></span>
       
            <br/>
            <br/>

            <!-- questions  -->
            <?php foreach($test['questions'] as $index => $question) :?>

                <?php if($index > 0) : ?>
                    <hr/>
                <?php endif; ?>

                <!-- question  -->
                <label for="question">Question <?= $index + 1 ?> : </label>
                <label for="question"> <?= $question['body'] ?> </label>
                <br/>

                <!-- answers  -->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" 
                        value="1">
                    <label class="form-check-label" for="inlineRadio1"><?= $question['answer1']?></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" 
                        value="2">
                    <label class="form-check-label" for="inlineRadio2"><?= $question['answer2']?></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]"  
                    value="3">
                    <label class="form-check-label" for="inlineRadio3"><?= $question['answer3']?></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]"  
                    value="4">
                    <label class="form-check-label" for="inlineRadio3"><?= $question['answer4']?></label>
                </div>


            <?php endforeach; ?>

            <br/>
            <br/>   

            <div class="form-group">
                <button type="submit" class="btn btn-success " > Submit Answers </button>
            </div>




            </form>
            <!-- form end  -->
        </div>

    </div>

</div>


<?= $this->endSection() ?>