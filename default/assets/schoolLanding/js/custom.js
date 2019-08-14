$(document).ready(function () {
    if ($(window).width() <= 800) {
        $(".first").find("p").show();
        $("#tabs-faq li a").click(function () {
            //$(this).hide();
            $(this).parents("li").find("p").slideToggle();
           $(this).parents("li").closest('li').siblings().find("p").slideUp();
        });
    }

});