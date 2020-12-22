
// on page scroll down header background changes

$(function () {
    var screen = $(window).scrollTop();
    screen <= "1" && screen < "3000" ? $("#navbar-custom").removeClass("header-sticky") && $(".nav-link").addClass("custom-link") : $("#navbar-custom").addClass("header-sticky") && $(".nav-link").removeClass("custom-link"),
        $(window).scroll(function () {
            var screen = $(window).scrollTop();
            screen <= 10 ? $("#navbar-custom").removeClass("header-sticky") && $(".nav-link").addClass("custom-link") : screen > 10 && $("#navbar-custom").addClass("header-sticky") && $(".nav-link").removeClass("custom-link");;
        });
})