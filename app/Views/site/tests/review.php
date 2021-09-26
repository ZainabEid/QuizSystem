<?=  $this->extend('site/layout/app') ?>



<?= $this->section('content') ?>


<div class="content">
    <div class="row justify-content-center" style="margin-top: 45px;">
        <div class="col-md-8 col-md-offset-4"> 

            <!-- test name  -->
            <div class="d-flex justify-content-between">

                <h5><strong><?= $test['name']?> Report</strong></h5>
                <button id="printPageButton" class="btn btn-primary float-right " onclick="window.print();"> print </button>
            </div>
            <br>

            <!-- grade  -->
            <h5>Grade : <strong><?= $report['grade']?> %</strong></h5>
            <br>

            <!-- questions  -->
            <?php foreach($test['questions'] as $question_index => $question) :?>
            <hr />

            <!-- question  body -->
            <label for="question">Question <?= $question_index + 1 ?> : </label>
            <label for="question"> <?= $question['body'] ?> </label>
            <label for="question" class="text-success ml-3">
                The correct answer is :
                <strong><?= $question['answer'.$question['correct_answer']] ?></strong>
            </label>

            <br />


            <!-- answer 1  -->
            <div class="form-check form-check-inline">
                <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" value="1"
                    <?=  ($report['details'][$question_index]['user_answer']  == 1) ? 'checked' : ''?>>
                <label class="form-check-label" for="inlineRadio1"><?= $question['answer1']?></label>

                <!-- correction  -->
                <?php if($report['details'][$question_index]['user_answer']  == 1 ) : ?>

                <?php if( $report['details'][$question_index]['is_right'] ) :?>
                <i class="fa fa-check text-success" aria-hidden="true"></i>
                <?php else:?>
                <i class="fa fa-times   text-danger"></i>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- answer 2  -->
            <div class="form-check form-check-inline">

                <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" value="2"
                    <?=  $report['details'][$question_index]['user_answer']  == 2 ? 'checked':"" ?>>
                <label class="form-check-label" for="inlineRadio2"><?= $question['answer2']?></label>

                <!-- correction  -->
                <?php if($report['details'][$question_index]['user_answer']  == 2 ) : ?>

                <?php if( $report['details'][$question_index]['is_right'] ) :?>
                <i class="fa fa-check text-success" aria-hidden="true"></i>
                <?php else:?>
                <i class="fa fa-times   text-danger"></i>
                <?php endif; ?>
                <?php endif; ?>

            </div>


            <!-- answer 3  -->
            <div class="form-check form-check-inline">
                <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" value="3"
                    <?=  $report['details'][$question_index]['user_answer']  == 3 ? 'checked':'' ?>>
                <label class="form-check-label" for="inlineRadio3"><?= $question['answer3']?></label>

                <!-- correction  -->
                <?php if($report['details'][$question_index]['user_answer']  == 3 ) : ?>
                <?php if( $report['details'][$question_index]['is_right'] ) :?>

                <i class="fa fa-check text-success" aria-hidden="true"></i>
                <?php else:?>
                <i class="fa fa-times   text-danger"></i>
                <?php endif; ?>
                <?php endif; ?>
            </div>


            <div class="form-check form-check-inline">
                <input disabled class="form-check-input" type="radio" name="questions[<?= $question['id'] ?>]" value="4"
                    <?=  $report['details'][$question_index]['user_answer']  == 4 ? 'checked':'' ?>>
                <label class="form-check-label" for="inlineRadio3"><?= $question['answer4']?></label>


                <!-- correction  -->
                <?php if($report['details'][$question_index]['user_answer']  == 4 ) : ?>

                <?php if( $report['details'][$question_index]['is_right']  ) :?>
                <i class="fa fa-check text-success" aria-hidden="true"></i>
                <?php else:?>
                <i class="fa fa-times   text-danger"></i>
                <?php endif; ?>
                <?php endif; ?>
            </div>


            <?php endforeach; ?>

            <br />
            <br />

           




            </form>
            <!-- form end  -->
        </div>

    </div>

</div>


<?= $this->endSection() ?>