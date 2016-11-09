$(document).ready(function () {
    $('#pays-id').on('change', function () {
        var paysId = $(this).val();
        if (paysId) {
            $.ajax({
                url: '/site.0.0.2/provinces/getByPays',
                data: 'pays_id=' + paysId,
                success: function (html) {
                    $('#province-id').html(html);
                }
            });
        } else {
            $('#provinces-id').html('<option value="">Select Country first</option>');
        }
    });
});
