/*Loading
===============================*/
$(window).on("load", function () {
    "use strict";
    $(".loading .loading-content").fadeOut(function () {
        $(this).parent().fadeOut();
    });
});

/* Home Section
=============================*/
$(document).ready(function () {
    "use strict";
    function headerSize() {
        var fullH = $(window).innerHeight(),
            halfH = $(window).innerHeight() / 2,
            div = $(".center-height"),
            divHeight = $(".center-height").outerHeight(),
            imageHeight = $(".bottom-height").outerHeight(),
            divHalfHeight = divHeight / 2,
            centerDiv = halfH - divHalfHeight;
        $("#welcome-home").css({
            height: fullH
        });
    }
    headerSize();
    $(window).resize(function () {
        headerSize();
    });
});

/*Side menu
===================================*/
$(document).ready(function () {
    "use strict";
    $(".icon-bar").click(function () {
        $(".menu-links").toggleClass("in");
    });
});

/* Toggle Icon
==============================*/
$(document).ready(function () {
     "use strict";
     $(".toggle-icon").click(function () {
         $(".side-menu").toggleClass("side-menu-move");
         $(".dash-content").toggleClass("dash-content-move");
     });
});

/*Select
============================*/
$(document).ready(function () {
    "use strict";
    $('.tags').select2({
        tags: true,
        tokenSeparators: [',']
    });
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        minDate : 0
    });
});
