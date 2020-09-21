document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#preloader").style.visibility = "visible";
    } else {
        document.querySelector("#preloader").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
};
$(document).ready(function() {
    if (jQuery(window).width() >= 992) {
        var num = 100; //number of pixels before modifying styles
        $(window).bind("scroll", function() {
            if ($(window).scrollTop() > num) {
                $("div.nav_wrapper").removeClass("absolute");
                $("div.nav_wrapper").addClass("fixed");
            } else {
                $("div.nav_wrapper").removeClass("fixed");
                $("div.nav_wrapper").addClass("absolute");
            }
        });
        $(".scrollbar992").slimScroll({});
    }

    function checkWidth() {
        var windowWidth = $(window).width();
        var windowHeight = $(window).height();
        var nav_cart = $(".nav_cart");
        // var nav_social = $('.nav_social');
        var nav_sign_in = $(".nav-sign-in-reg");
        // var nav_profile = $('.nav-profile');
        var nav_profile_icon = $(".nav-profile-icon");
        var nav_sign_out = $(".nav-sign-out");
        var nav_user_name = $(".nav-user-name");
        if (windowWidth <= 991) {
            // cartmenu
            $(".nav_cart").remove();
            $(".hamburg_icon").before(nav_cart);
            //   Sign in nav
            $(".nav-sign-in-reg").remove();
            $(".nav_main").before(nav_sign_in);
            //   Profile nav
            //   $('.nav-profile').remove();
            //   $('.hamburg_icon').before(nav_profile);
            //   Profile nav
            $(".nav-profile-icon").remove();
            $(".hamburg_icon").before(nav_profile_icon);
            //   social nav
            //   $('.nav_social').remove();
            //   $('.nav-sub-right').after(nav_social);
            // profile sign out link
            $(".nav-user-name").remove();
            $(".nav_main").prepend(nav_user_name);
            // profile sign out link
            $(".nav-sign-out").remove();
            $(".nav_main").append(nav_sign_out);
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);

    // enable popover
    $(function() {
        $('[data-toggle="popover"]').popover();
    });
});

$(".scrollbarAll").slimScroll({});