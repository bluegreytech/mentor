// Content Contact Form
// ---------------------------------------------------------------------------------------
$(function () {
    $("#af-form .form-control").tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
    $('#af-form .form-control').blur(function () {
        $(this).tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
    });

    $("#af-form #submit_btn").click(function () {
        // validate and process form
        // first hide any error messages
        $('#af-form .error').hide();

        var name = $("#af-form input#name").val();
        if (name == "" || name == "Name...." || name == "Name" || name == "Name *" || name == "Type Your Name...") {
            $("#af-form input#name").tooltip({placement: 'bottom', trigger: 'manual'}).tooltip('show');
            $("#af-form input#name").focus();
            return false;
        }
        var email = $("#af-form input#email").val();
        //var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
        //console.log(filter.test(email));
        if (!filter.test(email)) {
            $("#af-form input#email").tooltip({placement: 'bottom', trigger: 'manual'}).tooltip('show');
            $("#af-form input#email").focus();
            return false;
        }
        var message = $("#af-form #input-message").val();
        if (message == "" || message == "Message...." || message == "Message" || message == "Message *" || message == "Type Your Message...") {
            $("#af-form #input-message").tooltip({placement: 'bottom', trigger: 'manual'}).tooltip('show');
            $("#af-form #input-message").focus();
            return false;
        }

        var dataString = 'name=' + name + '&email=' + email + '&message=' + message;
        //alert (dataString);return false;

        $.ajax({
            type:"POST",
            url:"assets/php/contact-form.php",
            data:dataString,
            success:function () {
                $('#af-form').prepend("<div class=\"alert alert-success fade in\"><button class=\"close\" data-dismiss=\"alert\" type=\"button\">&times;</button><strong>Contact Form Submitted!</strong> We will be in touch soon.</div>");
                $('#af-form')[0].reset();
            }
        });
        return false;
    });
});


var base_url = window.location.origin + '/';
// Content Registration Form
// ---------------------------------------------------------------------------------------
$(function () {

    var $form = $('#registration-form');
    $form.find('.form-control').tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
    $form.find('.form-control').on('blur', function(){
        $(this).tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
    });

    // validate and process form
    $form.find('.submit-button').on('click', function () {

        // Name
        var name = $form.find('.input-name').val();
        if (name == '' || name == 'Name....' || name == 'Name' || name == 'Name *' || name == 'Type Your Name...' || name == 'Name and Surname') {
            $form.find('.input-name').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-name').focus();
            return false;
        }

        var designation = $form.find('.input-designation').val();
        if (designation == '' || designation == 'Designation') {
            $form.find('.input-designation').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-designation').focus();
            return false;
        }


        var school = $form.find('.input-school').val();
        if (school == '' || school == 'school') {
            $form.find('.input-school').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-school').focus();
            return false;
        }

        // Email address
        var email = $form.find('.input-email').val();
        //var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
        //console.log(filter.test(email));
        if (!filter.test(email)) {
            $form.find('.input-email').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-email').focus();
            return false;
        }

        // Phone number
        var numeric = /^[0-9-+]+$/;
        var phone = $form.find('.input-phone').val();
        /*if (phone == 'Your Phone Number') {
            phone = '';
        }*/
        //alert(phone.length);
        if(phone.length!=10){
            //$('.input-phone').attr("data-original-title", 'Please enter valid mobile number');
            $form.find('.input-phone').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-phone').focus();
            return false;
        }else if(!numeric.test(phone)){
            $('.input-phone').attr("data-original-title", 'Please enter valid mobile number');
            $form.find('.input-phone').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-phone').focus();
        }

        

        var dataString = 'name=' + name + '&email=' + email + '&mobile=' + phone + '&designation=' + designation + '&school='+school;
        
        if(dataString){
            $("#home .overlay-box").css("display", "block");
            $.ajax({
                type: 'POST',
                url: base_url+'prelogin/schoolLanding',
                data: dataString,
                success: function (response) {
                    var json = $.parseJSON(response);
                    $("#home .overlay-box").css("display", "none");
                    if(json.status==200){
                        $(".before-thankyou").hide();
                        $('.after-thankyou').append('<div class="container"><p style="font-size:18px;">Thank you for your interest in the Mindler Career Guidance Program for Schools.</p><p style="font-size:18px;margin-bottom: 0;">Our team members will get in touch with you shortly to assist you with the process.</p></div>');
                        $(".after-thankyou").show();
                        $form[0].reset();
                        $form.find('.form-control').focus().blur();
                    }
                }
            });
            return false;
        }
    });

});

// Slider Registration Form
// ---------------------------------------------------------------------------------------
$(function () {

    var $form = $('#registration-form-alt');
    $form.find('.form-control').tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
    $form.find('.form-control').on('blur', function(){
        $(this).tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
    });

    // validate and process form
    $form.find('.submit-button').on('click', function () {

        // Name
        var name = $form.find('.input-name').val();
        if (name == '' || name == 'Name....' || name == 'Name' || name == 'Name *' || name == 'Type Your Name...' || name == 'Name and Surname') {
            $form.find('.input-name').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-name').focus();
            return false;
        }

        // Email address
        var email = $form.find('.input-email').val();
        //var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
        //console.log(filter.test(email));
        if (!filter.test(email)) {
            $form.find('.input-email').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-email').focus();
            return false;
        }

        // Phone number
        var phone = $form.find('.input-phone').val();
        if (phone == 'Your Phone Number') {
            phone = '';
        }

        // Price list
        var price = $form.find('.input-price').val();
        if (price == '' || price == 'Select Your Price Tab') {
            $form.find('.input-price').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
            $form.find('.input-price').focus();
            return false;
        }
        else {
            $form.find('.input-price').tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
        }

        var dataString = 'name=' + name + '&email=' + email + '&phone=' + phone + '&price=' + price;
        //alert(dataString); return false;

        $.ajax({
            type: 'POST',
            url: 'assets/php/registration-form.php',
            data: dataString,
            success: function () {
                $form.find('.form-alert').append('' +
                '<div class=\"alert alert-success registration-form-alert fade in\">' +
                '<button class=\"close\" data-dismiss=\"alert\" type=\"button\">&times;</button>' +
                '<strong>Registration Form Submitted!</strong> We will be in touch soon.' +
                '</div>' +
                '');
                $form[0].reset();
                $form.find('.form-control').focus().blur();
            }
        });
        return false;
    });

});