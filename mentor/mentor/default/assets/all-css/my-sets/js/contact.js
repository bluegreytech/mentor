


    // ---------------------------------------------------------------------------------------------------------------------------->
// MAP ELEMENT  ||-----------
// ---------------------------------------------------------------------------------------------------------------------------->


// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
    // Basic options for a simple Google Map
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 16,
        scrollwheel: false, //set to true to enable mouse scrolling while inside the map area

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(28.674019,77.1333), // Taxmann

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(28.674019,77.1333),
        map: map,
        title: 'MINDLER',
        icon: window.location.origin+'/assets/prelogin/img/map-marker.png'

    });
};


(function ($) {

    "use strict";

    
    var baseurl = window.location.origin+"/";
    
    /* =================================
    ===  CONTACT FORM               ====
    =================================== */
    $("#contact").submit(function (e) {
        e.preventDefault();
        var name = $("#form-name").val();
        var email = $("#form-email").val();
        var subject = 'Contact Us';
        var contact = $("#form-subject").val();
        var message = $("#form-message").val();
        //var dataString = 'name=' + name + '&email=' + email + '&subject=' + subject + '&message=' + message +'&contact=' + contact;
        var data = $('form.contact-form').serialize();
        function validEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

       if (validEmail(email) && (message.length > 1) && (name.length > 1)) {
           $("div.overlay-box").css("display", "block");
            $.ajax({
                type: "POST",
                url: baseurl+"prelogin/pricingHelpForm",
                data: {'data':data},
                success: function () {
                    $("div.overlay-box").css("display", "none");
                    $('.successContent').fadeIn(1000);
                    alertify.alert('<p style="color:#000">Your message has been sent successfully.</p>');
                    $("#contact")[0].reset();
                }
            });
        }
        else {
            $('.errorContent').fadeIn(1000);
            alertify.alert('<p style="color:#000">There was a problem validating the form please check!</p>');
        }
        return false;
    });



  
})(jQuery);
