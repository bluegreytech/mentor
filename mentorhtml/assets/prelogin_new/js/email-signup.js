 
$(document).ready(function() {

  var base_url = window.location.origin + '/';
  var csrfValue = $("#csrf_mindler_token").val();
  

  /*Email signup footer section*/
  $(".desktop-signup-section button").click(function(){ 

     var email = $(this).closest("div.content").find("input[type='email']").val();
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var source = $(this).closest("div.content").find("input[type='email']").attr('data-id');
     
     remove_validation('.new-top-header .start-free a');
     remove_validation(".mobile-signup-section button");
     remove_validation(".desktop-signup-section button");
     remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
     remove_validation("#startNow"); // remove it
     remove_validation("#signUpByEmail"); // remove it
     remove_validation('.subscription-box #newsletter-button');
     $(".subscription-box .newsletter-value").val(' ');
     $('#h-email').val(' ');
     $(".mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $("#h2-email").val(' ');
     $("#signUpByEmail").val(' ');

     if (email.length == 0) {
          remove_validation(".desktop-signup-section button");
          $(this).after('<div class="validation">Please enter email address</div>');
          $(this).closest("div.content").find("input[type='email']").after('<div class="validation-mobile">Please enter email address</div>');
          $(this).closest("div.content").find("input[type='email']").focus();
          
     }
     else if (!filter.test(email)) {
          remove_validation(".desktop-signup-section button");
          $(this).after('<div class="validation">Please enter valid email address</div>');
          $(this).closest("div.content").find("input[type='email']").after('<div class="validation-mobile">Please enter valid email address</div>');
          $(this).closest("div.content").find("input[type='email']").focus();
          
     }
     else if (filter.test(email)){
           $("div.overlay-box").css("display", "block");
           $.ajax({
            type: "POST",
            url:base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){

                 $(".desktop-signup-section button").next(".validation").remove(); // remove it
                 window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                  remove_validation(".desktop-signup-section button");
                  $(".desktop-signup-section button").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                  $(".desktop-signup-section button").closest("div.content").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                  $(".desktop-signup-section button").closest("div.content").find("input[type='email']").focus();
                  return false;
              }else{
                 $(".desktop-signup-section button").next(".validation").remove(); // remove it
                 $("div.overlay-box").css("display", "block");
                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignup",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                    success: function(response){
                       $("div.overlay-box").css("display", "none");
                       var json = $.parseJSON(response);
                       if(json.status==404){
                          $(".desktop-signup-section button").next(".validation").remove(); // remove it
                          window.location.href = base_url+"login?email="+email;
                       }else if(json.status==200){

                          window.location.href = base_url+"assess/dashboard";
                       }else{
                          remove_validation(".mobile-signup-section button");
                          remove_validation(".desktop-signup-section button");
                          remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                          remove_validation("#startNow"); // remove it
                          remove_validation("#signUpByEmail"); // remove it
                          $(".desktop-signup-section button").after('<div class="validation" style="margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
                          $(".desktop-signup-section button").closest("div.content").find("input[type='email']").focus();
                       }
                       
                    }
                 });


                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignupLeadsquare",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                    success: function(response){
                        
                    }
                 });
              }
           }
        });
     }
     
  });



 /*Email signup footer section*/
  $(".mobile-signup-section button").click(function(){ 

     var email = $(this).closest("div.content").find("input[type='email']").val();
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var source = $(this).closest("div.content").find("input[type='email']").attr('data-id');
     remove_validation('.new-top-header .start-free a');
     remove_validation(".desktop-signup-section button");
     remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
     remove_validation("#startNow"); // remove it
     remove_validation("#signUpByEmail"); // remove it
     remove_validation('.subscription-box #newsletter-button');
     $(".subscription-box .newsletter-value").val(' ');
     $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $('#h-email').val(' ');
     $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $("#h2-email").val(' ');
     $("#signUpByEmail").val(' ');

     if (email.length == 0) {
        remove_validation(".mobile-signup-section button");
        $(this).closest("div.content").find("input[type='email']").next(".validation-mobile").remove(); // remove it
        $(this).after('<div class="validation">Please enter email address</div>');
        $(this).closest("div.content").find("input[type='email']").after('<div class="validation-mobile">Please enter email address</div>');
        $(this).closest("div.content").find("input[type='email']").focus();
      }
     else if (!filter.test(email)) {
         remove_validation(".mobile-signup-section button");
         $(this).closest("div.content").find("input[type='email']").next(".validation-mobile").remove(); // remove it
         $(this).after('<div class="validation">Please enter valid email address</div>');
         $(this).closest("div.content").find("input[type='email']").after('<div class="validation-mobile">Please enter valid email address</div>');
         $(this).closest("div.content").find("input[type='email']").focus();
     }
     else if (filter.test(email)){
           $("div.overlay-box").css("display", "block");
           $.ajax({
            type: "POST",
            url:base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){

                 $(".mobile-signup-section button").next(".validation").remove(); // remove it
                 window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                 remove_validation(".mobile-signup-section button");
                 $(".mobile-signup-section button").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                  $(".mobile-signup-section button").closest("div.content").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                  
                 

                 return false;
              }else{
                 $(".mobile-signup-section button").next(".validation").remove(); // remove it
                 $("div.overlay-box").css("display", "block");
                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignup",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                    success: function(response){
                       $("div.overlay-box").css("display", "none");
                       var json = $.parseJSON(response);
                       if(json.status==404){
                          $(".mobile-signup-section button").next(".validation").remove(); // remove it
                          window.location.href = base_url+"login?email="+email;
                       }else if(json.status==200){

                          window.location.href = base_url+"assess/dashboard";
                       }else{
                          $(".mobile-signup-section button").next(".validation").remove(); // remove it
                          $(".mobile-signup-section button").after('<div class="validation" style="margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
                          $(".mobile-signup-section button").closest("div.content").find("input[type='email']").focus();
                       }
                       
                    }
                 });


                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignupLeadsquare",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                    success: function(response){
                        
                    }
                 });
              }
           }
        });
     }
     
  });

 
  /*end of email signup footer section*/
  $("#startNow").click(function(){
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var email = $('#signUpByEmail').val(); 
     var source = $("#signUpByEmail").attr('data-id');
     
     remove_validation('.new-top-header .start-free a');
     remove_validation(".mobile-signup-section button");
     remove_validation(".desktop-signup-section button");
     remove_validation("#mobile-signup-section button");
     remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
     remove_validation("#startNow"); // remove it
     remove_validation("#signUpByEmail"); // remove it
     remove_validation('.subscription-box #newsletter-button');
     $(".subscription-box .newsletter-value").val(' ');

     $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $('#h-email').val(' ');
     $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $(".mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $("#h2-email").val(' ');
     
     if (email.length == 0) {
         remove_validation("#startNow"); // remove it
         remove_validation("#signUpByEmail"); // remove it
         $(this).after('<div class="validation">Please enter email address</div>');
         $('#signUpByEmail').after('<div class="validation-mobile">Please enter email address</div>');
         $('#signUpByEmail').focus();
         
     }
     else if (!filter.test(email)) {
         remove_validation("#startNow"); // remove it
         remove_validation("#signUpByEmail"); // remove it
         $(this).after('<div class="validation">Please enter valid email address</div>');
         $('#signUpByEmail').after('<div class="validation-mobile">Please enter valid email address</div>');
         $('#signUpByEmail').focus();
         
     }
     else if (filter.test(email)){
           $("div.overlay-box").css("display", "block");
           $.ajax({
            type: "POST",
            url: base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){
                 $(".new-signup-box").next(".validation").remove(); // remove it
                 window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                 remove_validation("#startNow"); // remove it
                 remove_validation("#signUpByEmail"); // remove it
                 $("#startNow").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                 $("#signUpByEmail").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                 $('#signUpByEmail').focus();
                 $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
                 $("#h-email").val(' ');
                 $("#h2-email").val(' ');
                 return false;
              }else{
                 $("#startNow").next(".validation").remove(); // remove it
                 $('#signUpByEmail').next(".validation-mobile").remove(); // remove it
                 $("div.overlay-box").css("display", "block");
                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignup",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                    success: function(response){
                       $("div.overlay-box").css("display", "none");
                       var json = $.parseJSON(response);
                       if(json.status==404){
                          $(".new-signup-box").next(".validation").remove(); // remove it
                          window.location.href = base_url+"login?email="+email;
                       }else if(json.status==200){

                          window.location.href = base_url+"assess/dashboard";
                       }else{
                           remove_validation("#startNow"); // remove it
                           remove_validation("#signUpByEmail"); // remove it
                          $("#startNow").after('<div class="validation" style="margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
                          $('#signUpByEmail').focus();
                       }
                       
                    }
                 });


                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignupLeadsquare",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                    success: function(response){
                        
                    }
                 });
              }
           }
        });
     }
     
  });



  /* For career details left side banner*/
  $("#startNowleft").click(function(){
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var email = $('#signUpByEmail').val(); 
     var careerName = $('.career-details-section .for-desktop').text();
     var source = $("#signUpByEmail").attr('data-id');

     if (email.length == 0) {
        $('#signUpByEmail').next(".validation").remove(); // remove it
        $('#signUpByEmail').after('<div style="color: red;" class="validation">Please enter email address</div>');
        $('#signUpByEmail').focus();
     }
     else if (!filter.test(email)) {
         $('#signUpByEmail').next(".validation").remove(); // remove it
         $('#signUpByEmail').after('<div style="color: red;" class="validation">Please enter valid email address</div>');
         $('#signUpByEmail').focus();
     }
     else if (filter.test(email)){
           $("div.overlay-box").css("display", "block");
           $.ajax({
            type: "POST",
            url: base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){
                 $(".new-signup-box").next(".validation").remove(); // remove it
                 window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                 $("#signUpByEmail").next(".validation").remove(); // remove it
                 $("#signUpByEmail").after('<div style="color: red;" class="validation">The email address you entered is not correct. Please try again.</div>');
                 $('#signUpByEmail').focus();
                 return false;
              }else{
                 $("#signUpByEmail").next(".validation").remove(); // remove it
                 $("div.overlay-box").css("display", "block");
                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignup",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                    success: function(response){
                       $("div.overlay-box").css("display", "none");
                       var json = $.parseJSON(response);
                       if(json.status==404){
                          $(".new-signup-box").next(".validation").remove(); // remove it
                          window.location.href = base_url+"login?email="+email;
                       }else if(json.status==200){

                          window.location.href = base_url+"assess/dashboard";
                       }else{
                          $("#signUpByEmail").next(".validation").remove(); // remove it
                          $("#signUpByEmail").after('<div style="color: red;" class="validation" style="margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
                          $('#signUpByEmail').focus();
                       }
                       
                    }
                 });


                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignupLeadsquare",
                    data: {'csrf_mindler_token':csrfValue,"careerName":careerName,"source":"careerLibrary","name":"email","email":email,"source":source} ,
                    success: function(response){
                        
                    }
                 });
              }
           }
        });
     }
     
  });

  /*End of code*/


  /* For career details right side banner*/
  $("#startNowright").click(function(){
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var email = $('#signUpEmail').val(); 
     var source = $("#signUpEmail").attr('data-id');
     var careerName = $('.career-details-section .for-desktop').text();
     $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $(".mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     if (email.length == 0) {
        $(this).next(".validation").remove(); // remove it
        $(this).after('<div style="color: red;" class="validation">Please enter email address</div>');
        $('#signUpEmail').focus();
     }
     else if (!filter.test(email)) {
         $(this).next(".validation").remove(); // remove it
         $(this).after('<div style="color: red;" class="validation">Please enter valid email address</div>');
         $('#signUpEmail').focus();
     }
     else if (filter.test(email)){
           $("div.overlay-box").css("display", "block");
           $.ajax({
            type: "POST",
            url: base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){
                 $(".new-signup-box").next(".validation").remove(); // remove it
                 window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                 $("#startNowright").next(".validation").remove(); // remove it
                 $("#startNowright").after('<div style="color: red;" class="validation">The email address you entered is not correct. Please try again.</div>');
                 $('#signUpEmail').focus();
                 return false;
              }else{
                 $("#startNowright").next(".validation").remove(); // remove it
                 $("div.overlay-box").css("display", "block");
                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignup",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                    success: function(response){
                       $("div.overlay-box").css("display", "none");
                       var json = $.parseJSON(response);
                       if(json.status==404){
                          $(".new-signup-box").next(".validation").remove(); // remove it
                          window.location.href = base_url+"login?email="+email;
                       }else if(json.status==200){

                          window.location.href = base_url+"assess/dashboard";
                       }else{
                          $("#startNowright").next(".validation").remove(); // remove it
                          $("#startNowright").after('<div class="validation" style="color: red; margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
                          $('#signUpEmail').focus();
                       }
                       
                    }
                 });


                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignupLeadsquare",
                    data: {'csrf_mindler_token':csrfValue,"careerName":careerName,"source":"careerLibrary","name":"email","email":email,"source":source} ,
                    success: function(response){
                        
                    }
                 });
              }
           }
        });
     }
     
  });

 /*End of code*/


 /* Start now for free code*/
  $('.new-top-header .start-free a').click(function(){ 
     
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var email = $("#h-email").val(); 
     var source = $("#h-email").attr('data-id'); 

     remove_validation('.new-top-header .start-free a');
     remove_validation(".mobile-signup-section button");
     remove_validation(".desktop-signup-section button");
     remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
     remove_validation("#startNow"); // remove it
     remove_validation("#signUpByEmail"); // remove it
     $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     $(".mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
     remove_validation('.subscription-box #newsletter-button');
     $(".subscription-box .newsletter-value").val(' ');

     if (email.length == 0) {
        remove_validation('.new-top-header .start-free a');
        $(this).after('<div class="validation">Please enter email address</div>');
        $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#h-email").focus();
        $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#desktop-signup-sec button").closest("div.content").find("input[type='email']").val(' ');
        $("#h2-email").val(' ');
        $("#signUpByEmail").val(' ');
     }
     else if (!filter.test(email)) {
         remove_validation('.new-top-header .start-free a');
         $(this).after('<div class="validation">Please enter valid email address</div>');
         $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
         $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
         $("#desktop-signup-sec button").closest("div.content").find("input[type='email']").val(' ');
         $("#h2-email").val(' ');
         $("#h-email").focus();
         $("#signUpByEmail").val(' ');
     }else{
        
         $(this).next(".validation").remove(); // remove it
         $("div.overlay-box").css("display", "block");
          $.ajax({
            type: "POST",
            url: base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){
                 $(this).next(".validation").remove(); // remove it
                  window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){

                 remove_validation('.new-top-header .start-free a');
                 $('.new-top-header .start-free a').after('<div class="validation ">The email address you entered is not correct. Please try again.</div>');
                 $("#h-email").focus();
                 $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
                 $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
                 $("#desktop-signup-sec button").closest("div.content").find("input[type='email']").val(' ');
                 $("#h2-email").val(' ');
                 $("#signUpByEmail").val(' ');
              }else{
                $.ajax({
                   type: "POST",
                   url: base_url+"login/emailSignup",
                   data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                   success: function(response){
                      
                      var json = $.parseJSON(response);
                      if(json.status==200){

                         window.location.href = base_url+"assess/dashboard";

                         $.ajax({
                           type: "POST",
                           url: base_url+"login/emailSignupLeadsquare",
                           data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                           success: function(response){
                               
                           }
                        });
                      }else{
                         $('.new-top-header .start-free a').next(".validation").remove(); // remove it
                         $('.new-top-header .start-free a').after('<div class="validation" style="position: absolute;font-size: 11px;bottom:0px;color: red;font-family: calibri;">Aah! something went wrong</div>');
                         $("#h-email").focus();
                      }
                      
                   }
                });
              }
        }

     });
    }
  });


  /* Start now for free mobile code*/
  $('.mobile-fixed-header-menu .menu-sign-up a').click(function(){ 
     
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var email = $("#h2-email").val(); 
     var source = $("#h2-email").attr('data-id'); 
     
     $("#startNow").next(".validation").remove(); // remove it

     if (email.length == 0) {
        remove_validation('.new-top-header .start-free a');
        remove_validation(".mobile-signup-section button");
        remove_validation(".desktop-signup-section button");
        remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
        remove_validation("#startNow"); // remove it
        remove_validation("#signUpByEmail"); // remove it
        $("#h2-email").after('<div class="validation">Please enter email address</div>');
        $("#h2-email").focus();
        $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#desktop-signup-sec button").closest("div.content").find("input[type='email']").val(' ');
        $(".mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#h-email").val(' ');
        $("#signUpByEmail").val(' ');
        remove_validation('.subscription-box #newsletter-button');
        $(".subscription-box .newsletter-value").val(' ');
     }
     else if (!filter.test(email)) {
         remove_validation('.new-top-header .start-free a');
         remove_validation(".mobile-signup-section button");
         remove_validation(".desktop-signup-section button");
         remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
         remove_validation("#startNow"); // remove it
         remove_validation("#signUpByEmail"); // remove it
         $("#h2-email").after('<div class="validation">Please enter valid email address</div>');
         $("#h2-email").focus();
         $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
         $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
         $("#desktop-signup-sec button").closest("div.content").find("input[type='email']").val(' ');
         $("#h-email").val(' ');
         $("#signUpByEmail").val(' ');
     }else{
        
         $(this).next(".validation").remove(); // remove it
         $("div.overlay-box").css("display", "block");
          $.ajax({
            type: "POST",
            url: base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){
                 $(this).next(".validation").remove(); // remove it
                  window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                 remove_validation('.new-top-header .start-free a');
                 remove_validation(".mobile-signup-section button");
                 remove_validation(".desktop-signup-section button");
                 remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                 remove_validation("#startNow"); // remove it
                 remove_validation("#signUpByEmail"); // remove it
                 $('.mobile-fixed-header-menu .menu-sign-up a').next(".validation").remove(); // remove it
                 $('.mobile-fixed-header-menu .menu-sign-up #h2-email').after('<div class="validation ">The email address you entered is not correct. Please try again.</div>');
                 $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
                 $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
                 $("#desktop-signup-sec button").closest("div.content").find("input[type='email']").val(' ');
                 $("#h-email").val(' ');
                 $("#h2-email").focus();
                 $("#signUpByEmail").val(' ');
              }else{
                $.ajax({
                   type: "POST",
                   url: base_url+"login/emailSignup",
                   data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                   success: function(response){
                      
                      var json = $.parseJSON(response);
                      if(json.status==200){

                         window.location.href = base_url+"assess/dashboard";

                         $.ajax({
                           type: "POST",
                           url: base_url+"login/emailSignupLeadsquare",
                           data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                           success: function(response){
                               
                           }
                        });
                      }else{
                         $("#h2-email").next(".validation").remove(); // remove it
                         $("#h2-email").after('<div class="validation" style="position: absolute;font-size: 11px;bottom:0px;color: red;font-family: calibri;">Aah! something went wrong</div>');
                         $("#h2-email").focus();
                      }
                      
                   }
                });
              }
        }

     });
    }
  });

  /*code for careerlibrary page*/
  $("#startCareerNow").click(function(){
   var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
   var email = $('#signUpByEmail').val(); 
   var source = $("#signUpByEmail").attr('data-id'); 
   
   
   if (email.length == 0) {
      $("#signUpByEmail").next(".validation").remove(); // remove it
      $("#signUpByEmail").after('<div class="validation">Please enter email address</div>');
      $('#signUpByEmail').focus();
   }
   else if (!filter.test(email)) {
       $("#signUpByEmail").next(".validation").remove(); // remove it
       $("#signUpByEmail").after('<div class="validation">Please enter valid email address</div>');
       $('#signUpByEmail').focus();
   }else{
      $(".new-signup-box").next(".validation").remove(); // remove it
      $("div.overlay-box").css("display", "block");
      $.ajax({
         type: "POST",
         url: base_url+"login/emailSignup",
         data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
         success: function(response){
            $("div.overlay-box").css("display", "none");
            var json = $.parseJSON(response);
            if(json.status==404){
               $(".new-signup-box").next(".validation").remove(); // remove it
               window.location.href = base_url+"login?email="+email;
            }else if(json.status==200){

               window.location.href = base_url+"assess/dashboard";
            }else{
               $(".new-signup-box").next(".validation").remove(); // remove it
               $(".new-signup-box").after('<div class="validation" style="margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
               $('#signUpByEmail').focus();
            }
            
         }
      });

      $.ajax({
         type: "POST",
         url: base_url+"login/emailSignupLeadsquare",
         data: {'csrf_mindler_token':csrfValue,"name":"email","email":email, "source":source} ,
         success: function(response){
             
         }
      });

   }
  });

/*End of code*/


  $("#entranceSubmit").click(function(){
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var email = $('#entrance-email').val(); 
     var name = $('#entrance-name').val();
     if (name.length == 0) {
        $("#calendarForm #entrance-name").next(".validation").remove(); // remove it
        $("#calendarForm #entrance-name").after('<div class="validation" style="color:red;margin-bottom: 20px;text-align: left;margin-top: -15px;font-size: 12px;">Please enter your name</div>');
        $('#entrance-name').focus();
     }else if (email.length == 0) {
        $("#calendarForm #entrance-name").next(".validation").remove(); // remove it
        $("#calendarForm #entrance-email").next(".validation").remove(); // remove it
        $("#calendarForm #entrance-email").after('<div class="validation" style="color:red;margin-bottom: 20px;text-align: left;margin-top: -15px;font-size: 12px;">Please enter email address</div>');
        $('#entrance-email').focus();
     }
     else if (!filter.test(email)) {
        $("#calendarForm #entrance-email").next(".validation").remove(); // remove it
        $("#calendarForm #entrance-email").after('<div class="validation" style="color:red;margin-bottom: 20px;text-align: left;margin-top: -15px;font-size: 12px;">Please enter valid email address</div>');
        $('#entrance-email').focus();
     }else{
        $("#calendarForm #entrance-email").next(".validation").remove(); // remove it
     }

     if(name && filter.test(email)){
        $("div.overlay-box").css("display", "block");
        $.ajax({
           type: "POST",
           url: base_url+"prelogin/entrance_exam_calendar",
           data: {'csrf_mindler_token':csrfValue,"name":name,"email":email} ,
           success: function(response){
              $("div.overlay-box").css("display", "none");
              var json = $.parseJSON(response);
              if(json.status==1){
                 $('#entrance-email').empty(); 
                 $('#entrance-name').empty(); 
                 $("#calendarForm").hide();
                 $("#calendarForm").after('<div class="form-section"><p class="text-center" style="margin-bottom:0;color:#008000" ><img src="'+base_url+'assets/prelogin_new/img/green-check.png" width="13px"  > Thank You, The link to download the Mindler Entrance Exam Calendar has been e-mailed to you.</p></div>');
                 
              }
              
           }
        });
     }
  });

  /*pricing page code*/

  /*Email signup footer section*/
  
  /*for stream*/
    $(".selection-stream #pricing-email-btn").click(function(){ 

       var email = $(this).closest('div.preview').find("input[type='email']").val();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var source = $(this).closest('div.preview').find("input[type='email']").attr('data-id'); 
       
       remove_validation(".selection-stream #pricing-email-stream")
       $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
       
       if (email.length == 0) {
            remove_validation(".selection-stream #pricing-email-btn");
            $(this).closest("div.preview").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
            $(this).closest("div.preview").find("input[type='email']").focus();
            
       }
       else if (!filter.test(email)) {
            remove_validation(".selection-stream #pricing-email-btn");
            $(this).closest("div.preview").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
            $(this).closest("div.preview").find("input[type='email']").focus();
            
       }
       else if (filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
              type: "POST",
              url:base_url+'login/validateEmail',
              data: {'csrf_mindler_token':csrfValue,"email":email} ,
              success: function(responses){
                $("div.overlay-box").css("display", "none");
                var response = $.parseJSON(responses);
                if(response.status=='404'){

                   $(".selection-stream #pricing-email-btn").next(".validation").remove(); // remove it
                   window.location.href = base_url+"login?email="+email;
                }
                else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                    remove_validation(".selection-stream #pricing-email-btn");
                    $(".selection-stream #pricing-email-btn").closest("div.preview").find("input[type='email']").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                    $(".selection-stream #pricing-email-btn").closest("div.preview").find("input[type='email']").focus();
                    return false;
                }else{
                   $(".selection-stream #pricing-email-btn").next(".validation").remove(); // remove it
                   $("div.overlay-box").css("display", "block");
                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignup",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                      success: function(response){
                         $("div.overlay-box").css("display", "none");
                         var json = $.parseJSON(response);
                         if(json.status==404){
                            $(".desktop-signup-section button").next(".validation").remove(); // remove it
                            window.location.href = base_url+"login?email="+email;
                         }else if(json.status==200){

                            window.location.href = base_url+"assess/dashboard";
                         }else{
                            remove_validation(".mobile-signup-section button");
                            remove_validation(".desktop-signup-section button");
                            remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                            remove_validation("#startNow"); // remove it
                            remove_validation("#signUpByEmail"); // remove it
                            $(".selection-stream #pricing-email-btn").closest("div.preview").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                            $(".selection-stream #pricing-email-btn").closest("div.preview").find("input[type='email']").focus();
                         }
                         
                      }
                   });


                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignupLeadsquare",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email, "source":source} ,
                      success: function(response){
                          
                      }
                   });
                }
             }
          });
       }
       
    });


   $(".selection-stream #pricing-email-stream").click(function(){ 

       var email = $(this).closest('div').find("input[type='email']").val();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var source = $(this).closest('div').find("input[type='email']").attr('data-id');
       
       remove_validation(".selection-stream #pricing-email-btn")
       $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       
       if (email.length == 0) {
            remove_validation(".selection-stream #pricing-email-stream");
            $(this).closest("div").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
            $(this).closest("div").find("input[type='email']").focus();
            
       }
       else if (!filter.test(email)) {
            remove_validation(".selection-stream #pricing-email-stream");
            $(this).closest("div").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
            $(this).closest("div").find("input[type='email']").focus();
            
       }
       else if (filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
              type: "POST",
              url:base_url+'login/validateEmail',
              data: {'csrf_mindler_token':csrfValue,"email":email} ,
              success: function(responses){
                $("div.overlay-box").css("display", "none");
                var response = $.parseJSON(responses);
                if(response.status=='404'){

                   $(".selection-stream #pricing-email-stream").next(".validation").remove(); // remove it
                   window.location.href = base_url+"login?email="+email;
                }
                else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                    remove_validation(".selection-stream #pricing-email-stream");
                    $(".selection-stream #pricing-email-stream").closest("div").find("input[type='email']").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                    $(".selection-stream #pricing-email-stream").closest("div").find("input[type='email']").focus();
                    return false;
                }else{
                   $(".selection-stream #pricing-email-stream").next(".validation").remove(); // remove it
                   $("div.overlay-box").css("display", "block");
                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignup",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                      success: function(response){
                         $("div.overlay-box").css("display", "none");
                         var json = $.parseJSON(response);
                         if(json.status==404){
                            $(".desktop-signup-section button").next(".validation").remove(); // remove it
                            window.location.href = base_url+"login?email="+email;
                         }else if(json.status==200){

                            window.location.href = base_url+"assess/dashboard";
                         }else{
                            remove_validation(".mobile-signup-section button");
                            remove_validation(".desktop-signup-section button");
                            remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                            remove_validation("#startNow"); // remove it
                            remove_validation("#signUpByEmail"); // remove it
                            $(".selection-stream #pricing-email-stream").closest("div").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                            $(".selection-stream #pricing-email-stream").closest("div").find("input[type='email']").focus();
                         }
                         
                      }
                   });


                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignupLeadsquare",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email, "source":source} ,
                      success: function(response){
                          
                      }
                   });
                }
             }
          });
       }
       
    });

 /*for career*/
    $(".selection-career #pricing-email-btn").click(function(){ 

       var email = $(this).closest('div.preview').find("input[type='email']").val();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var source = $(this).closest('div.preview').find("input[type='email']").attr('data-id');
       
       remove_validation(".selection-stream #pricing-email-stream")
       $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
       remove_validation(".selection-stream #pricing-email-btn")
       $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       remove_validation(".selection-career #pricing-email-career")
       $(".selection-career #pricing-email-career").closest('div').find("input[type='email']").val(' ');

       if (email.length == 0) {
            remove_validation(".selection-career #pricing-email-btn");
            $(this).closest("div.preview").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
            $(this).closest("div.preview").find("input[type='email']").focus();
            
       }
       else if (!filter.test(email)) {
            remove_validation(".selection-career #pricing-email-btn");
            $(this).closest("div.preview").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
            $(this).closest("div.preview").find("input[type='email']").focus();
            
       }
       else if (filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
              type: "POST",
              url:base_url+'login/validateEmail',
              data: {'csrf_mindler_token':csrfValue,"email":email} ,
              success: function(responses){
                $("div.overlay-box").css("display", "none");
                var response = $.parseJSON(responses);
                if(response.status=='404'){

                   $(".selection-stream #pricing-email-btn").next(".validation").remove(); // remove it
                   window.location.href = base_url+"login?email="+email;
                }
                else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                    remove_validation(".selection-career #pricing-email-btn");
                    $(".selection-career #pricing-email-btn").closest("div.preview").find("input[type='email']").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                    $(".selection-career #pricing-email-btn").closest("div.preview").find("input[type='email']").focus();
                    return false;
                }else{
                   $(".selection-career #pricing-email-btn").next(".validation").remove(); // remove it
                   $("div.overlay-box").css("display", "block");
                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignup",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                      success: function(response){
                         $("div.overlay-box").css("display", "none");
                         var json = $.parseJSON(response);
                         if(json.status==404){
                            $(".desktop-signup-section button").next(".validation").remove(); // remove it
                            window.location.href = base_url+"login?email="+email;
                         }else if(json.status==200){

                            window.location.href = base_url+"assess/dashboard";
                         }else{
                            remove_validation(".mobile-signup-section button");
                            remove_validation(".desktop-signup-section button");
                            remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                            remove_validation("#startNow"); // remove it
                            remove_validation("#signUpByEmail"); // remove it
                            $(".selection-career #pricing-email-btn").closest("div.preview").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                            $(".selection-career #pricing-email-btn").closest("div.preview").find("input[type='email']").focus();
                         }
                         
                      }
                   });


                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignupLeadsquare",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                      success: function(response){
                          
                      }
                   });
                }
             }
          });
       }
       
    });


   $(".selection-career #pricing-email-career").click(function(){ 

       var email = $(this).closest('div').find("input[type='email']").val();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var source = $(this).closest('div').find("input[type='email']").attr('data-id');
       
       remove_validation(".selection-stream #pricing-email-stream")
       $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
       remove_validation(".selection-stream #pricing-email-btn")
       $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       remove_validation(".selection-career #pricing-email-btn")
       $(".selection-career #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');

       if (email.length == 0) {
            remove_validation(".selection-career #pricing-email-career");
            $(this).closest("div").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
            $(this).closest("div").find("input[type='email']").focus();
            
       }
       else if (!filter.test(email)) {
            remove_validation(".selection-career #pricing-email-career");
            $(this).closest("div").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
            $(this).closest("div").find("input[type='email']").focus();
            
       }
       else if (filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
              type: "POST",
              url:base_url+'login/validateEmail',
              data: {'csrf_mindler_token':csrfValue,"email":email} ,
              success: function(responses){
                $("div.overlay-box").css("display", "none");
                var response = $.parseJSON(responses);
                if(response.status=='404'){

                   $(".selection-career #pricing-email-career").next(".validation").remove(); // remove it
                   window.location.href = base_url+"login?email="+email;
                }
                else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                    remove_validation(".selection-career #pricing-email-career");
                    $(".selection-career #pricing-email-career").closest("div").find("input[type='email']").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                    $(".selection-career #pricing-email-career").closest("div").find("input[type='email']").focus();
                    return false;
                }else{
                   $(".selection-career #pricing-email-career").next(".validation").remove(); // remove it
                   $("div.overlay-box").css("display", "block");
                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignup",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                      success: function(response){
                         $("div.overlay-box").css("display", "none");
                         var json = $.parseJSON(response);
                         if(json.status==404){
                            $(".desktop-signup-section button").next(".validation").remove(); // remove it
                            window.location.href = base_url+"login?email="+email;
                         }else if(json.status==200){

                            window.location.href = base_url+"assess/dashboard";
                         }else{
                            remove_validation(".mobile-signup-section button");
                            remove_validation(".desktop-signup-section button");
                            remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                            remove_validation("#startNow"); // remove it
                            remove_validation("#signUpByEmail"); // remove it
                            $(".selection-career #pricing-email-career").closest("div").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                            $(".selection-career #pricing-email-career").closest("div").find("input[type='email']").focus();
                         }
                         
                      }
                   });


                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignupLeadsquare",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                      success: function(response){
                          
                      }
                   });
                }
             }
          });
       }
       
    });

/*for college*/
    $(".selection-graduates #pricing-email-btn").click(function(){ 

       var email = $(this).closest('div.preview').find("input[type='email']").val();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var source = $(this).closest('div.preview').find("input[type='email']").attr('data-id');
       
       remove_validation(".selection-stream #pricing-email-stream")
       $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
       remove_validation(".selection-stream #pricing-email-btn")
       $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       remove_validation(".selection-career #pricing-email-btn")
       $(".selection-career #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       remove_validation(".selection-career #pricing-email-career")
       $(".selection-career #pricing-email-career").closest('div').find("input[type='email']").val(' ');
       remove_validation(".selection-graduates #pricing-email-college");
       $(".selection-graduates #pricing-email-college").closest('div').find("input[type='email']").val(' ');

       if (email.length == 0) {
            remove_validation(".selection-graduates #pricing-email-btn");
            $(this).closest("div.preview").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
            $(this).closest("div.preview").find("input[type='email']").focus();
            
       }
       else if (!filter.test(email)) {
            remove_validation(".selection-graduates #pricing-email-btn");
            $(this).closest("div.preview").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
            $(this).closest("div.preview").find("input[type='email']").focus();
            
       }
       else if (filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
              type: "POST",
              url:base_url+'login/validateEmail',
              data: {'csrf_mindler_token':csrfValue,"email":email} ,
              success: function(responses){
                $("div.overlay-box").css("display", "none");
                var response = $.parseJSON(responses);
                if(response.status=='404'){

                   $(".selection-stream #pricing-email-btn").next(".validation").remove(); // remove it
                   window.location.href = base_url+"login?email="+email;
                }
                else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                    remove_validation(".selection-graduates #pricing-email-btn");
                    $(".selection-graduates #pricing-email-btn").closest("div.preview").find("input[type='email']").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                    $(".selection-graduates #pricing-email-btn").closest("div.preview").find("input[type='email']").focus();
                    return false;
                }else{
                   $(".selection-graduates #pricing-email-btn").next(".validation").remove(); // remove it
                   $("div.overlay-box").css("display", "block");
                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignup",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                      success: function(response){
                         $("div.overlay-box").css("display", "none");
                         var json = $.parseJSON(response);
                         if(json.status==404){
                            $(".desktop-signup-section button").next(".validation").remove(); // remove it
                            window.location.href = base_url+"login?email="+email;
                         }else if(json.status==200){

                            window.location.href = base_url+"assess/dashboard";
                         }else{
                            remove_validation(".mobile-signup-section button");
                            remove_validation(".desktop-signup-section button");
                            remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                            remove_validation("#startNow"); // remove it
                            remove_validation("#signUpByEmail"); // remove it
                            $(".selection-graduates #pricing-email-btn").closest("div.preview").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                            $(".selection-graduates #pricing-email-btn").closest("div.preview").find("input[type='email']").focus();
                         }
                         
                      }
                   });


                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignupLeadsquare",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                      success: function(response){
                          
                      }
                   });
                }
             }
          });
       }
       
    });


   $(".selection-graduates #pricing-email-college").click(function(){ 

       var email = $(this).closest('div').find("input[type='email']").val();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var source = $(this).closest('div').find("input[type='email']").attr('data-id');
       
       remove_validation(".selection-stream #pricing-email-stream")
       $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
       remove_validation(".selection-stream #pricing-email-btn")
       $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       remove_validation(".selection-career #pricing-email-btn")
       $(".selection-career #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
       remove_validation(".selection-career #pricing-email-career")
       $(".selection-career #pricing-email-career").closest('div').find("input[type='email']").val(' ');
       remove_validation(".selection-graduates #pricing-email-btn")
       $(".selection-graduates #pricing-email-btn").closest('div').find("input[type='email']").val(' ');

       if (email.length == 0) {
            remove_validation(".selection-graduates #pricing-email-college");
            $(this).closest("div").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
            $(this).closest("div").find("input[type='email']").focus();
            
       }
       else if (!filter.test(email)) {
            remove_validation(".selection-graduates #pricing-email-college");
            $(this).closest("div").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
            $(this).closest("div").find("input[type='email']").focus();
            
       }
       else if (filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
              type: "POST",
              url:base_url+'login/validateEmail',
              data: {'csrf_mindler_token':csrfValue,"email":email} ,
              success: function(responses){
                $("div.overlay-box").css("display", "none");
                var response = $.parseJSON(responses);
                if(response.status=='404'){

                   $(".selection-graduates #pricing-email-college").next(".validation").remove(); // remove it
                   window.location.href = base_url+"login?email="+email;
                }
                else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                    remove_validation(".selection-graduates #pricing-email-college");
                    $(".selection-graduates #pricing-email-college").closest("div").find("input[type='email']").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                    $(".selection-graduates #pricing-email-college").closest("div").find("input[type='email']").focus();
                    return false;
                }else{
                   $(".selection-graduates #pricing-email-college").next(".validation").remove(); // remove it
                   $("div.overlay-box").css("display", "block");
                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignup",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                      success: function(response){
                         $("div.overlay-box").css("display", "none");
                         var json = $.parseJSON(response);
                         if(json.status==404){
                            $(".desktop-signup-section button").next(".validation").remove(); // remove it
                            window.location.href = base_url+"login?email="+email;
                         }else if(json.status==200){

                            window.location.href = base_url+"assess/dashboard";
                         }else{
                            remove_validation(".mobile-signup-section button");
                            remove_validation(".desktop-signup-section button");
                            remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                            remove_validation("#startNow"); // remove it
                            remove_validation("#signUpByEmail"); // remove it
                            $(".selection-graduates #pricing-email-college").closest("div").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                            $(".selection-graduates #pricing-email-college").closest("div").find("input[type='email']").focus();
                         }
                         
                      }
                   });


                   $.ajax({
                      type: "POST",
                      url: base_url+"login/emailSignupLeadsquare",
                      data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                      success: function(response){
                          
                      }
                   });
                }
             }
          });
       }
       
    });


  $(".signup-banner  button").click(function(){ 

     var email = $(this).closest("div").find("input[type='email']").val();
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     var source = $(this).closest("div").find("input[type='email']").attr('data-id');
     
     remove_validation(".selection-stream #pricing-email-stream")
     $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
     remove_validation(".selection-stream #pricing-email-btn")
     $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
     remove_validation(".selection-career #pricing-email-btn")
     $(".selection-career #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
     remove_validation(".selection-career #pricing-email-career")
     $(".selection-career #pricing-email-career").closest('div').find("input[type='email']").val(' ');
     remove_validation(".selection-graduates #pricing-email-btn")
     $(".selection-graduates #pricing-email-btn").closest('div').find("input[type='email']").val(' ');
     remove_validation(".selection-graduates #pricing-email-college")
     $(".selection-graduates #pricing-email-college").closest('div').find("input[type='email']").val(' ');

     if (email.length == 0) {
          remove_validation(".signup-banner button");
          $(this).closest("div").find("input[type='email']").next(".validation-mobile").remove(); // remove it
          $(".signup-banner button").after('<div class="validation">Please enter email address</div>');
          $(this).closest("div").find("input[type='email']").after('<div class="validation-mobile">Please enter email address</div>');
          $(this).closest("div").find("input[type='email']").focus();
          
     }
     else if (!filter.test(email)) {
          remove_validation(".signup-banner button");
          $(this).closest("div").find("input[type='email']").next(".validation-mobile").remove(); // remove it
          $(".signup-banner button").after('<div class="validation">Please enter valid email address</div>');
          $(this).closest("div").find("input[type='email']").after('<div class="validation-mobile">Please enter valid email address</div>');
          $(this).closest("div").find("input[type='email']").focus();
          
     }
     else if (filter.test(email)){
           $("div.overlay-box").css("display", "block");
           $.ajax({
            type: "POST",
            url:base_url+'login/validateEmail',
            data: {'csrf_mindler_token':csrfValue,"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
              if(response.status=='404'){

                 $(".desktop-signup-section button").next(".validation").remove(); // remove it
                 window.location.href = base_url+"login?email="+email;
              }
              else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                  remove_validation(".signup-banner button");
                  $(".signup-banner button").closest("div").find("input[type='email']").next(".validation-mobile").remove(); // remove it
                  $(".signup-banner button").after('<div class="validation">The email address you entered is not correct. Please try again.</div>');
                  $(".signup-banner button").closest("div").find("input[type='email']").after('<div class="validation-mobile">The email address you entered is not correct. Please try again.</div>');
                  $(".signup-banner button").closest("div").find("input[type='email']").focus();
                  return false;
              }else{
                 $(".signup-banner button").next(".validation").remove(); // remove it
                 $("div.overlay-box").css("display", "block");
                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignup",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email} ,
                    success: function(response){
                       $("div.overlay-box").css("display", "none");
                       var json = $.parseJSON(response);
                       if(json.status==404){
                          $(".desktop-signup-section button").next(".validation").remove(); // remove it
                          window.location.href = base_url+"login?email="+email;
                       }else if(json.status==200){

                          window.location.href = base_url+"assess/dashboard";
                       }else{
                          remove_validation(".mobile-signup-section button");
                          remove_validation(".desktop-signup-section button");
                          remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
                          remove_validation("#startNow"); // remove it
                          remove_validation("#signUpByEmail"); // remove it
                          $(".signup-banner button").after('<div class="validation" style="margin-top: -23px;font-size: 12px;margin-right: 153px;">Aah! something went wrong</div>');
                          $(".signup-bannern button").closest("div").find("input[type='email']").focus();
                       }
                       
                    }
                 });


                 $.ajax({
                    type: "POST",
                    url: base_url+"login/emailSignupLeadsquare",
                    data: {'csrf_mindler_token':csrfValue,"name":"email","email":email,"source":source} ,
                    success: function(response){
                        
                    }
                 });
              }
           }
        });
     }
     
  });


  $(".submit-banner button").click(function(){
     remove_validation(".selection-stream #pricing-email-stream")
     $(".selection-stream #pricing-email-stream").closest('div').find("input[type='email']").val(' ');
     remove_validation(".selection-stream #pricing-email-btn")
     $(".selection-stream #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
     remove_validation(".selection-career #pricing-email-btn")
     $(".selection-career #pricing-email-btn").closest('div.preview').find("input[type='email']").val(' ');
     remove_validation(".selection-career #pricing-email-career")
     $(".selection-career #pricing-email-career").closest('div').find("input[type='email']").val(' ');
     remove_validation(".selection-graduates #pricing-email-btn")
     $(".selection-graduates #pricing-email-btn").closest('div').find("input[type='email']").val(' ');
     remove_validation(".selection-graduates #pricing-email-college")
     $(".selection-graduates #pricing-email-college").closest('div').find("input[type='email']").val(' ');
     remove_validation(".signup-banner button");
     $(".signup-banner button").closest('div').find("input[type='email']").val(' ');

    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    var email = $(this).closest("form").find("input[type='email']").val();
    var name = $(this).closest("form").find("input[name='name']").val();
    var contact = $(this).closest("form").find("input[name='contact']").val();
    var nature =  $('select[name="query"]').find(":selected").val()
    var comment =  $('textarea[name=comment]').val();

   

    if (name.length == 0) {
          $(this).closest("form").find("input[name='name']").next(".validation").remove(); // remove it
          $(this).closest("form").find("input[name='name']").after('<div class="validation">Please enter your name</div>');
          $(this).closest("form").find("input[name='name']").focus();
          return false;
    }
    else if (email.length == 0) {
          $(this).closest("form").find("input[type='email']").next(".validation").remove(); // remove it
          $(this).closest("form").find("input[type='email']").after('<div class="validation">Please enter email address</div>');
          $(this).closest("form").find("input[type='email']").focus();
          return false;
     }
    else if (!filter.test(email)) {

      $(this).closest("form").find("input[type='email']").next(".validation").remove(); // remove it
      $(this).closest("form").find("input[type='email']").after('<div class="validation">Please enter valid email address</div>');
      $(this).closest("form").find("input[type='email']").focus();
      return false;

    }
    else if (contact.length == 0) {
          $(this).closest("form").find("input[name='contact']").next(".validation").remove(); // remove it
          $(this).closest("form").find("input[name='contact']").after('<div class="validation">Please enter your contact number</div>');
          $(this).closest("form").find("input[name='contact']").focus();
          return false;
     }
    else if (nature == 0) {
          $("#nature-query").next(".validation").remove(); // remove it
          $("#nature-query").after('<div class="validation">Please select nature of query</div>');
          return false;
     }
    else if (comment.length == 0) {
          $("#nature-query").next(".validation").remove(); // remove it
          $(this).closest("form").find("textarea[name='comment']").next(".validation").remove(); // remove it
          $(this).closest("form").find("textarea[name='comment']").after('<div class="validation">Please enter your comment</div>');
          $(this).closest("form").find("textarea[name='comment']").focus();
          return false;
     }
     else if (comment.length <20) {
          $("#nature-query").next(".validation").remove(); // remove it
          $(this).closest("form").find("textarea[name='comment']").next(".validation").remove(); // remove it
          $(this).closest("form").find("textarea[name='comment']").after('<div class="validation">Minimum 20 characters</div>');
          $(this).closest("form").find("textarea[name='comment']").focus();
          return false;
     }
     else{
          $("#nature-query").next(".validation").remove(); // remove it
          $(this).closest("form").find("textarea[name='comment']").next(".validation").remove(); // remove it
          $(this).closest("form").find("input[name='contact']").next(".validation").remove(); // remove it
          $(this).closest("form").find("input[name='name']").next(".validation").remove(); // remove it
          $(this).closest("form").find("input[type='email']").next(".validation").remove(); // remove it

          $("div.overlay-box").css("display", "block");
           var data = $("#help-form").serialize();
           $.ajax({
            type: "POST",
            url:base_url+'prelogin/pricingHelpForm',
            data: {'csrf_mindler_token':csrfValue,"data":data} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              //var response = $.parseJSON(responses);
              $(".submit-banner").hide();
              $(".to-message").show();
              
              }
           });
          
     }


  });

  /*end of pricing page*/
  function remove_validation(arg){
      //console.log(arg); return false;
      $(""+arg+"").next(".validation").remove(); // remove it
      $(""+arg+"").closest("div.content").find("input[type='email']").next(".validation-mobile").remove(); // remove it
      $(""+arg+"").closest("div.preview").find("input[type='email']").next(".validation").remove(); // remove it
      $(""+arg+"").closest("div").find("input[type='email']").next(".validation").remove(); // remove it
      $(""+arg+"").next(".validation-mobile").remove(); // remove it
      return true;
  }

 });

      