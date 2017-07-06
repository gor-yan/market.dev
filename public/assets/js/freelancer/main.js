$(document).ready(function () {
    function getSubcategories(categories) {
        $.ajax({
            url: baseUrl + '/subcategories',
            type: 'get',
            data: {
                categories: categories
            },
            dataType: 'json',
            success: function (response) {
                if (response.length > 0) {
                    $('.subcategories').show();
                    $('.submit-form').show();
                    $('.subcategories').html('');
                    $.each(response, function (index, elem) {
                        var str = '<div class="checkbox"><label><input type="checkbox" name="subcategories[]" value="'+ elem.id +'" aria-label="...">'+ elem.name + '</label></div>';
                        $('.subcategories').append(str);
                    });
                } else {
                    $('.submit-form').hide();
                    $('.subcategories').html('');
                }
            },
            complete: function () {
                if (window.categories) {
                   $(document).find('.subcategories').find('input').each(function () {
                       if($.inArray( $(this).attr('value'), window.categories ) != -1) {
                           $(this).prop('checked', true);
                       };
                   });
                }
            }
        });
    }
    getSubcategories($('#jobCategory').val());

    $('#jobCategory').change(function () {
        var self = $(this);
        getSubcategories(self.val());
    });
});