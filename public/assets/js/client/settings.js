$(document).ready(function () {
    $('#sub_categories').select2({
        placeholder: "Select a Sub Category",
        maximumSelectionLength: 10
        //data: this.subCatdata
    });
    $('#categories').select2({
        placeholder: "Select a Category",
        maximumSelectionLength: 3
    });
    $('#skills').select2({
        placeholder: "Select a Skill",
        maximumSelectionLength: 10,
    });

    $(document).find('.validateWithData').each(function () {
        if ($(this).data('has-error')) {
            $(this).next('span').find('.select2-selection').addClass('has-error');
        }
    });

    $('.hourly').change(function () {
        if ($(this).prop('checked') && $(this).val() == 'hourly') {
            $('#hourly_limit').removeClass('hidden');
        } else {
            $('#hourly_limit').addClass('hidden');
        }
    });

    $('.hourly').each(function () {
        if ($(this).prop('checked') && $(this).val() == 'hourly') {
            $('#hourly_limit').removeClass('hidden');
        }
    });


    $('#client_posted_jobs').DataTable();
    $('#job_proposals').DataTable();


});