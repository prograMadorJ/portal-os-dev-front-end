$('input[name="search_media"]').on('keyup', function() {
    var value = $(this).val();
    var field_name = $(this).data('field-name');
    $.ajax({
        method: 'GET',
        url: '/site-admin/media/filter?search_media='+value+'&field_name='+field_name,
        success: function(data) {
            $('#search_'+field_name).html(data);
        }
    });
});
