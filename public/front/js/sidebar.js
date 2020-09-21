// check while any element display in view port while scrolling
function isOnScreen(elem) {
    // if the element doesn't exist, abort
    if (elem.length == 0) {
        return;
    }
    var $window = jQuery(window);
    var viewport_top = $window.scrollTop();
    var viewport_height = $window.height();
    var viewport_bottom = viewport_top + viewport_height;
    var $elem = jQuery(elem);
    var top = $elem.offset().top;
    var height = $elem.height();
    var bottom = top + height;

    return (
        (top >= viewport_top && top < viewport_bottom) ||
        (bottom > viewport_top && bottom <= viewport_bottom) ||
        (height > viewport_height &&
            top <= viewport_top &&
            bottom >= viewport_bottom)
    );
}
// $(document).ready(function() {
var menu_bar_height = $(".nav_wrapper").height();
var side_bar_width = $(".aside").width();
if (jQuery(window).width() >= 992) {
    var num = 100; //number of pixels before modifying styles
    $(window).bind("scroll", function() {
        if ($(window).scrollTop() > num) {
            $("#aside").addClass("fixed");
            $("#aside").css("marginTop", menu_bar_height);
            $(".main-aside").css("marginLeft", side_bar_width);

            /* Pass element id/class you want to check while scroll*/
            if (isOnScreen($("footer"))) {
                // alert("The specified container is in view.");
                $("#aside").removeClass("fixed");
                $("#aside").addClass("absolute").css("marginTop", 90);
                $(".main-aside").css("marginLeft", side_bar_width);
            } else {
                $("#aside").removeClass("absolute");
                $("#aside").addClass("fixed");
            }
        } else {
            $("#aside").removeClass("absolute");
            $("#aside").removeClass("fixed");
            $(".main-aside").css("marginLeft", 0);
        }
    });
}
// });
if (jQuery(window).width() <= 991) {
    // patient sidebar
    $("#open_sidebar_btn").click(function() {
        $("#aside").show();
    });
    $("#close_sidebar_btn").click(function() {
        $("#aside").hide();
    });
}