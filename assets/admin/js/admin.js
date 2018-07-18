$('.submitBTN').on('click' ,function () {
    var form = $(this).closest('form');
    var url = form.attr('action');

    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : new FormData(form[0]),
        contentType:false,
        cache: false,
        processData:false,
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
            if (response.url) {
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


/**
 break button
 */
$('.BreakoutBTN').on('click' ,function () {

   var url = $(this).data('url');

   $.ajax({
         url : url,
         method : "POST",
         dataType: "json",
         data : {_token : $(this).data('token')},
         success : function (response) {
             if (response.status === "success") {
                 var alertSelector = '.SuccessMessage';
                 var alertOpSelector = '.ErrorMessage';
             } else if (response.status === "error") {
                 swal('error', response.data, 'error');
             }
             $(alertSelector).html(response.data);
             $(alertSelector).hide().removeClass('hidden').fadeIn();
             setTimeout(function () {
                 $(alertSelector).fadeOut().addClass('hidden');
             }, 3000);
             $(alertOpSelector).fadeOut().addClass('hidden');
             if (response.url) {
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

/**
 break button
 */
$('#EndBreakBTN').on('click' ,function () {
    var url = $(this).data('url');

    $.ajax({
        url : url,
        method : 'POST',
        dataType: 'json',
        data : {_token : $(this).data('token')},
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
            if (response.url) {
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


////Delete method
$('.deleteBTN').on('click' ,function () {
    var url = $(this).data('url');

    var button = $('.modalDLTBTN');

    button.attr('href' ,url);
});