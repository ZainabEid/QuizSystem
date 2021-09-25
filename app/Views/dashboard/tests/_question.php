<div class="question">
    <hr>
   

    <!-- question id for edit -->
    <?php if( isset($test) && isset($test['qusetions'][$index])) : ?>
        <input type="hidden" name="questions[<?= $index ?>][id]" value="<?= $test['questions'][$index]['id'] ?>">
    <?php endif; ?>

    <!-- question body -->
    <div class="form-group mt-3">
        <label for="questions[<?= $index ?>][body]">Question <?= $index+1 ?></label>
        <input type="text" class="form-control" name="questions[<?= $index ?>][body]" placeholder="Enter a question"
            value="<?=  isset($test['questions'][$index]['body']) ? $test['questions'][$index]['body'] : set_value('questions[ '.$index. '][body]')?>">
        <span
            class="text-danger"><?= isset($validation) ? display_error($validation,'questions['. $index.'][body]') : '' ?></span>

    </div>

    <!-- answers -->
    <?php for ($i=1 ; $i<=4; $i++): ?>
    <div class="form-group mt-3">
        <label for="questions[<?= $index ?>][answer<?= $i ?>]"> Answer <?= $i ?></label>
        <input type="text" class="form-control" name="questions[<?= $index ?>][answer<?= $i ?>]"
            placeholder="Enter the answer <?= $i  ?>"
            value="<?=  isset($test['questions'][ $index ]['answer'.$i]) ? $test['questions'][$index]['answer'.$i] : set_value('questions['.$index.'][answer'.$i.']') ?>">

        <span
            class="text-danger"><?= isset($validation) ? display_error($validation,'questions['.$index .'][answer'.$i.']') : '' ?></span>
    </div>

    <?php endfor; ?>

    <!-- correct answer  -->
    <div class="form-group mt-3">

        <?php $selected_answer = isset($test['questions'][$index]['correct_answer']) ?
        $test['questions'][$index]['correct_answer'] : set_value('questions['. $index.'][correct_answer]')?>

        <label for="questions[<?= $index ?>][correct_answer]"> Correct Answer </label>

        <select class="form-control" aria-label="Default select example"
            name="questions[<?= $index ?>][correct_answer]">

            <option <?= isset($selected_answer) ? "": 'selected'  ?> selected>select the correct answer</option>
          
            <option <?= isset($selected_answer) && $selected_answer == 1 ? "selected": ''  ?> value="1">Answer 1
            </option>
            <option <?= isset($selected_answer) && $selected_answer == 2 ? "selected": ''  ?> value="2">Answer 2
            </option>
            <option <?= isset($selected_answer) && $selected_answer == 3 ? "selected": ''  ?> value="3">Answer 3
            </option>
            <option <?= isset($selected_answer) && $selected_answer == 4 ? "selected": ''  ?> value="4">Answer 4
            </option>

        </select>

        <span
            class="text-danger"><?= isset($validation) ? display_error($validation,'questions[<?= $index ?>][correct_answer]')
            : '' ?></span>

    </div>
    <br>
</div>