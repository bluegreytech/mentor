var baseUrl = window.location.origin + '/';

$(document).ready(function() {

    //   function for get query string data from url by name

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Change password
    $(" #new-login-screens .sign-up-box.for-reset-password .btn-change-password").click(function (e) {
        e.preventDefault();
        var pass = $('#pass').val();
        var cpass = $('#cpass').val();
        if (pass.length == 0) {
        $(".sign-up-box.for-reset-password #pass").next(".validation").remove(); // remove it
        $(".sign-up-box.for-reset-password #pass").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter password</div>');
            $('#pass').focus();
        }
        else if (cpass.length == 0) {
            $(".sign-up-box.for-reset-password #pass").next(".validation").remove(); // remove it
            $(".sign-up-box.for-reset-password #cpass").next(".validation").remove(); // remove it
            $(".sign-up-box.for-reset-password #cpass").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter confirm password</div>');
            $('#cpass').focus();
        }
        else if (pass.length>0 && cpass.length>0 && pass!==cpass) {
            $(".sign-up-box.for-reset-password #pass").next(".validation").remove(); // remove it
            $(".sign-up-box.for-reset-password #cpass").next(".validation").remove(); // remove it
            $(".sign-up-box.for-reset-password #cpass").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Passwords do not match</div>');
            $('#cpass').focus();
        }else{
            $(".sign-up-box.for-reset-password #pass").next(".validation").remove(); // remove it
            $(".sign-up-box.for-reset-password #cpass").next(".validation").remove(); // remove it
            var code = getParameterByName('code'); ;
            $("div.overlay-box").css("display", "block");
            $.ajax({
                type: "POST",
                url: baseUrl+"login/resetlink",
                data: {"pass":pass,"code":code} ,
                success: function(response){
                    $("div.overlay-box").css("display", "none");
                    var json = $.parseJSON(response);
                    if(json.status===200){
                        $('.sign-up-box.for-reset-password').hide();
                        $('.sign-up-box.for-reset-password.send-to-dashboard').show();
                    }
                    
                }
            });
        }
     

    });

    //   Reset Passsword
    $("#new-login-screens .sign-up-box.for-recover-password .btn-sent-reset").click(function (e) {
    e.preventDefault();
       var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
       var email = $('#recover-email').val(); 
       if (email.length == 0) {
          $(".for-recover-password #recover-email").next(".validation").remove(); // remove it
          $(".for-recover-password #recover-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter email address</div>');
          $('#recover-email').focus();
       }
       else if (!filter.test(email)) {
           $(".for-recover-password #recover-email").next(".validation").remove(); // remove it
           $(".for-recover-password #recover-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email address</div>');
           $('#recover-email').focus();
       }else{
 
          if(filter.test(email)){
             $("div.overlay-box").css("display", "block");
             $.ajax({
                type: "POST",
                url: baseUrl+"login/recoverPassword",
                data: {"name":name,"email":email} ,
                success: function(response){
                   $("div.overlay-box").css("display", "none");
                   var json = $.parseJSON(response);
                   if(json.status===0){
                      $(".for-recover-password #recover-email").next(".validation").remove(); 
                      $(".for-recover-password #recover-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">'+json.message+'</div>');
                   }else if(json.status===1){
                      $(".for-recover-password #recover-email").next(".validation").remove(); 
                      $('.sign-up-box.for-recover-password ').hide();
                      $('.sign-up-box.for-great-massage').show();
                   }
                   
                }
             });
          }
          
       }
 
    }); 


    // Signup form submit
    $(".sign-up-box #submitFrm").click(function(){
        if($(this).val()){
  
  
           var name = $("#username").val();
           var email = $("#email").val();
           var mobile = $("#mobile-number").val();
           var exp = /^[a-zA-Z$^(),. -]*$/;
           var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
           var fieldName = $("#email").attr("name");
           var password = $('#first_password').val();
           var source = $(this).attr('data-source');
           var SourceMedium = $(this).attr('data-source-medium');
           var SourceContent = $(this).attr('data-source-content');
           var SourceDescription = $(this).attr('data-source-description');
  
           //$("#username").val();
            $("#username").next(".validation").remove(); // remove it
            $("#email").next(".validation").remove(); // remove it
            $("#first_password").next(".validation").remove(); // remove it
            $("#mobile-number").next(".validation").remove(); // remove it
  
           if (name.length==0) {
               $("#username").next(".validation").remove(); // remove it
               $("#email").next(".validation").remove(); // remove it
               $("#first_password").next(".validation").remove(); // remove it
               $("#username").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your name</div>');
               $('#username').focus();
               return false
           }
           else if (name.length>0 && exp.test(name)==false) {
               $("#username").next(".validation").remove(); // remove it
               $("#email").next(".validation").remove(); // remove it
               $("#first_password").next(".validation").remove(); // remove it
               $("#username").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter a valid name</div>');
               $('#username').focus();
              return false
           }
           else if (email.length==0) {
               $("#username").next(".validation").remove(); // remove it
               $("#email").next(".validation").remove(); // remove it
               $("#first_password").next(".validation").remove(); // remove it
               $("#email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Email field is required</div>');
               $('#email').focus();
               return false
           }
           else if (email.length>0 && filter.test(email)==false) {
               $("#username").next(".validation").remove(); // remove it
               $("#email").next(".validation").remove(); // remove it
               $("#first_password").next(".validation").remove(); // remove it
               $("#email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email address</div>');
               $('#email').focus();
               return false
           }
           else if (email.length>0) {
               $("div.overlay-box").css("display", "block");
               $("#username").next(".validation").remove(); // remove it
               $("#email").next(".validation").remove(); // remove it
               $("#first_password").next(".validation").remove(); // remove it
               $(".sign-up-box #submitFrm").prop("disabled",false);
               
               $.ajax({
               type: "POST",
               url: baseUrl+"login/validateEmail",
               data: {"email":email} ,
               success: function(responses){
                 $("div.overlay-box").css("display", "none");
                 var response = $.parseJSON(responses);
                 if(response.status=='404'){
                     $("#emailError").show();
                     $("#username").next(".validation").remove(); // remove it
                     $(".emailError").attr("href", baseUrl+"login?email="+email);
                     $("#email").focus();
  
                     $(".sign-up-box #registrationForm").submit(function(e){
                        return false;
                     });
                     return false;
                 }
                 else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                   $("#emailError").hide();
                   $("#username").next(".validation").remove(); // remove it
                   $("#email").next(".validation").remove(); // remove it
                   $("#email").after('<div style="color:red;text-align: left;font-size: 12px;" class="validation">The email address you entered is not correct. Please try again.</div>');
                   $('#email').focus();
                   return false;
                 }else if($("input[name='phone']").length){
                      if (!$("input[name='phone']").val()) {
                         $("#mobile-number").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Mobile number field is required</div>');
                         $('#mobile-number').focus();
                         $("#registrationForm").submit(function(e){
                            return false;
                           });
                           return false
                     }
                     else if ($("input[name='phone']").val() && (($.isNumeric(mobile)==false)||($("input[name='phone']").val().length<10))) {
                         $("#mobile-number").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid mobile number</div>');
                         $('#mobile-number').focus();
                         $("#registrationForm").submit(function(e){
                            return false;
                           });
                           return false
                     }/*else if (password.length==0) {
                         $("#emailError").hide();
                         $("#username").next(".validation").remove(); // remove it
                         $("#email").next(".validation").remove(); // remove it
                         $("#first_password").next(".validation").remove(); // remove it
                         $("#first_password").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Password field is required</div>');
                         $('#first_password').focus();
                         $("#registrationForm").submit(function(e){
                            return false;
                           });
                           return false
                     }else if (password.length>0 && password.length<6) {
                         $("#emailError").hide();
                         $("#username").next(".validation").remove(); // remove it
                         $("#email").next(".validation").remove(); // remove it
                         $("#first_password").next(".validation").remove(); // remove it
                         $("#first_password").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Password length should be more than 5 character</div>');
                         $('#first_password').focus();
                         $("#registrationForm").submit(function(e){
                            return false;
                           });
                           return false
                     }*/
                     else{
                         $(".sign-up-box #registrationForm")[0].submit();
                          $("div.overlay-box").css("display", "block");
                          $.ajax({
                              type: "POST",
                              url: baseUrl+"login/emailSignupLeadsquare",
                              data: {"name":"email","email":email, "ProspectStage":"Registered1", "source":source,"SourceMedium":SourceMedium,'SourceContent':SourceContent,'SourceDescription':SourceDescription} ,
                              success: function(response){
                                  $("div.overlay-box").css("display", "none");
                              }
                           });
                          console.log('submited');
                        
                     }
  
                }
                 /*else if (password.length==0) {
                     $("#emailError").hide();
                     $("#username").next(".validation").remove(); // remove it
                     $("#email").next(".validation").remove(); // remove it
                     $("#first_password").next(".validation").remove(); // remove it
                     $("#first_password").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Password field is required</div>');
                     $('#first_password').focus();
                     $("#registrationForm").submit(function(e){
                        return false;
                       });
                       return false
                 }else if (password.length>0 && password.length<6) {
                     $("#emailError").hide();
                     $("#username").next(".validation").remove(); // remove it
                     $("#email").next(".validation").remove(); // remove it
                     $("#first_password").next(".validation").remove(); // remove it
                     $("#first_password").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Password length should be more than 5 character</div>');
                     $('#first_password').focus();
                     $("#registrationForm").submit(function(e){
                        return false;
                       });
                       return false
                 }*/
                 else{
                     $(".sign-up-box #registrationForm")[0].submit();
                     $("div.overlay-box").css("display", "block");
                     $.ajax({
                        type: "POST",
                        url: baseUrl+"login/emailSignupLeadsquare",
                        data: {"name":"email","email":email, "ProspectStage":"Registered1", "source":source,"SourceMedium":SourceMedium,'SourceContent':SourceContent,'SourceDescription':SourceDescription} ,
                        success: function(response){
                            $("div.overlay-box").css("display", "none");
                        }
                     });
  
                      console.log('submited');
                    
                 }
              }
               
           });
           
        }
         }
    });


    // Login form submit
    
    $("#login-btn").click(function(){
        
        var email = $("#loginform #email").val();
        var password = $("#loginform #password").val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var fieldName = $("#loginform #email").attr("name");
        //$("#username").val();
    
        if (email.length==0) {
            $("#loginform #email").next(".validation").remove(); // remove it
            $("#loginform #password").next(".validation").remove(); // remove it
            $("#loginform #email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your email</div>');
            $("#loginform #email").focus();
            return false
        }
        else if (email.length>0 && filter.test(email)==false) {
            $("#loginform #email").next(".validation").remove(); // remove it
            $("#loginform #password").next(".validation").remove(); // remove it
            $("#loginform #email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email address</div>');
            $("#loginform #email").focus();
            return false
        }
        else if (email.length>0 && filter.test(email)==true) {
            $("div.overlay-box").css("display", "block");
            $("#loginform #email").next(".validation").remove(); // remove it
            $("#loginform #password").next(".validation").remove(); // remove it
            $("#login-btn").prop("disabled",false);
            $(".bottom-link span a").attr("href", baseUrl+"login/recoverPassword?email="+email);
            $.ajax({
                url:baseUrl+"login/validate",
                type:"post",
                data:{'value':email,'name':fieldName},
                success:function(response){
                    $("div.overlay-box").css("display", "none");
                    var json=$.parseJSON(response);
                    var name=json.name;
                    var msg=json.message;
                    
                    if(name!=='email'){
                        $("#emailErrorbyUrl").hide();
                        $("#emailError").show();
                        //$("#loginform #email").next(".validation").remove(); // remove it
                        //$("#loginform #password").next(".validation").remove(); // remove it
                        //$("#loginform #email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Sorry! This email address does not exist</div>');
                    //$("#login-btn").prop("disabled",true);
                    $(".emailError").attr("href", baseUrl+"login/register?email="+email);
                    $("#loginform #email").focus();
                    $("#loginform").submit(function(e){
                        return false;
                    });
                    return false;
                    }else if (password.length==0) {
                        $(".form_error").empty();
                        $("#loginform #email").next(".validation").remove(); // remove it
                        $("#loginform #password").next(".validation").remove(); // remove it
                        $("#loginform #password").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Password field is required</div>');
                        //$("#login-btn").prop("disabled",true);
                        $('#loginform #password').focus();
                        $("#loginform").submit(function(e){
                        return false;
                    });
                    return false;
                    }
                    else if(name=='email'){
                        $(".sign-up-box  #loginform")[0].submit();
                        console.log('submited');
                    
                    }
                    
                }
            });
            
        }
    
    });
    

    // Makepayment

    $('.makepayment .alert-danger').hide();

    $('.makepayment').on('click', '.apply', function (){

        var coupon = $("#coupon_code").val();
        var amount= $("#actual_amount").val(); 
        var action = 'apply';
        if(coupon!=''){
  
          $.ajax({
              url:baseUrl+"login/use_coupon",
              type:"post",
              data:{coupon:coupon, 'amount':amount,action:action},
              success:function(response){
                 var json=$.parseJSON(response);
                 $("#checkout_form #amount").empty();
                 $("#used_coupon").empty();
                 $("#used_coupon").append($("#used_coupon").val(coupon));
                 var message=json.message;
                 if (message=='error') {
                    $('.alert-danger').show();
                 }else if(message=='success'){
                    $('.makepayment .amount').html('<strong><big><i class="fa fa-inr"></i>'+json.amount+'</big></strong><br><small>(Inclusive of all taxes)</small><br><div class="col-sm-12"><div class="col-sm-12"><small><b>You&#039;ve applied '+coupon+'</b></small></div><div class="col-sm-12"><button class="btn btn-color-b remove_coupon" >Remove</button></div></div>');
                    $("#checkout_form #amount").append($("#checkout_form #amount").val(json.amount));
                    if(json.amount==0)
                       $("#mkpayment").html('Go to Dashboard <i class="fa fa-chevron-right right"></i>');
                 }else{
                    $("#mkpayment").html('Make Payment <i class="fa fa-chevron-right right"></i>');
                    $('.alert-danger').hide();
                 }
  
                 
              }
           });
            
        }
    });


    $('.makepayment').on('click', '.remove_coupon', function (){
        var coupon = $("#coupon_code").val();
        var amount= $("#actual_amount").val(); 
        var action = 'remove';
        if(amount!=''){
          $.ajax({
              url:baseUrl+"login/use_coupon",
              type:"post",
              data:{coupon:coupon, 'amount':amount,action:action},
              success:function(response){
                 var json=$.parseJSON(response);
                 $("#checkout_form #amount").empty();
                 $("#used_coupon").empty();
                 $("#used_coupon").append($("#used_coupon").val(''));
                 var message=json.message;
                 if (message=='updated') {
                      $('.makepayment .amount').html('<strong><big><i class="fa fa-inr"></i>'+json.amount+'</big></strong><br><small>(Inclusive of all taxes)</small><br><div class="col-sm-12"><div class="col-sm-12"><small><b>Have coupon code?</b></small></div><div class="col-sm-12"><input type="text" class="form-control" id="coupon_code" name="coupon"><button class="btn btn-color-b apply" >Apply</button></div><div style="display:none;" class="alert-danger">Invalid coupon code</div></div>');
                      $("#checkout_form #amount").append($("#checkout_form #amount").val(json.amount));
                      $("#mkpayment").html('Make Payment <i class="fa fa-chevron-right right"></i>');
                   }
              }
           });
        }
    });

    // Custom google search
    $(".for-zero-result").hide();
    $(".back-to-library").hide();
    $(".search-box #searchButton").click(function() {

    var searchValue = $('#searchField').val();
    if(searchValue.length>0)
    {
        $("div.overlay-box").css("display", "block");
        $(".back-to-library").show();
            $.ajax({
                url:baseUrl+"prelogin/searchData",
                type:"post",
                async: true,
                data:{searchValue:searchValue},
                success:function(response){
                        $("div.overlay-box").css("display", "none");
                        $("#google-search > ul").empty();
                        $(".for-get-result").show();
                        $(".for-get-result").empty();
                    
                    if(response!==undefined && response.length>2){
                        response = $.parseJSON(response);
                        $(".home-page").hide();
                        $(".search-results").show();
                        $(".for-zero-result").hide();
                        $(".for-get-result").append('Showing <span style="font-weight:600">'+response.length+'</span> results for <span style="font-weight:600">'+searchValue+'</span>');
                        var image ="https://mindlercareerlibrarynew.imgix.net/";

                            for(var i=0;i<response.length;i++){
                                var domain=response[i].domain_name[0];
                                var str = domain.replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,''); 
                                 domain = str.replace(/ +(?= )/g,'').trim(); 
                                 domain = domain.replace(/[_\s]/g, '-');
                                $("#google-search > ul").append('<li><div class="col-md-4"><div class="img-box"><a target="_blank" href="'+baseUrl+"careerlibrary/"+domain+"/"+response[i].revised_url[0]+'"><img src="'+image+response[i].cover_image[0]+'" /></a></div></div><div class="col-md-8"><div class="title"><a target="_blank" href="'+baseUrl+"careerlibrary/"+domain+"/"+response[i].revised_url[0]+'">'+response[i].title[0]+'</a></div><p>'+response[i].highlights[0].split(" ").splice(0,50).join(" ")+'</p><p><a target="_blank" href="'+baseUrl+"careerlibrary/"+domain+"/"+response[i].revised_url[0]+'">Read More ></a></p></div></li>');
                            }
                    }else{
                        $(".home-page").show();
                        $(".search-results").hide();
                        $(".for-zero-result").show();
                        $(".not-found-data").empty();
                        $(".not-found-data").append('Your search (<span style="font-weight:600">'+searchValue+'</span>) did not fetch any results.');
                    }
                }
            });
        }else{
            $(".for-get-result").hide();
            $(".home-page").show();
            $(".search-results").hide();
        }
    });


    $(".search-box #searchField").keyup(function() {

        var searchValue = $('#searchField').val();
        if(searchValue.length==0)
        {
           $(".for-get-result").hide();
           $(".home-page").show();
           $(".search-results").hide();
           $(".for-zero-result").hide();
           $(".back-to-library").hide();
           $(".ui-autocomplete").hide();
        }
     
    });

    $(".search-box #searchField").keypress("keypress", function(e) {
        var searchValue = $('#searchField').val();
        
        if(searchValue.length>0 && e.keyCode == 13)
        {
          
          $(".search-box #searchButton").click();
          $(".ui-autocomplete").hide();
           
        }
    });

    // End custom google search

    $("a.expand-readmore").click(function(){
        $("p.collapse-readmore").hide();
        $("p.expand-readmore-data").show();
    });
    
    /*newheader and banner*/
    var wh = $(window).height();
    $(".full-screen-intro").height(wh);


    $(".admission-modal-content .btn-continue").click(function(){
        
        var name = $("#name").val();
        var email = $("#email").val();
        var contact = $("#contact").val();
        var exp = /^[a-zA-Z$^() ]*$/;
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        
        $("#name").next(".validation").remove(); // remove it
        $("#email").next(".validation").remove(); // remove it
        $("#contact").next(".validation").remove(); // remove it

        if (name.length==0) {
            $("#name").next(".validation").remove(); // remove it
            $("#email").next(".validation").remove(); // remove it
            $("#name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your name</div>');
            $('#name').focus();
            return false
        }

        else if (name.length>0 && exp.test(name)==false) {
            $("#name").next(".validation").remove(); // remove it
            $("#email").next(".validation").remove(); // remove it
            $("#contact").next(".validation").remove(); // remove it
            $("#name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter a valid name</div>');
            $('#name').focus();
           return false
        } else if (email.length==0) {
            $("#name").next(".validation").remove(); // remove it
            $("#email").next(".validation").remove(); // remove it
            $("#email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Email field is required</div>');
            $('#email').focus();
            return false
        }

        
        else if (email.length>0 && filter.test(email)==false) {
            $("#name").next(".validation").remove(); // remove it
            $("#email").next(".validation").remove(); // remove it
            $("#contact").next(".validation").remove(); // remove it
            $("#email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email address</div>');
            $('#email').focus();
            return false
        }
        else if ($("input[name='contact']").val() && (($.isNumeric(contact)==false)||($("input[name='contact']").val().length<10))) {
                      $("#contact").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid mobile number</div>');
                      $('#contact').focus();
                      $("#navigateForm").submit(function(e){
                         return false;
                        });
                   }
        else if (email.length>0) {
            $("div.overlay-box").css("display", "block");
            $("#name").next(".validation").remove(); // remove it
            $("#email").next(".validation").remove(); // remove it
            $("#contact").next(".validation").remove(); // remove it
            $(".admission-modal-content .btn-continue").prop("disabled",false);
            
            $.ajax({
            type: "POST",
            url: baseUrl+"login/validateOnlyEmail",
            data: {"email":email} ,
            success: function(responses){
              $("div.overlay-box").css("display", "none");
              var response = $.parseJSON(responses);
               if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                
                $("#name").next(".validation").remove(); // remove it
                $("#contact").next(".validation").remove(); // remove it
                $("#email").next(".validation").remove(); // remove it
                $("#email").after('<div style="color:red;text-align: left;font-size: 12px;" class="validation">The email address you entered is not correct. Please try again.</div>');
                $('#email').focus();
                return false;
              }else if($("input[name='contact']").length){
                   if (!$("input[name='contact']").val()) {
                      $("#contact").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Mobile number field is required</div>');
                      $('#contact').focus();
                      $("#navigateForm").submit(function(e){
                         return false;
                        });
                        return false
                  }
                  else if ($("input[name='contact']").val() && (($.isNumeric(contact)==false)||($("input[name='contact']").val().length<10))) {
                      $("#contact").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid mobile number</div>');
                      $('#contact').focus();
                      $("#navigateForm").submit(function(e){
                         return false;
                        });
                   }else{
                       
                        $.ajax({
                           type: "POST",
                           url: baseUrl+"login/navigate_pre_payment",
                           data: {"name":name,"email":email, "contact":contact} ,
                           success: function(response){
                             $(".admission-modal .admission-modal-body .fa-close").click();
                             $("div.overlay-box").css("display", "none");
                               var json = $.parseJSON(response);
                                 var amount=json.amount;
                                 var product=json.product;
                                 var key = json.key;
                                 var contact=json.contact;
                                 var email=json.email;
                                 var uid=json.uid;

                                 var options = {
                                 "key": key,
                                 "amount": amount+'00', // 2000 paise = INR 20
                                 "name": product,
                                 "description": "Career Assessment & Guidance",
                                 "image": baseUrl+"assets/prelogin_new/img/logo-black.png",
                                 "handler": function (response){
                                     
                                     if(response.razorpay_payment_id){
                                      $("div.overlay-box").css("display", "block");
                                      $.ajax({
                                           url: baseUrl+"login/navigate_thankyou",
                                           type: "post",
                                           data: {'razorpay_payment_id':response.razorpay_payment_id},
                                           success: function (getresponse) {
                                            var jsondata = $.parseJSON(getresponse);
                                            if(jsondata.message==='Transaction Successfull'){
                                               $("div.overlay-box").css("display", "none");
                                              $(".admission-modal").css("display", "block");
                                              $(".admission-block").css("display", "block");
                                              
                                             $(".admission-modal").show();
                                             $(".admission-modal .admission-modal-body .admission-modal-content.form-box").hide();
                                             $(".admission-modal .admission-modal-body").append("<div  class='admission-modal-content thankyou-box'><h4>Thank You!</h4><p>We've received an amount of Rs.3000/- for Mindler Navigate Program <a href='"+jsondata.path+"'  target='_blank'>Click here</a> to download a copy of your order confirmation.</p><p>You must have received an email with further instructions on booking a slot with our counsellors for your college guidance. </p><p>Write to us at <a href='mailto:hello@mindler.com'>hello@mindler.com</a> if you face any issue in this regard.</p></div>");
                                             
                                          }
                                          }
                                       });
                                    }
                                 },
                                 "prefill": {
                                     "contact": contact,
                                     "email": email
                                 },
                                 "notes": {
                                     "id":uid
                                 },
                                 "theme": {
                                     "color": "#007fb6"
                                 },
                                
                             };
                             var rzp1 = new Razorpay(options);
                             rzp1.open();
                           }
                        });

                   }
             }    
           }
            
        });
        
     }
    });


    $("#college-admission-form .help-form-button").click(function(){
       
        var name = $("#user_name").val();
        var email = $("#user_email").val();
        var contact = $("#user_contact").val();
        var comment = $("#user_comment").val();
        var exp = /^[a-zA-Z$^(), ]*$/;
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        $("#user_name").next(".validation").remove(); // remove it
        $("#user_email").next(".validation").remove(); // remove it
        $("#user_contact").next(".validation").remove(); // remove it
        $("#user_comment").next(".validation").remove();

        if (name.length==0) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your name</div>');
            $('#user_name').focus();
            return false
        }
        else if (name.length>0 && exp.test(name)==false) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_contact").next(".validation").remove(); // remove it
            $("#user_comment").next(".validation").remove();
            $("#user_name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter a valid name</div>');
            $('#user_name').focus();
           return false
        } else if (email.length==0) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_contact").next(".validation").remove(); // remove it
            $("#user_comment").next(".validation").remove(); // remove it
            $("#user_email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Email field is required</div>');
            $('#user_email').focus();
            return false
        }
        else if (email.length>0 && filter.test(email)==false) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_contact").next(".validation").remove(); // remove it
            $("#user_comment").next(".validation").remove(); // remove it
            $("#user_email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email address</div>');
            $('#user_email').focus();
            return false
        }
        else if (contact.length==0) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_contact").next(".validation").remove(); // remove it
            $("#user_comment").next(".validation").remove(); // remove it
            $("#user_contact").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Mobile number is required</div>');
            $('#user_contact').focus();
            return false
        }
        else if ($("input[name='user_contact']").val() && (($.isNumeric(contact)==false)||($("input[name='user_contact']").val().length<10))) {
            $("#user_contact").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid mobile number</div>');
            $('#user_contact').focus();
            
        }
        else if (comment.length==0) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_comment").next(".validation").remove(); // remove it
            $("#user_comment").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Comment field is required</div>');
            $('#user_comment').focus();
            return false
        }
        else if (comment.length<20) {
            $("#user_name").next(".validation").remove(); // remove it
            $("#user_email").next(".validation").remove(); // remove it
            $("#user_comment").next(".validation").remove(); // remove it
            $("#user_comment").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Minimum 20 characters required</div>');
            $('#user_comment').focus();
            return false
        }
        else{
                $("div.overlay-box").css("display", "block");
                $.ajax({
                    type: "POST",
                    url: baseUrl+"login/navigate_contactus",
                    data: {"name":name,"email":email, "contact":contact,"comment":comment} ,
                    success: function(response){
                        $("div.overlay-box").css("display", "none");
                        $("#program-form-section").css("display", "none");
                        $("#program-message-section").css("display", "block");
                        
                        
                    }
                });

            }
    });


    $("#validatecontact").blur(function(){
		var val=$(this).val();
		var name=$(this).attr("name");
		var id=$(this).attr("id");
		$("#submitFrm").prop("disabled",false);
		if(val!=''){
			$.ajax({
				url:baseUrl+"login/validate",
				type:"post",
				data:{'value':val,'name':name},
				success:function(response){
					var json=$.parseJSON(response);
					var name=json.name;
					var msg=json.message;
					$('.lockscreen-contact').empty();
					if(name=='phone'){
						$('.lockscreen-contact').append(msg);
						$("#submitFrm").prop("disabled",true);
						$("#validatecontact").focus();
						
					}
				}
			});
		}
	});

/*for diwali gift */

$(".gift-card-payment .right-box .rightpay-box.pay .btn-checkout").click(function(){
        
        var gifterName = $(".gift-card-payment #gifter-name").val();
        var gifterEmail = $(".gift-card-payment #gifter-email").val();
        var gifterContact = $(".gift-card-payment #gifter-phone").val();
        var receiverName = $(".gift-card-payment #receiver-name").val();
        var receiverEmail = $(".gift-card-payment #receiver-email").val();
        var receiverContact = $(".gift-card-payment #receiver-phone").val();
        var exp = /^[a-zA-Z$^() ]*$/;
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var package= $(".gift-card-payment .right-box .rightpay-box #hiddenValue").val();


            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-phone").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
       if (gifterName.length==0) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#gifter-name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your name</div>');
            $('#gifter-name').focus();
            return false
        }
        else if (gifterName.length>0 && exp.test(gifterName)==false) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#gifter-name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter a valid name</div>');
            $('#gifter-name').focus();
            return false
        } else if (gifterEmail.length==0) {
          $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#gifter-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your email</div>');
            $('#gifter-email').focus();
            return false
        }
        else if (gifterEmail.length>0 && filter.test(gifterEmail)==false) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#gifter-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email</div>');
            $('#gifter-email').focus();
            return false;
        }else if (gifterContact.length==0) {
           $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#gifter-phone").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your phone number</div>');
            $('#gifter-phone').focus();
            return false;
            
        }else if ((($.isNumeric(gifterContact)==false)||(gifterContact.length<10))) {
           $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#gifter-phone").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid phone number</div>');
            $('#gifter-phone').focus();
            return false;
            
        }else if (receiverName.length==0) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter receiver name</div>');
            $('#receiver-name').focus();
            return false;
        }
        else if (receiverName.length>0 && exp.test(receiverName)==false) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-name").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid name</div>');
            $('#receiver-name').focus();
            return false;
        } else if (receiverEmail.length==0) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter receiver email</div>');
            $('#receiver-email').focus();
            return false;
        }
        else if (receiverEmail.length>0 && filter.test(receiverEmail)==false) {
            $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email</div>');
            $('#receiver-email').focus();
            return false;
        }else if (receiverContact.length==0) {
           $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-phone").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter receiver phone number</div>');
            $('#receiver-phone').focus();
            return false;
            
        }
        else if ((($.isNumeric(receiverContact)==false)||(receiverContact.length<10))) {
           $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-phone").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid phone number</div>');
            $('#receiver-phone').focus();
            return false;
            
        }else{

          $.ajax({
        url:baseUrl+"login/validate",
        type:"post",
        data:{'value':receiverEmail,'name':'email'},
        success:function(response){
          var json=$.parseJSON(response);
          
          if(json.message){
           $("#gifter-name").next(".validation").remove();
            $("#gifter-email").next(".validation").remove();
            $("#gifter-contact").next(".validation").remove();
            $("#receiver-name").next(".validation").remove();
            $("#receiver-email").next(".validation").remove();
            $("#receiver-phone").next(".validation").remove();
            $("#receiver-email").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Sorry! This email id already exist</div>');
            $('#receiver-email').focus();
            return false;
          }else{
            $.ajax({
                           type: "POST",
                           url: baseUrl+"login/diwali_pre_payment",
                           data: {"package":package,"refer_name":gifterName,"refer_email":gifterEmail,"refer_phone":gifterContact,"student_name":receiverName,"student_email":receiverEmail,"student_phone":receiverContact} ,
                           success: function(response){
                             
                               var json = $.parseJSON(response);
                                 var amount=json.amount;
                                 var product=json.product;
                                 var key = json.key;
                                 console.log(json);
                                 var options = {
                                 "key": key,
                                 "amount": amount+'00', // 2000 paise = INR 20
                                 "name": product,
                                 "description": "Career Assessment & Guidance",
                                 "image": baseUrl+"assets/prelogin_new/img/logo-black.png",
                                 "handler": function (response){
                                     
                                     if(response.razorpay_payment_id){
                                      $("div.overlay-box").css("display", "block");
                                      $.ajax({
                                           url: baseUrl+"login/diwali_checkout",
                                           type: "post",
                                           data: {'razorpay_payment_id':response.razorpay_payment_id},
                                           success: function (getresponse) {
                                            var jsondata = $.parseJSON(getresponse);
                                            if(jsondata.message==='Transaction Successful'){
                                             $("div.overlay-box").css("display", "none");
                                             if(jsondata.package==2){
                                              if ($(window).width() <= 768) {
                                              $('.gift-card-payment.before').hide();
                                               $('.gift-card-payment.after.career').show();
                                            
                                             }else{
                                             $('.gift-card-payment.before').hide();
                                             $('.gift-card-payment.after.career').show();
                                              
                                             }
                                           }else if(jsondata.package==1){
                                             if ($(window).width() <= 768) {
                                              $('.gift-card-payment.before').hide();
                                               $('.gift-card-payment.after.stream').show();
                                            
                                             }else{
                                             $('.gift-card-payment.before').hide();
                                             $('.gift-card-payment.after.stream').show();
                                              
                                             }
                                             
                                          }
                                          }
                                           }
                                       });
                                    }
                                 },
                                 "prefill": {
                                     "contact": gifterContact,
                                     "email": gifterEmail
                                 },
                                 "theme": {
                                     "color": "#007fb6"
                                 },
                                
                             };
                             var rzp1 = new Razorpay(options);
                             rzp1.open();
                           }
                        });

            
          }
        }
      });
            
         
        }

        
    });


$(".gift-ratebox .ratebox-sec .gift-stream").click(function(){


   
   $('#form-gift-stream')[0].submit();


});


$(".gift-ratebox .ratebox-sec .gift-career").click(function(){

  $(' #form-gift-career')[0].submit();
e.preventDefault();
});


$(".gift-card-payment .receiver .copydetails").click(function(){
      if($(".gift-card-payment #gifter-name").val()!='' && $(".gift-card-payment #gifter-email").val()!='' && $(".gift-card-payment #gifter-phone").val()!=''){
        if ($('.gift-card-payment .receiver .copydetails').is(':checked')) {
         $(".gift-card-payment #receiver-name").val($(".gift-card-payment #gifter-name").val());
        $(".gift-card-payment #receiver-email").val($(".gift-card-payment #gifter-email").val());
        $(".gift-card-payment #receiver-phone").val($(".gift-card-payment #gifter-phone").val());
        }else{
        $(".gift-card-payment #receiver-name").val("");
        $(".gift-card-payment #receiver-email").val("");
        $(".gift-card-payment #receiver-phone").val("");
        }
      }
       
})
/*end*/

/*school counselor login*/
$("#school-counselor-login-btn").click(function(){
        var accesscode = $("#school-counselor-login-form #counselor-accesscode").val();
        var password = $("#school-counselor-login-form #counselor-password").val();
        
        //$("#username").val();
    
        if (accesscode.length==0) {
            $("#school-counselor-login-form #counselor-accesscode").next(".validation").remove(); // remove it
            $("#school-counselor-login-form #counselor-password").next(".validation").remove(); // remove it
            $("#school-counselor-login-form #counselor-accesscode").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your accesscode</div>');
            $("#school-counselor-login-form #counselor-accesscode").focus();
            return false
        }else if(password.length==0){
             $("#school-counselor-login-form #counselor-accesscode").next(".validation").remove(); // remove it
             $("#school-counselor-login-form #counselor-password").next(".validation").remove(); // remove it
             $("#school-counselor-login-form #counselor-password").after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter your password</div>');
             $("#school-counselor-login-form #counselor-password").focus();
             return false
        }else{
              $.ajax({
                url:baseUrl+"schoolnew/validateLogin",
                type:"post",
                data:{'accesscode':accesscode,'password':password},
                success:function(response){
                  var json=$.parseJSON(response);
                  var url=json.url;
                  var msg=json.message;
                  if(msg==='Success'){
                    window.location.href = url;
                  }else{
                    $("#counselorError").show();
                  }
                 
                }
          });
          //$(".sign-up-box  #school-counselor-login-form")[0].submit();
        }
    
    });

/*end*/

});