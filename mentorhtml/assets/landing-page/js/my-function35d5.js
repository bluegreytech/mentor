
$(document).ready(function () {
    var base_url =  window.location.origin + '/';
    $(".ad-landing-page section.ad-faq ul.content li strong").on('click', function (e) {
        e.preventDefault();

        $(this).parents("li").toggleClass("active");
        $(this).parents("li").find("p").slideToggle();
        $(this).parents("li").closest('li').siblings().find("p").slideUp();
        $(this).parents("li").closest('li').siblings().removeClass("active");
    });

     $(".iccc-section-box .iccc-slider-box .slide.left").on('click', function (e) {
      e.preventDefault();
      $(this).parents(".iccc-section-box").find(".slide").removeClass("active");
      $(this).addClass("active");

      $(this).parents(".iccc-slider-box ").find(".lSAction .lSPrev").click();

  });
  $(".iccc-section-box .iccc-slider-box .slide.right").on('click', function (e) {
      e.preventDefault();
      $(this).parents(".iccc-section-box").find(".slide").removeClass("active");
      $(this).addClass("active");
      $(this).parents(".iccc-slider-box ").find(".lSAction .lSNext").click();

  });
  if($(window).width() > 667) {
  $("#iccc-slider-2").lightSlider({
    item: 2,
    slideMove: 1,
    
});

}
if($(window).width() <= 667) {

  $("#iccc-slider-2").lightSlider({
    item: 1,
    slideMove: 1,
 
    
});

}


    $("#ad-slider").lightSlider({
        item: 1,
        slideMove: 1,
        
    });

    $(".landing-page .lSAction  a").append("<i class='fa fa-play'>");


    $(window).scroll(function () {

        var scrollForm = $(window).scrollTop();
        if (scrollForm >= 20) {
            $(".ad-form ").addClass("fixed-class");
            $("header").addClass("sticky");

        }


        else {
            $(".ad-form").removeClass("fixed-class");
            $("header").removeClass("sticky");
        }

    });


    $(".ad-form .ad-form-box .form-group-row .radio-row span.btn-sets").on('click', function (e) {
        e.preventDefault();
        $(this).parents(".radio-row").find("span.btn-sets .radio-btn").removeClass("active");
        $(this).find(".radio-btn").addClass("active");
        $(".validation").remove(); // remove it
        var assessment = $(this).parents(".radio-row").find("span.btn-sets span.active").attr("data-id");
        $(this).parents(".radio-row").find("input[name='assessment']").val(assessment);
        

       //$(this).find("input:radio").click();     
    });


    $(".ad-landing-page .ad-mobile-btn a.schedule-btn").on('click', function (e) {
        e.preventDefault();
        $(".ad-landing-page .ad-mobile-btn").hide();
        $(".popup-block").show();
        $(".ad-landing-page").find(".ad-form").show();
     
        $("body").addClass("body-fixed ");
        $(".ad-landing-page").find(".ad-form input").val("");
        $(".ad-landing-page").find(".radio-row span.btn-sets .radio-btn").removeClass("active");
    });


    $(".ad-landing-page .ad-mobile-btn a.take-me-to-dashboard").on('click', function (e) {
        e.preventDefault();
        $(".ad-landing-page .ad-mobile-btn").hide();
        $(".popup-block").show();
        $(".ad-landing-page").find(".after-signup-process").show();
    });


    $(".ad-landing-page .after-signup-process .fa-close").on('click', function (e) {
        e.preventDefault();
        
        $(".popup-block").hide();
        $(".ad-landing-page").find(".ad-form").hide();
        $(".ad-landing-page").find(".after-signup-process").hide();
        $(".ad-landing-page .ad-mobile-btn").show();
        $("body").removeClass("body-fixed ");
    });

    $(".ad-landing-page .ad-form .form-close").on('click', function (e) {
        e.preventDefault();
        
        $(".popup-block").hide();
        $(".ad-landing-page").find(".ad-form").hide();
        $(".ad-landing-page .ad-mobile-btn").show();
        $("body").removeClass("body-fixed ");
    });

    
     


    $(".ad-landing-page .ad-header .ad-form button.btn-ad-submit").click(function(){
      
            var name= $('input[name="form-name"]').val();
            var email= $('input[name="form-email"]').val();
            var mobile= $('input[name="form-mobile"]').val();
            var assessment = $("input[name='assessment']").val();
            var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            var source = $(this).attr('data-source');
            var SourceMedium = $(this).attr('data-source-medium');
            var SourceContent = $(this).attr('data-source-content');
            var SourceDescription = $(this).attr('data-source-description');
            var ProspectStage = "EmailOnly";
            var url=$('input[name="form-url"]').val();
            $(".validation").remove(); // remove it
            var segments = url.split( '/' );
            
            
            

            if(!name){
              $('input[name="form-name"]').after('<div class="validation" >Name field can not be blank.</div>');
              $('input[name="form-name"]').focus();
            }else if(!email){
              $('input[name="form-email"]').after('<div class="validation" >Email field can not be blank.</div>');
              $('input[name="form-email"]').focus();
            } else if (!filter.test(email)) {
              $('input[name="form-email"]').after('<div class="validation" >Please enter valid email address.</div>');
              $('input[name="form-email"]').focus();
            }
            else if(!mobile){
              $('input[name="form-mobile"]').after('<div class="validation" >Mobile number field can not be blank.</div>');
              $('input[name="form-mobile"]').focus();
            }else if($.isNumeric(mobile)==false || mobile.length<10){
              $('input[name="form-mobile"]').after('<div class="validation" >Please enter valid mobile number.</div>');
              $('input[name="form-mobile"]').focus();
            }else if(!assessment){
              $(this).parents(".ad-landing-page .ad-header .ad-form").find('.radio-row').after('<div class="validation" style="color:red;font-size: 10px;float: left;margin-top: 4px;">Please select stream/career to proceed.</div>');
              return false;
            }else if (email.length>0) {
                 $("div.overlay-box").css("display", "block");
                 var registerdata = $('.ad-landing-page .ad-header .ad-form #register-for-the-ad-form').serialize();
                 $.ajax({
                     type: "POST",
                     url: base_url+"login/campaignSignup",
                     data: {"data":registerdata},
                     success: function(responses){
                        $("div.overlay-box").css("display", "none");
                        var response = $.parseJSON(responses);
                        if(response.status=='404'){
                             $('input[name="form-email"]').after('<div class="validation" >'+response.message+'</div>');
                             $('input[name="form-email"]').focus();
                             return false;
                        }

                        else if(response.result=='invalid' || response.result=='unknown' || response.result=='catch_all'){
                             $('input[name="form-email"]').after('<div style="color:red;text-align: left;font-size: 12px;" class="validation home-valid">The email address you entered is not correct. Please try again.</div>');
                             $('input[name="form-email"]').focus();

                         return false;
                       }
                       else if(response.status==200){
                             !function(f,b,e,v,n,t,s)
                              {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                              n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                              if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                              n.queue=[];t=b.createElement(e);t.async=!0;
                              t.src=v;s=b.getElementsByTagName(e)[0];
                              s.parentNode.insertBefore(t,s)}(window, document,'script',
                              'https://connect.facebook.net/en_US/fbevents.js');
                              fbq('init', '263133604031761');
                              fbq('track', 'Lead');
                              /*linkedin pixel code*/
                              _linkedin_partner_id = "236866";
                              window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
                              window._linkedin_data_partner_ids.push(_linkedin_partner_id);
                             
                              (function(){var s = document.getElementsByTagName("script")[0];
                              var b = document.createElement("script");
                              b.type = "text/javascript";b.async = true;
                              b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                              s.parentNode.insertBefore(b, s);})();

                              /*end of linkedin pixel code */
                            //Calendly.showPopupWidget('https://calendly.com/mindler/15-min-call-campaign');
                            if(segments[3]=='choose-your-perfect-career'){
                               if(assessment==1){
                              $(".ad-landing-page .ad-header div.row").after('<div class="ad-form after-signup-process fixed-class"><div class="ad-form-box" style="padding:0"><i class="fa fa-close"></i><h5 class="text-center margin-bottom-5">Thank you for your interest in our career guidance programs.</h5><p style="margin-bottom: 0px!important;">Career Guidance Programs starting at INR <span style="font-weight:600">2400</span></p><a target="_blank" class="btn btn-warning btn-flat btn-iccc-submit" href="'+base_url+'pricing" style="margin-bottom: 40px;">View Details</a><p style="margin-bottom: 0px!important;">Our experts will call you shortly. In the meanwhile, you can try our orientation style test for free.</p><a href="' + base_url + 'assess/dashboard" class="btn btn-warning btn-flat btn-iccc-submit btn-ghost" style="margin-bottom: 40px;">Try the Free Assessment</a><span style="display: block;margin-top: -10px;font-size: 12px;"></div></div>');
                            }else if(assessment==2){
                              $(".ad-landing-page .ad-header div.row").after('<div class="ad-form after-signup-process fixed-class"><div class="ad-form-box" style="padding:0"><i class="fa fa-close"></i><h5 class="text-center margin-bottom-5">Thank you for your interest in our career guidance programs.</h5><p style="margin-bottom: 0px!important;">Career Guidance Programs starting at INR <span style="font-weight:600">3400</span></p><a target="_blank" class="btn btn-warning btn-flat btn-iccc-submit" href="'+base_url+'pricing" style="margin-bottom: 40px;">View Details</a><p style="margin-bottom: 0px!important;">Our experts will call you shortly. In the meanwhile, you can try our orientation style test for free.</p><a href="' + base_url + 'assess/dashboard" class="btn btn-warning btn-flat btn-iccc-submit btn-ghost" style="margin-bottom: 40px;">Try the Free Assessment</a><span style="display: block;margin-top: -10px;font-size: 12px;"></div></div>');
                            }
                              
                            }else{
                              $(".ad-landing-page .ad-header div.row").after('<div class="ad-form after-signup-process fixed-class"><div class="ad-form-box" style="padding:0"><i class="fa fa-close"></i><h5 class="text-center margin-bottom-5">Thank you for your interest in our career guidance programs.</h5><p style="margin-bottom: 0px!important;">Our experts will call you shortly.</p><a target="_blank" class="btn btn-warning btn-flat btn-iccc-submit" href="https://calendly.com/mindler/15-min-call-campaign?email='+email+'&name='+name+'" style="margin-bottom: 40px;">Pick a Time for the Call</a><p style="margin-bottom: 0px!important;">In the meanwhile, you can try our orientation style test for free.</p><a href="' + base_url + 'assess/dashboard" class="btn btn-warning btn-flat btn-iccc-submit btn-ghost" style="margin-bottom: 40px;">Try the Free Assessment</a><span style="display: block;margin-top: -10px;font-size: 12px;"></div></div>');
                            }
                            //
                            
                           
                            
                            
                            

                            $(".ad-landing-page .ad-header .before-signup-process").remove(); // remove it
                            
                            $(".ad-form.after-signup-process").show();
                            if ($(window).width() <= 768) {
                                $(".popup-block").show();
                                $("body").addClass("body-fixed ");

                                $(".ad-landing-page .ad-form.after-signup-process .fa-close").on('click', function (e) {
                                    e.preventDefault();
                                    $(".ad-landing-page").find(".ad-form.after-signup-process").hide();
                                    $(".popup-block").hide();
                                    $(".ad-landing-page .ad-mobile-btn").show();
                                    $(".ad-landing-page .ad-mobile-btn a").show();
                                    $(".ad-landing-page .ad-mobile-btn a.schedule-btn").hide();
                                    $("body").removeClass("body-fixed ");
                                });
                            }

                             /*Quora tracking code*/
                             !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                              qp('init', '988fc98327ae4c43a375230f3c92a57f');
                              qp('track', 'GenerateLead');

                              /* Twitter universal website tag code*/
                              !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
                              },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
                              a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
                              // Insert Twitter Pixel ID and Standard Event data below
                              twq('init','o0it2');
                              twq('track','Lead');

                              gtag_report_conversion();
                            
                            emailSignupLeadsquare(email,ProspectStage,source,SourceMedium,SourceContent,SourceDescription)
                            return false;
                        }else{

                            $(".ad-landing-page .ad-header .ad-form button.btn-ad-submit").parents(".ad-landing-page .ad-header .ad-form").find('.radio-row').after('<div class="validation" style="color:red;font-size: 10px;float: left;margin-top: 4px;">Something went wrong.</div>');
                            return false;
                        }
                    }
             
                });
         
            }
       
    });
    

   /* Event snippet for Adwords Conversion Tracking conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button.*/
    
    function gtag_report_conversion(url) {

        var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
        };
        gtag('event', 'conversion', {
          'send_to': 'AW-924053131/eKIGCIqh2oIBEIvdz7gD',
          'event_callback': callback
        });
        return false;
    }

    $("input").keyup(function(){ 
        if($(this).val()){
            $(this).next(".form_error").remove(); // remove it
            $(this).next(".validation").remove(); // remove it
            $(".validation").remove(); // remove it
            $(".validation-mobile").remove(); // remove it
        }
    });


    /*Email signup leadsquare*/
    function emailSignupLeadsquare(email,ProspectStage,source,SourceMedium,SourceContent,SourceDescription){
          $("div.overlay-box").css("display", "block");
          $.ajax({
            type: "POST",
            url: base_url+"login/emailSignupLeadsquare",
            data: {"name":"email","email":email, "ProspectStage":ProspectStage, "source":source,"SourceMedium":SourceMedium,'SourceContent':SourceContent,'SourceDescription':SourceDescription} ,
            success: function(response){
                $("div.overlay-box").css("display", "none");
            }
          });

          return true;
    }


    $(".b-school-form .sticky-form .form-box .before #b-school .btn-b-school").on('click', function (e) {
        e.preventDefault();
        
        var name= $('input[name="form-name"]').val();
        var email= $('input[name="form-email"]').val();
        var mobile= $('input[name="form-mobile"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        

        $(".validation").remove(); // remove it
        if(!name){
          $('input[name="form-name"]').after('<div class="validation" >Name field can not be blank.</div>');
          $('input[name="form-name"]').focus();
        }else if(!email){
          $('input[name="form-email"]').after('<div class="validation" >Email field can not be blank.</div>');
          $('input[name="form-email"]').focus();
        } else if (!filter.test(email)) {
          $('input[name="form-email"]').after('<div class="validation" >Please enter valid email address.</div>');
          $('input[name="form-email"]').focus();
        }
        else if(!mobile){
          $('input[name="form-mobile"]').after('<div class="validation" >Mobile number field can not be blank.</div>');
          $('input[name="form-mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $('input[name="form-mobile"]').after('<div class="validation" >Please enter valid mobile number.</div>');
          $('input[name="form-mobile"]').focus();
        }
        else{

          $('input[name="form-name"]').val(name);
          $('input[name="form-email"]').val(email);
          $('input[name="form-mobile"]').val(mobile);
          //$('input[name="school"]').val(school);
          var registerdata = $('.b-school-form .sticky-form .form-box .before #b-school').serialize();
          if (registerdata) {
            $("div.overlay-box").css("display", "block");
              $.ajax({
                  url: base_url+'prelogin/overseasProgramBschool',
                  type: "post",
                  data: {'data': registerdata },
                  success: function (response) {
                    $("div.overlay-box").css("display", "none");
                    $(".b-school-form .sticky-form .form-box .before").hide();
                    $(".b-school-form .sticky-form .form-box .after").show();

                    !function(f,b,e,v,n,t,s)
                   {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                   n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                   if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                   n.queue=[];t=b.createElement(e);t.async=!0;
                   t.src=v;s=b.getElementsByTagName(e)[0];
                   s.parentNode.insertBefore(t,s)}(window, document,'script',
                   'https://connect.facebook.net/en_US/fbevents.js');
                   fbq('init', '263133604031761');
                   fbq('track', 'Lead');

                   /*Quora tracking code*/
                   !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                    qp('init', '988fc98327ae4c43a375230f3c92a57f');
                    qp('track', 'GenerateLead');

                    /* Twitter universal website tag code*/
                    !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
                    },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
                    a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
                    // Insert Twitter Pixel ID and Standard Event data below
                    twq('init','o0it2');
                    twq('track','Lead');

                    goog_report_conversion();
                    
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }
        }

    });

    $(".undergraduate .sticky-form .form-box .before #undergraduate .btn-undergraduate").on('click', function (e) {
        e.preventDefault();
        var name= $('input[name="form-name"]').val();
        var email= $('input[name="form-email"]').val();
        var mobile= $('input[name="form-mobile"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        

        $(".validation").remove(); // remove it
        if(!name){
          $('input[name="form-name"]').after('<div class="validation" >Name field can not be blank.</div>');
          $('input[name="form-name"]').focus();
        }else if(!email){
          $('input[name="form-email"]').after('<div class="validation" >Email field can not be blank.</div>');
          $('input[name="form-email"]').focus();
        } else if (!filter.test(email)) {
          $('input[name="form-email"]').after('<div class="validation" >Please enter valid email address.</div>');
          $('input[name="form-email"]').focus();
        }
        else if(!mobile){
          $('input[name="form-mobile"]').after('<div class="validation" >Mobile number field can not be blank.</div>');
          $('input[name="form-mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $('input[name="form-mobile"]').after('<div class="validation" >Please enter valid mobile number.</div>');
          $('input[name="form-mobile"]').focus();
        }
        else{

          $('input[name="form-name"]').val(name);
          $('input[name="form-email"]').val(email);
          $('input[name="form-mobile"]').val(mobile);
          //$('input[name="school"]').val(school);
          var registerdata = $('.undergraduate .sticky-form .form-box .before #undergraduate').serialize();
          if (registerdata) {
            $("div.overlay-box").css("display", "block");
              $.ajax({
                  url: base_url+'prelogin/overseasProgramUndergraduate',
                  type: "post",
                  data: {'data': registerdata },
                  success: function (response) {
                    $("div.overlay-box").css("display", "none");
                    $(".undergraduate .sticky-form .form-box .before").hide();
                    $(".undergraduate .sticky-form .form-box .after").show();
                    !function(f,b,e,v,n,t,s)
                     {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                     n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                     if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                     n.queue=[];t=b.createElement(e);t.async=!0;
                     t.src=v;s=b.getElementsByTagName(e)[0];
                     s.parentNode.insertBefore(t,s)}(window, document,'script',
                     'https://connect.facebook.net/en_US/fbevents.js');
                     fbq('init', '263133604031761');
                     fbq('track', 'Lead');

                     /*Quora tracking code*/
                     !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                      qp('init', '988fc98327ae4c43a375230f3c92a57f');
                      qp('track', 'GenerateLead');

                      /* Twitter universal website tag code*/
                      !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
                      },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
                      a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
                      // Insert Twitter Pixel ID and Standard Event data below
                      twq('init','o0it2');
                      twq('track','Lead');

                      goog_report_conversion();
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }
        }

    });

    $(".graduate .sticky-form .form-box .before #graduate .btn-graduate").on('click', function (e) {
        e.preventDefault();
        var name= $('input[name="form-name"]').val();
        var email= $('input[name="form-email"]').val();
        var mobile= $('input[name="form-mobile"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        

        $(".validation").remove(); // remove it
        if(!name){
          $('input[name="form-name"]').after('<div class="validation">Name field can not be blank.</div>');
          $('input[name="form-name"]').focus();
        }else if(!email){
          $('input[name="form-email"]').after('<div class="validation" >Email field can not be blank.</div>');
          $('input[name="form-email"]').focus();
        } else if (!filter.test(email)) {
          $('input[name="form-email"]').after('<div class="validation" >Please enter valid email address.</div>');
          $('input[name="form-email"]').focus();
        }
        else if(!mobile){
          $('input[name="form-mobile"]').after('<div class="validation" >Mobile number field can not be blank.</div>');
          $('input[name="form-mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $('input[name="form-mobile"]').after('<div class="validation" >Please enter valid mobile number.</div>');
          $('input[name="form-mobile"]').focus();
        }
        else{

          $('input[name="form-name"]').val(name);
          $('input[name="form-email"]').val(email);
          $('input[name="form-mobile"]').val(mobile);
          //$('input[name="school"]').val(school);
          var registerdata = $('.graduate .sticky-form .form-box .before #graduate').serialize();
          if (registerdata) {
            $("div.overlay-box").css("display", "block");
              $.ajax({
                  url: base_url+'prelogin/overseasProgramGraduate',
                  type: "post",
                  data: {'data': registerdata },
                  success: function (response) {
                    $("div.overlay-box").css("display", "none");
                    $(".graduate .sticky-form .form-box .before").hide();
                    $(".graduate .sticky-form .form-box .after").show();
                    !function(f,b,e,v,n,t,s)
                     {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                     n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                     if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                     n.queue=[];t=b.createElement(e);t.async=!0;
                     t.src=v;s=b.getElementsByTagName(e)[0];
                     s.parentNode.insertBefore(t,s)}(window, document,'script',
                     'https://connect.facebook.net/en_US/fbevents.js');
                     fbq('init', '263133604031761');
                     fbq('track', 'Lead');

                     /*Quora tracking code*/
                     !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                      qp('init', '988fc98327ae4c43a375230f3c92a57f');
                      qp('track', 'GenerateLead');

                      /* Twitter universal website tag code*/
                      !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
                      },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
                      a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
                      // Insert Twitter Pixel ID and Standard Event data below
                      twq('init','o0it2');
                      twq('track','Lead');

                      goog_report_conversion();
                    
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }
        }

    });
    function goog_report_conversion(url) {
                      var callback = function () {
                        if (typeof(url) != 'undefined') {
                          window.location = url;
                        }
                      };
                      gtag('event', 'conversion', {
                          'send_to': 'AW-924053131/FmeVCKbIqIsBEIvdz7gD',
                          'event_callback': callback
                      });
                      return false;
      }
});


