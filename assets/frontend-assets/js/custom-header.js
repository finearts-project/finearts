$(function() {
    var viewPort = $(window).scrollTop();
    viewPort <= "1" && viewPort < "3000" ?
        $("#navbar-custom").addClass("bg-custom") :
        $("#navbar-custom").removeClass("bg-custom"),
        $(window).scroll(function() {
            var o = $(window).scrollTop();
            o <= 10 ?
                $("#navbar-custom").addClass("bg-custom") :
                o > 10 && $("#navbar-custom").removeClass("bg-custom");
        });
});