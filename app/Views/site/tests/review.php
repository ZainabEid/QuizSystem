<?=  $this->extend('site/layout/app') ?>

<?= $this->section('content') ?>


<div class="content">
    <div class="row justify-content-center" style="margin-top: 45px;">
        <div class="col-md-8 col-md-offset-4">

            <!-- test name  -->
            <h5>Take Test : <strong><?= $test['name']?></strong></h5>
            <br>

            <h5>Grade : <strong><?= $report['grade']?></strong></h5>
            <br>
            
            <!-- questions  -->
            <?php foreach($test['questions'] as $index => $question) :?>
                    <hr/>

                <!-- question  -->
                <label for="question">Question <?= $index + 1 ?> : </label>
                <label for="question"> <?= $question['body'] ?> </label>
                <br/>

                <!-- answers  -->
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" 
                        value="1"  <?=  $report['details'][$index]['user_answer']  == 1 ? :'checked' ?>>
                    <label class="form-check-label" for="inlineRadio1"><?= $question['answer1']?></label>
                
                </div>
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" 
                        value="2" <?=  $report['details'][$index]['user_answer']  == 2 ? :'checked' ?>>
                    <label class="form-check-label" for="inlineRadio2"><?= $question['answer2']?></label>
                    <?php if($report['details'][$index]['user_answer']  == 2 ) : ?>
                        <?php if( $report['details'][$index]['is_right'] ) :?>
                            <i class="fas fa-check"></i>
                            <?else:?>
                                <i class="fas fa-x"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]"  
                    value="3" <?=  $report['details'][$index]['user_answer']  == 3 ? :'checked' ?>>
                    <label class="form-check-label" for="inlineRadio3"><?= $question['answer3']?></label>
                </div>
                <div class="form-check form-check-inline">
                    <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]"  
                    value="4" <?=  $report['details'][$index]['user_answer']  == 4 ? :'checked' ?>>
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