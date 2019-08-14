var baseUrl = window.location.origin + '/';
 /*Country Preferences Modal*/
  var ckbox = $('#others-country-checkbox');
  var countryArray = new Array();
  $("#overseas-div input[type='checkbox']").on("click", function (e) {
    var value = $(this).val();
    if($(this).is(':checked') && $(this).val()!='other'){
      countryArray.push(value);
    }else if($(this).val()!='other'){
      countryArray.splice($.inArray(value, countryArray),1);
    }
  });

  $('#others-country-checkbox').on('click',function () {
        if(ckbox.is(':checked')) {
           $('#others-country').show();
        }else{
          $('#others-country ul.select2-choices li').each(function(i){
             $(this).find('a').click();
          });
          //$("#others-country ul.select2-choices  li").not('li:last').remove();
          $('#others-country').hide();
        }
    });

  var indArr = '';
  $("#country-select").modal('show');
  $("#country-select .country-box").on("click", function (e) {
        e.preventDefault();
        $('#others-country').hide();
        $('#others-country ul.select2-choices li').each(function(i){
             $(this).find('a').click();
          });
        $("#country-select .modal-content.before .btn-warning ").attr('data-id','cntry');
        $(this).parents("#country-select").find(".error").remove(); // remove it
        var countryIndex = $(this).parents(".col-md-4").index();
        indArr = '';
        countryArray=[];
        $(".modal-content.after #replace-msge").empty();
        $(".modal-content.after #replace-msge").append('Your response has been recorded.');
        $("input[name='overseas']").prop('checked',false);
        if(countryIndex==0) {
          indArr = 'India';
        }else if(countryIndex==2) {
          indArr = 'Not sure yet';
          $(".modal-content.after #replace-msge").empty();
          $(".modal-content.after #replace-msge").append('You can edit your preference from my roadmap page');

        }

        $(this).parents("#country-select").find(".country-box").removeClass("active");
        $(this).addClass("active");

        $(this).parents("#country-select").find(".country-prefrences .checklist").hide();
        $(this).parents("#country-select").find(".country-prefrences .checklist").eq(countryIndex).show();

    });

    $("#country-select .modal-content.before #s2example-2 ").on("change", function (e) {
      $(this).parents("#country-select").find(".error").remove(); // remove it
    });

    $("#country-select .modal-content.before .btn-warning ").on("click", function (e) {
        e.preventDefault();
        
        $(this).parents("#country-select").find(".error").remove(); // remove it
        var country = [];
        country = $("#s2example-2").val();
        var fields = $("input[name='overseas']").serializeArray(); 
        var isClicked = $(this).attr('data-id');
        
        
        if(!isClicked){
          $("#country-continue-btn").before('<label class="error" style="margin:0px; padding:0px; font-size:11px;">Please select your country.</label>');
          return false;
        } else if (fields.length == 0 && $("#overseas-div").is(":visible")) 
        { 
          $("#country-continue-btn").before('<label class="error" style="margin:0px; padding:0px; font-size:11px;">Please select your country.</label>');
          return false;
        }
        else if (ckbox.is(':checked') && !country && $("#overseas-div").is(":visible")) {
          $("#country-continue-btn").before('<label class="error" style="margin:0px; padding:0px; font-size:11px;">Please select your country.</label>');
        }else{
          var newdata = '';
          if(indArr){
            newdata = new Array(indArr);
          }
          else if(country && ckbox.is(':checked')){
            //countryArray.push(country);
            //country.push(countryArray);
            newdata = countryArray.concat(country);
          }else{
            newdata = countryArray;
          }
          
          if (newdata){
              $.ajax({
                  url: baseUrl+"assess/updateCountry",
                  type: "post",
                  data: {'country': newdata},
                  success: function (response) {
                      /*var json = $.parseJSON(response);
                       if(json.status=="1"){
                         $(this).parents(".my-tab-function").find("ul #education-tab").click();
                       }*/
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }
          $("#country-select .modal-content.before").hide();
          $("#country-select .modal-content.after").show();
        }
    });

   /*End Country Preferences Modal*/

/**
 * Delete a cookie
 * @param {String} cname, cookie name
 */
function deleteCookie(cname) {
    var d = new Date(); //Create an date object
    d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
    var expires = "expires=" + d.toGMTString(); //Compose the expirartion date
    window.document.cookie = cname+"="+"; "+expires;//Set the cookie with name and the expiration date
 
}

$("#modal-upgrade .btn-upgrade").on('click', function (e) {
    deleteCookie('session');
});

$(document).ready(function () {

    $(" .why-upgrade .upgrade-details .btn-upgrade").live('click', function (e) {
        $("#modal-upgrade-new").hide();
    });

    $(" .why-upgrade ul.upgrade-tab li").live('click', function (e) {
        e.preventDefault();
        $(this).parents("ul.upgrade-tab ").find("li a").removeClass("active");
        $(this).find("a").addClass("active");

        var upgradeValue1 = $(this).index();

        $(this).parents(".why-upgrade").find(".upgrade-details .upgrade-details-box").hide();
        $(this).parents(".why-upgrade").find(".upgrade-details .upgrade-details-box").eq(upgradeValue1).show();
    });

    $(" .why-upgrade .upgrade-details .upgrade-details-box .arrow-mark").live('click', function (e) {
        e.preventDefault();

        if ($(this).hasClass("right")) {
            var upgradeValue2 = $(this).parents(".upgrade-details-box").index() + 1;

        }
        if ($(this).hasClass("left")) {
            var upgradeValue2 = $(this).parents(".upgrade-details-box").index() - 1;

        }


        $(this).parents(".why-upgrade").find(".upgrade-details .upgrade-details-box").hide();
        $(this).parents(".why-upgrade").find(".upgrade-details .upgrade-details-box").eq(upgradeValue2).show();

        $(this).parents(".why-upgrade").find("ul.upgrade-tab li a").removeClass("active");
        $(this).parents(".why-upgrade").find("ul.upgrade-tab li").eq(upgradeValue2).find("a").addClass("active");
    });

    var csrfValue = $("#csrf_mindler_token").val();

    //$("body").append('<div class="window-block"></div>');
    $("#modal-snff .modal-body .form-group .dropdown-input .code-list-click").on("click", function(e){
        e.stopPropagation();
        $(this).find(".fa").toggleClass("fa-angle-down");
        $(this).parents(".dropdown-input").find("ul.code-list").toggle();
        $('#modal-snff .modal-content.step-2 .modal-body').find(".snff-alert").remove(); // remove it
 });

 $(document).click(function() {
    $("ul.code-list").hide();
});
 $("#modal-snff .modal-body .form-group .dropdown-input ul.code-list li").on('click', function (e) {
    e.preventDefault();
    var condeText = $(this).find(".code").text();
    $(this).parents(".dropdown-input").find("ul.code-list").hide();
    $(this).parents(".dropdown-input").find(".code-list-click span").text(condeText);
    $(this).parents(".dropdown-input").find(".code-list-click .fa").removeClass("fa-angle-down").addClass("fa-angle-up");
    $("#modal-snff .modal-body .form-group.otp-row .timer").show();
});

     if ($(window).width() < 768) {
        $("#career-slider").lightSlider({
      });
    }

  var videoHeight = $(".os-rewamp.videobox").height();
$(".os-rewamp.upgrade").height(videoHeight);

$(".os-rewamp.videobox .inner-box .video-block").on('click', function (e) {
        e.preventDefault();
        $(this).hide();
  
      $(".os-rewamp.videobox .inner-box").append('<iframe src="https://www.youtube.com/embed/WSM-py40Sl0?feature=oembed&autoplay=1&autohide=1&showinfo=0&rel=0&cc_load_policy=1&fs=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video1" ></iframe>');
   });


    $(".new-os-screen .os-video .video-box .play-video-click").on('click', function (e) {

   
       $("#os-video-modal .embed-responsive-item").attr("src", "https://www.youtube.com/embed/WSM-py40Sl0?feature=oembed&autoplay=1&rel=0&cc_load_policy=1&fs=0");
    });





    $("#os-video-modal .modal-content .close .fa").on('click', function (e) {
        e.preventDefault();

    $("#os-video-modal .embed-responsive-item").removeAttr("src", "https://www.youtube.com/embed/WSM-py40Sl0?feature=oembed&autoplay=1&rel=0&cc_load_policy=1&fs=0");
       

    });

    $(document).keyup(function(e) {
         if (e.keyCode == 27) { // escape key maps to keycode `27`
            $("#os-video-modal .embed-responsive-item").removeAttr("src", "https://www.youtube.com/embed/WSM-py40Sl0?feature=oembed&autoplay=1&rel=0&cc_load_policy=1&fs=0");
       
        }
    });


    
    /*refer a friend*/
    $("#modal-refer-friend .modal-content .screen-first .invite a.copy-link").on("click", function() {
            $(this).text("Copied!");
            $("#modal-refer-friend .modal-content .screen-first .invite a.copy-code").text('Copy Code');
            var text = document.getElementById("coupon-link");
            text.select();
            document.execCommand("Copy");
            
    });


    $("#modal-refer-friend .modal-content .screen-first .invite a.copy-code").on("click", function() {
            $(this).text("Copied!");
            $("#modal-refer-friend .modal-content .screen-first .invite a.copy-link").text('Copy Link');
            var text = document.getElementById("label-code-copy");
            text.select();
            document.execCommand("Copy");
            
    });

     $("#modal-refer-friend button.close").on('click', function (e) {
         e.preventDefault();
         $("#modal-refer-friend .modal-body.screen-second").hide();
         $("#modal-refer-friend .modal-body.screen-third").hide();
         $("#modal-refer-friend .modal-body textarea").val("");
         $("#modal-refer-friend .modal-content .screen-first .invite a.copy-code").text('Copy Code');
         $("#modal-refer-friend .modal-content .screen-first .invite a.copy-link").text('Copy Link');
         document.getSelection().removeAllRanges();
         $("#modal-refer-friend .modal-body.screen-first").show();
         $("#modal-refer-friend .modal-body textarea").val("");

     });


 /*social share refer a frriend page*/
 
    $('.social .twitter').on("click", function(e) {
      $(this).customerPopup(e);
    });

    $('.social .linkedin').on("click", function(e) {
      $(this).customerPopup(e);
    });


    $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    // Prevent default anchor event
    e.preventDefault();
    
    // Set values for window
    intWidth = intWidth || '500';
    intHeight = intHeight || '400';
    strResize = (blnResize ? 'yes' : 'no');

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  }
      
 /*end of share*/

     $("#modal-refer-friend .modal-body.screen-first .bnt-email-invite").on('click', function (e) {
         e.preventDefault();
         $('#refer-friend-form')[0].reset();
         $("#modal-refer-friend .modal-body.screen-second").find(".error").remove();
         $("#modal-refer-friend .modal-body.screen-first").hide();
         $("#modal-refer-friend .modal-body.screen-second").show();

    });

    $("#modal-refer-friend .modal-body.screen-second .bnt-back").on('click', function (e) {
         e.preventDefault();
         $("#modal-refer-friend .modal-body.screen-second").hide();
         $("#modal-refer-friend .modal-body.screen-first").show();

    });



    $(".modal-body.screen-second #refer-friend-form input[name='email']").change(function() {
        $("#modal-refer-friend .modal-body.screen-second .bnt-send-invite").attr('data-vi','yes');
    });

    $("#modal-refer-friend .modal-body.screen-second .bnt-send-invite").on('click', function (e) {
        
        e.preventDefault();

        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var mobile = $("input[name='mobile']").val();
        //var message = $("textarea[name='message']").val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var exp = /^[a-zA-Z][a-zA-Z ]*$/;
        var propertychange = $(this).attr('data-vi');
        
        $(this).parents("#modal-refer-friend .modal-body.screen-second").find(".error").remove(); // remove it
        if(!name){
            $("input[name='name']").after('<label class="error">This field is required.</label>');
            $("input[name='name']").focus();
            return false;
        }
        else if (name.length>0 && exp.test(name)==false) {
            $("input[name='name']").after('<label class="error">Please enter a valid name.</label>');
            $("input[name='name']").focus();
            return false;
        }
        else if(!email){
            $("input[name='email']").after('<label class="error">This field is required.</label>');
            $("input[name='email']").focus();
            return false;
        }else if(!filter.test(email)){
            $("input[name='email']").after('<label class="error">Please enter valid email address.</label>');
            $("input[name='email']").focus();
            return false;
        }
        else if(filter.test(email)){
            $("#blue-scheme .mindler-loader").css("display", "flex");

            $.post(baseUrl+"assess/checkAlreadyRefered", {email: email}, function(data){
                
                var response = jQuery.parseJSON(data);
                
                $("#blue-scheme .mindler-loader").css("display", "none");
                if (response.status=='404') {
                    $("input[name='email']").after('<label class="error">This email address is already refered. You can only refer new users.</label>');
                    $("input[name='email']").focus();
                }else if(response.result != 'ok'){
                    $("input[name='email']").after('<label class="error">The email address you entered is not correct. Please try again.</label>');
                    $("input[name='email']").focus();
                    $("#modal-refer-friend .modal-body.screen-second .bnt-send-invite").attr('data-vi','no');
                    return false;
                }else{
                    $("#modal-refer-friend .modal-body.screen-second .bnt-send-invite").attr('data-vi','no');
                    inviteFriend(mobile);
                }
            }); return false;
            /*$.getJSON("https://api.hubuco.com/api/v3/?api=ncsDzryAk0DenEtBDmhYpYlGs&email="+email+"",
            function(data) {
                $("#blue-scheme .mindler-loader").css("display", "none");
                if(data.result != 'ok'){
                    $("input[name='email']").after('<label class="error">The email address you entered is not correct. Please try again.</label>');
                    $("input[name='email']").focus();
                    $("#modal-refer-friend .modal-body.screen-second .bnt-send-invite").attr('data-vi','no');
                    return false;
                }else{
                    $("#modal-refer-friend .modal-body.screen-second .bnt-send-invite").attr('data-vi','no');
                    inviteFriend(mobile);
                }
            });*/
        }else{

            inviteFriend(mobile);
        }
        

 });


 function inviteFriend(mobile){

    if(!mobile){
            $("input[name='mobile']").after('<label class="error">This field is required.</label>');
            $("input[name='mobile']").focus();
            return false;
        }else if(($.isNumeric(mobile)==false) || mobile.length<10){
            $("input[name='mobile']").after('<label class="error">Please enter valid mobile number.</label>');
            $("input[name='mobile']").focus();
            return false;
        }else{

            var data = $('#refer-friend-form').serialize();
            if (data) {
                $("#blue-scheme .mindler-loader").css("display", "flex");
                $.ajax({
                    url: baseUrl+"assess/refer",
                    type: "post",
                    data: {'csrf_mindler_token':csrfValue, 'data': data },
                    success: function (response) {
                        $("#blue-scheme .mindler-loader").css("display", "none");
                        var json = $.parseJSON(response);
                         if(json.status=="200"){
                                if(json.count>0){
                                   $(".referal-c-panel .referal-status #invited-count").empty();
                                   $(".referal-c-panel .referal-status #invited-count").append('<strong>'+json.count+'</strong><br>Invited');
                                   $(".referal-c-panel .referal-status #invited-count").parent().find('.view-btn').removeAttr("data-target");
                                   $(".referal-c-panel .referal-status #invited-count").parent().find('.view-btn').attr("id","modal-refer-invited");
                                }

                                if(json.isRegister>0){
                                   $(".referal-c-panel .referal-status #register-count").empty();
                                   $(".referal-c-panel .referal-status #register-count").append('<strong>'+json.isRegister+'</strong><br>REGISTERED');
                                   $(".referal-c-panel .referal-status #register-count").parent().find('.view-btn').removeAttr("data-target");
                                   $(".referal-c-panel .referal-status #register-count").parent().find('.view-btn').attr("id","modal-refer-register");
                                }

                         }
                         $("#modal-refer-friend .modal-body.screen-second").hide();
                         $("#modal-refer-friend .modal-body.screen-third").show();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
            
        }

 }

 $(document).on('click', "#modal-refer-first #no-claim-back", function(){
 
     $("#modal-refer-friend .modal-body textarea").val("");
     $("#modal-refer-friend .modal-content .screen-first .invite a.copy-code").text('Copy Code');
     $("#modal-refer-friend .modal-content .screen-first .invite a.copy-link").text('Copy Link');
     document.getSelection().removeAllRanges();
     $("#modal-refer-friend .modal-body.screen-first").show();
     $("#modal-refer-friend .modal-body.screen-second").hide();
     $("#modal-refer-friend .modal-body.screen-third").hide();
     $("#modal-refer-friend .modal-body textarea").val("");
     $("#modal-refer-first").modal('hide');
     $(".refer-friend-page .referal-status #modal-refer-register").click();

 });
    /*End of refer a friend*/


    $(".os-career-option .os-nav .slider-span.right-nav").on('click', function (e) {
     e.preventDefault();
    
         $(".lSNext").click();

    });

    $(".os-career-option .os-nav .slider-span.left-nav").on('click', function (e) {
     e.preventDefault();
     
     
        $(".lSPrev").click();

    });

    $('.sidebar-toggle-box .fa-bars').on('click', function (e) {
        e.preventDefault();
        if ($(window).width() < 768) {
        
            //$("body").toggleClass("over-flow-hidden");
            $(".window-block").fadeIn();
            //$("html, body").animate({ scrollTop: 0 }, 600);
            
        }
    });

    $('.window-block').on('click', function (e) {
        $('body').removeClass("over-flow-hidden");
        $('#sidebar').removeClass("hide-left-bar");
        $('#sidebar').removeClass("show-left-bar-mobile");
        $(".window-block").hide();
    });


    $('.window-block').on({
        'touchmove': function (e) {
            //$('body').removeClass("over-flow-hidden");
            $('#sidebar').removeClass("hide-left-bar");
            $('#sidebar').removeClass("show-left-bar-mobile");
            $(".window-block").hide();

      
        }
    });

    $('.change-password').on('click', function (e) {
        $('.window-block').click();
        $(this).find("a").removeClass("active");
        $("#modal-change-password input").val("")
    });


    $('.change-password-2').on('click', function (e) {
        $("#modal-change-password input").val("")
    });


    if ($(window).width() < 768) {

    $('.ui-menu .ui-menu-item ').live("mouseenter", function (e) {
          e.preventDefault();
            // var SearchText = $(this).text();

            //console.log(SearchText);
            //$('#dashboard-career').val(SearchText);
          $(this).click();
       });

       // $("#dashboard-career").focus(function () {
            //$(".dashboard-post-section").addClass("margin-bottom-150");

           // $('html, body').animate({
                //scrollTop: $(document).height()
            //}, 'slow');
            //return false;
            
        //});

        //$("#dashboard-career").focusout(function () {
          //  $(".dashboard-post-section").removeClass("margin-bottom-150");
            
       // });

    }

   
    

   
    


    $(".new-faq-sec ul li a.title").live('click', function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).parents("li").find(".details").slideToggle();
        $(this).parents("li").closest('li').siblings().find(".details").slideUp();
        $(this).parents("li").closest('li').siblings().find("a").removeClass("active");
    });


    /*FOR NEW PROFILE PAGE*/

    $(" .my-tab-function ul.tab-ul li").live('click', function (e) {
      e.preventDefault();
        var status = $(this).parents("ul.tab-ul ").attr('data-id');
        if(status=='paid'){
          $(this).parents("ul.tab-ul ").find("li").removeClass("active");
          $(this).addClass("active");

          var indexValue = $(this).index();
          $(this).parents(".my-tab-function").find(".profile-tab-details .ptd-box").hide();
          $(this).parents(".my-tab-function").find(".profile-tab-details .ptd-box").eq(indexValue).show();
        }
    });

    //$(" .my-tab-function ul.tab-ul li:first-child").click();

    $(" .my-tab-function ul.tab-ul li.click-disabled").click(false);

    $("  .my-tab-function .profile-tab-details .ptd-box .add-another-email").click(function (event) {
        event.preventDefault();
        $(this).parents(".ptd-box ").find("#for-additional-email").show();
        $(this).hide();
    });

    $(" .my-tab-function .profile-tab-details .ptd-box .delete-another-email").click(function (event) {
        event.preventDefault();
        $(this).parents(".ptd-box ").find("#anotherEmail").removeAttr('value');
        $(this).parents(".ptd-box ").find("#for-additional-email").hide().val("");
        $(this).parents(".ptd-box ").find(".add-another-email").show();
        $("#anotherEmail").next("#anotherEmail-error").remove(); // remove it
    });


    $(' .my-tab-function .profile-tab-details input[type=radio][name=student-type]').on('ifChanged', function (event) {

        $(".next-button-row .next-profile-btn").show();
        $(".next-button-row .next-back-btn").show();

        if (this.value == 'school') {

            $('#college').val('');
            $('#university').val('');
            $('#course').val('');
            $('#colege_graduation').val('');

            $(".for-college-student").hide();
            $(".for-school-student").show();

            $("#option4").hide();
            $("#option3").show();

        }
        else if (this.value == 'college') {
            $('#school').val('');
            $('#board').val('');
            $('#class').val('');
            $('#graduation').val('');
            $("#tenthmarks").val('');
            $("#twelthhmarks").val('');
            $("#collegemarks").val('');
            $(".for-school-student").hide();
            $(".for-college-student").show();

            $("#option3").hide();
            $("#option4").show();
        }
    });


    $(" .profile-tab-details #personal-tab-details .next-profile-btn").click(function (event) {
        event.preventDefault();

        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var dateReg = /^\d{2}([./-])\d{2}\1\d{4}$/;
        var regexp = /^[a-zA-Z ]*$/;
        var anotherEmail = $("#anotherEmail").val();
        var phoneno = $("#phoneno").val();
        var dob = $("#datepicker").val();
        var getDob = dob.split('/');
        
        $("#anotherEmail").next("#anotherEmail-error").remove(); // remove it
        $("#phoneno").next("#phoneno-error").remove(); // remove it
        $("#radioRequired").next("#radioRequired-error").remove(); // remove it
        $("#dateOfBirth").next("#dateOfBirth-error").remove(); // remove it

        if (phoneno.length == 0 && !$("input[name='gender']:checked").val() && dob.length==0 ) {

            if ($("#for-additional-email").is(":visible") == true && anotherEmail.length == 0) {
                $("#anotherEmail").after('<label id="anotherEmail-error" class="error" for="datepicker">This field is required.</label>');
            } 
            $("#phoneno").after('<label id="phoneno-error" class="error" for="datepicker">This field is required.</label>');
            $("#radioRequired").after('<label id="radioRequired-error" class="error" for="datepicker">This field is required.</label>');
            $("#dateOfBirth").after('<label id="dateOfBirth-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if ($("#for-additional-email").is(":visible") == true && anotherEmail.length == 0) {
            $("#anotherEmail").next("#anotherEmail-error").remove(); // remove it
            $("#anotherEmail").after('<label id="anotherEmail-error" class="error" for="datepicker">This field is required.</label>');
            $('#anotherEmail').focus();
            return false;
        } else if ($("#for-additional-email").is(":visible") == true && !filter.test(anotherEmail)) {
            $("#anotherEmail").next("#anotherEmail-error").remove(); // remove it
            $("#anotherEmail").after('<label id="anotherEmail-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#anotherEmail').focus();
            return false;
        } else if (phoneno.length == 0) {
            $("#anotherEmail").next("#anotherEmail-error").remove(); // remove it
            $("#phoneno").next("#phoneno-error").remove(); // remove it
            $("#phoneno").after('<label id="phoneno-error" class="error" for="datepicker">This field is required.</label>');
            $('#phoneno').focus();
            return false;
        } 
        //else if (regexp.test(phoneno) || phoneno.length != 10) {
        else if (regexp.test(phoneno) || phoneno.length<8) {
            $("#phoneno").next("#phoneno-error").remove(); // remove it
            $("#phoneno").after('<label id="phoneno-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#phoneno').focus();
            return false;
        }
        else if (!$("input[name='gender']:checked").val()) {
            $("#phoneno").next("#phoneno-error").remove(); // remove it
            $("#radioRequired").next("#radioRequired-error").remove(); // remove it
            $("#radioRequired").after('<label id="radioRequired-error" class="error" for="datepicker">This field is required.</label>');
            $('#radioRequired').focus();
            return false;
        }
        else if (dob.length==0) {
            $("#radioRequired").next("#radioRequired-error").remove(); // remove it
            $("#phoneno").next("#phoneno-error").remove(); // remove it
            $("#dateOfBirth").next("#dateOfBirth-error").remove(); // remove it
            $("#dateOfBirth").after('<label id="dateOfBirth-error" class="error" for="datepicker">This field is required.</label>');
            $('#dateOfBirth').focus();
            return false;
        }
        else if (getDob[2]<=1986 || getDob[2]>2010) {
            $("#radioRequired").next("#radioRequired-error").remove(); // remove it
            $("#phoneno").next("#phoneno-error").remove(); // remove it
            $("#dateOfBirth").next("#dateOfBirth-error").remove(); // remove it
            $("#dateOfBirth").after('<label id="dateOfBirth-error" class="error" for="datepicker">Please enter valid date.</label>');
            $('#dateOfBirth').focus();
            return false;
        }
        else {
            $("#dateOfBirth").next("#dateOfBirth-error").remove(); // remove it
            //$(".for-profile > ul #personal-tab").addClass('disabled');
            var data = $('#personal-tab-details').serialize();
            if (data) {
                $.ajax({
                    url: baseUrl+"assess/myprofile",
                    type: "post",
                    data: {'csrf_mindler_token':csrfValue, 'data': data },
                    success: function (response) {
                        /*var json = $.parseJSON(response);
                         if(json.status=="1"){
                           $(this).parents(".my-tab-function").find("ul #education-tab").click();
                         }*/
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

            $(this).parents(".my-tab-function").find("ul li").addClass("disabled");
            $(this).parents(".my-tab-function").find("ul li").removeClass("active");
            $(this).parents(".my-tab-function").find("ul #education-tab").removeClass("disabled");
            $(this).parents(".my-tab-function").find("ul #education-tab").click();
        }
    });

    $(" .profile-tab-details #education-tab-details .next-profile-btn").click(function (event) {
        event.preventDefault();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var dateReg = /^\d{2}([./-])\d{2}\1\d{4}$/;
        var regexp = /^[a-zA-Z ]*$/;
        var numeric = /^[a-zA-Z ]$/;
        var classValidate = /^[a-zA-Z0-9]*$/;
        var cls = $("#class").val();
        var board = $("#board").val();
        var school = $("#school").val();
        var graduation = $("#graduation").val();
        var college = $("#college").val();
        var course = $("#course").val();
        var university = $("#university").val();
        var colege_graduation = $("#colege_graduation").val();
        var ascii = /^[ -~]+$/;

        $("#school").next("#school-error").remove(); // remove it
        $("#board").next("#board-error").remove(); // remove it
        $("#class").next("#class-error").remove(); // remove it
        $("#graduation").next("#graduation-error").remove(); // remove it
        $("#college").next("#college-error").remove(); // remove it
        $("#course").next("#course-error").remove(); // remove it
        $("#university").next("#university-error").remove(); // remove it
         $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it

        if ($(".for-school-student").is(":visible") == true && (school.length == 0 && cls.length == 0 && board.length == 0 && graduation.length == 0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (school.length == 0 && cls.length == 0 && board.length == 0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (school.length == 0  && board.length == 0 && graduation.length == 0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (cls.length == 0 && board.length == 0 && graduation.length == 0)) {
            
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (school.length == 0 && cls.length == 0 && graduation.length == 0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (cls.length == 0 && board.length == 0)) {
            
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (school.length == 0  && board.length ==0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (school.length == 0 && cls.length == 0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (school.length == 0 && graduation.length == 0)) {
            
                $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (board.length == 0 && graduation.length == 0)) {
            
                $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && (cls.length == 0 && graduation.length == 0)) {
            
                $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
                $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
        }
        
        /*for college*/
        
        else if ($(".for-college-student").is(":visible") == true && college.length == 0 && course.length == 0 && university.length == 0 && colege_graduation.length == 0) {
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && course.length == 0 && university.length == 0 && colege_graduation.length == 0) {
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && college.length == 0 && course.length == 0  && colege_graduation.length == 0) {
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && college.length == 0 &&  colege_graduation.length == 0) {
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && college.length == 0 && course.length == 0 && university.length == 0 ) {
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && college.length == 0 &&  university.length == 0 ) {
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && course.length == 0 && university.length == 0) {
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true  && university.length == 0 && colege_graduation.length == 0) {
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && course.length == 0  && colege_graduation.length == 0) {
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-college-student").is(":visible") == true && college.length == 0 &&  university.length == 0 && colege_graduation.length == 0) {
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $("#university").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
        }
        else if ($(".for-school-student").is(":visible") == true && school.length == 0) {
            $("#school").next("#school-error").remove(); // remove it
            $("#board").next("#board-error").remove(); // remove it
            $("#school").after('<label id="school-error" class="error" for="datepicker">This field is required.</label>');
            $('#school').focus();
            return false;
        } 
        else if ($(".for-school-student").is(":visible") == true && cls.length == 0) {
            $("#school").next("#school-error").remove(); // remove it
            $("#class").next("#class-error").remove(); // remove it
            $("#class").after('<label id="class-error" class="error" for="datepicker">This field is required.</label>');
            $('#class').focus();
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && board.length == 0) {
            $("#class").next("#class-error").remove(); // remove it
            $("#board").next("#board-error").remove(); // remove it
            $("#board").after('<label id="board-error" class="error" for="datepicker">This field is required.</label>');
            $('#board').focus();
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && graduation.length == 0) {
            $("#board").next("#board-error").remove(); // remove it
            $("#graduation").next("#graduation-error").remove(); // remove it
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">This field is required.</label>');
            $('#graduation').focus();
            return false;
        }
        else if ($(".for-college-student").is(":visible") == true && college.length == 0) {
            $("#college").next("#college-error").remove(); // remove it
            $("#college").next("#college-error").remove(); // remove it
            $("#college").after('<label id="college-error" class="error" for="datepicker">This field is required.</label>');
            $('#college').focus();
            return false;
        }
        else if ($(".for-college-student").is(":visible") == true && course.length == 0) {
            $("#college").next("#college-error").remove(); // remove it
            $("#course").next("#course-error").remove(); // remove it
            $("#course").after('<label id="course-error" class="error" for="datepicker">This field is required.</label>');
            $('#course').focus();
            return false;
        }
        else if ($(".for-college-student").is(":visible") == true && university.length == 0) {
            $("#university").next("#university-error").remove(); // remove it
            $("#course").next("#course-error").remove(); // remove it
            $("#university").after('<label id="university-error" class="error" for="datepicker">This field is required.</label>');
            $('#university').focus();
            return false;
        }
        else if ($(".for-college-student").is(":visible") == true && colege_graduation.length == 0) {
            $("#university").next("#university-error").remove(); // remove it
            $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">This field is required.</label>');
            $('#colege_graduation').focus();
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) && !classValidate.test(cls) && !regexp.test(board) && ($.isNumeric(graduation)==false)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) && !classValidate.test(cls)  && ($.isNumeric(graduation)==false)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) && !regexp.test(board) && ($.isNumeric(graduation)==false)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        
        else if ($(".for-school-student").is(":visible") == true && !classValidate.test(cls) && !regexp.test(board) && ($.isNumeric(graduation)==false)) {
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) && !regexp.test(board) && ($.isNumeric(graduation)==false)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) &&  ($.isNumeric(graduation)==false)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) &&  !regexp.test(board)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(school) &&  !classValidate.test(cls)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true &&  !classValidate.test(cls) && !regexp.test(board)) {
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !classValidate.test(cls) && ($.isNumeric(graduation)==false)) {
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !classValidate.test(cls) && !regexp.test(school)) {
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !classValidate.test(cls) && !regexp.test(board)) {
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true &&  !regexp.test(school) && !regexp.test(board)) {
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !regexp.test(board) && ($.isNumeric(graduation)==false)) {
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && !classValidate.test(cls) && !regexp.test(school)) {
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && school.length > 0 && !regexp.test(school)) {
            $("#school").next("#school-error").remove(); // remove it
            $("#school").next("#school-error").remove(); // remove it
            $("#school").after('<label id="school-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#school').focus();
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && cls.length > 0 && !classValidate.test(cls)) {
            $("#school").next("#school-error").remove(); // remove it
            $("#class").next("#class-error").remove(); // remove it
            $("#class").after('<label id="class-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#class').focus();
            return false;
        }
        else if ($(".for-school-student").is(":visible") == true && board.length > 0 && !regexp.test(board)) {
            $("#class").next("#class-error").remove(); // remove it
            $("#board").next("#board-error").remove(); // remove it
            $("#board").after('<label id="board-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#board').focus();
            return false;
        }
        else if (($(".for-school-student").is(":visible") == true) && graduation.length > 0 && ($.isNumeric(graduation)==false)) {
            $("#board").next("#board-error").remove(); // remove it
            $("#graduation").next("#graduation-error").remove(); // remove it
            $("#graduation").after('<label id="graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#graduation').focus();
            return false;
        }

        else if ($(".for-college-student").is(":visible") == true && college.length > 0 && !regexp.test(college)) {
            $("#college").next("#college-error").remove(); // remove it
            $("#graduation").next("#graduation-error").remove(); // remove it
            $("#college").next("#college-error").remove(); // remove it
            $("#college").after('<label id="college-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#college').focus();
            return false;
        }
        else if ($(".for-college-student").is(":visible") == true && course.length > 0 && !regexp.test(course)) {
            $("#university").next("#university-error").remove(); // remove it
            $("#course").next("#course-error").remove(); // remove it
            $("#course").next("#course-error").remove(); // remove it
            $("#course").after('<label id="course-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#course').focus();
            return false;
        }
        else if ($(".for-college-student").is(":visible") == true && university.length > 0 && !regexp.test(university)) {
            $("#college").next("#college-error").remove(); // remove it
            $("#university").next("#university-error").remove(); // remove it
            $("#university").next("#university-error").remove(); // remove it
            $("#college").after('<label id="university-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#university').focus();
            return false;
        }
        else if (($(".for-college-student").is(":visible") == true) && colege_graduation.length > 0 && ($.isNumeric(colege_graduation)==false)) {
            $("#course").next("#university-error").remove(); // remove it
            $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it
            $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it
            $("#colege_graduation").after('<label id="colege_graduation-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#colege_graduation').focus();
            return false;
        } else {
            $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it
            var educationData = $('#education-tab-details').serialize();
            if (educationData) {
                $.ajax({
                    url: baseUrl+"assess/myprofile",
                    type: "post",
                    data: { 'csrf_mindler_token':csrfValue,'data': educationData },
                    success: function (response) {
                        /*var json = $.parseJSON(response);
                         if(json.status=="1"){
                           $(this).parents(".my-tab-function").find("ul #family-tab").click();
                         }*/
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

            $(this).parents(".my-tab-function").find("ul li").addClass("disabled");
            $(this).parents(".my-tab-function").find("ul li").removeClass("active");
            $(this).parents(".my-tab-function").find("ul #family-tab").removeClass("disabled");
            $(this).parents(".my-tab-function").find("ul #family-tab").click();

        }

    });


    $(" .profile-tab-details #family-tab-details .next-profile-btn").click(function (event) {
        event.preventDefault();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var dateReg = /^\d{2}([./-])\d{2}\1\d{4}$/;
        var regexp = /^[a-zA-Z ]*$/;
        var fathername = $("#fathername").val();
        var mothername = $("#mothername").val();
        var father_profession = $("#father_profession").val();
        var mother_profession = $("#mother_profession").val();

        $("#college").next("#college-error").remove(); // remove it
        $("#university").next("#university-error").remove(); // remove it
        $("#school").next("#school-error").remove(); // remove it
        $("#class").next("#class-error").remove(); // remove it
        $("#board").next("#board-error").remove(); // remove it   
        $("#graduation").next("#graduation-error").remove(); // remove it 
        $("#course").next("#course-error").remove(); // remove it  
        $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it 
        $("#fathername").next("#fathername-error").remove(); // remove it
        $("#mothername").next("#mothername-error").remove(); // remove it
        $("#mother_profession").next("#mother_profession-error").remove(); // remove it
        $("#father_profession").next("#father_profession-error").remove(); // remove it

        if (fathername.length == 0 && mothername.length == 0 && father_profession.length == 0 && mother_profession.length == 0) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (mothername.length == 0 && father_profession.length == 0 && mother_profession.length == 0) {

            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (fathername.length == 0  && father_profession.length == 0 && mother_profession.length == 0) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (fathername.length == 0 && mothername.length == 0 &&  mother_profession.length == 0) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (fathername.length == 0 && mothername.length == 0 && father_profession.length == 0) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
            return false;
        }
        else if (fathername.length == 0 && mothername.length == 0) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            return false;
        }
        else if (fathername.length == 0 &&  father_profession.length==0 ) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
            return false;
        }
        else if (fathername.length == 0 && mother_profession.length == 0) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (mothername.length == 0 && father_profession.length==0) {

            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (mothername.length == 0 && mother_profession.length == 0) {

            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
             return false;
        }
        else if (fathername.length == 0) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">This field is required.</label>');
            $('#fathername').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        }
        else if (mothername.length == 0) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">This field is required.</label>');
            $('#mothername').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        }
        else if (father_profession.length == 0) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">This field is required.</label>');
            $('#father_profession').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        }
        else if (mother_profession.length == 0) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">This field is required.</label>');
            $('#mother_profession').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(mothername) && !regexp.test(father_profession) && !regexp.test(mother_profession)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (!regexp.test(mothername) && !regexp.test(father_profession) && !regexp.test(mother_profession)) {

            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(father_profession) && !regexp.test(mother_profession)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(mothername) && !regexp.test(mother_profession)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(mothername) && !regexp.test(father_profession)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(mothername)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(father_profession)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            return false;
        }
        else if (!regexp.test(fathername) && !regexp.test(mother_profession)) {

            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (!regexp.test(mothername) && !regexp.test(father_profession)) {

            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (!regexp.test(mothername) && !regexp.test(mother_profession)) {

            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
             return false;
        }
        else if (fathername.length > 0 && !regexp.test(fathername)) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#fathername").after('<label id="fathername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#fathername').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        } 
        else if (mothername.length > 0 && !regexp.test(mothername)) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#mothername").after('<label id="mothername-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#mothername').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        } 
        else if (father_profession.length > 0 && !regexp.test(father_profession)) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#father_profession").after('<label id="father_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#father_profession').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        }
        else if (mother_profession.length > 0 && !regexp.test(mother_profession)) {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            $("#mother_profession").after('<label id="mother_profession-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#mother_profession').focus();
            $(this).parents(".my-tab-function").find("ul #family-tab").click();
            return false;
        } else {
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#fathername").next("#fathername-error").remove(); // remove it
            $("#mothername").next("#mothername-error").remove(); // remove it
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#father_profession").next("#father_profession-error").remove(); // remove it
            var educationData = $('#family-tab-details').serialize();
            if (educationData) {
                $.ajax({
                    url: baseUrl+"assess/myprofile",
                    type: "post",
                    data: { 'csrf_mindler_token':csrfValue,'data': educationData },
                    success: function (response) {
                        /* var json = $.parseJSON(response);
                          if(json.status=="1"){
                            $(this).parents(".my-tab-function").find("ul #academic-tab").click();
                          }*/
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
            $(this).parents(".my-tab-function").find("ul li").addClass("disabled");
            $(this).parents(".my-tab-function").find("ul li").removeClass("active");
            $(this).parents(".my-tab-function").find("ul #academic-tab").removeClass("disabled");
            $(this).parents(".my-tab-function").find("ul #academic-tab").click();

        }


    });
    
    
    var somethingChanged = false;
    $('#academic-tab-details input').change(function() { 
        somethingChanged = true; 
    });

    var somethingChanged = false;
    $('#academic-tab-details .uploadlogo').change(function (event) {
        somethingChanged = true; 
    });

    $(" .profile-tab-details #academic-tab-details .next-profile-btn").click(function (event) {

        var href1 = $(".current_year_file_name").attr('href');
        var href2 = $(".last_year_file_name").attr('href');
        
        $("input[name='subject1']").css('border-color', '#e9e9e9');
        $("input[name='subject2']").css('border-color', '#e9e9e9');
        $("input[name='subject3']").css('border-color', '#e9e9e9');
        $("input[name='subject4']").css('border-color', '#e9e9e9');
        $("input[name='subject5']").css('border-color', '#e9e9e9');

        $("input[name='marks1']").css('border-color', '#e9e9e9');
        $("input[name='marks2']").css('border-color', '#e9e9e9');
        $("input[name='marks3']").css('border-color', '#e9e9e9');
        $("input[name='marks4']").css('border-color', '#e9e9e9');
        $("input[name='marks5']").css('border-color', '#e9e9e9');

        $("input[name='subject21']").css('border-color', '#e9e9e9');
        $("input[name='subject22']").css('border-color', '#e9e9e9');
        $("input[name='subject23']").css('border-color', '#e9e9e9');
        $("input[name='subject24']").css('border-color', '#e9e9e9');
        $("input[name='subject25']").css('border-color', '#e9e9e9');

        $("input[name='marks21']").css('border-color', '#e9e9e9');
        $("input[name='marks22']").css('border-color', '#e9e9e9');
        $("input[name='marks23']").css('border-color', '#e9e9e9');
        $("input[name='marks24']").css('border-color', '#e9e9e9');
        $("input[name='marks25']").css('border-color', '#e9e9e9');

        if(somethingChanged==false && (href1 || href2)){
            location.href = baseUrl+"assess/viewprofile";
            return false;
        }

        

        event.preventDefault();
        var regexp = /^[a-zA-Z ]*$/;
        // send the formData
        var tenth = $("input[name='tenthmarks']").length;

        if(tenth>0){

           var tenthmarks = $("input[name='tenthmarks']").val().length;
           var twelthhmarks = $("input[name='twelthhmarks']").val().length;
           var collegemarks = $("input[name='collegemarks']").val().length;
        }

        var fn = $("input[name='current_year_file_name']").length;
        var fn2 = $("input[name='last_year_file_name']").length;
        if(fn>0){
            var filename = $("input[name='current_year_file_name']").val().split('\\').pop();
            var filename2 = $("input[name='last_year_file_name']").val().split('\\').pop();
        }

        //console.log(filename); return false;

        if (tenthmarks == 0) {
            $("#colege_graduation").next("#colege_graduation-error").remove(); // remove it
            $("#tenthmarks").next("#tenthmarks-error").remove(); // remove it
            $("#tenthmarks").after('<label id="tenthmarks-error" class="error" for="datepicker">This field is required.</label>');
            $('#tenthmarks').focus();
            return false;
        }
        else if (tenthmarks > 0 && regexp.test($("input[name='tenthmarks']").val())) {
            $("#mother_profession").next("#mother_profession-error").remove(); // remove it
            $("#tenthmarks").next("#tenthmarks-error").remove(); // remove it
            $("#tenthmarks").after('<label id="tenthmarks-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#tenthmarks').focus();
            return false;
        } else if (twelthhmarks == 0) {
            $("#tenthmarks").next("#tenthmarks-error").remove(); // remove it
            $("#twelthhmarks").next("#twelthhmarks-error").remove(); // remove it
            $("#twelthhmarks").after('<label id="twelthhmarks-error" class="error" for="datepicker">This field is required.</label>');
            $('#twelthhmarks').focus();
            return false;
        }
        else if (twelthhmarks > 0 && regexp.test($("input[name='twelthhmarks']").val())) {
            $("#tenthmarks").next("#tenthmarks-error").remove(); // remove it
            $("#twelthhmarks").next("#twelthhmarks-error").remove(); // remove it
            $("#twelthhmarks").after('<label id="twelthhmarks-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#twelthhmarks').focus();
            return false;
        } else if (collegemarks == 0) {
            $("#twelthhmarks").next("#twelthhmarks-error").remove(); // remove it
            $("#collegemarks").next("#collegemarks-error").remove(); // remove it
            $("#collegemarks").after('<label id="collegemarks-error" class="error" for="datepicker">This field is required.</label>');
            $('#collegemarks').focus();
            return false;
        }
        else if (collegemarks > 0 && regexp.test($("input[name='collegemarks']").val())) {
            $("#twelthhmarks").next("#twelthhmarks-error").remove(); // remove it
            $("#collegemarks").next("#collegemarks-error").remove(); // remove it
            $("#collegemarks").after('<label id="collegemarks-error" class="error" for="datepicker">Please enter valid content.</label>');
            $('#collegemarks').focus();
            return false;
        }

        else if (filename && filename2) {
            
                    $("#blue-scheme .mindler-loader").css("display", "flex");
                    var formData = new FormData($("#academic-tab-details")[0]);
                    var data = new FormData($("#academic-tab-details")[0]);
                    data.append('csrf_mindler_token',csrfValue);
                    $.each($("input[type='file']")[0].files, function (i, file) {
                        data.append('file', file);

                    });

                    
                    $("#tenthmarks").val('');
                    $("#twelthhmarks").val('');
                    $("#collegemarks").val('');

                    $.ajax({
                        url: baseUrl+"assess/profiledoc",  // Controller URL
                        type: 'POST',
                        data: data,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.status == 'success') {
                                $("#blue-scheme .mindler-loader").css("display", "none");
                                location.href = baseUrl+"assess/viewprofile";
                            } else if (json.status == 'failure') {
                                $("#blue-scheme .mindler-loader").css("display", "none");
                            }


                        }
                    });
                

                    var academicData = $('#academic-tab-details').serialize();
                    //return false;
                    $("#blue-scheme .mindler-loader").css("display", "flex");
                    if (academicData) {
                        $.ajax({
                            url: baseUrl+"assess/myprofile",
                            type: "post",
                            data: { 'csrf_mindler_token':csrfValue,'data': academicData },
                            success: function (response) {
                                var json = $.parseJSON(response);
                                if (json.status == "1") {
                                    location.href = baseUrl+"assess/viewprofile";
                                }

                                 $("#blue-scheme .mindler-loader").css("display", "none");
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }
        }
        /*else if (filename || filename2) {
            
            if (!filename2 && !filename && !href1 && (($("input[name='subject1']").val() == '' && $("input[name='marks1']").val() == '') || ($("input[name='subject2']").val() == '' && $("input[name='marks2']").val() == '') || ($("input[name='subject3']").val() == '' && $("input[name='marks3']").val() == '') || ($("input[name='subject4']").val() == '' && $("input[name='marks4']").val() == '') || ($("input[name='subject5']").val() == '' && $("input[name='marks5']").val() == ''))) {
            
            if(($("input[name='subject1']").val() == '')){
                $("input[name='subject1']").attr("placeholder", "Required");
                $("input[name='subject1']").css('border-color', 'red');
            }

            if(($("input[name='subject2']").val() == '')){
                $("input[name='subject2']").attr("placeholder", "Required");
                $("input[name='subject2']").css('border-color', 'red');
            }

            if(($("input[name='subject3']").val() == '')){
                $("input[name='subject3']").attr("placeholder", "Required");
                $("input[name='subject3']").css('border-color', 'red');
            }

            if(($("input[name='subject4']").val() == '')){
                $("input[name='subject4']").attr("placeholder", "Required");
                $("input[name='subject4']").css('border-color', 'red');
            }

            if(($("input[name='subject5']").val() == '')){
                $("input[name='subject5']").attr("placeholder", "Required");
                $("input[name='subject5']").css('border-color', 'red');
            }

            if($("input[name='marks1']").val() == ''){
                $("input[name='marks1']").attr("placeholder", "Required");
                $("input[name='marks1']").css('border-color', 'red');
            }

            if($("input[name='marks2']").val() == ''){
                $("input[name='marks2']").attr("placeholder", "Required");
                $("input[name='marks2']").css('border-color', 'red');
            }

            if($("input[name='marks3']").val() == ''){
                $("input[name='marks3']").attr("placeholder", "Required");
                $("input[name='marks3']").css('border-color', 'red');
            }

            if($("input[name='marks4']").val() == ''){
                $("input[name='marks4']").attr("placeholder", "Required");
                $("input[name='marks4']").css('border-color', 'red');
            }

            if($("input[name='marks5']").val() == ''){
                $("input[name='marks5']").attr("placeholder", "Required");
                $("input[name='marks5']").css('border-color', 'red');
            }

        

                }else{
                       
                        $("#blue-scheme .mindler-loader").css("display", "flex");
                        var formData = new FormData($("#academic-tab-details")[0]);
                        var data = new FormData($("#academic-tab-details")[0]);
                        data.append('csrf_mindler_token',csrfValue);
                        $.each($("input[type='file']")[0].files, function (i, file) {
                            data.append('file', file);

                        });

                        $("#tenthmarks").val('');
                        $("#twelthhmarks").val('');
                        $("#collegemarks").val('');

                        $.ajax({
                            url: baseUrl+"assess/profiledoc",  // Controller URL
                            type: 'POST',
                            data: data,
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                var json = $.parseJSON(data);
                                if (json.status == 'success') {
                                    $("#blue-scheme .mindler-loader").css("display", "none");
                                    location.href = baseUrl+"assess/viewprofile";
                                } else if (json.status == 'failure') {
                                    $("#blue-scheme .mindler-loader").css("display", "none");
                                }


                            }
                        });

                        var academicData = $('#academic-tab-details').serialize();
                        $("#blue-scheme .mindler-loader").css("display", "flex");
                        if (academicData) {
                            $.ajax({
                                url: baseUrl+"assess/myprofile",
                                type: "post",
                                data: { 'csrf_mindler_token':csrfValue,'data': academicData },
                                success: function (response) {
                                    var json = $.parseJSON(response);
                                    if (json.status == "1") {
                                        location.href = baseUrl+"assess/viewprofile";
                                    }

                                     $("#blue-scheme .mindler-loader").css("display", "none");
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });
                        }
                }

            if (!filename && !filename2 && !href2 && (($("input[name='subject21']").val() == '' && $("input[name='marks21']").val() == '') || ($("input[name='subject22']").val() == '' && $("input[name='marks22']").val() == '') || ($("input[name='subject23']").val() == '' && $("input[name='marks23']").val() == '') || ($("input[name='subject24']").val() == '' && $("input[name='marks24']").val() == '') || ($("input[name='subject25']").val() == '' && $("input[name='marks25']").val() == ''))) {
                
               
                if(($("input[name='subject21']").val() == '')){
                    $("input[name='subject21']").attr("placeholder", "Required");
                    $("input[name='subject21']").css('border-color', 'red');
                }

                if(($("input[name='subject22']").val() == '')){
                    $("input[name='subject22']").attr("placeholder", "Required");
                    $("input[name='subject22']").css('border-color', 'red');
                }

                if(($("input[name='subject23']").val() == '')){
                    $("input[name='subject23']").attr("placeholder", "Required");
                    $("input[name='subject23']").css('border-color', 'red');
                }

                if(($("input[name='subject24']").val() == '')){
                    $("input[name='subject24']").attr("placeholder", "Required");
                    $("input[name='subject24']").css('border-color', 'red');
                }

                if(($("input[name='subject25']").val() == '')){
                    $("input[name='subject25']").attr("placeholder", "Required");
                    $("input[name='subject25']").css('border-color', 'red');
                }

                if($("input[name='marks21']").val() == ''){
                    $("input[name='marks21']").attr("placeholder", "Required");
                    $("input[name='marks21']").css('border-color', 'red');
                }

                if($("input[name='marks22']").val() == ''){
                    $("input[name='marks22']").attr("placeholder", "Required");
                    $("input[name='marks22']").css('border-color', 'red');
                }

                if($("input[name='marks23']").val() == ''){
                    $("input[name='marks23']").attr("placeholder", "Required");
                    $("input[name='marks23']").css('border-color', 'red');
                }

                if($("input[name='marks24']").val() == ''){
                    $("input[name='marks24']").attr("placeholder", "Required");
                    $("input[name='marks24']").css('border-color', 'red');
                }

                if($("input[name='marks25']").val() == ''){
                    $("input[name='marks25']").attr("placeholder", "Required");
                    $("input[name='marks25']").css('border-color', 'red');
                }

                
            }else{
                   
                    $("#blue-scheme .mindler-loader").css("display", "flex");
                    var formData = new FormData($("#academic-tab-details")[0]);
                    var data = new FormData($("#academic-tab-details")[0]);
                    data.append('csrf_mindler_token',csrfValue);
                    $.each($("input[type='file']")[0].files, function (i, file) {
                        data.append('file', file);

                    });

                    $("#tenthmarks").val('');
                    $("#twelthhmarks").val('');
                    $("#collegemarks").val('');

                    $.ajax({
                        url: baseUrl+"assess/profiledoc",  // Controller URL
                        type: 'POST',
                        data: data,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.status == 'success') {
                                $("#blue-scheme .mindler-loader").css("display", "none");
                                location.href = baseUrl+"assess/viewprofile";
                            } else if (json.status == 'failure') {
                                $("#blue-scheme .mindler-loader").css("display", "none");
                            }


                        }
                    });

                    var academicData = $('#academic-tab-details').serialize();
                    $("#blue-scheme .mindler-loader").css("display", "flex");
                    if (academicData) {
                        $.ajax({
                            url: baseUrl+"assess/myprofile",
                            type: "post",
                            data: { 'csrf_mindler_token':csrfValue,'data': academicData },
                            success: function (response) {
                                var json = $.parseJSON(response);
                                if (json.status == "1") {
                                    location.href = baseUrl+"assess/viewprofile";
                                }

                                 $("#blue-scheme .mindler-loader").css("display", "none");
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }
            }

        }*//*else if (!filename && !filename2 && !href1 && !href2 ) {
            
            if(($("input[name='subject1']").val() == '')){
                $("input[name='subject1']").attr("placeholder", "Required");
                $("input[name='subject1']").css('border-color', 'red');
            }

            if(($("input[name='subject2']").val() == '')){
                $("input[name='subject2']").attr("placeholder", "Required");
                $("input[name='subject2']").css('border-color', 'red');
            }

            if(($("input[name='subject3']").val() == '')){
                $("input[name='subject3']").attr("placeholder", "Required");
                $("input[name='subject3']").css('border-color', 'red');
            }

            if(($("input[name='subject4']").val() == '')){
                $("input[name='subject4']").attr("placeholder", "Required");
                $("input[name='subject4']").css('border-color', 'red');
            }

            if(($("input[name='subject5']").val() == '')){
                $("input[name='subject5']").attr("placeholder", "Required");
                $("input[name='subject5']").css('border-color', 'red');
            }

            if(($("input[name='subject21']").val() == '')){
                $("input[name='subject21']").attr("placeholder", "Required");
                $("input[name='subject21']").css('border-color', 'red');
            }

            if(($("input[name='subject22']").val() == '')){
                $("input[name='subject22']").attr("placeholder", "Required");
                $("input[name='subject22']").css('border-color', 'red');
            }

            if(($("input[name='subject23']").val() == '')){
                $("input[name='subject23']").attr("placeholder", "Required");
                $("input[name='subject23']").css('border-color', 'red');
            }

            if(($("input[name='subject24']").val() == '')){
                $("input[name='subject24']").attr("placeholder", "Required");
                $("input[name='subject24']").css('border-color', 'red');
            }

            if(($("input[name='subject25']").val() == '')){
                $("input[name='subject25']").attr("placeholder", "Required");
                $("input[name='subject25']").css('border-color', 'red');
            }

            if($("input[name='marks1']").val() == ''){
                $("input[name='marks1']").attr("placeholder", "Required");
                $("input[name='marks1']").css('border-color', 'red');
            }

            if($("input[name='marks2']").val() == ''){
                $("input[name='marks2']").attr("placeholder", "Required");
                $("input[name='marks2']").css('border-color', 'red');
            }

            if($("input[name='marks3']").val() == ''){
                $("input[name='marks3']").attr("placeholder", "Required");
                $("input[name='marks3']").css('border-color', 'red');
            }

            if($("input[name='marks4']").val() == ''){
                $("input[name='marks4']").attr("placeholder", "Required");
                $("input[name='marks4']").css('border-color', 'red');
            }

            if($("input[name='marks5']").val() == ''){
                $("input[name='marks5']").attr("placeholder", "Required");
                $("input[name='marks5']").css('border-color', 'red');
            }

            if($("input[name='marks21']").val() == ''){
                $("input[name='marks21']").attr("placeholder", "Required");
                $("input[name='marks21']").css('border-color', 'red');
            }

            if($("input[name='marks22']").val() == ''){
                $("input[name='marks22']").attr("placeholder", "Required");
                $("input[name='marks22']").css('border-color', 'red');
            }

            if($("input[name='marks23']").val() == ''){
                $("input[name='marks23']").attr("placeholder", "Required");
                $("input[name='marks23']").css('border-color', 'red');
            }

            if($("input[name='marks24']").val() == ''){
                $("input[name='marks24']").attr("placeholder", "Required");
                $("input[name='marks24']").css('border-color', 'red');
            }

            if($("input[name='marks25']").val() == ''){
                $("input[name='marks25']").attr("placeholder", "Required");
                $("input[name='marks25']").css('border-color', 'red');
            }

        } */else if (filename && !filename2 && !href2 && (($("input[name='subject21']").val() == '' && $("input[name='marks21']").val() == '') || ($("input[name='subject22']").val() == '' && $("input[name='marks22']").val() == '') || ($("input[name='subject23']").val() == '' && $("input[name='marks23']").val() == '') || ($("input[name='subject24']").val() == '' && $("input[name='marks24']").val() == '') || ($("input[name='subject25']").val() == '' && $("input[name='marks25']").val() == ''))) {
            
           
            if(($("input[name='subject21']").val() == '')){
                $("input[name='subject21']").attr("placeholder", "Required");
                $("input[name='subject21']").css('border-color', 'red');
            }

            if(($("input[name='subject22']").val() == '')){
                $("input[name='subject22']").attr("placeholder", "Required");
                $("input[name='subject22']").css('border-color', 'red');
            }

            if(($("input[name='subject23']").val() == '')){
                $("input[name='subject23']").attr("placeholder", "Required");
                $("input[name='subject23']").css('border-color', 'red');
            }

            if(($("input[name='subject24']").val() == '')){
                $("input[name='subject24']").attr("placeholder", "Required");
                $("input[name='subject24']").css('border-color', 'red');
            }

            if(($("input[name='subject25']").val() == '')){
                $("input[name='subject25']").attr("placeholder", "Required");
                $("input[name='subject25']").css('border-color', 'red');
            }

            if($("input[name='marks21']").val() == ''){
                $("input[name='marks21']").attr("placeholder", "Required");
                $("input[name='marks21']").css('border-color', 'red');
            }

            if($("input[name='marks22']").val() == ''){
                $("input[name='marks22']").attr("placeholder", "Required");
                $("input[name='marks22']").css('border-color', 'red');
            }

            if($("input[name='marks23']").val() == ''){
                $("input[name='marks23']").attr("placeholder", "Required");
                $("input[name='marks23']").css('border-color', 'red');
            }

            if($("input[name='marks24']").val() == ''){
                $("input[name='marks24']").attr("placeholder", "Required");
                $("input[name='marks24']").css('border-color', 'red');
            }

            if($("input[name='marks25']").val() == ''){
                $("input[name='marks25']").attr("placeholder", "Required");
                $("input[name='marks25']").css('border-color', 'red');
            }

            
        }else if (filename2 && !filename && !href1 && (($("input[name='subject1']").val() == '' && $("input[name='marks1']").val() == '') || ($("input[name='subject2']").val() == '' && $("input[name='marks2']").val() == '') || ($("input[name='subject3']").val() == '' && $("input[name='marks3']").val() == '') || ($("input[name='subject4']").val() == '' && $("input[name='marks4']").val() == '') || ($("input[name='subject5']").val() == '' && $("input[name='marks5']").val() == ''))) {
            
            if(($("input[name='subject1']").val() == '')){
                $("input[name='subject1']").attr("placeholder", "Required");
                $("input[name='subject1']").css('border-color', 'red');
            }

            if(($("input[name='subject2']").val() == '')){
                $("input[name='subject2']").attr("placeholder", "Required");
                $("input[name='subject2']").css('border-color', 'red');
            }

            if(($("input[name='subject3']").val() == '')){
                $("input[name='subject3']").attr("placeholder", "Required");
                $("input[name='subject3']").css('border-color', 'red');
            }

            if(($("input[name='subject4']").val() == '')){
                $("input[name='subject4']").attr("placeholder", "Required");
                $("input[name='subject4']").css('border-color', 'red');
            }

            if(($("input[name='subject5']").val() == '')){
                $("input[name='subject5']").attr("placeholder", "Required");
                $("input[name='subject5']").css('border-color', 'red');
            }

            if($("input[name='marks1']").val() == ''){
                $("input[name='marks1']").attr("placeholder", "Required");
                $("input[name='marks1']").css('border-color', 'red');
            }

            if($("input[name='marks2']").val() == ''){
                $("input[name='marks2']").attr("placeholder", "Required");
                $("input[name='marks2']").css('border-color', 'red');
            }

            if($("input[name='marks3']").val() == ''){
                $("input[name='marks3']").attr("placeholder", "Required");
                $("input[name='marks3']").css('border-color', 'red');
            }

            if($("input[name='marks4']").val() == ''){
                $("input[name='marks4']").attr("placeholder", "Required");
                $("input[name='marks4']").css('border-color', 'red');
            }

            if($("input[name='marks5']").val() == ''){
                $("input[name='marks5']").attr("placeholder", "Required");
                $("input[name='marks5']").css('border-color', 'red');
            }

        

        }else if (!filename && !filename2 && !href1 && !href2 && (($("input[name='subject1']").val() == '' && $("input[name='marks1']").val() == '') || ($("input[name='subject2']").val() == '' && $("input[name='marks2']").val() == '') || ($("input[name='subject3']").val() == '' && $("input[name='marks3']").val() == '') || ($("input[name='subject4']").val() == '' && $("input[name='marks4']").val() == '') || ($("input[name='subject5']").val() == '' && $("input[name='marks5']").val() == '')) && (($("input[name='subject21']").val() == '' && $("input[name='marks21']").val() == '') || ($("input[name='subject22']").val() == '' && $("input[name='marks22']").val() == '') || ($("input[name='subject23']").val() == '' && $("input[name='marks23']").val() == '') || ($("input[name='subject24']").val() == '' && $("input[name='marks24']").val() == '') || ($("input[name='subject25']").val() == '' && $("input[name='marks25']").val() == ''))) {
            
            if(($("input[name='subject1']").val() == '')){
                $("input[name='subject1']").attr("placeholder", "Required");
                $("input[name='subject1']").css('border-color', 'red');
            }

            if(($("input[name='subject2']").val() == '')){
                $("input[name='subject2']").attr("placeholder", "Required");
                $("input[name='subject2']").css('border-color', 'red');
            }

            if(($("input[name='subject3']").val() == '')){
                $("input[name='subject3']").attr("placeholder", "Required");
                $("input[name='subject3']").css('border-color', 'red');
            }

            if(($("input[name='subject4']").val() == '')){
                $("input[name='subject4']").attr("placeholder", "Required");
                $("input[name='subject4']").css('border-color', 'red');
            }

            if(($("input[name='subject5']").val() == '')){
                $("input[name='subject5']").attr("placeholder", "Required");
                $("input[name='subject5']").css('border-color', 'red');
            }

            if(($("input[name='subject21']").val() == '')){
                $("input[name='subject21']").attr("placeholder", "Required");
                $("input[name='subject21']").css('border-color', 'red');
            }

            if(($("input[name='subject22']").val() == '')){
                $("input[name='subject22']").attr("placeholder", "Required");
                $("input[name='subject22']").css('border-color', 'red');
            }

            if(($("input[name='subject23']").val() == '')){
                $("input[name='subject23']").attr("placeholder", "Required");
                $("input[name='subject23']").css('border-color', 'red');
            }

            if(($("input[name='subject24']").val() == '')){
                $("input[name='subject24']").attr("placeholder", "Required");
                $("input[name='subject24']").css('border-color', 'red');
            }

            if(($("input[name='subject25']").val() == '')){
                $("input[name='subject25']").attr("placeholder", "Required");
                $("input[name='subject25']").css('border-color', 'red');
            }

            if($("input[name='marks1']").val() == ''){
                $("input[name='marks1']").attr("placeholder", "Required");
                $("input[name='marks1']").css('border-color', 'red');
            }

            if($("input[name='marks2']").val() == ''){
                $("input[name='marks2']").attr("placeholder", "Required");
                $("input[name='marks2']").css('border-color', 'red');
            }

            if($("input[name='marks3']").val() == ''){
                $("input[name='marks3']").attr("placeholder", "Required");
                $("input[name='marks3']").css('border-color', 'red');
            }

            if($("input[name='marks4']").val() == ''){
                $("input[name='marks4']").attr("placeholder", "Required");
                $("input[name='marks4']").css('border-color', 'red');
            }

            if($("input[name='marks5']").val() == ''){
                $("input[name='marks5']").attr("placeholder", "Required");
                $("input[name='marks5']").css('border-color', 'red');
            }

            if($("input[name='marks21']").val() == ''){
                $("input[name='marks21']").attr("placeholder", "Required");
                $("input[name='marks21']").css('border-color', 'red');
            }

            if($("input[name='marks22']").val() == ''){
                $("input[name='marks22']").attr("placeholder", "Required");
                $("input[name='marks22']").css('border-color', 'red');
            }

            if($("input[name='marks23']").val() == ''){
                $("input[name='marks23']").attr("placeholder", "Required");
                $("input[name='marks23']").css('border-color', 'red');
            }

            if($("input[name='marks24']").val() == ''){
                $("input[name='marks24']").attr("placeholder", "Required");
                $("input[name='marks24']").css('border-color', 'red');
            }

            if($("input[name='marks25']").val() == ''){
                $("input[name='marks25']").attr("placeholder", "Required");
                $("input[name='marks25']").css('border-color', 'red');
            }

        } 
        else if (!filename2 && !filename && !href1 && (($("input[name='subject1']").val() == '' && $("input[name='marks1']").val() == '') || ($("input[name='subject2']").val() == '' && $("input[name='marks2']").val() == '') || ($("input[name='subject3']").val() == '' && $("input[name='marks3']").val() == '') || ($("input[name='subject4']").val() == '' && $("input[name='marks4']").val() == '') || ($("input[name='subject5']").val() == '' && $("input[name='marks5']").val() == ''))) {
            
            if(($("input[name='subject1']").val() == '')){
                $("input[name='subject1']").attr("placeholder", "Required");
                $("input[name='subject1']").css('border-color', 'red');
            }

            if(($("input[name='subject2']").val() == '')){
                $("input[name='subject2']").attr("placeholder", "Required");
                $("input[name='subject2']").css('border-color', 'red');
            }

            if(($("input[name='subject3']").val() == '')){
                $("input[name='subject3']").attr("placeholder", "Required");
                $("input[name='subject3']").css('border-color', 'red');
            }

            if(($("input[name='subject4']").val() == '')){
                $("input[name='subject4']").attr("placeholder", "Required");
                $("input[name='subject4']").css('border-color', 'red');
            }

            if(($("input[name='subject5']").val() == '')){
                $("input[name='subject5']").attr("placeholder", "Required");
                $("input[name='subject5']").css('border-color', 'red');
            }

            if($("input[name='marks1']").val() == ''){
                $("input[name='marks1']").attr("placeholder", "Required");
                $("input[name='marks1']").css('border-color', 'red');
            }

            if($("input[name='marks2']").val() == ''){
                $("input[name='marks2']").attr("placeholder", "Required");
                $("input[name='marks2']").css('border-color', 'red');
            }

            if($("input[name='marks3']").val() == ''){
                $("input[name='marks3']").attr("placeholder", "Required");
                $("input[name='marks3']").css('border-color', 'red');
            }

            if($("input[name='marks4']").val() == ''){
                $("input[name='marks4']").attr("placeholder", "Required");
                $("input[name='marks4']").css('border-color', 'red');
            }

            if($("input[name='marks5']").val() == ''){
                $("input[name='marks5']").attr("placeholder", "Required");
                $("input[name='marks5']").css('border-color', 'red');
            }

        

        }else if (!filename && !filename2 && !href2 && (($("input[name='subject21']").val() == '' && $("input[name='marks21']").val() == '') || ($("input[name='subject22']").val() == '' && $("input[name='marks22']").val() == '') || ($("input[name='subject23']").val() == '' && $("input[name='marks23']").val() == '') || ($("input[name='subject24']").val() == '' && $("input[name='marks24']").val() == '') || ($("input[name='subject25']").val() == '' && $("input[name='marks25']").val() == ''))) {
            
           
            if(($("input[name='subject21']").val() == '')){
                $("input[name='subject21']").attr("placeholder", "Required");
                $("input[name='subject21']").css('border-color', 'red');
            }

            if(($("input[name='subject22']").val() == '')){
                $("input[name='subject22']").attr("placeholder", "Required");
                $("input[name='subject22']").css('border-color', 'red');
            }

            if(($("input[name='subject23']").val() == '')){
                $("input[name='subject23']").attr("placeholder", "Required");
                $("input[name='subject23']").css('border-color', 'red');
            }

            if(($("input[name='subject24']").val() == '')){
                $("input[name='subject24']").attr("placeholder", "Required");
                $("input[name='subject24']").css('border-color', 'red');
            }

            if(($("input[name='subject25']").val() == '')){
                $("input[name='subject25']").attr("placeholder", "Required");
                $("input[name='subject25']").css('border-color', 'red');
            }

            if($("input[name='marks21']").val() == ''){
                $("input[name='marks21']").attr("placeholder", "Required");
                $("input[name='marks21']").css('border-color', 'red');
            }

            if($("input[name='marks22']").val() == ''){
                $("input[name='marks22']").attr("placeholder", "Required");
                $("input[name='marks22']").css('border-color', 'red');
            }

            if($("input[name='marks23']").val() == ''){
                $("input[name='marks23']").attr("placeholder", "Required");
                $("input[name='marks23']").css('border-color', 'red');
            }

            if($("input[name='marks24']").val() == ''){
                $("input[name='marks24']").attr("placeholder", "Required");
                $("input[name='marks24']").css('border-color', 'red');
            }

            if($("input[name='marks25']").val() == ''){
                $("input[name='marks25']").attr("placeholder", "Required");
                $("input[name='marks25']").css('border-color', 'red');
            }

            
        }else {

            /*var data = $('#academic-tab-details').serialize();
            $("#blue-scheme .mindler-loader").css("display", "flex");
            if (data) {
                $.ajax({
                    url: baseUrl+"assess/myprofile",
                    type: "post",
                    data: { 'csrf_mindler_token':csrfValue,'data': data },
                    success: function (response) {
                        var json = $.parseJSON(response);
                        if (json.status == "1") {
                            location.href = baseUrl+"assess/viewprofile";
                        }

                         $("#blue-scheme .mindler-loader").css("display", "none");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }*/

                    $("#blue-scheme .mindler-loader").css("display", "flex");
                    var formData = new FormData($("#academic-tab-details")[0]);
                    var data = new FormData($("#academic-tab-details")[0]);
                    data.append('csrf_mindler_token',csrfValue);
                    $.each($("input[type='file']")[0].files, function (i, file) {
                        data.append('file', file);

                    });

                    
                    /*$("#tenthmarks").val('');
                    $("#twelthhmarks").val('');
                    $("#collegemarks").val('');*/
                    
                    $.ajax({
                        url: baseUrl+"assess/profiledoc",  // Controller URL
                        type: 'POST',
                        data: data,
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.status == 'success') {
                                $("#blue-scheme .mindler-loader").css("display", "none");
                                location.href = baseUrl+"assess/viewprofile";
                            } else if (json.status == 'failure') {
                                $("#blue-scheme .mindler-loader").css("display", "none");
                            }


                        }
                    });
                

                    var academicData = $('#academic-tab-details').serialize();
                    $("#blue-scheme .mindler-loader").css("display", "flex");
                    if (academicData) {
                        $.ajax({
                            url: baseUrl+"assess/myprofile",
                            type: "post",
                            data: { 'csrf_mindler_token':csrfValue,'data': academicData },
                            success: function (response) {
                                var json = $.parseJSON(response);
                                if (json.status == "1") {
                                    location.href = baseUrl+"assess/viewprofile";
                                }

                                 $("#blue-scheme .mindler-loader").css("display", "none");
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }
        }
    });
    
    


    $(".for-profile").find("ul #personal-tab").click();

    $(" .profile-tab-details #education-tab-details .next-back-btn").click(function (event) {
        event.preventDefault();
        $(this).parents(".my-tab-function").find("ul li").addClass("disabled");
        $(this).parents(".my-tab-function").find("ul li").removeClass("active");
        $(this).parents(".my-tab-function").find("ul #personal-tab").removeClass("disabled");
        $(this).parents(".my-tab-function").find("ul #personal-tab").click();

    });

    $(" .profile-tab-details #family-tab-details .next-back-btn").click(function (event) {
        event.preventDefault();
        $(this).parents(".my-tab-function").find("ul li").addClass("disabled");
        $(this).parents(".my-tab-function").find("ul li").removeClass("active");
        $(this).parents(".my-tab-function").find("ul #education-tab").removeClass("disabled");
        $(this).parents(".my-tab-function").find("ul #education-tab").click();

    });

    $(" .profile-tab-details #academic-tab-details .next-back-btn").click(function (event) {
        event.preventDefault();
        $(this).parents(".my-tab-function").find("ul li").addClass("disabled");
        $(this).parents(".my-tab-function").find("ul li").removeClass("active");
        $(this).parents(".my-tab-function").find("ul #family-tab").removeClass("disabled");
        $(this).parents(".my-tab-function").find("ul #family-tab").click();
     
    });

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);


    

    /*$('#academic-tab-details input').dblclick('click', function (event) {  
           event.preventDefault();
           $(this).css('pointer-events','none');
     });

    $('#academic-tab-details input').on('click', function (event) {  
           event.preventDefault();
           $(this).css('pointer-events','initial');
     });*/

    /*$('#academic-tab-details input').on('keydown', function(event) {
        if($(this).val().length>0){
            $('#academic-tab-details #event-none-file').css('pointer-events','none');
        }else{
            $('#academic-tab-details #event-none-file').css('pointer-events','initial');
        }
    });


    $('#academic-tab-details input').on('keyup', function(event) {
        if($(this).val().length>0){
            $('#academic-tab-details #event-none-file').css('pointer-events','none');
        }else{
            $('#academic-tab-details #event-none-file').css('pointer-events','initial');
        }
    });*/

    $('.date-picker').datepicker({

    });

    $('.time-picker').timepicker().val('');


    
    $(" .profile-tab-details [id^='next-']").click(function (event) {
        event.preventDefault();
        var id = $(this).attr('id').split('-');
        $(this).parents().find("ul.tab-ul li:nth-child("+id[1]+")").removeClass("disabled-click");
        $(".my-test-page .my-tab-function ul.tab-ul li:nth-child("+id[1]+")").click();
    });


/*book session*/

    $(".my-session-box.session-ready .session-details.for-schedule .btn-schedule").live("click", function (e) {
        e.preventDefault();
        var action = $(this).attr('data-id');
        $("#action").val('');
        $("#action").val(action);
        $(this).parents(".session-details").hide();
        $(this).parents(".my-session-box").find(".session-details.for-book-schedule").slideDown("slow");
        

    });


    $(".my-session-box.session-ready .session-details.for-book-schedule .btn-schedule").live("click", function (e) {
        e.preventDefault();

        var SessionDate = $(this).parents(".session-details.for-book-schedule").find(".select-date").val();
        var SessionMonth = $(this).parents(".session-details.for-book-schedule").find(".select-month").val();
        var SessionYear = $(this).parents(".session-details.for-book-schedule").find(".select-year").val();;
        var SessionTime = $(this).parents(".session-details.for-book-schedule").find(".select-time").val();
        var SessionMode = $(this).parents(".session-details.for-book-schedule").find(".choose-mode .btn-mode.btn-primary").text();
        var sessions = $(this).parent().parent().parent().parent().attr('id');
        //var sessions = $(this).parents().attr('id');
        var session = sessions.split('-');
        var action = $("#action").val();;

        var ScheduledSession = SessionDate + "-" + SessionMonth + "-" + SessionYear
        
        $(this).parents(".session-details.for-book-schedule").find(".error").remove(); // remove it
        if(SessionDate==null || SessionMonth==null || SessionYear==null){
            $(this).parents(".session-details.for-book-schedule").find("#choose-date").append('<label class="error">Please choose date from drop down.</label>');
            return false;
        }else if(SessionTime==null){
            $(this).parents(".session-details.for-book-schedule").find("#choose-time").append('<label class="error">Please choose time from drop down.</label>');
            return false;
        }else if(!$(".radio-inline__input").is(':checked')){
            $(this).parents(".session-details.for-book-schedule").find("#choose-mode").append('<label class="error">Please select your session mode.</label>');
            return false;
        }else{
            //$(this).parents(".session-details").find("input").val("");
            //$(this).parents(".session-details").find(".btn-mode").removeClass("btn-primary").addClass("btn-white");
            var data = {
                'csrf_mindler_token':csrfValue,
                'date':ScheduledSession,
                'time':SessionTime,
                'mode':SessionMode.trim(),
                'session':session[1],
                'action':action
            }
            $("#blue-scheme .mindler-loader").css("display", "flex");
            $.ajax({
               url: baseUrl+"assess/book_session",
               type: "post",
               data: data,
               success: function (response) {
                  $("#blue-scheme .mindler-loader").css("display", "none");
                   var json = $.parseJSON(response);
                   $(".session-ready .schedule-booked .for-schedule").hide();
                   },
               error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
               }
            });

            $.ajax({
                url: baseUrl+"assess/leadsquared",
                type: "post",
                data: {'csrf_mindler_token':csrfValue,'action':'slotrequested'},
                success: function (response) {
                   
                 },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            });

            $(this).parents(".session-details").hide();
            $(this).parents(".my-session-box").find(".session-details.schedule-booked").slideDown("slow");

            $(this).parents(".my-session-box").find(".session-details.schedule-booked").find(".scheduled-session-mode").text(SessionMode);
            $(this).parents(".my-session-box").find(".session-details.schedule-booked").find(".scheduled-session-date").text(ScheduledSession);
            $(this).parents(".my-session-box").find(".session-details.schedule-booked").find(".scheduled-session-time").text(SessionTime);
        }
    });


    $(".my-session-box.session-ready .session-details.schedule-booked .btn-schedule").live("click", function (e) {
        e.preventDefault();
        var action = $(this).attr('data-id');
        $("#action").val('');
        $("#action").val(action);
        //$(this).parents(".session-details").hide();
        
        $(this).parents(".my-session-box").find(".session-details.for-book-schedule").slideDown("slow");
    });

    $(".my-session-box.session-ready .session-details.for-book-schedule .btn-mode").live("click", function (e) {
        e.preventDefault();

        $(this).parents(".session-details").find(".btn-mode").removeClass("btn-primary").addClass("btn-white");
        $(this).addClass("btn-primary").removeClass("btn-white");
        $(this).find("input[type=radio]").attr('checked', true);

    });

   $(".my-session-box.session-done .session-details .star-rating .fa ").live('mouseover', function (event) {
        if (event.type == 'mouseover') {

           $(this).prevAll().removeClass("fa-star-o");
          $(this).prevAll().addClass("fa-star");

            $(this).removeClass("fa-star-o");
            $(this).addClass("fa-star");

          $(this).nextAll().removeClass("fa-star");
           $(this).nextAll().addClass("fa-star-o");
        }
    });

    $(".my-session-box.session-done .session-details .star-rating .fa ").live('mouseleave', function (event) {
        if (event.type == 'mouseleave') {

        

            $(this).addClass("fa-star-o");
            $(this).removeClass("fa-star");

            $(this).prevAll().addClass("fa-star-o");
            $(this).prevAll().removeClass("fa-star");

        }
    });

   


    $(".my-session-box.session-done .session-details .star-rating .fa").live("click", function (e) {
        e.preventDefault();
        var StarRating = $(this).index();

        $(this).prevAll().removeClass("fa-star-o");
       $(this).prevAll().addClass("fa-star");

        $(this).removeClass("fa-star-o");
        $(this).addClass("fa-star");



       $(this).parents(".user-rating-section").removeClass("star-rating");
       $(this).parents(".user-rating-section").addClass("star-rating-second");

        $(this).parents(".session-details").find(".comment").slideDown();
       


    });

    $(".my-session-box.session-done .session-details .star-rating-second .fa").live("click", function (e) {
        e.preventDefault();

    

        $(this).prevAll().removeClass("fa-star-o");
        $(this).prevAll().addClass("fa-star");

        $(this).nextAll().addClass("fa-star-o");
        $(this).nextAll().removeClass("fa-star");

        $(this).removeClass("fa-star-o");
        $(this).addClass("fa-star");




    });
    /* session rating comment*/

    $(".my-session-box.session-done .session-details .comment .btn-submit").live("click", function (e) {

        $(this).parents(".session-details").find(".user-rating-section").removeClass("star-rating-second");


        var StarCount = $(this).parents(".my-session-box.session-done").find("p .fa-star").length;
        var sessions = $(this).parent().parent().parent().parent().attr('id');
        var session = sessions.split('-');
        var rate =  StarCount;
        var comment =  $(this).parents(".session-done .session-details").find('#comment').val();
        //console.log(session); return false;
        if (comment == "") {
              //if empty then assign the border
              $(this).parents(".session-done .session-details").find('#comment').css("border", "1px solid red");
              $(this).parents(".session-done .session-details").find('#comment').next(".error").remove(); // remove it
              $(this).parents(".session-done .session-details").find('#comment').after('<label class="error">This field is required.</label>');
              $(this).parents(".session-done .session-details").find("textarea").focus();
              return false;
               
         }else{
            $(this).parents(".session-done .session-details").find('#comment').css("border", "1px solid black");
            $("#blue-scheme .mindler-loader").css("display", "flex");
            $(this).parents(".session-details").find(".comment").slideUp();
            $.ajax({
                      url: baseUrl+"assess/rating",
                      type: "post",
                      data: {'csrf_mindler_token':csrfValue,'session':session[1],rate:rate,comment:comment},
                      success: function (response) {
                       $("#blue-scheme .mindler-loader").css("display", "none");
                        var json = $.parseJSON(response);
                        if(json.status==1){
                            $(".my-session-box.session-done .session-details #center-1").remove();
                           /*$("#comment-"+arr[1]).hide();
                           $("#start-rating-"+arr[1]).hide();
                           $("#rated-"+arr[1]).show();
                           $("#action-"+arr[1]).removeClass("disabled");
                           $("#rated-"+arr[1]).empty();
                           $("#session-"+arr[1]+" center").empty();
                           var txt = $("#completed-rate-"+arr[1]).val();
                           $("#session-"+arr[1]+" center").append(txt);
                           
                           for (var i =1; i <= 5; i++) { 
                              if(i<=json.rate){
                                 $("#rated-"+arr[1]).append('<span class="fa fa-star"></span>');
                              }else{
                                 $("#rated-"+arr[1]).append('<span class="fa fa-star-o"></span>');
                              }
                           }*/
   
                        }
                          
                       },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                });
        }


    });


    $(".my-action-plan  .my-tab-function .ptd-box .widget .comment .btn-submit").live("click", function (e) {
        

        if($(this).parents(".comment").find("textarea").val().length==0){

            $(this).parents(".comment").find("textarea").next(".error").remove(); // remove it
            $(this).parents(".comment").find("textarea").after('<label class="error">This field is required.</label>');
            $(this).parents(".comment").find("textarea").focus();
            return false;
        }
        else if($(this).parents(".comment").find("textarea").val().length<5){

            $(this).parents(".comment").find("textarea").next(".error").remove(); // remove it
            $(this).parents(".comment").find("textarea").after('<label class="error">Message length should be more than 4 characters.</label>');
            $(this).parents(".comment").find("textarea").focus();
            return false;
        }
        else if($(this).parents(".comment").find("textarea").val().length > 0) {


            var postText = 0;
            postText = $(this).parents(".comment").find("textarea").val();

            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var AllDate = new Date();

            var month = monthNames[AllDate.getMonth()];
            var date = AllDate.getDate();
            var day = AllDate.getDay();
            var year = AllDate.getFullYear();

            var hours = AllDate.getHours();
            var minutes = AllDate.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var DateTime = date + ' ' + month + ' '+year +' - ' + hours + ':' + minutes + ' ' + ampm
            var session_id = $(this).attr('data-id');
            var sessionNo = $(this).attr('id')
            var splt = sessionNo.split('-');

            if(postText){
                 $.ajax({
                          url : baseUrl+"assess/actionComment",  // Controller URL
                          'type': 'post',
                           'cache': false,
                           'data': {'csrf_mindler_token':csrfValue,session_id:session_id,sessionNo:splt[1],'content':postText},
                            success : function(data) {
                            }
                       });
            }
            //var img = $(this).parents(".widget").find(".chat-conversation ul .counselor-post .chat-avatar img").first().attr("src");
            var img = $("#sidebar #sidebar-image").attr("src");
            var name = $(this).parents(".widget").find(".chat-conversation ul .counselor-post .msg-text i").first().text();
            $(this).parents(".comment").find("textarea").val("");
            $(this).parents(".widget").find(".chat-conversation ul").append('<li class="clearfix counselor-post"><div class="chat-avatar"><img src="'+img+'"></div><div class="conversation-text "><div class="msg-text"><i>'+name+'</i><p>' + postText + '</p></div><p class="post-time"><span>' + DateTime + '</span></p></div></li>');

            var scrollHeight = $(this).parents(".ptd-box").find(".chat-msg-list").prop('scrollHeight')
            $(this).parents(".ptd-box").find(".chat-msg-list").animate({ scrollTop: scrollHeight }, 2000);


        }

    });




    $('.my-activities-page .my-tab-function.for-activities  .profile-tab-details .ptd-box#for-yourchoice ul.drag-ul.default').sortable({

        //containment: 'parent',


    }, {
        stop: function (event, ui) {
            $(this).find("li .sequence").each(function (i) {
                var ServicesCounts = 1
                $(this).text(ServicesCounts + i);
            });

            if ($('.my-activities-page .ptd-box#for-yourchoice ul.drag-ul li:nth-child(1)').hasClass('careerrank-1') && $('.my-activities-page .ptd-box#for-yourchoice ul.drag-ul li:nth-child(2)').hasClass('careerrank-2') && $('.my-activities-page .ptd-box#for-yourchoice ul.drag-ul li:nth-child(3)').hasClass('careerrank-3') && $('.my-activities-page .ptd-box#for-yourchoice ul.drag-ul li:nth-child(4)').hasClass('careerrank-4') && $('.my-activities-page .ptd-box#for-yourchoice ul.drag-ul li:nth-child(5)').hasClass('careerrank-5')) {

                $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").attr("data-toggle", "modal");
                $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").removeAttr("id");
              
            }

            else {
                $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").removeAttr("data-toggle");
                $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").attr("id", "Button5");
               
            }
        }
    }, {
        axis: "y"
    }, {
        //scrollSensitivity: 10
    }, {
        scrollSpeed: 5
    }, {
        opacity: 0.80
    });


    $('.my-activities-page .my-tab-function.for-activities  .profile-tab-details .ptd-box#for-motivators ul.drag-ul.default').sortable({

        //containment: 'parent',


    }, {
        stop: function (event, ui) {
            $(this).find("li .sequence").each(function (i) {
                var ServicesCounts = 1
                $(this).text(ServicesCounts + i);
            });

            if ($('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(1)').hasClass('motivators-1') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(2)').hasClass('motivators-2') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(3)').hasClass('motivators-3') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(4)').hasClass('motivators-4') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(5)').hasClass('motivators-5') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(6)').hasClass('motivators-6') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(7)').hasClass('motivators-7') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(8)').hasClass('motivators-8') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(9)').hasClass('motivators-9') && $('.my-activities-page .ptd-box#for-motivators ul.drag-ul li:nth-child(10)').hasClass('motivators-10')) {

                $(".my-activities-page .ptd-box#for-motivators .btn-row .act-motivators-submit").attr("data-toggle", "modal");
                $(".my-activities-page .ptd-box#for-motivators .btn-row .act-motivators-submit").removeAttr("id");

            }

            else {
                $(".my-activities-page .ptd-box#for-motivators .btn-row .act-motivators-submit").removeAttr("data-toggle");
                $(".my-activities-page .ptd-box#for-motivators .btn-row .act-motivators-submit").attr("id", "mtvtrs");

            }
        }
    }, {
        axis: "y"
    }, {
        //scrollSensitivity: 10
    }, {
        scrollSpeed: 5
    }, {
        opacity: 0.80
    });


    $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box .btn-row .btn.add-option").live("click", function (e) {

        $(this).parents(".btn-row").slideUp();
        $(this).parents(".ptd-box").find(".add-drag-option ").slideDown();



    });


    $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box .add-drag-option .btn.btn-go").live("click", function (e) {
        $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").removeAttr("data-toggle");
        $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").attr("id", "Button5");

        if ($(this).parents(".input-group").find("input").val().length > 0) {
            var Option = $(this).parents(".input-group").find("input").val();
            Option = Option.toLowerCase().replace(/\b[a-z]/g, function (letter) { return letter.toUpperCase(); });

            $.ajax({
                  url: baseUrl+"assess/additional_career",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'careertext':Option},
                  success: function (response) {
                    
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
            });

            $.ajax({
                  url: baseUrl+"assess/additional_userrank",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':'insert'},
                  success: function (response) {
                    
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
            });

            $(this).parents(".input-group").find("input").val("");
        

            $(this).parents(".ptd-box").find("ul.drag-ul.default ").append('<li><div class="rank-box"><span class="rank">Rank</span><span class="sequence">6</span></div>' + Option + '<input type="hidden" name="career_id[]" id="career_id" value="99"><img src="http://mindlerdashboard.imgix.net/darg-arrow.png" class="drag-img"></li>');
                //$(this).parents(".ptd-box").find("ul.drag-ul.new-add").hide();
            $(this).parents(".ptd-box").find(".btn-row").slideDown();
            $(this).parents(".ptd-box").find(".add-drag-option ").slideUp();
          $(this).parents(".ptd-box").find(".btn-row .btn.add-option").hide();


            $(this).parents(".ptd-box").find("ul.drag-ul.default li .sequence").each(function (i) {
                var ServicesCounts = 1
                $(this).text(ServicesCounts + i);
            })
        }
    });



    $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box .add-drag-option .btn.btn-cancel").live("click", function (e) {
        $(this).parents(".add-drag-option").find("input").val("");
        $(this).parents(".ptd-box").find(".btn-row").slideDown();
        $(this).parents(".ptd-box").find(".add-drag-option ").slideUp();
    });





    $(".my-matches-page .matches-tab-section ul li").live('click', function (e) {
        e.preventDefault();
        $(this).parents("ul").find("li").removeClass("active");
        $(this).addClass("active");

        var indexValue = $(this).index();


        $(this).parents(".my-matches-page").find(".matches-tab-details .details-boxes").hide();
        $(this).parents(".my-matches-page").find(".matches-tab-details .details-boxes").eq(indexValue).show();
    });

    $(".my-matches-page .matches-tab-section ul li:first-child").click();



    var YourChoiceHtml = $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box#for-yourchoice ul.drag-ul").html();
    var MotivatorsHtml = $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box#for-motivators ul.drag-ul").html();

    $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box#for-yourchoice .btn-reset").live('click', function (e) {

        $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box#for-yourchoice ul.drag-ul.default").html(YourChoiceHtml);
        $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").attr("data-toggle", "modal");
        $(".my-activities-page .ptd-box#for-yourchoice .btn-row .act-career-submit").removeAttr("id");
        $.ajax({
                  url: baseUrl+"assess/additional_userrank",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':'delete'},
                  success: function (response) {
                    
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
            });
        $(this).parents(".ptd-box").find(".btn-row .btn.add-option").show();
    });
    $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box#for-motivators .btn-reset").live('click', function (e) {
        $(".my-activities-page .ptd-box#for-motivators .btn-row .act-motivators-submit").attr("data-toggle", "modal");
        $(".my-activities-page .ptd-box#for-motivators .btn-row .act-motivators-submit").removeAttr("id");
        $(".my-activities-page .my-tab-function.for-activities .profile-tab-details .ptd-box#for-motivators ul.drag-ul").html(MotivatorsHtml);
    });
    //console.log(YourChoiceHtml)



    $("#modal-change-password .btn-change-password").click(function (e) {
         e.preventDefault();
         var pass = $("input[name='password']").val();
         var cpass = $("input[name='cpassword']").val();
         var lenght = pass.length;

        if (pass.length == 0) {
             $("input[name='password']").next(".validation").remove(); // remove it
             $("input[name='password']").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter password</div>');
             $("input[name='password']").focus();
        }
        else if (lenght < 6) {
             $("input[name='password']").next(".validation").remove(); // remove it
             $("input[name='password']").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Password length should be greater than 5 characters </div>');
             $("input[name='password']").focus();
        }
        else if (cpass.length == 0) {
             $("input[name='password']").next(".validation").remove(); // remove it
             $("input[name='cpassword']").next(".validation").remove(); // remove it
             $("input[name='cpassword']").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter password</div>');
             $("input[name='cpassword']").focus();
        }
        else if (pass.length>0 && cpass.length>0 && pass!==cpass) {
             $("input[name='password']").next(".validation").remove(); // remove it
             $("input[name='cpassword']").next(".validation").remove(); // remove it
             $("input[name='cpassword']").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Passwords do not match</div>');
             $("input[name='cpassword']").focus();
        }else{
             $("input[name='password']").next(".validation").remove(); // remove it
             $("input[name='cpassword']").next(".validation").remove(); // remove it
             $("#blue-scheme .mindler-loader").css("display", "flex");
             $.ajax({
                   type: "POST",
                   url: baseUrl+"assess/changePassword",
                   data: {'csrf_mindler_token':csrfValue,"pass":pass} ,
                   success: function(response){
                      $("#blue-scheme .mindler-loader").css("display", "none");
                      var json = $.parseJSON(response);
                      if(json.status===404){
                         $("input[name='password']").next(".validation").remove(); // remove it
                         $("input[name='cpassword']").next(".validation").remove(); // remove it
                         $("input[name='cpassword']").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">'+json.message+'</div>');
                         $("input[name='cpassword']").focus();
                      }
                      else if(json.status===200){
                         $('#modal-change-password .close').click();
                         alertify.alert('Your password has been updated successfully');

                      }
                      else{
                        $('#modal-change-password .close').click();
                        alertify.alert(json.message);
                      }
                    }
                });
        }
          

    });




$("#modal-verify .modal-content.before-send .btn-send-otp").live('click', function (e) {
    e.preventDefault();

    $(this).parents(".modal-dialog").find(".modal-content.before-send").hide();
    $(this).parents(".modal-dialog").find(".modal-content.after-send").show();

});

$("#modal-verify .modal-content.after-send .btn-submit-otp").live('click', function (e) {
    e.preventDefault();

    $(this).parents(".modal-dialog").find(".modal-content.thankyou-box").show();
    $(this).parents(".modal-dialog").find(".modal-content.after-send").hide();

});

$("#modal-verify .modal-content.after-send .fa-pencil").live('click', function (e) {
    e.preventDefault();

   $(this).parents(".modal-dialog").find(".modal-content.before-send").show();
    $(this).parents(".modal-dialog").find(".modal-content.after-send").hide();

});


$("#modal-verify .modal-content.thankyou-box .btn-ok").live('click', function (e) {
    e.preventDefault();

    $(this).parents(".modal-dialog").find(".modal-content.thankyou-box").hide();
   $(this).parents(".modal-dialog").find(".modal-content.before-send").show();
   
   $(this).parents(".dashboard-page").find(".alert-number-verify").hide();

});

$(".btn-upgrade-second").click();



$(".my-action-plan .my-tab-function .profile-tab-details .ptd-box a").attr('target', '_blank');


$("#modal-upgrade-second-free .modal-footer .btn").live('click', function (e) {
    e.preventDefault();

    
    window.setTimeout(function () {
        $("body").addClass("modal-open");
    }, 1000); 
});


$(".widget-content.for-deactive .right-fixed-box .btn-status .fa-lock").remove();
$(".widget-content.for-deactive .right-fixed-box .btn-status").append('<i class="fa fa-lock"></i>');

$(document).on('click',".test-questions-box .fa-tooltip .test-tootip .tooltip-close", function (e) {
//$(".test-questions-box .fa-tooltip .test-tootip .tooltip-close").on('click', function (e) {
    e.stopPropagation();

    $(this).parents(".test-tootip").hide();


});



$(document).on('click', '.test-questions-box .fa-tooltip ', function (e) {
//$('.test-questions-box .fa-tooltip ').on('click', function (e) {
    e.stopPropagation();
    if ($(window).width() < 768) {

        $(this).find(".test-tootip").show();
    }
});

$(document).click(function () {
    //var $target = $(event.target);
    //if (!$target.is(".test-tootip") || !$target.is(".test-tootip").children()) {
    $(".test-tootip").hide();
    //}
});

if ('ontouchstart' in document.documentElement) { // or whatever "is this a touch device?" test we want to use
    $('body').css('cursor', 'pointer');
}

});


$('.my-session-page .my-session-box select').on('change', function () {
    $(this).addClass('select-active');
});



/*student dashboard*/
    
    var counter = 60;

    function verificationCounter(){
        var interval = setInterval(function() {
            counter--;
            // Display 'counter' wherever you want to display it.
            if (counter == 0) {
                // Display a login box
                clearInterval(interval);
                counter = 60;
                $("#modal-snff .step-2 .modal-body .otp-row .timer").html('<a class="post-timer" href="#">Resend</a>');
            }else{
             $("#modal-snff .step-2 .modal-body .otp-row .timer").html('<span class="pre-timer">Resend</span> 0:'+counter);
            }
        }, 1000);
    }

    /*var verifiedCode = $("#modal-snff .modal-content.step-2 .modal-body").find("input[name='verificationCode']").val();
    if(!verifiedCode){
        verificationCounter();
      }*/

    $(document).on('click',"#modal-snff .step-2 .modal-body .otp-row .timer .post-timer", function (e) {
      var phone = $("#modal-snff .modal-content.step-2").find('input[name="phone"]').val();
      var countryCode = $('#modal-snff .modal-content.step-2 .code-list-click').find('span').text();
      var name = $("#modal-snff .modal-content.step-1 .modal-body").find("input[name='name']").val();
      var getResendCount = localStorage.getItem(phone);
      $(this).parents(".modal-body").find("input[name='verificationCode']").val('');
      /*Resend verification code*/
         
        if(countryCode=='+91' && phone.length==10){
          var validate = true;
        }else if(countryCode!='+91' && phone.length>0){
          var validate = true;
        }else{
          var validate = false;
        }

        if(getResendCount<=2){
        
          if(phone && validate==true){

            
            $.post( baseUrl+"assess/dashboard", {name:name, countryCode:countryCode, mobile: phone}).done(function( data ) {
              var json = $.parseJSON(data);
              if(json.status==200){
                verificationCounter();
              }else if(json.status==400){
                $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
                $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">You have entered wrong mobile number</div>');
              }

            });
            $("#modal-snff .step-2 .verification-code-text").show();
            var incrementResend = (getResendCount)?(parseInt(getResendCount)+parseInt(1)):1;
            localStorage.setItem(phone,incrementResend);
          }

        }else{
          
          $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
          $("#modal-snff .modal-content.step-2").find('input[name="verificationCode"]').after('<div class="snff-alert">You have exceed your limit</div>');
          $("#modal-snff .step-2 .modal-body .otp-row .timer .post-timer").hide();
        }
      //$("#blue-scheme .mindler-loader").css("display", "none");

    });

   /* $("#modal-snff .step-1 .modal-header .email-edit a.email-edit-click").on('click', function (e) {
    e.preventDefault();

      var studentEmail = 0;
      studentEmail = $(this).parents(".email-edit").find(".email-text").text();
      $(this).parents(".email-edit").find(".email-text").hide();
      $(this).parents(".email-edit").find("input").addClass("slide"); 
      $(this).parents(".email-edit").find("input").val(studentEmail); 
      $(this).parents(".email-edit").find(".email-edit-click").hide(); 
      $(this).parents(".email-edit").find(".email-ok-click").show(); 
    });*/


    $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").on('click', function (e) {
        var studentEmail = 0;
        studentEmail = $(this).parents(".email-edit").find("input").val(); 
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

        $(this).parents(".email-edit").find(".snff-alert").remove();
        if(!studentEmail){
            $(this).after('<div class="snff-alert">This field is required.</div>');
            $(this).parents(".email-edit").find("input").focus();
            return false;
        }else if(!filter.test(studentEmail)){
            $(this).after('<div class="snff-alert">Please enter valid email address.</div>');
            $(this).parents(".email-edit").find("input").focus();
            return false;
        }else{

             $("#blue-scheme .mindler-loader").css("display", "flex");
             $.ajax({
                type: "POST",
                url: baseUrl+"assess/signupVerification",
                data: {email:studentEmail},
                context: this,
                success: function(response){
                  $("#blue-scheme .mindler-loader").css("display", "none");
                  var json = $.parseJSON(response);

                  if(json.status==404){
                    $(this).after('<div class="snff-alert">'+json.message+'</div>');
                    $(this).parents(".email-edit").find("input").focus();
                    $("#modal-snff .modal-content.step-1 .modal-body").find(".dashboard-modal-1").hide();
                    $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').empty();
                    $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').append('<a href="'+baseUrl+'login/dashboardLogout?email='+studentEmail+'" class="btn btn-orange">Login to continue</a>');

                  }else if(json.result && json.result!='ok'){
                    $(this).after('<div class="snff-alert">The email address you entered is not correct. Please try again.</div>');
                    $(this).parents(".email-edit").find("input").focus();
                  }else{
                    
                    if(json.result=='ok'){
                        $("#modal-snff .modal-content.step-1 .modal-body").find("input[name='verificationCode']").attr("readonly", false);
                        $("#modal-snff .modal-content.step-1 .modal-body").find("input[name='verificationCode']").val(' ');
                        $("#modal-snff .modal-content.step-1 .modal-body .otp-row").find('.timer').remove();
                        $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").focus();
                    }

                    $(this).parents(".email-edit").find("input").hide(); 
                    $(this).parents(".email-edit").find("input").removeAttr("style");
                    $(this).parents(".email-edit").find("input").removeClass("slide"); 
                    $(this).parents(".email-edit").find(".email-text").show();
                    $(this).parents(".email-edit").find(".email-text").text(studentEmail);
                    $(this).parents(".email-edit").find(".email-edit-click").show(); 
                    $(this).parents(".email-edit").find(".email-ok-click").hide(); 
                  }
                     
                }
             });
          
        }
    });

$(document).on('click',"#modal-snff .step-1 .modal-header .email-edit a.email-edit-click", function (e) {
    e.preventDefault();

    $("#modal-snff .modal-content.step-1 .modal-body").find(".dashboard-modal-1").show();
    $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').empty();
    $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').append('<button class="btn btn-orange" id="btn-next">Next</button>');
    $('#modal-snff .modal-content.step-1 .modal-header .email-edit').find(".snff-alert").remove();
    var studentEmail = 0;
    studentEmail = $(this).parents(".email-edit").find(".email-text").text();
    $(this).parents(".email-edit").find(".email-text").hide();
    $(this).parents(".email-edit").find("input").addClass("slide"); 
    $(this).parents(".email-edit").find("input").val(studentEmail); 
    $(this).parents(".email-edit").find(".email-edit-click").hide(); 
    $(this).parents(".email-edit").find(".email-ok-click").show(); 
});


$("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").on('click', function (e) {
    var studentEmail = 0;
    studentEmail = $(this).parents(".email-edit").find("input").val(); 
    if(studentEmail){
      $(this).parents(".email-edit").find("input").hide(); 
      $(this).parents(".email-edit").find("input").removeAttr("style");
      $(this).parents(".email-edit").find("input").removeClass("slide"); 
      $(this).parents(".email-edit").find(".email-text").show();
      $(this).parents(".email-edit").find(".email-text").text(studentEmail);
      $(this).parents(".email-edit").find(".email-edit-click").show(); 
      $(this).parents(".email-edit").find(".email-ok-click").hide(); 
    }

   
});




    $("#modal-snff .step-1 .modal-body .choose-group").on('click', function (e) {
        e.preventDefault();
        $(this).find("input[name='choose-group']").prop("checked", true);
        $("#modal-snff .modal-body .choose-class").find("input[name='package']").prop("checked", false);
        var radioValue = $("input[name='choose-group']:checked").val();
        $(this).parents(".modal-body").find(".snff-alert").remove();
        $(this).parents(".form-group").find(".choose-group").removeClass("active");
        $(this).addClass("active");
        $(this).parents(".modal-body").find(".form-group .choose-class").removeClass("active");
        $("#normal-signup").attr('data-vi','1');
        $("#btn-next").attr('data-vi','1');

        if ($("#modal-snff .modal-body .choose-group.for-stream").hasClass("active")) {
            $("#modal-snff .step-1 .choose-class-row.for-career").hide();
            $("#modal-snff .step-1 .choose-class-row.for-college").hide();
            $("#modal-snff .step-1 .choose-class-row.for-stream").show();

        }
        if ($("#modal-snff .modal-body .choose-group.for-career").hasClass("active")) {
            $("#modal-snff .step-1 .choose-class-row.for-stream").hide();
            $("#modal-snff .step-1 .choose-class-row.for-college").hide();
            $("#modal-snff .step-1 .choose-class-row.for-career").show();

        }
        if ($("#modal-snff .modal-body .choose-group.for-college").hasClass("active")) {
            $("#modal-snff .step-1 .choose-class-row.for-stream").hide();
            $("#modal-snff .step-1 .choose-class-row.for-career").hide();
            $("#modal-snff .step-1 .choose-class-row.for-college").show();
        }

    });

    $("#modal-snff .modal-body .choose-class").on('click', function (e) {
        e.preventDefault();
        $(this).parents(".modal-body").find(".snff-alert").remove(); 
        $(this).find("input[name='package']").prop("checked", true);
        $(this).parents(".form-group").find(".choose-class").removeClass("active");
        $(this).addClass("active");
    });

    $("#modal-snff .modal-body .password-flip .p-flip").on('click', function (e) {
        e.preventDefault();

        $(this).parents(".password-flip").find('input').toggleClass("call-show");
        $(this).toggleClass("call-show");

        if ($(this).parents(".password-flip").find('input').hasClass("call-show")) {
            $(this).parents(".password-flip").find('.p-flip').text("Hide");
            $(this).parents(".password-flip").find('input').attr({ type: "text" });
        }
        else {
            $(this).parents(".password-flip").find('.p-flip').text("Show");
            $(this).parents(".password-flip").find('input').attr({ type: "password" });
        }
    });


    $('#modal-snff .modal-body .parent-check input[type="checkbox"]').on('ifChanged', function (event) {
        if ($(this).is(':checked')) {


            $("#modal-snff .modal-body .for-parents-label").show();
            $("#modal-snff .modal-body .for-child-label").hide();

        } else {
            $("#modal-snff .modal-body .for-parents-label").hide();
            $("#modal-snff .modal-body .for-child-label").show();
        }
    });


    /*paid without signup*/
    /*$(document).on('click','#modal-snff .modal-content.step-1 .modal-body #paid-btn-next', function (e) {
        e.preventDefault();
        var name = $(this).parents(".modal-body").find("input[name='name']").val();
        var regexp = /^[a-zA-Z ]*$/;
        $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
        $('#modal-snff .modal-content.step-1 .modal-header .email-edit').find(".snff-alert").remove();
        var vi = $("#btn-next").attr('data-vi');
        var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
        parent = (parent==true)?1:0;
        var verificationCode =  $(this).parents(".modal-body").find("input[name='verificationCode']").val();
        var studentEmail = $("input[name='verifyEmail']").val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var visibleElements = $('.email-edit-click:visible').length;
        
        $("#blue-scheme .mindler-loader").css("display", "flex");
        $.ajax({
            type: "POST",
            url: baseUrl+"assess/signupVerification",
            data: {email:studentEmail},
            context: this,
            success: function(response){
              $("#blue-scheme .mindler-loader").css("display", "none");
              var json = $.parseJSON(response);
              

                if(verificationCode && json.result=='ok'){

                   $("input[name='verificationCode']").val(' ');
                }

                if(!verificationCode){
                    $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").after('<div class="snff-alert">Please enter your verification code</div>');
                    $("input[name='verificationCode']").focus();
                }else if(verificationCode){

                    $.post( baseUrl+"assess/verifyEmailedCode", {verificationCode: verificationCode}).done(function( data ) {
                    
                        $("#blue-scheme .mindler-loader").css("display", "none");
                        var jsonData = $.parseJSON(data);

                        if (jsonData.status==404) {
                            $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").after('<div class="snff-alert">'+jsonData.message+'</div>');
                            $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").focus();
                            
                        }
                        else if (!name) {
                         $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please fill your name</div>');
                         $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                            
                        }else if (name.length>0 && regexp.test(name)==false) {
                              
                         $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please enter valid name</div>');
                         $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                            
                        }else if (!$("input[name='package']:checked").val()) {

                            $("#modal-snff .modal-content.step-1 .modal-body .choose-class-row").append('<div class="snff-alert">Please choose a class</div>');

                        }else if ($("input[name='package']:checked").val()) {
                             $(".modal-content.step-2 .modal-header").find('p').empty();
                             $(".profile-element .font-bold").empty();
                             $(".modal-content.step-2 .modal-header").find('p').append('Hi '+name+'!');
                             

                            $("#btn-next").removeAttr('data-vi');
                            $("#modal-snff .modal-content.step-1").hide();
                            $("#modal-snff .modal-content.step-2").show();

                             var package = $("input[name='package']:checked").val();
                             var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
                        }
                      });
                    }

                

            }
                 
        });
    });*/
    

    $(document).on('click','#modal-snff .modal-content.step-1 .modal-body #paid-btn-next', function (e) {
        e.preventDefault();
        var name = $(this).parents(".modal-body").find("input[name='name']").val();
        var regexp = /^[a-zA-Z ]*$/;
        $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
        $('#modal-snff .modal-content.step-1 .modal-header .email-edit').find(".snff-alert").remove();
        var vi = $("#btn-next").attr('data-vi');
        var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
        parent = (parent==true)?1:0;
        var verificationCode =  $(this).parents(".modal-body").find("input[name='verificationCode']").val();
        var studentEmail = $("input[name='verifyEmail']").val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var visibleElements = $('.email-edit-click:visible').length;

        if (!name) {
           $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please fill your name</div>');
           $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
              
          }else if (name.length>0 && regexp.test(name)==false) {
                
           $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please enter valid name</div>');
           $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
              
          }else if (!$("input[name='package']:checked").val()) {

              $("#modal-snff .modal-content.step-1 .modal-body .choose-class-row").append('<div class="snff-alert">Please choose a class</div>');

          }else if ($("input[name='package']:checked").val()) {
               $(".modal-content.step-2 .modal-header").find('p').empty();
               $(".profile-element .font-bold").empty();
               $(".modal-content.step-2 .modal-header").find('p').append('Hi '+name+'!');
               

              $("#btn-next").removeAttr('data-vi');
              $("#modal-snff .modal-content.step-1").hide();
              $("#modal-snff .modal-content.step-2").show();

               var package = $("input[name='package']:checked").val();
               var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
          }
    });
    /*end of paid*/

    /*$(document).on('click','#modal-snff .modal-content.step-1 .modal-body #btn-next', function (e) {
        e.preventDefault();
        var name = $(this).parents(".modal-body").find("input[name='name']").val();
        var regexp = /^[a-zA-Z ]*$/;
        $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
        $('#modal-snff .modal-content.step-1 .modal-header .email-edit').find(".snff-alert").remove();
        var vi = $("#btn-next").attr('data-vi');
        var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
        parent = (parent==true)?1:0;
        var verificationCode =  $(this).parents(".modal-body").find("input[name='verificationCode']").val();
        var studentEmail = $("input[name='verifyEmail']").val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var visibleElements = $('.email-edit-click:visible').length;
        
            if(!studentEmail && visibleElements==0){
                $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">This field is required.</div>');
                $("input[name='verifyEmail']").focus();
                return false;
            }else if(!filter.test(studentEmail) && visibleElements==0){
                $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">Please enter valid email address.</div>');
                $("input[name='verifyEmail']").focus();
                return false;
            }
            else{

                $("#blue-scheme .mindler-loader").css("display", "flex");
                $.ajax({
                    type: "POST",
                    url: baseUrl+"assess/signupVerification",
                    data: {email:studentEmail},
                    context: this,
                    success: function(response){
                      $("#blue-scheme .mindler-loader").css("display", "none");
                      var json = $.parseJSON(response);
                      if(json.status==404){
                        $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">'+json.message+'</div>');
                        $("input[name='verifyEmail']").parents(".email-edit").find("input").focus();

                            $("#modal-snff .modal-content.step-1 .modal-body").find(".dashboard-modal-1").hide();
                            $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').empty();
                            $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').append('<a href="'+baseUrl+'login/dashboardLogout?email='+studentEmail+'" class="btn btn-orange">Login to continue</a>');

                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").hide(); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeAttr("style");
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeClass("slide"); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").show();
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").text(studentEmail);
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-edit-click").show(); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-ok-click").hide();
                      }else if(json.result && json.result!='ok'){
                        $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">The email address you entered is not correct. Please try again.</div>');
                        $("input[name='verifyEmail']").parents(".email-edit").find("input").focus();

                        $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").hide(); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeAttr("style");
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeClass("slide"); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").show();
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").text(studentEmail);
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-edit-click").show(); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-ok-click").hide();
                      }else{

                        if(json.status==200 || json.result=='ok'){

                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").hide(); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeAttr("style");
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeClass("slide"); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").show();
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").text(studentEmail);
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-edit-click").show(); 
                            $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-ok-click").hide(); 
                        }

                        if(json.SourceMedium && json.SourceMedium!='uae'){

                            if(verificationCode && json.result=='ok'){

                               $("input[name='verificationCode']").val(' ');
                            }

                            if(!verificationCode){
                                $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").after('<div class="snff-alert">Please enter your verification code</div>');
                                $("input[name='verificationCode']").focus();
                            }else if(verificationCode){

                                $.post( baseUrl+"assess/verifyEmailedCode", {verificationCode: verificationCode}).done(function( data ) {
                                
                                    $("#blue-scheme .mindler-loader").css("display", "none");
                                    var jsonData = $.parseJSON(data);

                                    if (jsonData.status==404) {
                                        $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").after('<div class="snff-alert">'+jsonData.message+'</div>');
                                        $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").focus();
                                        
                                    }
                                    else if (!name) {
                                     $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please fill your name</div>');
                                     $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                                        
                                    }else if (name.length>0 && regexp.test(name)==false) {
                                          
                                     $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please enter valid name</div>');
                                     $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                                        
                                    }else if (!$("input[name='package']:checked").val() && vi!=1) {

                                        $("#modal-snff .modal-content.step-1 .modal-body #form-group").append('<div class="snff-alert">Please choose an option</div>');
                                    
                                    }else if (!$("input[name='package']:checked").val()) {

                                        $("#modal-snff .modal-content.step-1 .modal-body .choose-class-row").append('<div class="snff-alert">Please choose a class</div>');

                                    }else if ($("input[name='package']:checked").val()) {
                                         $(".modal-content.step-2 .modal-header").find('p').empty();
                                         $(".profile-element .font-bold").empty();
                                         $(".modal-content.step-2 .modal-header").find('p').append('Hi '+name+'!');
                                         

                                        $("#btn-next").removeAttr('data-vi');
                                        $("#modal-snff .modal-content.step-1").hide();
                                        $("#modal-snff .modal-content.step-2").show();

                                         var package = $("input[name='package']:checked").val();
                                         var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
                                    }
                                  });
                            }
                        }else{

                            if (!name) {
                             $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please fill your name</div>');
                             $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                                
                            }else if (name.length>0 && regexp.test(name)==false) {
                                  
                             $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please enter valid name</div>');
                             $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                                
                            }else if (!$("input[name='package']:checked").val() && vi!=1) {

                                $("#modal-snff .modal-content.step-1 .modal-body #form-group").append('<div class="snff-alert">Please choose an option</div>');
                            
                            }else if (!$("input[name='package']:checked").val()) {

                                $("#modal-snff .modal-content.step-1 .modal-body .choose-class-row").append('<div class="snff-alert">Please choose a class</div>');

                            }else if ($("input[name='package']:checked").val()) {
                                 $(".modal-content.step-2 .modal-header").find('p').empty();
                                 $(".profile-element .font-bold").empty();
                                 $(".modal-content.step-2 .modal-header").find('p').append('Hi '+name+'!');
                                 

                                $("#btn-next").removeAttr('data-vi');
                                $("#modal-snff .modal-content.step-1").hide();
                                $("#modal-snff .modal-content.step-2").show();

                                 var package = $("input[name='package']:checked").val();
                                 var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
                            }
                        }

                    }

                    }
                         
                });
              
            }
        
    });*/


    $(document).on('click','#modal-snff .modal-content.step-1 .modal-body #btn-next', function (e) {
          e.preventDefault();
          var name = $(this).parents(".modal-body").find("input[name='name']").val();
          var regexp = /^[a-zA-Z ]*$/;
          $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
          $('#modal-snff .modal-content.step-1 .modal-header .email-edit').find(".snff-alert").remove();
          var vi = $("#btn-next").attr('data-vi');
          var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
          parent = (parent==true)?1:0;
          var verificationCode =  $(this).parents(".modal-body").find("input[name='verificationCode']").val();
          var studentEmail = $("input[name='verifyEmail']").val();
          var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
          var visibleElements = $('.email-edit-click:visible').length;
          var phone = $("#modal-snff .modal-content.step-2").find('input[name="phone"]').val();

          if(!studentEmail && visibleElements==0){
              $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">This field is required.</div>');
              $("input[name='verifyEmail']").focus();
              return false;
          }else if(!filter.test(studentEmail) && visibleElements==0){
              $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">Please enter valid email address.</div>');
              $("input[name='verifyEmail']").focus();
              return false;
          }
          else{

              $("#blue-scheme .mindler-loader").css("display", "flex");
              $.ajax({
                  type: "POST",
                  url: baseUrl+"assess/signupVerification",
                  data: {email:studentEmail},
                  context: this,
                  success: function(response){
                      $("#blue-scheme .mindler-loader").css("display", "none");
                      var json = $.parseJSON(response);
                      if(json.status==404){
                          $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">'+json.message+'</div>');
                          $("input[name='verifyEmail']").parents(".email-edit").find("input").focus();
                          $("#modal-snff .modal-content.step-1 .modal-body").find(".dashboard-modal-1").hide();
                          $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').empty();
                          $('#modal-snff .modal-content.step-1 .modal-body #contunue-btn').append('<a href="'+baseUrl+'login/dashboardLogout?email='+studentEmail+'" class="btn btn-orange">Login to continue</a>');
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").hide(); 
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeAttr("style");
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeClass("slide"); 
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").show();
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").text(studentEmail);
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-edit-click").show(); 
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-ok-click").hide();
                      }else if(json.result && json.result!='ok'){
                          $("#modal-snff .modal-content.step-1 .email-ok-click").after('<div class="snff-alert">The email address you entered is not correct. Please try again.</div>');
                          $("input[name='verifyEmail']").parents(".email-edit").find("input").focus();
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").hide(); 
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeAttr("style");
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeClass("slide"); 
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").show();
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").text(studentEmail);
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-edit-click").show(); 
                          $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-ok-click").hide();
                        }else{
                          
                          if(json.status==200 || json.result=='ok'){

                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").hide(); 
                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeAttr("style");
                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find("input").removeClass("slide"); 
                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").show();
                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-text").text(studentEmail);
                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-edit-click").show(); 
                              $("#modal-snff .step-1 .modal-header .email-edit a.email-ok-click").parents(".email-edit").find(".email-ok-click").hide(); 
                          
                              if (!name) {
                               $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please fill your name</div>');
                               $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                                  
                              }else if (name.length>0 && regexp.test(name)==false) {
                                    
                               $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please enter valid name</div>');
                               $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                                  
                              }else if (!$("input[name='package']:checked").val() && vi!=1) {

                                  $("#modal-snff .modal-content.step-1 .modal-body #form-group").append('<div class="snff-alert">Please choose an option</div>');
                              
                              }else if (!$("input[name='package']:checked").val()) {

                                  $("#modal-snff .modal-content.step-1 .modal-body .choose-class-row").append('<div class="snff-alert">Please choose a class</div>');

                              }else if ($("input[name='package']:checked").val()) {
                                   $(".modal-content.step-2 .modal-header").find('p').empty();
                                   $(".profile-element .font-bold").empty();
                                   $(".modal-content.step-2 .modal-header").find('p').append('Hi '+name+'!');
                                   

                                  $("#btn-next").removeAttr('data-vi');
                                  $("#modal-snff .modal-content.step-1").hide();
                                  $("#modal-snff .modal-content.step-2").show();

                                   var package = $("input[name='package']:checked").val();
                                   var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
                                  

                                  //localStorage.removeItem('phone');
                                  var isExist = $(this).attr('data-id');
                                  var countryCode = $('#modal-snff .modal-content.step-2 .code-list-click').find('span').text();
                                  var getPhone = localStorage.getItem('phone');
                                  var email = $("#modal-snff .modal-content.step-1 .modal-header").find("input[name='verifyEmail']").val();
                                  var getPhoneCount = localStorage.getItem(email);

                                  if(countryCode=='+91' && phone.length==10){
                                    var validate = true;
                                  }else if(countryCode!='+91' && phone.length>0){
                                    var validate = true;
                                  }else{
                                    var validate = false;
                                  }



                                  if(getPhoneCount<=3){ 
                                    if(phone && validate==true && !isExist){ 
                                        //$(this).parents('.step-2').find('.otp-row').show();
                                        var isResend = $("#modal-snff .step-2 .modal-body .otp-row .timer a").hasClass("post-timer");
                                        
                                        if(phone!=getPhone && isResend){ 
                                          $("#modal-snff .modal-body .form-group.otp-row .timer").show();
                                          //var mobile = countryCode.concat(phone);
                                          //verificationCounter();
                                          $.post( baseUrl+"assess/dashboard", {name:name, countryCode:countryCode, mobile: phone}).done(function( data ) {

                                              var json = $.parseJSON(data);
                                              if(json.status==200){
                                                verificationCounter();
                                              }else if(json.status==400){
                                                $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
                                                $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">You have entered wrong mobile number</div>');
                                              }
                                   
                                          });
                                          $("#modal-snff .step-2 .verification-code-text").show();
                                          var increment = (getPhoneCount)?(parseInt(getPhoneCount)+parseInt(1)):1;
                                          localStorage.setItem(email,increment);
                                        }

                                        if(isResend){
                                            localStorage.setItem('phone',phone);
                                            localStorage.setItem('countryCode',countryCode);
                                        }
                                    }
                                  }else{
                                    $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
                                    $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Your account has been blocked please contact at hello@mindler.com</div>');
                                    $("#modal-snff .step-2 .modal-body .otp-row .timer .post-timer").hide();
                                  }

                                  // if(phone && phone!=getPhone && !isExist){
                                  //   console.log(phone+'='+getPhone)
                                  //   localStorage.setItem('phone',phone);
                                  //   verificationCounter();
                                  // }

                              }
                          }

                      }
                  }
                       
              });
            
          }
        
    });
    
    
    $(document).on('blur','#modal-snff .modal-content.step-2 input[name="phone"]', function (e) {
        var phone = $(this).val();
        var countryCode = $('#modal-snff .modal-content.step-2 .code-list-click').find('span').text();
        var getPhone = localStorage.getItem('phone');
        var name = $("#modal-snff .modal-content.step-1 .modal-body").find("input[name='name']").val();
        var email = $("#modal-snff .modal-content.step-1 .modal-header").find("input[name='verifyEmail']").val();
        var getPhoneCount = localStorage.getItem(email);

        //localStorage.removeItem(email);
        //console.log(getPhoneCount); 
        
        if(countryCode=='+91' && phone.length==10){
          var validate = true;
        }else if(countryCode!='+91' && phone.length>0){
          var validate = true;
        }else{
          var validate = false;
        }

        if(getPhoneCount<=3){
          if(phone && validate==true){
              $(this).parents('.step-2').find('.otp-row').show();
              var isResend = $("#modal-snff .step-2 .modal-body .otp-row .timer a").hasClass("post-timer");
              
              if(isResend){
                  localStorage.setItem('phone',phone);
                  localStorage.setItem('countryCode',countryCode);
              }

              if(phone!=getPhone && isResend){
                $("#modal-snff .modal-body .form-group.otp-row .timer").show();
                //var mobile = countryCode.concat(phone);
                //verificationCounter();
                $.post( baseUrl+"assess/dashboard", {name:name, countryCode:countryCode, mobile: phone}).done(function( data ) {

                    var json = $.parseJSON(data);
                    if(json.status==200){
                      verificationCounter();
                    }else if(json.status==400){
                      $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
                      $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">You have entered wrong mobile number</div>');
                    }
         
                });
                $("#modal-snff .step-2 .verification-code-text").show();
                var increment = (getPhoneCount)?(parseInt(getPhoneCount)+parseInt(1)):1;
                localStorage.setItem(email,increment);
              }
          }
        }else{
          $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
          $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Your account has been blocked please contact at hello@mindler.com</div>');
          $("#modal-snff .step-2 .modal-body .otp-row .timer .post-timer").hide();
        }

    });
    

    $('#modal-snff .modal-content.step-2 .modal-body .delete-city').on('click', function (e) {

        if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
        }else{
          console.log('blocked');
        }
    });

    function showPosition(position) {
       $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&key=AIzaSyC0mL0hEIeIEB8sv7PdyEYGS2pa2YdwBO4', function(data) {
        var city = data.results[0]['address_components'][6].long_name;
        $("#modal-snff .modal-content.step-2").find('input[name="city"]').val(" ");
        let storableLocation = {};

        for (var ac = 0; ac < data.results[0].address_components.length; ac++) {
            
           var component = data.results[0].address_components[ac];
            
           if(component.types.includes('locality')) {
                $("#modal-snff .modal-content.step-2").find('input[name="city"]').val(component.long_name);
           }
           /*else if (component.types.includes('administrative_area_level_1')) {
                storableLocation.state = component.short_name;
           }
           else if (component.types.includes('country')) {
                storableLocation.country = component.long_name;
                storableLocation.registered_country_iso_code = component.short_name;
           }*/

        };

        $("#modal-snff .modal-content.step-2").find('input[name="city"]').focus();
         
       });
    }

    $('#modal-snff .modal-content.step-2 .modal-body #btn-back').on('click', function (e) {
        e.preventDefault();
        //$("#modal-snff .modal-body .choose-class").find("input[name='package']").prop("checked", false);
        //$("#modal-snff .step-1 .modal-body .choose-group").find("input[name='choose-group']").prop("checked", false);
        //$("#modal-snff .step-1 .modal-body .form-group").parents(".modal-body").find(".active").removeClass("active");
        $("#modal-snff .modal-content.step-2").find('input[name="password"]').val('');
        $('#modal-snff .modal-content.step-2 .modal-body #btn-signup-dashboard').parents(".modal-body").find(".snff-alert").remove();
        $("#modal-snff .modal-content.step-1").show();
        $("#modal-snff .modal-content.step-2").hide();
        $('#modal-snff .modal-content.step-1 .modal-body #btn-next').attr('data-id', 'vi-back');
    });


    /*for direct paid users*/
    $('#modal-snff .modal-content.step-2 .modal-body #paid-btn-signup-dashboard').on('click', function (e) {
        e.preventDefault();
        
        var name = $("input[name='name']").val();
        var package = $("input[name='package']:checked").val();
        var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
        var phone = $("#modal-snff .modal-content.step-2").find('input[name="phone"]').val();
        var pass = $("#modal-snff .modal-content.step-2").find('input[name="password"]').val();
        var city = $("#modal-snff .modal-content.step-2").find('input[name="city"]').val();
        var numeric = /^[0-9-+]+$/;
        var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
        parent = (parent==true)?1:0;
        $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
        
        if(!phone) {
               $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Please fill your mobile number</div>');
               $("#modal-snff .modal-content.step-2").find('input[name="phone"]').focus();
               return false;
        }
        else if ((numeric.test(phone)==false) || phone.length!=10){
            $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Please enter valid mobile number</div>');
            $("#modal-snff .modal-content.step-2").find('input[name="phone"]').focus();
            return false;
        }
        else if(!city) {
               $("#modal-snff .modal-content.step-2").find('input[name="city"]').after('<div class="snff-alert">Please fill your city</div>');
               $("#modal-snff .modal-content.step-2").find('input[name="city"]').focus();
               return false;
        }
        else if ((numeric.test(city)==true)){
            $("#modal-snff .modal-content.step-2").find('input[name="city"]').after('<div class="snff-alert">Please enter valid city</div>');
            $("#modal-snff .modal-content.step-2").find('input[name="city"]').focus();
            return false;
        }
        else if(!$("input[name='password']").val()) {
               $("#modal-snff .modal-content.step-2").find('input[name="password"]').after('<div class="snff-alert">Please fill your password</div>');
               $("#modal-snff .modal-content.step-2").find('input[name="password"]').focus();
               return false;
        }
        else if(pass.length<6) {
               $("#modal-snff .modal-content.step-2").find('input[name="password"]').after('<div class="snff-alert">Password length should be greater than 5 characters</div>');
               $("#modal-snff .modal-content.step-2").find('input[name="password"]').focus();
               return false;
        }
        else{
         $("#blue-scheme .mindler-loader").css("display", "flex");
         var is_mobile = $("#modal-snff .modal-content.step-2").find('input[name="is_mobile"]').val();
         $.ajax({
            type: "POST",
            url: baseUrl+"assess/updateInfo",
            data: {city:city,"class":cls,"name":name,"pass":pass,"phone":phone,package:package,parent:parent} ,
            success: function(response){
               $("#blue-scheme .mindler-loader").css("display", "none");
               var json = $.parseJSON(response);
               if(json.status==200){
                  if(is_mobile){
                    window.location.href = baseUrl+"assess/mobiletour";
                  }else{
                    window.location.href = baseUrl+"assess";
                  }
               }
               
            }
         });
        }

    });
    /*End of paid*/

    $('#modal-snff .modal-content.step-2 .modal-body #btn-signup-dashboard').on('click', function (e) {
        e.preventDefault();
        
        var name = $("input[name='name']").val();
        var package = $("input[name='package']:checked").val();
        var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
        var phone = $("#modal-snff .modal-content.step-2").find('input[name="phone"]').val();
        var pass = $("#modal-snff .modal-content.step-2").find('input[name="password"]').val();
        var city = $("#modal-snff .modal-content.step-2").find('input[name="city"]').val();
        var numeric = /^[0-9-+]+$/;
        var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
        parent = (parent==true)?1:0;
        var countryCode = $('#modal-snff .modal-content.step-2 .code-list-click').find('span').text();
        var verificationCode =  $(this).parents(".modal-body").find("input[name='verificationCode']").val();
        var designation =  $("#modal-snff .modal-content.step-2").find('select[name="designation"]').val();
        
        
        var email = $("#modal-snff .modal-content.step-1 .modal-header").find("input[name='verifyEmail']").val();
        var getPhoneCount = localStorage.getItem(email);
        $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it
        
        if(getPhoneCount>3){
          $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Your account has been blocked please contact at hello@mindler.com</div>');
        }
        else if(!phone) {
               $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Please fill your mobile number</div>');
               $("#modal-snff .modal-content.step-2").find('input[name="phone"]').focus();
               return false;
        }
        //else if ((numeric.test(phone)==false) || phone.length!=10){
        else if ((numeric.test(phone)==false) || phone.length<10 && countryCode==(+91)){
            $("#modal-snff .modal-content.step-2").find('input[name="phone"]').after('<div class="snff-alert">Please enter valid mobile number</div>');
            $("#modal-snff .modal-content.step-2").find('input[name="phone"]').focus();
            return false;
        }else if (!verificationCode) {
            $("#modal-snff .modal-content.step-2 .modal-body input[name='verificationCode']").after('<div class="snff-alert">Please enter your verification code</div>');
            $("#modal-snff .modal-content.step-2 .modal-body input[name='verificationCode']").focus();
            
        }else if(verificationCode){
          $("#blue-scheme .mindler-loader").css("display", "flex");
          $.post( baseUrl+"assess/verifyEmailedCode", {verificationCode: verificationCode}).done(function( data ) {

              $("#blue-scheme .mindler-loader").css("display", "none");
              var jsonData = $.parseJSON(data);

              if(jsonData.status==200){
                  $("#modal-snff .modal-body .form-group.otp-row .timer").hide();
              }else{
                  $("#modal-snff .modal-body .form-group.otp-row .timer").show();
              }

              if (jsonData.status==404) {
                  $("#modal-snff .modal-content.step-2 .modal-body input[name='verificationCode']").after('<div class="snff-alert">'+jsonData.message+'</div>');
                  $("#modal-snff .modal-content.step-2 .modal-body input[name='verificationCode']").focus();
                  
              }
              else if(!city) {
                 $("#modal-snff .modal-content.step-2").find('input[name="city"]').after('<div class="snff-alert">Please fill your city</div>');
                 $("#modal-snff .modal-content.step-2").find('input[name="city"]').focus();
                 return false;
              }
              else if(!designation) {
                 $("#modal-snff .modal-content.step-2").find('select[name="designation"]').after('<div class="snff-alert">Please select your designation</div>');
                 $("#modal-snff .modal-content.step-2").find('select[name="designation"]').focus();
                 return false;
              }
              else if ((numeric.test(city)==true)){
                  $("#modal-snff .modal-content.step-2").find('input[name="city"]').after('<div class="snff-alert">Please enter valid city</div>');
                  $("#modal-snff .modal-content.step-2").find('input[name="city"]').focus();
                  return false;
              }
              else if(!$("input[name='password']").val()) {
                     $("#modal-snff .modal-content.step-2").find('input[name="password"]').after('<div class="snff-alert">Please fill your password</div>');
                     $("#modal-snff .modal-content.step-2").find('input[name="password"]').focus();
                     return false;
              }
              else if(pass.length<6) {
                     $("#modal-snff .modal-content.step-2").find('input[name="password"]').after('<div class="snff-alert">Password length should be greater than 5 characters</div>');
                     $("#modal-snff .modal-content.step-2").find('input[name="password"]').focus();
                     return false;
              }
              else{
               $("#blue-scheme .mindler-loader").css("display", "flex");
               var is_mobile = $("#modal-snff .modal-content.step-2").find('input[name="is_mobile"]').val();
               $.ajax({
                  type: "POST",
                  url: baseUrl+"assess/emailPackageUpdate",
                  data: {designation:designation, city:city,"class":cls,"name":name,"pass":pass,"phone":phone,package:package,parent:parent} ,
                  success: function(response){
                     $("#blue-scheme .mindler-loader").css("display", "none");
                     var json = $.parseJSON(response);
                     if(json.status==200){
                        localStorage.removeItem('phone');
                        if(is_mobile){
                          window.location.href = baseUrl+"assess/mobiletour";
                        }else{
                          window.location.href = baseUrl+"assess";
                        }
                     }
                     
                  }
               });
              }

          })
        }
        

    });

    $('input').bind('change keydown keyup',function (){
    
         if($(this).val()){
               $(".snff-alert").remove(); // remove it
               $(".validation-mobile").remove(); // remove it
               $(".error").remove(); // remove it
                //$("input[name="+name+"]").css('border-color', '#e9e9e9');
           }
    });

    $('#modal-snff .modal-content.step-1 .modal-body #normal-signup').on('click', function (e) {
        e.preventDefault();
        var regexp = /^[a-zA-Z ]*$/;
        var name = $("input[name='name']").val();
        var package = $("input[name='package']:checked").val();
        var cls = $("#modal-snff .modal-body .choose-class input[name='package']:checked").attr('data-id');
        var vi = $("#normal-signup").attr('data-vi');
        var parent = $('#modal-snff .modal-body .parent-check input[name="parent"]:checked').is(':checked');
        parent = (parent==true)?1:0;
        $(this).parents(".modal-body").find(".snff-alert").remove(); // remove it

        var verificationCode =  $(this).parents(".modal-body").find("input[name='verificationCode']").val();
        
        if (!verificationCode) {
            $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").after('<div class="snff-alert">Please enter your verification code</div>');
            $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").focus();
            
        }else{
          $("#blue-scheme .mindler-loader").css("display", "flex");
          $.post( baseUrl+"assess/verifyEmailedCode", {verificationCode: verificationCode}).done(function( data ) {
                
                $("#blue-scheme .mindler-loader").css("display", "none");
                var jsonData = $.parseJSON(data);

                  if (jsonData.status==404) {
                      $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").after('<div class="snff-alert">'+jsonData.message+'</div>');
                      $("#modal-snff .modal-content.step-1 .modal-body input[name='verificationCode']").focus();
                      
                  }
                  else if (!name) {
                   $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please fill your name</div>');
                   $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                      
                  }else if (name.length>0 && regexp.test(name)==false) {
                        
                   $("#modal-snff .modal-content.step-1 .modal-body #userName").after('<div class="snff-alert">Please enter valid name</div>');
                   $('#modal-snff .modal-content.step-1 .modal-body #userName').focus();
                      
                  }else if (!$("input[name='package']:checked").val() && vi!=1) {

                      $("#modal-snff .modal-content.step-1 .modal-body #form-group").append('<div class="snff-alert">Please choose an option</div>');
                  
                  }else if (!$("input[name='package']:checked").val()) {

                      $("#modal-snff .modal-content.step-1 .modal-body .choose-class-row").append('<div class="snff-alert">Please choose a class</div>');

                  }
                  else{
                  
                   $("#blue-scheme .mindler-loader").css("display", "flex");
                   var is_mobile = $("#modal-snff .modal-content.step-1").find('input[name="is_mobile"]').val();
                   $.ajax({
                      type: "POST",
                      url: baseUrl+"assess/normalSignupUpdate",
                      data: {"class":cls,"name":name,package:package,parent:parent} ,
                      success: function(response){
                          setTimeout(
                          function() 
                          {
                              $("#blue-scheme .mindler-loader").css("display", "none");
                          }, 5000);
                         
                          var json = $.parseJSON(response);
                          if(json.status==200){
                            if(is_mobile){
                              window.location.href = baseUrl+"assess/mobiletour";
                            }else{
                              window.location.href = baseUrl+"assess";
                            }
                         }
                         
                      }
                   });
                  }

          });

        }

    });


    

     $("#modal-snff .modal-body .form-group input").focus(function () {

        $(this).parents(".form-group").removeClass("un-focused");
        $(this).parents(".form-group").addClass("focused");
        $(this).parents(".dropdown-input").find(".code-list-click").addClass("focused");
    });
    $("#modal-snff .modal-body .form-group input").focusout(function () {

        $(this).parents(".form-group").addClass("un-focused");
        $(this).parents(".form-group").removeClass("focused");
        $(this).parents(".dropdown-input").find(".code-list-click").removeClass("focused");

    });


    $("#modal-snff .modal-body .form-group").each(function () {
        $(this).find("input").focusout(function () {
            $(this).parents(".form-group").removeClass("focused");
            $(this).parents(".form-group").addClass("un-focused");

            if ($(this).val().length > 0) {
                $(this).parents(".form-group").addClass("focused");
                $(this).parents(".form-group").removeClass("un-focused");
            }
            else {
                $(this).parents(".form-group").removeClass("focused");
                $(this).parents(".form-group").addClass("un-focused");

            }
        });
    });


    $("#modal-snff .modal-content.step-1 .form-group input").focus();


