$(document).ready(function () {
    // handle check all box when it is clicked

    $(document).on('click', 'input.check-all', function () {

        if ($('input.check-all:checked').length == 0) {
            // console.log($('input.check-all:checked').length);
            $('input[class="check-item"]:checkbox').each(function () {
                $(this).prop('checked', false);
            });
        } else {
            $('input[class="check-item"]:checkbox').each(function () {
                $(this).prop('checked', true);
            });
        }
    }); // end of check all items function

    $(document).on('click', '.delete-btn', function () {
        $('#delete-modal').fadeIn(400);

        var checkedRecords = $('input[class="check-item"]:checkbox').filter(':checked');
        console.log(checkedRecords.length);
        if (checkedRecords.length > 0) {
            $('.not-empty-record').removeClass('d-none');
            $('.delete-submit-btn').removeClass('disabled');
            $('.empty-record').addClass('d-none');
        } else {
            $('.not-empty-record').addClass('d-none');
            $('.delete-submit-btn').addClass('disabled');
            $('.empty-record').removeClass('d-none');
        }

        // close modal with escape key
        $(document).keydown(function (e) {
            e.keyCode == 27 ? $('#delete-modal').fadeOut(400) : '';
        });

        $('#close-modal').click(function () {
            $('#delete-modal').fadeOut(400);
        });
    });

});
