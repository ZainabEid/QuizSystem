$(document).ready(function () {
    $('body').on('click', '#add-new-question', function (e) {
        e.preventDefault();
        alert('document is readey');


        var questions_count = $('#questions').children().length;
        var url = 'dashboard/tests/question/' + questions_count;

        console.log('questions counts is: ', questions_count);
        $.ajax({
            type: "get",
            url: "<?php echo site__url();?>dashboard/tests/question/"+ questions_count,
            success: function (new_question) {
                $('#questions').append(new_question);
            }
        });
    });
});