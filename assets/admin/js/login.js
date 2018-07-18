$('.login-form').on('submit' ,function () {
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : form.serialize(),
        success : function (response) {
            if (response.status === "success") {
                var alertSelector = '.SuccessMessage';
                var alertOpSelector = '.ErrorMessage';
            } else if (response.status === "error") {
                var alertSelector = '.ErrorMessage';
                var alertOpSelector = '.SuccessMessage';
            }
            $(alertSelector).html(response.data);
            $(alertSelector).hide().removeClass('hidden').fadeIn();
            setTimeout(function () {
                $(alertSelector).fadeOut().addClass('hidden');
            }, 3000);
            $(alertOpSelector).fadeOut().addClass('hidden');
            if (response.status === "success") {
                window.location.replace(response.url);
            }
        }
    });
    $.ajaxSetup({
        headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
    });
    return false;
});