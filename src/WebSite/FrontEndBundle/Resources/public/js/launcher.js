$(document).ready(function() {
    $('.bxslider').bxSlider();

    $("#rechercher").on("click", function() {
        $('#searchform-modal').modal();
    });
    $(".caret").on("click", function(event) {
        event.preventDefault();
        var element = $(this).parent().parent().children().eq(1);
        $(element).toggle();
        if ($(element).is(":visible"))
            $(this).addClass("caret2");
        else $(this).removeClass("caret2");
    });
    $(".showSubArticles").on("click", function(event) {
        event.preventDefault();
        var element = "#subArticles-" + $(this).attr('attr-id');
        $(element).toggle();
        if ($(element).is(":visible")) {
            $(this).removeClass("glyphicon-chevron-right");
            $(this).addClass("glyphicon-chevron-down");
        } else {
            $(this).removeClass("glyphicon-chevron-down");
            $(this).addClass("glyphicon-chevron-right");
        }
    });

    $(window).resize(function() {
        $(".dropdown-menu").removeAttr("style");
    });

});