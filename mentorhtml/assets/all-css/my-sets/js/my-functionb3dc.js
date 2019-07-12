
var baseUrl = window.location.origin + '/';
/*Career Library*/
$(document).ready(function() {

 
    
    $(".pricing-tab .col-md-4").click(function(event) {
        event.preventDefault();

        $("iframe").each(function() { 
                var src= $(this).attr('src');
                $(this).attr('src',src);  
        });

        var pIndex =   $(this).index();
        $(this).parents(".pricing-tab").find(".col-md-4").removeClass("active");
        $(this).addClass("active");

        $(".price-final").find(".row .pricing-details-box").hide();
        $(".price-final").find(".row .pricing-details-box").eq(pIndex).show();
        $(this).parents(".new-pricing-page").find("input[type='email']").val(' ');
        $(".price-final .callme-now .callme-now-box .form-row").find('input').val('');

         if ($(".pricing-tab .for-stream").hasClass("active")) {
            $(".programs-page").removeClass("programs-page-10-12");
            $(".programs-page").removeClass("programs-page-graduates");
            $(".programs-page").addClass("programs-page-8-9"); 
            $(".faq-section").hide();
            $(".faq-section.selection-stream").show(); 

            $(".new-success-stories").hide();
            $(".new-success-stories.for-stream").show(); 


            $(".form-box .call-img").hide();
            $(".form-box .call-img.stream").show(); 

        }

         else if ($(".pricing-tab .for-career").hasClass("active")) {

            $(".programs-page").removeClass("programs-page-8-9");
            $(".programs-page").removeClass("programs-page-graduates");
            $(".programs-page").addClass("programs-page-10-12"); 
            $(".faq-section").hide();
            $(".faq-section.selection-career").show(); 

            $(".form-box .call-img").hide();
            $(".form-box .call-img.career").show(); 

            $(".new-success-stories").hide();
            $(".new-success-stories.for-career").show(); 
        }

         else if ($(".pricing-tab .for-graduates").hasClass("active")) {

             $(".programs-page").removeClass("programs-page-8-9");
            $(".programs-page").removeClass("programs-page-10-12");
             $(".programs-page").addClass("programs-page-graduates");
             $(".faq-section").hide();
            $(".faq-section.selection-graduates").show();     

            $(".form-box .call-img").hide();
            $(".form-box .call-img.grad").show();    
            
            $(".new-success-stories").hide();
            $(".new-success-stories.for-gradutaes").show(); 
            
        }
    });

    $(".price-final .callme-now .callme-now-box .form-row button").click(function(event) {
        var mobile = $(this).parents('.callme-now-box').find('input').val();
        $(this).parents('.callme-now-box').find('.validation').remove();

        if(!mobile){
          $(this).after('<div class="validation" style="color: white;text-align: left; margin-top:0">Mobile number field can not be blank.</div>');
          $(this).parents('.callme-now-box').find('input').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $(this).after('<div class="validation" style="color: white;text-align: left;margin-top:0">Please enter valid mobile number.</div>');
          $(this).parents('.callme-now-box').find('input').focus();
        }else{
          $(".overlay-box").show();
          $.ajax({
            url: "https://kpi.knowlarity.com/Basic/v1/account/call/c2c-widget/?_=1548669823450&api_key=2830dd12-5531-4c4a-851a-6f8d7bb5327f&agent_number=%2B918870321531&phone_number=%2B91"+mobile+"&sr_number=%2B919870310350",
            type: 'GET',
            context:this,
            success: function(data) {
                $(".overlay-box").hide();
                if(data.success.status=='success'){
                    var parentTag = $(this).parents('.callme-now-box').find('.form-row');
                    parentTag.empty();
                    parentTag.append('<p style="color: white; text-align: left;">Please wait a moment you will get a call soon...</p>');
                }else{
                    $(this).after('<div class="validation" style="color: white;text-align: left;">Sorry! Something went wrong please call us at +918744987449.</div>');
                    $(this).parents('.callme-now-box').find('input').focus();
                }
            },
            error: function(error) {
              $(".overlay-box").hide();
              $(this).after('<div class="validation" style="color: white;text-align: left;">'+error.responseJSON.error.message+'</div>');
              $(this).parents('.callme-now-box').find('input').focus();
            }
        });
    }

    });



    $(".price-final .product-details .learn-more a").click(function(event) {
          event.preventDefault();       
          var wh = $(window).height() - 110;
          if ($(window).width() <= 667) {

            var wh = $(window).height() - 130;
          }

      
        var modalid1 = $(this).data('id');        
        $('#'+modalid1).fadeIn();
        $(".pricing-modal-block .pricing-modal-content .set-height").css({height:wh});
        
        $("body").addClass("prc-fixed");

        var value = $(this).parents('.product-details').find('.pricing-btn').attr('session');
        document.cookie = "session="+value;

    });

    $(".pricing-modal-block .pricing-modal-content .foot-set .other-prg").click(function(event) {
        event.preventDefault();      
        var modalid2 = $(this).data('id');  
        $(this).parents(".pricing-modal-block").fadeOut();
        $('#'+modalid2).fadeIn();
       
    });

    $(".pricing-modal-block .pm-close").click(function(event) {
        event.preventDefault();
        $("body").removeClass("prc-fixed");
        $(this).parents(".pricing-modal-block").fadeOut();

    });


    $(document).on('click',".price-final .for-explore .product-details .btn-box .pricing-btn", function(event) {
        var value = $(this).attr('session');
        document.cookie = "session="+value;
    });

    $(document).on('click',".price-final .for-learn .product-details .btn-box .pricing-btn", function(event) {
        document.cookie = "session=;expires=Thu, 01 Jan 1970 00:00:00 GMT;"
    });


    $('.session-count label input').change(function() {
        $(this).parents(".session-count").find("label .radio-bg").removeClass("checked");
       //$(this).parents(".for-explore").find(".product-details .price-amount").prepend('<i class="fa fa-inr" aria-hidden="true"></i>'); return false;
        if ($(this).is(':checked')) {
            $(this).parents("label").find(".radio-bg").addClass("checked");
            var price = $(this).parents(".for-explore").find(".product-details .price-amount").text();
            var classes = $(this).parents(".for-explore").find(".product-details .learn-more a").attr('data-id');

            price = price.replace(',', '');
            var value = $(this).parents(".for-explore").find('input[name=sessions]:checked').val();
            var text = $(this).parents(".for-explore").find('input[name=sessions]:checked').parent('label').text();
            text = $.trim(text);
            var getSession = $("#"+classes+" .pricing-modal-content .head-set #no-of-sessions").text();
            $(this).parents(".for-explore").find(".product-details .price-amount").empty();
            $("#"+classes+" .pricing-modal-content .head-set .text-right .price").empty();
            $(".pricing-modal-content .set-height .foot-set .other-prg[data-id='"+classes+"'] .text-right .price").empty();
            //var dataId = $("#"+classes+" .pricing-modal-content .set-height .foot-set .other-prg ").attr("data-id");
           // console.log(dataId);
            $(this).parents(".for-explore").find(".product-details .price-amount").append('<i class="fa fa-inr" aria-hidden="true"></i>');
            $("#"+classes+" .pricing-modal-content .head-set .text-right .price").append('<i class="fa fa-inr" aria-hidden="true"></i>');
            $(".pricing-modal-content .set-height .foot-set .other-prg[data-id='"+classes+"'] .text-right .price").append('<i class="fa fa-inr" aria-hidden="true"></i>');
            if(value==1){
                var amount = parseInt(price)-parseInt(2000);
                amount = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                $(this).parents(".for-explore").find(".product-details .price-amount .fa").after(amount);
                $("#"+classes+" .pricing-modal-content .head-set .text-right .price .fa").after(amount);
                $(".pricing-modal-content .set-height .foot-set .other-prg[data-id='"+classes+"'] .text-right .price .fa").after(amount);
                if(getSession){
                  var getSession =  getSession.split('|');
                  $("#"+classes+" .pricing-modal-content .head-set #no-of-sessions").text(getSession[0] +' | '+text);
                }
                document.cookie = "session=1";
                $(this).parents('.btn-box').find('.pricing-btn').attr('session','1');
                
            }else{
                $(this).parents(".for-explore").find(".product-details .price-amount .fa").after(value);
                $("#"+classes+" .pricing-modal-content .head-set .text-right .price .fa").after(value);
                $(".pricing-modal-content .set-height .foot-set .other-prg[data-id='"+classes+"'] .text-right .price .fa").after(value);
                if(getSession){
                  var getSession =  getSession.split('|');
                  $("#"+classes+" .pricing-modal-content .head-set #no-of-sessions").text(getSession[0] +' | '+text);
                }
                document.cookie = "session=3";
                $(this).parents('.btn-box').find('.pricing-btn').attr('session','3');
            }
        }
        
    });

   
    
   $('.gift-mobilebnt-cart .btn-checkout').on("click", function (e) {
        $('.gift-mobilebnt-cart').hide();
        $('.gift-card-payment .right-box .rightpay-box.pay').show();
    });
    $('.gift-card-payment .right-box .rightpay-box.pay .gift-close').on("click", function (e) {
        $('.gift-mobilebnt-cart').show();
        $('.gift-card-payment .right-box .rightpay-box.pay').hide();
    });
    $('.gift-card-payment .left-box  h4.receiver label input[type=checkbox]').on("change", function (e){ 
       
    if(this.checked){
            $(this).parents("label").find("span").addClass("checked");
        } else {
            $(this).parents("label").find("span").removeClass("checked");
        }
      });










    setTimeout(function(){        
        $('#preloader').fadeOut();
        $('.preloader_img').delay(100).fadeOut('slow'); 
    }, 2000);



    $(function() {
        $('body').scrollTop(0);
    });

    $(window).scroll(function(){

        $('.validation').hide(); 
     
    });



    var clipboardDemos=new Clipboard('[data-clipboard-demo]');clipboardDemos.on('success',function(e){e.clearSelection();console.info('Action:',e.action);console.info('Text:',e.text);console.info('Trigger:',e.trigger);showTooltip(e.trigger,'URL Copied!');});clipboardDemos.on('error',function(e){console.error('Action:',e.action);console.error('Trigger:',e.trigger);showTooltip(e.trigger,fallbackMessage(e.action));});

    //var btns=document.querySelectorAll('.btn');for(var i=0;i<btns.length;i++){btns[i].addEventListener('mouseleave',clearTooltip);btns[i].addEventListener('blur',clearTooltip);}
    //function clearTooltip(e){e.currentTarget.setAttribute('class','btn');e.currentTarget.removeAttribute('aria-label');}
    //function showTooltip(elem,msg){elem.setAttribute('class','btn tooltipped tooltipped-s');elem.setAttribute('aria-label',msg);}

    $( " .career-library-new.career-details-page .table-set table td .btn" ).on("click", function() {
        $(this).parents(".career-library-new.career-details-page").find(".table-set table td .btn").text("Copy");
        $(this).parents(".career-library-new.career-details-page").find(".table-set table td .btn").removeClass("active");
        $(this).text("Copied!");
        $(this).addClass("active");  
    });
   
    var noSortedTxts = [];
    var sortedTxts = [];
    var sort = true;

    $( ".career-library-new .choose-stream-dropdown .selected-title" ).click(function( event ) {
        event.stopPropagation();
        $(this).parents(".choose-stream-dropdown").toggleClass("arrow-top");
        $(this).parents(".choose-stream-dropdown").find("ul").toggle();
    });
    
    $(document).on("click", function() {
        $(".career-library-new .choose-stream-dropdown ul").hide();
        $(".career-library-new .choose-stream-dropdown").removeClass("arrow-top");
    });

    $(".career-library-new .choose-stream-dropdown ul li").click(function( event ) {
        event.stopPropagation();
        var SelectedStream = $(this).text();

        $(this).parents("ul").find("li").removeClass("active"); 
        $(this).addClass("active"); 
        $(this).parents(".choose-stream-dropdown").find("span.selected-title").addClass("active"); 
        


        $(".career-library-new .search-topics .sorting-row a.sort-name").removeClass("sort-asc");
        $(".career-library-new .search-topics .sorting-row a.sort-name").removeClass("sort-desc");
        $(this).parents(".choose-stream-dropdown").find("span.selected-title").text(SelectedStream);
        $(this).parents("ul").hide();        
        $(this).parents(".choose-stream-dropdown").removeClass("arrow-top");
        $('.selectedLi').removeClass('selectedLi');
        $(this).addClass('selectedLi');
        var val = $(this).attr("value");
        
        $(".career-library-new .search-topics .sorting-row a.sort-name").parents(".sorting-row").find("a.sort-popular").addClass("active");
        $(".career-library-new .search-topics .sorting-row a.sort-name").parents(".sorting-row").find("a.sort-name").removeClass("active");
        //$(".career-library-new .search-topics .sorting-row a.sort-name").toggleClass("active");

        /*if(val.length>0){

            if(val=='All'){
                noSortedTxts = [];
                $("div.overlay-box").show();
                $.ajax({
                    type: "post",
                    url: baseUrl+"prelogin/careerDomainList",
                    success: function(response) {
                        $("div.overlay-box").hide();
                        var json = $.parseJSON(response);
                        $('#library-data > ul').empty();
                        //console.log(json);
                        var i1 = 1;
                        $.each(json, function(idx, value) {

                            if(i1<=3){
                                i1=i1;
                            }else{
                                i1=1;
                            }

                            $('#library-data > ul').append('<li class="multi-'+i1+'" id="'+value.tagline+'"><a href=""><div class="img-box"><img src="http://mindlercareerlibrarynew.imgix.net/'+value.image + '"></div><div class="title">'+value.career_domain_name+'<!--<span class="fa fa-star-o"></span>--></div></a></li>');
                            i1++;
                        });

                        $('#library-data > ul').append('<li class="multi-"></li>');

                            
                    }
                });


            }else if(val!='All'){

                noSortedTxts = [];
                var filter = val;
                $("div.overlay-box").show();
                $.ajax({
                    type: "post",
                    url: baseUrl+"prelogin/filterDomainList",
                    data:{filter},
                    success: function(response) {
                        $("div.overlay-box").hide();
                        var json = $.parseJSON(response);
                        $('#library-data > ul').empty();
                            
                        var i1 = 1;
                        $.each(json, function(idx, value) {

                            if(i1<=3){
                                i1=i1;
                            }else{
                                i1=1;
                            }

                            $('#library-data > ul').append('<li class="multi-'+i1+'" id="'+value.tagline+'"><a href=""><div class="img-box"><img src="http://mindlercareerlibrarynew.imgix.net/'+value.image + '"></div><div class="title">'+value.career_domain_name+'<!--<span class="fa fa-star-o"></span>--></div></a></li>');
                            i1++;
                        });

                        $('#library-data > ul').append('<li class="multi-"></li>');

                            
                    }
                });
            }
        }*/

    });

    $(".users-feedback .default .btn-yes").click(function(event) {
        event.preventDefault();

        $.ajax({
            type: "get",
            url: baseUrl+"prelogin/careerlibrary_feedback",
            data: {
                "event": "yes",
                "career":this.href.substr(this.href.lastIndexOf('/') + 1)
            },
            success: function(response) {
                if(response==1){
                    $(".users-feedback .default .btn-yes").parents(".users-feedback").find(".default").hide();
                    $(".users-feedback .default .btn-yes").parents(".users-feedback").find(".thank-you-msg").show();
                }
            }
        });
    });

    $(".users-feedback .default .btn-no").click(function(event) {
        event.preventDefault();
        $(this).parents(".users-feedback").find(".default").hide();
        $(this).parents(".users-feedback").find(".send-feed-back").show();
    });

    $(".users-feedback .send-feed-back .btn-submit").click(function(event) {
        event.preventDefault();
        var feedback = $("#feedback").val();
        if(feedback.length==0){
            $("#feedback").css("border-color","red");
            return false;
        }
        else{
            $("#feedback").css("border-color","");
            $.ajax({
                type: "get",
                url: baseUrl+"prelogin/careerlibrary_feedback",
                data: {
                    "event": "no",
                    "career":this.href.substr(this.href.lastIndexOf('/') + 1),
                    "feedback":feedback
                },
                success: function(response) {
                    if(response==1){
                        $(".users-feedback .send-feed-back .btn-submit").parents(".users-feedback").find(".send-feed-back").hide();
                        $(".users-feedback .send-feed-back .btn-submit").parents(".users-feedback").find(".thank-you-msg").show();
                    }
                }
            });
        }
        
    });

    $(".users-feedback .send-feed-back .btn-cancel").click(function(event) {
        event.preventDefault();
        $(this).parents(".users-feedback").find(".send-feed-back").hide();
        $(this).parents(".users-feedback").find(".default").show();
    });


    $('.slider1').lightSlider({
        item: 3,
        slideMove: 3,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    item:1,
                    slideMove: 2, 
                   
                }
            }
        ]

    });

    
$('.entrance').lightSlider({
        item: 1,
        slideMove: 1,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    item:1,
                    slideMove: 1, 
                   
                }
            }
        ]

    });

    $('.slider2').lightSlider({
        item: 3,
        slideMove: 3,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    item:1,
                    slideMove: 2, 
                   
                }
            }
        ]

    
    });

$('#silde-video').lightSlider({
        item: 3,
        slideMove: 1,
        slideMargin: 20,
        responsive: [{
            breakpoint: 480,
            settings: {
                item: 1,
                slideMove: 1,
            }
        }]
    });


$('#section-slider-ul').lightSlider({
        item: 1,
        slideMove: 1,
        slideMargin: 0,
        responsive: [{
            breakpoint: 480,
            settings: {
                item: 1,
                slideMove: 1,
            }
        }]
    });



    $(".common-section.silde-video-section .myaction .lSPrev").on("click", function (e) {
        e.preventDefault();
        $(this).parents(".common-section-details").find(".lSSlideOuter .lSSlideWrapper .lSAction .lSPrev").click();
    });

    $(".common-section.silde-video-section .myaction .lSNext").on("click", function (e) {
        e.preventDefault();
        $(this).parents(".common-section-details").find(".lSSlideOuter .lSSlideWrapper .lSAction .lSNext").click();
    });

    $(".sub-products.with-tabs").mouseenter(function () {
        $(this).addClass("menushow");
    });

   
 $(".sub-products.with-tabs ul.menu-dropdown-tabs li").mouseenter(function () {
$(".sub-products.with-tabs").addClass("menushow");
$(this).parents("ul.menu-dropdown-tabs").find("li").removeClass("active");
$(this).addClass("active");
var menutabIndex = $(this).index();
$(this).parents(".sub-products.with-tabs").find(".col-right .menu-tabdetails").hide();
$(this).parents(".sub-products.with-tabs").find(".col-right .menu-tabdetails").eq(menutabIndex).show();
});


$(".sub-products.with-tabs").mouseleave(function () {
$(".sub-products.with-tabs ul.menu-dropdown-tabs li:first-child").mouseenter();
$(this).removeClass("menushow");
});


    $("#lightslider-1 .lSSlideOuter").append('<div class="lSAction-new"><a class="lSPrev"></a><a class="lSNext"></a></div>');

    $("#lightslider-2 .lSSlideOuter").append('<div class="lSAction-new"><a class="lSPrev"></a><a class="lSNext"></a></div>');

    $(".cd-row .lSSlideOuter .lSAction-new .lSNext").click(function(event) {
        event.preventDefault();
        $(this).parents(".lSSlideOuter").find(".lSSlideWrapper .lSAction .lSNext").click();

    });


    $(".cd-row .lSSlideOuter .lSAction-new .lSPrev").click(function(event) {
        event.preventDefault();
        $(this).parents(".lSSlideOuter").find(".lSSlideWrapper .lSAction .lSPrev").click();

    });


    $(".career-library-new.career-details-page .accordian-set ul li a.title").click(function(event) {
        event.preventDefault();
        $(this).toggleClass("active");
        $(this).parents("li").find(".details").slideToggle();
        $(this).parents("li").closest('li').siblings().find(".details").slideUp();
        $(this).parents("li").closest('li').siblings().find("a").removeClass("active");
    });

    $(".career-library-new .search-topics .sorting-row a.sort-popular").click(function(event) {
        event.preventDefault();
        
        $(this).parents(".sorting-row").find("a.sort-name").removeClass("sort-asc");
        $(this).parents(".sorting-row").find("a.sort-name").removeClass("sort-desc");
        //console.log($(this).hasClass("active"));
        var val = $(".career-library-new .choose-stream-dropdown ul li.selectedLi").attr("value");
        if($(this).parents(".sorting-row").find("a.sort-name").hasClass("active") && val==undefined && !$(this).hasClass("active")){
            noSortedTxts = [];
               
            $("div.overlay-box").show();
            $.ajax({
                type: "post",
                url: baseUrl+"prelogin/careerDomainList",
                success: function(response) {
                    $("div.overlay-box").hide();
                    var json = $.parseJSON(response);
                    $('#library-data > ul').empty();
                    //console.log(json);
                    var i1 = 1;
                    $.each(json, function(idx, value) {

                        if(i1<=3){
                            i1=i1;
                        }else{
                            i1=1;
                        }

                        $('#library-data > ul').append('<li class="multi-'+i1+'" id="'+value.tagline+'"><a href=""><div class="img-box"><img src="http://mindlercareerlibrarynew.imgix.net/'+value.image + '"></div><div class="title">'+value.career_domain_name+'<!--<span class="fa fa-star-o"></span>--></div></a></li>');
                        i1++;
                    });

                    $('#library-data > ul').append('<li class="multi-"></li>');
                }
            });

        }
        else if(val!==undefined && val.length>0 && val=='All' && !$(this).hasClass("active")){
            noSortedTxts = [];
            $("div.overlay-box").show();
            $.ajax({
                type: "post",
                url: baseUrl+"prelogin/careerDomainList",
                success: function(response) {
                    $("div.overlay-box").hide();
                    var json = $.parseJSON(response);
                    $('#library-data > ul').empty();
                    //console.log(json);
                    var i1 = 1;
                    $.each(json, function(idx, value) {

                        if(i1<=3){
                            i1=i1;
                        }else{
                            i1=1;
                        }

                        $('#library-data > ul').append('<li class="multi-'+i1+'" id="'+value.tagline+'"><a href=""><div class="img-box"><img src="http://mindlercareerlibrarynew.imgix.net/'+value.image + '"></div><div class="title">'+value.career_domain_name+'<!--<span class="fa fa-star-o"></span>--></div></a></li>');
                        i1++;
                    });

                    $('#library-data > ul').append('<li class="multi-"></li>');
                }
            });

        }else if(val!==undefined && val.length>0 && val!='All' && !$(this).hasClass("active")){

            noSortedTxts = [];
            var filter = val;
            $("div.overlay-box").show();
            $.ajax({
                type: "post",
                url: baseUrl+"prelogin/filterDomainList",
                data:filter,
                success: function(response) {
                    $("div.overlay-box").hide();
                    var json = $.parseJSON(response);
                    $('#library-data > ul').empty();
                            
                    var i1 = 1;
                    $.each(json, function(idx, value) {

                        if(i1<=3){
                            i1=i1;
                        }else{
                            i1=1;
                        }

                        $('#library-data > ul').append('<li class="multi-'+i1+'" id="'+value.tagline+'"><a href=""><div class="img-box"><img src="http://mindlercareerlibrarynew.imgix.net/'+value.image + '"></div><div class="title">'+value.career_domain_name+'<!--<span class="fa fa-star-o"></span>--></div></a></li>');
                        i1++;
                    });

                    $('#library-data > ul').append('<li class="multi-"></li>');

                            
                }
            });
        }
        
        $(".career-library-new .search-topics .sorting-row a.sort-name").removeClass("active");
        $(this).addClass("active");
    });

    var noSortedTxts = [];
    var sortedTxts = [];
    var sort = true;

    $(".career-library-new .search-topics .sorting-row a.sort-name").click(function(event) {
        event.preventDefault();

        if(!$(this).parents(".sorting-row").find("a.sort-name").hasClass("sort-asc")){
            $(this).parents(".sorting-row").find("a.sort-name").addClass("sort-asc");
            $(this).parents(".sorting-row").find("a.sort-name").removeClass("sort-desc");
        }else{
            $(this).parents(".sorting-row").find("a.sort-name").addClass("sort-desc");
            $(this).parents(".sorting-row").find("a.sort-name").removeClass("sort-asc");
        }

        $(this).parents(".sorting-row").find("a.sort-name").addClass("active");

        var list = $('#library-data > ul');
        //if (noSortedTxts.length === 0) {

        var listitems = list.children('li').get();
          
        $.each(listitems, function(idx, itm) {
            if(itm.style.display!=='none'){
                noSortedTxts.push({'name':itm.outerText, 'Id': itm.id, 'innerHTML': itm.innerHTML});
            }
        });

        sortedTxts = noSortedTxts.slice(0);
            
        sortedTxts.sort(function(t1, t2) {
            return t1.name.toUpperCase().localeCompare(t2.name.toUpperCase());
        });

        if(!$(this).parents(".sorting-row").find("a.sort-name").hasClass("sort-asc")){
            sortedTxts.reverse(function(t1, t2) {
                return t1.name.toUpperCase().localeCompare(t2.name.toUpperCase());
            });
        }
            

        //}

        
        //if (sort) {
         
        list.empty();
        var i = 1;
        $.each(sortedTxts, function(idx, txt) {
            
            if(i<=3){
                i=i;
            }else{
                i=1;
            }
            
            if(txt.Id){
                list.append('<li class="multi-'+i+'" id="'+txt.Id+'">'+txt.innerHTML+'</li>');
                i++;
            }

        });
        list.append('<li class="multi-"></li>');
        sort = false;
       
        /*} else {

        list.empty();
        var i1 = 1;
        $.each(noSortedTxts, function(idx, txt) {

            if(i1<=3){
                i1=i1;
            }else{
                i1=1;
            }

            if(txt.Id){
                list.append('<li class="multi-'+i1+'" id="'+txt.Id+'">'+txt.innerHTML+'</li>');
                i1++;
            }
          });

          list.append('<li class="multi-"></li>');
          sort = true;

        }*/

        noSortedTxts = [];
        
        $(this).parents(".sorting-row").find("a.sort-popular").removeClass("active");
        
  
    });



    $('.career-library-new .search-topics.home-page ul ').on('click', '.fa-close', function() {

        $(this).parents(".search-topics.home-page").find("ul li .details-arrow").remove();
        $(this).parents(".li-details").remove();

    });


    function LiAddClassFuction() {

        if ($(window).width() >= 768) {


            $(".career-library-new .search-topics ul li:nth-child(3n-2)").addClass("multi-1");

            $(".career-library-new .search-topics ul li:nth-child(3n-1)").addClass("multi-2");

            $(".career-library-new .search-topics ul li:nth-child(3n)").addClass("multi-3");
        } else {

            $(".career-library-new .search-topics ul li:nth-child(2n-1)").addClass("multi-1");

            $(".career-library-new .search-topics ul li:nth-child(2n)").addClass("multi-2");



        }
    }

    function LiDetailsFunction() {

        //$(".career-library-new .search-topics.home-page ul li a").click(function(event) {
        $(".career-library-new").on('click',".search-topics.home-page #library-data li a", function(event) {
            event.preventDefault();
            var thisEvent = $(this); 
            var tagline = thisEvent.parents("li").attr("id");
            if($(this).attr('href')){
                window.location.href = $(this).attr('href');
            }
            else if(tagline!==undefined){
                $.ajax({
                    type: "get",
                    url: baseUrl+"prelogin/careerDomainDetails",
                    data: {
                        "domain_id": tagline
                    },
                    success: function(response) {
                        var json = $.parseJSON(response);
                        // console.log(json.details)
                        if(json.details.length !== 0){
                            thisEvent.parents("ul").find(".li-details").remove();
                            thisEvent.parents(".search-topics.home-page").find("ul li .details-arrow").remove();
                            thisEvent.parents("li").append('<span class="details-arrow"><img src="'+baseUrl+'assets/careerLibrary/img/details-arrow.png" /></span>');
                            thisEvent.parents("li").find(".details-arrow").fadeIn();
                            var description = ($(json.domainData.description).text().substring(0,450) + '...<a style="font-size:14px; color:#007fb6;" target="_blank" href="'+baseUrl+'careerlibrary/'+json.domainData.tagline+ '" class="bucket-title-link"> Read more</a>');
                            var liDetails = ('<div class="li-details"><div class="margin-box"><i class="fa fa-close" aria-hidden="true"></i><div class="col-md-12"><h4><a target="_blank" href="'+baseUrl+'careerlibrary/'+json.domainData.tagline+ '" class="bucket-title-link">' + json.domainData.career_domain_name + '</a></h4><p class="margin-bottom-0">' +description+ '</p><p style="font-weight:600;margin-top: 20px;margin-bottom: 0;display: block;line-height: normal;">Click below to explore any of the following career(s)</p><ul>');

                            $.each(json.details, function(key, value) {

                                liDetails += ('<li><a href="'+baseUrl+'careerlibrary/'+json.domainData.tagline+'/'+value.revised_url+ '"><div class="img-box"><img src="http://mindlercareerlibrarynew.imgix.net/'+value.cover_image + '" /></div><div class="title">' + value.career_name + '<!--<span class="fa fa-star-o"></span>--></div></a></li>');

                            });

                            liDetails += ('</ul></div></div></div>');


                            if ($(window).width() >= 768) {
                                if (thisEvent.parents("li").hasClass("multi-1")) {
                                    thisEvent.parents("li").next("li").next("li").after(liDetails);
                                }

                                if (thisEvent.parents("li").hasClass("multi-2")) {

                                    thisEvent.parents("li").next("li").after(liDetails);
                                }

                                if (thisEvent.parents("li").hasClass("multi-3")) {

                                    thisEvent.parents("li").after(liDetails);
                                }

                            } else {
                                if (thisEvent.parents("li").hasClass("multi-1")) {

                                    thisEvent.parents("li").next("li").after(liDetails);
                                }

                                if (thisEvent.parents("li").hasClass("multi-2")) {

                                    thisEvent.parents("li").after(liDetails);
                                }
                            }

                            thisEvent.parents("ul").find(".li-details").slideDown();
                        
                        
                            $('html, body').animate({
                                scrollTop: $(".li-details").offset().top - $(".li-details").height()
                            }, 1000);
                        }

                    }
                });
            }
        });

    }
    window.onload = LiDetailsFunction();
    window.onload = LiAddClassFuction();




   
    
    function init() {

       


        window.addEventListener('scroll', function(e) {
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 160,
                header = document.querySelector(".career-library-new");
            if (distanceY > shrinkOn && distanceY < FooterScroll) {
                classie.add(header, "shrink");
                classie.add(header, "shrink-2");
                classie.remove(header, "shrink-footer");

            } else if (distanceY > FooterScroll) {
                classie.remove(header, "shrink");
                
                classie.add(header, "shrink-footer");

            } else {
                if (classie.has(header, "shrink")) {
                    classie.remove(header, "shrink-2");
                    classie.remove(header, "shrink");
                }
            }
        });
       
    }
    //window.onload = init();


    var HeaderHeight = $(".header-layer").height();
    var clHeight = $(".career-library-new").height();
    var  FooterHeight = $(".footer").height()
    var hcl = HeaderHeight + clHeight;

    var FooterScroll = hcl - FooterHeight - 500;

    

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 258){
            $(".career-details-page .left-side").addClass("fixed-menu"); 

        }

        if (scroll >= FooterScroll) {
            $(".career-details-page .left-side").removeClass("fixed-menu");

        }

        if (scroll < 258) {
            $(".career-details-page .left-side").removeClass("fixed-menu");
        }

    });




    $(document).on("scroll", onScroll);
    //smoothscroll
    $('.career-details-page .left-side ul li a[href^="#"]').on('click', function(e) {
        e.preventDefault();
  
        $(".career-choose-popup").hide();


        if ($(window).width() <= 768) {
    
            $(this).parents(".left-side").hide();
            $(".carrer-overlay").fadeOut();
            $("body").removeClass("body-block");
    
            $(this).parents("ul").find("li a").removeClass("active");
           
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top - 135
            }, 1000);

         

        } else {

            $(document).off("scroll");

            $('.career-details-page .left-side ul li a').each(function() {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top 
            }, 1000, 'swing', function() {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });


        }


       
    });

    function onScroll(event) {
        
        $(".left-tab-box ul li.with-info .info").hide();
  
    

        if ($(window).width() <= 768) {
            $(".career-details-page .left-side").hide(1);
            $(".carrer-overlay").hide(1);
            $("body").removeClass("body-block");
    
 
        }

      
        var scrollPos1 = $(document).scrollTop();
        var scrollPos = scrollPos1 + 100;
        $('.career-details-page .left-side ul li a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos - 240 && refElement.position().top + refElement.height() > scrollPos - 240) {
                $('.career-details-page .left-side ul li a').removeClass("active");
                currLink.addClass("active");
            }


            if ($(window).width() > 768) {
                if (refElement.position().top <= scrollPos - 240 && refElement.position().top + refElement.height() > scrollPos - 240) {
                    $('.career-details-page .left-side ul li a').removeClass("active");
                    currLink.addClass("active");
                }

            }

            if ($(window).width() <= 768) {
                if (refElement.position().top <= scrollPos - 400 && refElement.position().top + refElement.height() > scrollPos - 400) {
                    $('.career-details-page .left-side ul li a').removeClass("active");
                    currLink.addClass("active");
                }

            }

            else if (scrollPos < 800) {
                //$('.career-details-page .left-side ul li:first-child a').addClass("active");
            } else if (scrollPos > 800) {
                $('.career-details-page .left-side ul li:first-child a').removeClass("active");
            }
            else {
                currLink.removeClass("active");
                $('.career-details-page .left-side ul li:first-child a').removeClass("active");
            }

        });

       

    }


    $('.choose-career-dropdown').on("click", function(e) {
        e.stopPropagation();
        $(this).find(".fa").toggleClass("fa-close");
        $(this).find(".fa").toggleClass("fa-sort-desc");
        $(this).parents(".choose-career-relative").find(".career-choose-popup").toggle();

        if ($(window).width() <= 768) {

            $(".career-details-page .left-side").hide();
        }


    });

    $('.career-choose-popup').on("click", function(e) {
        e.stopPropagation();
        $(this).show()
    });

    $('.left-popup-click').on("click", function (e) {
        e.stopPropagation();
        $(".choose-career-dropdown").find(".fa").removeClass("fa-close");
        $(".choose-career-dropdown").find(".fa").addClass("fa-sort-desc");

        
        $(".carrer-overlay").fadeToggle();
        $("body").toggleClass("body-block");

        var popupclick = $(this).offset();

        $(".career-details-page .left-side").toggle();

        $(".career-details-page .left-side").offset({
            top: popupclick.top + 20,
            left: popupclick.left - 1
        });

        if ($(window).width() <= 768) {

            $(".career-choose-popup").hide();
        }

    });

    $('.carrer-overlay').on("click", function (e) {
        
        $(".career-choose-popup").hide();
        $(this).fadeOut();
        $("body").removeClass("body-block");
       
    });

    $(document).on("click", function() {
        $(".career-choose-popup").hide();

        $('.choose-career-dropdown .fa').removeClass("fa-close");
        $('.choose-career-dropdown .fa').addClass("fa-sort-desc");
        if ($(window).width() <= 768) {

            $(".career-details-page .left-side").hide();
        }
    });
    
   
    $("#searchField").autocomplete({
        open: function(event, ui) {
            $('.ui-autocomplete').off('menufocus hover mouseover mouseenter');
        }
    });

  
});
/* // Career Library*/
var noSortedTxts1 = [];
var sortedTxts1 = [];
var sort1 = true;

$('#sort-name-bucket').click(function() {
    
    var list1 = $('#library-data-bucket > ul');
    if (noSortedTxts1.length === 0) {

        var listitems1 = list1.children('li').get();
        //$(element).is(":visible"); 

        $.each(listitems1, function(idx, itm) {
            noSortedTxts1.push({'name':itm.innerText, 'innerHTML': itm.innerHTML});
        });

        sortedTxts1 = noSortedTxts1.slice(0);
        sortedTxts1.sort(function(t1, t2) {
            return t1.name.toUpperCase().localeCompare(t2.name.toUpperCase());
        });
    }

    

    if (sort1) {
     
        list1.empty();
        var i = 1;
        $.each(sortedTxts1, function(idx, txt) {
        
            if(i<=3){
                i=i;
            }else{
                i=1;
            }
        
            list1.append('<li class="multi-'+i+'">'+txt.innerHTML+'</li>');
            i++;
        

        });
        list1.append('<li class="multi-"></li>');
        sort1 = false;
   
    } else {

        list1.empty();
        var i1 = 1;
        $.each(noSortedTxts1, function(idx, txt) {

            if(i1<=3){
                i1=i1;
            }else{
                i1=1;
            }

            list1.append('<li class="multi-'+i1+'">'+txt.innerHTML+'</li>');
            i1++;
        
        });
        list1.append('<li class="multi-"></li>');
        sort1 = true;

    }
     
});

/*Pricing*/
$(document).ready(function () {


    function FixedCareer() {


        if ($(window).width() >= 768) {

            var headerHeight = 1578;
            var tableHeight = headerHeight + $(".new-pricing-page .selection-career .pricing-data").height() - 150;

            // console.log(headerHeight)

            $(window).scroll(function () {

                var scroll = $(window).scrollTop();
                if ((scroll >= headerHeight) & (scroll <= tableHeight)) {
                    $(".tab-features-10-12.selection-career .program-feature-section.onscroll-fixed").fadeIn();
                    $(".tab-features-10-12.selection-career .program-feature-section.onscroll-fixed").addClass("chart-fixed");
                    $(".tab-features-10-12.selection-career .program-feature-section .feature-sec-2").addClass("margin-top");
                }


                else if (scroll >= tableHeight) {
                    $(".tab-features-10-12.selection-career .program-feature-section.onscroll-fixed").fadeOut();
                }
                else {

                    $(".tab-features-10-12.selection-career .program-feature-section.onscroll-fixed").show();

                    $(".tab-features-10-12.selection-career .program-feature-section.onscroll-fixed").removeClass("chart-fixed");
                    $(".tab-features-10-12.selection-career .program-feature-section .feature-sec-2").removeClass("margin-top");
                }
            });
        }

    }

    function FixedStream() {


        if ($(window).width() >= 768) {

            var headerHeight = 1480;
            var tableHeight = headerHeight + $(".new-pricing-page .selection-stream .pricing-data").height() - 150;



            $(window).scroll(function () {

                var scroll = $(window).scrollTop();
                if ((scroll >= headerHeight) & (scroll <= tableHeight)) {
                    $(".tab-features-8-9.selection-stream .program-feature-section.onscroll-fixed").fadeIn();
                    $(".tab-features-8-9.selection-stream .program-feature-section.onscroll-fixed").addClass("chart-fixed");
                    $(".tab-features-8-9.selection-stream .program-feature-section .feature-sec-2").addClass("margin-top");
                }


                else if (scroll >= tableHeight) {
                    $(".tab-features-8-9.selection-stream .program-feature-section.onscroll-fixed").fadeOut();
                }
                else {

                    $(".tab-features-8-9.selection-stream .program-feature-section.onscroll-fixed").show();

                    $(".tab-features-8-9.selection-stream .program-feature-section.onscroll-fixed").removeClass("chart-fixed");
                    $(".tab-features-8-9.selection-stream .program-feature-section .feature-sec-2").removeClass("margin-top");
                }
            });
        }

    }

    function FixedGraduates() {


        if ($(window).width() >= 768) {

            var headerHeight = 1470;


            var tableHeight = headerHeight + $(".new-pricing-page .selection-graduates  .pricing-data").height() - 150;



            $(window).scroll(function () {

                var scroll = $(window).scrollTop();
                if ((scroll >= headerHeight) & (scroll <= tableHeight)) {
                    $(".tab-features-graduates.selection-graduates  .program-feature-section.onscroll-fixed").fadeIn();
                    $(".tab-features-graduates.selection-graduates .program-feature-section.onscroll-fixed").addClass("chart-fixed");
                    $(".tab-features-graduates.selection-graduates .program-feature-section .feature-sec-2").addClass("margin-top");
                }


                else if (scroll >= tableHeight) {
                    $(".tab-features-graduates.selection-graduates .program-feature-section.onscroll-fixed").fadeOut();
                }
                else {

                    $(".tab-features-graduates.selection-graduates .program-feature-section.onscroll-fixed").show();

                    $(".tab-features-graduates.selection-graduates .program-feature-section.onscroll-fixed").removeClass("chart-fixed");
                    $(".tab-features-graduates.selection-graduates .program-feature-section .feature-sec-2").removeClass("margin-top");
                }
            });
        }

    }
    FixedCareer();
   


    $(window).scroll(function () {
        $(".tooltip ").hide();
    
    });





    if ($(window).width() < 768) {

        $(window).scroll(function () {
            $(".tooltip ").hide();
            $(".new-pricing-page .pricing-tab ").find(".drop-down ").hide();
            $(".new-pricing-page  .fa-tooltip .tooltip-popup").hide();
            $('.new-pricing-page .submit-banner .submit-dropdown ul').hide();
        });
    


    }

    


    $('.new-pricing-page .price-list-box .price-list .view-features .pricing-btn').click(function (e) {
        e.preventDefault();

   


        $(this).toggleClass("feature-show");
        $(this).parents(".price-list ").find(".mobile-features").slideToggle();

        $(this).parents(".col-md-3").closest('.col-md-3').siblings().find(".price-list .mobile-features").slideUp();
        $(this).parents(".col-md-3").closest('.col-md-3').siblings().find(".price-list .view-features .pricing-btn").text("View All Features");

        $(this).parents(".col-md-4").closest('.col-md-4').siblings().find(".price-list .mobile-features").slideUp();
        $(this).parents(".col-md-4").closest('.col-md-4').siblings().find(".price-list .view-features .pricing-btn").text("View All Features");


        if ($(this).hasClass("feature-show")) {

            $(this).text("View Fewer Features");
        }
        else {
            $(this).text("View All Features");
        }

        //$(window).scrollTop();

        scrollTop = null;
    });

    if ($(window).width() <= 768) {

        $('.new-pricing-page .faq-section .faq-box strong').on("click", function (e) {


            $(this).parents(".faq-section ").find(".faq-box").addClass('for-collapse');
            $(this).parents(".faq-box ").removeClass('for-collapse');

            $(this).parents(".faq-section ").find(".faq-box.for-collapse ").find("p").slideUp();
            $(this).parents(".faq-section ").find(".faq-box.for-collapse ").find(".fa").addClass("fa-plus-circle");
            $(this).parents(".faq-section ").find(".faq-box.for-collapse ").find(".fa").removeClass("fa-minus-circle");

            $(this).parents(".faq-box ").find("p").slideToggle();
            $(this).parents(".faq-box ").find(".fa").toggleClass("fa-plus-circle, fa-minus-circle");



            //$(this).parents(".faq-section ").find(".faq-box").closest('.faq-box').siblings().find("p").slideUp();
            //$(this).parents(".faq-box").closest('.faq-box').siblings().find(".fa").addClass("fa-plus-circle");
            //$(this).parents(".faq-box").closest('.faq-box').siblings().find(".fa").removeClass("fa-minus-circle");
        });
    }






    $('.new-pricing-page .submit-banner .submit-dropdown .selectedtext').click(function (event) {
        event.stopPropagation();
        $(this).parents(".submit-dropdown").find("ul").fadeToggle();

    });


    $('.new-pricing-page .submit-banner .submit-dropdown ul li').click(function (event) {
        event.stopPropagation();
        var QuerySelected = $(this).text();

        $(this).parents(".submit-dropdown").find(".selectedtext").text(QuerySelected);
        $(this).parents(".submit-dropdown").find(".selectedtext").addClass("color-black");


        $(this).parents(".submit-dropdown").find("ul").hide();

    });
    $(document).on('click', function () {
        $('.new-pricing-page .submit-banner .submit-dropdown ul').hide();



        if ($(window).width() <= 768) {
            $(".new-pricing-page .pricing-tab ").find(".drop-down ").hide();
            $(".new-pricing-page  .fa-tooltip .tooltip-popup").hide();
        }
    });

    if ($(window).width() <= 768) {
        $('.new-pricing-page  .fa-tooltip').click(function (event) {
            event.stopPropagation();

            $(this).find(".tooltip-popup").toggle();
        });
    }
    $('.new-pricing-page .pricing-tab .select-down .col-md-4').click(function (event) {
        event.stopPropagation();
        $(this).parents(".pricing-tab").find(".drop-down ").toggle();

         
    });
    
    $(' .new-pricing-page .price-list-box .pricing-tab .select-down  .fa.fa-angle-down').click(function (event) {
        event.stopPropagation();

        $(this).parents(".pricing-tab").find(".drop-down ").toggle();
    });
   

    $('.new-pricing-page .pricing-tab .drop-down .col-md-4').click(function (event) {
        event.stopPropagation();

        $(this).parents(".pricing-tab").find(".drop-down .col-md-4").removeClass("active-tab");
        $(this).addClass("active-tab");

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
        


        if ($(".new-pricing-page .pricing-tab #tab-8-9").hasClass("active-tab")) {
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").removeClass("active-two");
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").removeClass("active-three");
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").addClass("active-one");

            $(".new-pricing-page .price-list-box .tab-details").hide();
            $(".new-pricing-page .price-list-box .for-8-9").fadeIn("100000");
            $(this).parents(".pricing-tab").find(".col-md-4").find(".span-line").hide();
            $(this).parents(".pricing-tab").find(".col-md-4#tab-10-12").find(".span-line").show();


            $(".new-pricing-page .selection-stream").show();
            $(".new-pricing-page .selection-career").hide();
            $(".new-pricing-page .selection-graduates").hide();

            $(".new-pricing-page .for-display-stream").show();
            $(".new-pricing-page .for-display-career").hide();
            $(".new-pricing-page .for-display-graduates").hide();

            FixedStream();



        }
        else if ($(".new-pricing-page .pricing-tab #tab-10-12").hasClass("active-tab")) {
            
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").removeClass("active-one");
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").removeClass("active-three");
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").addClass("active-two");

            $(".new-pricing-page .price-list-box .tab-details").hide();
            $(".new-pricing-page .price-list-box .for-10-12").fadeIn("100000");
            $(this).parents(".pricing-tab").find(".col-md-4").find(".span-line").hide();

            $(".new-pricing-page .selection-stream").hide();
            $(".new-pricing-page .selection-career").show();
            $(".new-pricing-page .selection-graduates").hide();

            $(".new-pricing-page .for-display-stream").hide();
            $(".new-pricing-page .for-display-career").show();
            $(".new-pricing-page .for-display-graduates").hide();
            FixedCareer();

          
        }
        else if ($(".new-pricing-page .pricing-tab #tab-gratuates").hasClass("active-tab")) {
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").removeClass("active-one");
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").removeClass("active-two");
            $(this).parents(".pricing-tab").find(".select-down .col-md-4").addClass("active-three");

            $(".new-pricing-page .price-list-box .tab-details").hide();
            $(".new-pricing-page .price-list-box .for-graduates").fadeIn("100000");
            $(this).parents(".pricing-tab").find(".col-md-4").find(".span-line").hide();
            $(this).parents(".pricing-tab").find(".col-md-4#tab-8-9").find(".span-line").show();

            $(".new-pricing-page .selection-stream").hide();
            $(".new-pricing-page .selection-career").hide();
            $(".new-pricing-page .selection-graduates").show();

            $(".new-pricing-page .for-display-stream").hide();
            $(".new-pricing-page .for-display-career").hide();
            $(".new-pricing-page .for-display-graduates").show();

            FixedGraduates();

            
        }
        

        if ($(window).width() <= 768) {

            $(this).parents(".pricing-tab").find(".drop-down").hide();


            var SelectedCareer = $(this).html();
            console.log(SelectedCareer);

            $(this).parents(".pricing-tab").find(".select-down .col-md-4").html(SelectedCareer);
            $(this).parents(".pricing-tab").find(".select-down .col-md-4 .span-line").remove();


      

            $('.new-pricing-page .faq-section .faq-box  p').hide();
            FAQClick();

        }

   
       

    });

    
    function FAQClick() {
        $('.new-pricing-page .faq-section .faq-box.first-faq strong').click();
    
    }

    FAQClick();

    

    $(".content-slider-career").lightSlider({
        loop: true,
        keyPress: true,
        item: 1,
        responsive: [
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove: 1, 

                   
                },
                
            }
        ]
    });




    //TestimonialMultiple();


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
/*//Pricing*/


/*Others*/
$(document).ready(function () {

    // var base_url = window.location.origin + '/';
    // if(sessionStorage.clickcount==3){
    //     $('.homepage-display .center-box h1').removeClass("webinar-class");
    //     $('.header-layer').removeClass("webinar-class");
    //     $('.homepage-display').removeClass("webinar-class");
    //     $(".webinar-strip").remove();
    //     $('.programs-page .sub-menu').removeClass("webinar-class");
    //     $('.career-details-page .left-side').removeClass("webinar-class");
    //     $('.new-pricing-page .program-feature-section.onscroll-fixed').removeClass("webinar-class");
    //     console.log(sessionStorage.clickcount);
    // }
    // else if ($(window).width() > 770) {
    //     $('.homepage-display .center-box h1').addClass("webinar-class");
    //     $('.homepage-display').addClass("webinar-class");
    //     $('.programs-page .sub-menu').addClass("webinar-class");
    //     $('.career-details-page .left-side').addClass("webinar-class");
    //     $('.new-pricing-page .program-feature-section.onscroll-fixed').addClass("webinar-class");  
    //     $('.header-layer').addClass("webinar-class");  
    // }
    // else if ($(window).width() < 770) {
        
    //     $('.homepage-display').addClass("webinar-class");
    //     $('.header-layer').addClass("webinar-class");
    // }

    // $('.webinar-strip .fa ').on('click', function (e) {
    //     e.preventDefault();
        
    //     $(".webinar-strip").slideUp();
    //     $('.programs-page .sub-menu').removeClass("webinar-class");
    //     $('.career-details-page .left-side').removeClass("webinar-class");
    //     $('.new-pricing-page .program-feature-section.onscroll-fixed').removeClass("webinar-class");
    //     $('.homepage-display .center-box h1').removeClass("webinar-class");
    //     $('.homepage-display').removeClass("webinar-class");
    //     $('.header-layer').removeClass("webinar-class");

    //     if (sessionStorage.clickcount) {
    //         sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
    //     } else {
    //         sessionStorage.clickcount = 1;
    //     }
    // });

/*program page*/

$(".programs-page.overseas-page .section-box.overseas-tabs-details .left-tab-details .left-tab-box ul li.with-info").mouseenter(function(){
    $(".left-tab-box ul li.with-info .info").hide();
    $(this).find(".info").show();
  });
  $(".programs-page.overseas-page .section-box.overseas-tabs-details .left-tab-details .left-tab-box ul li.with-info").mouseleave(function(){
    $(this).find(".info").hide();
  });

$( ".overseas-page .tabs-click ul li" ).on('click', function (e) {
    e.preventDefault();
    $(this).parents(".tabs-click").find("ul li").removeClass("active");
    $(this).addClass("active");  
    var maintabIndex = $(this).index();  
    
    $(this).parents(".overseas-page").find(".section-box.overseas-tabs-details  .overseas-tabs-inside").hide();
    $(this).parents(".overseas-page").find(".section-box.overseas-tabs-details  .overseas-tabs-inside").eq(maintabIndex).show();

    overseasLeftTab();

    $(".overseas-page .overseas-tabs-details .overseas-tabs-inside ul.left-tab li:first-child" ).click();

});

function overseasLeftTab(){


$( " .overseas-page .overseas-tabs-details .overseas-tabs-inside ul.left-tab li" ).on('click', function (e) {
    e.preventDefault();
    $(this).parents("ul.left-tab").find("li").removeClass("active");
    $(this).addClass("active");  

    var tabIndex = $(this).index();  
    //console.log(tabIndex);

    $(this).parents(".overseas-tabs-inside").find(".left-tab-details .left-tab-box").hide();
    $(this).parents(".overseas-tabs-inside").find(".left-tab-details .left-tab-box").eq(tabIndex).show();

});

}
overseasLeftTab();

$(".admission-modal .admission-modal-body .admission-modal-content .form-group input").focus(function () {

    $(this).parents(".form-group").removeClass("un-focused");
    $(this).parents(".form-group").addClass("focused");
});
$(".admission-modal .admission-modal-body .admission-modal-content .form-group input").focusout(function () {

    $(this).parents(".form-group").addClass("un-focused");
    $(this).parents(".form-group").removeClass("focused");


});



    $(".admission-modal .admission-modal-body .admission-modal-content .form-group input").focus(function () {

        $(this).parents(".form-group").removeClass("un-focused");
        $(this).parents(".form-group").addClass("focused");
    });
    $(".admission-modal .admission-modal-body .admission-modal-content .form-group input").focusout(function () {

        $(this).parents(".form-group").addClass("un-focused");
        $(this).parents(".form-group").removeClass("focused");


    });


    $(".admission-modal .admission-modal-body .admission-modal-content .form-group").each(function () {
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



    $(".programs-page.programs-page-10-12.admission-page .admission-btn").on('click', function (e) {
        e.preventDefault();
        $("body").addClass("body-block");
        $("body").scrollTop();
        $(".admission-modal").fadeIn();
        $(".admission-block").fadeIn(); 
        $(".admission-modal .admission-modal-content.form-box").show();
        $(".admission-modal .admission-modal-content.thankyou-box").remove();
        $(".admission-modal .admission-modal-body .admission-modal-content .form-group .validation").remove();
    });

    $(".admission-modal .admission-modal-body .ad-close").on('click', function (e) {
        e.preventDefault();
        $("body").removeClass("body-block");
        $(".admission-modal .admission-modal-body .admission-modal-content .form-group").removeClass("focused");
        $(".admission-modal .admission-modal-body .admission-modal-content .form-group").addClass("un-focused");
        $(this).parents(".admission-modal").find("input").val("");
        $(this).parents(".admission-modal").fadeOut();
        $(".admission-block").fadeOut(); 
        
    });





    $(' .programs-page select.prg-select-box').on('change', function() {
        $(this).removeClass("prg-select-box");
    })

    $(".content-slider-programs").lightSlider({
        loop: true,
        keyPress: true,
        item: 1,
       
        slideMove: 1,
        enableTouch: false,
        enableDrag: false,
        freeMove: false

    });

    $('.programs-page .programs-cards-box .btn-ghost.compare-all').on('click', function (e) {
        e.preventDefault();
    
        $(document).off("scroll");


        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top + 30
        }, 500, 'swing', function () {
            //window.location.hash = target;
            $(document).on("scroll", onScroll);
        });

        function onScroll(event) {
            var scrollPos = $(document).scrollTop() + 60;

          

            $('.programs-page .sub-menu ul li a').each(function () {
                var currLink = $(this);
                var refElement = $(currLink.attr("href"));
                if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    $('.programs-page .sub-menu ul li a').removeClass("active");
                    currLink.addClass("active");
                }
                else {
                    currLink.removeClass("active");
                    //$('.programs-page .sub-menu ul li a').hide();
                }
            });
        }
        
        $('.programs-page .programs-cards ul.feature-short').hide();
        $('.programs-page .programs-cards ul.feature-details').slideDown();
        $(this).hide();
    });
    $('.programs-page .programs-cards-box .btn-ghost.btn-ind-features').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass("feature-show");
        $(this).parents(".programs-cards").find("ul.feature-short").slideToggle();
        $(this).parents(".programs-cards").find("ul.feature-details").slideToggle();
        $(this).text("View Fewer Features");

        if ($(this).hasClass("feature-show")) {

            $(this).text("View Fewer Features");
        }
        else {
            $(this).text("View All Features");
        }
    });


    $('.programs-page .help-box .help-tab-details .details-box .light-slider-arrow.left').on("click", function (e) {


        $(this).parents(".details-box ").find(".lSAction .lSPrev").click();

        if ($(this).parents(".details-box ").find(".content-slider-programs .slide-1").hasClass("active")) {
            $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
            $(".programs-page .help-box .help-tab .prg-tab-first").addClass("active");
        }
        if ($(this).parents(".details-box ").find(".content-slider-programs .slide-2").hasClass("active")) {
            $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
            $(".programs-page .help-box .help-tab .prg-tab-second").addClass("active");
        }

        if ($(this).parents(".details-box ").find(".content-slider-programs .slide-3").hasClass("active")) {
            $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
            $(".programs-page .help-box .help-tab .prg-tab-third").addClass("active");
        }

    });
    
    $('.programs-page .help-box .help-tab .prg-tab-first').on("click", function (e) {

        if ($('.programs-page .help-box .help-tab .prg-tab-second').hasClass("active")) {
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSPrev").click();

        }

        if ($('.programs-page .help-box .help-tab .prg-tab-third').hasClass("active")) {
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSPrev").click();
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSPrev").click();
        }
        $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
        $(this).addClass("active");


    });


    $('.programs-page .help-box .help-tab .prg-tab-second').on("click", function (e) {
        
        if ($('.programs-page .help-box .help-tab .prg-tab-first').hasClass("active")) {
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSNext").click();        
         
        }
       
        if ($('.programs-page .help-box .help-tab .prg-tab-third').hasClass("active")) {
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSPrev").click();
           
        }
        $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
        $(this).addClass("active");


    });

    $('.programs-page .help-box .help-tab .prg-tab-third').on("click", function (e) {

        if ($('.programs-page .help-box .help-tab .prg-tab-first').hasClass("active")) {
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSNext").click();
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSNext").click();

        }

        if ($('.programs-page .help-box .help-tab .prg-tab-second').hasClass("active")) {
            $('.programs-page .help-box .help-tab-details .details-box').find(".lSAction .lSNext").click();

        }
        $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
        $(this).addClass("active");


    });
    if ($(window).width() < 768) {
 
    $(".programs-page.partners-header .sub-menu ul li.p-contact a").text("Contact");
    $(".programs-page.partners-header .sub-menu ul li.p-contact a").append("<span class='active-span'></span>");
} 

    var windowHeight = $(window).height();
    //console.log(windowHeight);


    if ($(window).width() > 768) {
        $(".programs-page-header").height(windowHeight - 138);
        $(".admission-page .programs-page-header").height(windowHeight - 80);
        $(".partner-page .partner-page-header").height(windowHeight - 58);
        $(".common-page-banner").height(windowHeight - 78);


        
    }
    

    if ($(window).width() <= 768) {
        $(".programs-page-header").height(windowHeight - 100);
        $(".admission-page .programs-page-header").height(windowHeight - 80);
        $(".partner-page .partner-page-header").height(windowHeight - 90);
        $(".common-page-banner").height(windowHeight - 50);
    }
  
  

    $('#new-login-screens .sign-up-box .login-tabs h4').on("click", function (e) {

        if ($(this).hasClass("counseller")) {
            $(this).parents(".sign-up-box ").find("h4.counseller").addClass("active");
            $(this).parents(".sign-up-box ").find("h4.student").removeClass("active");

        $(this).parents(".sign-up-box ").find(".partner-student-login").hide();
        $(this).parents(".sign-up-box ").find(".counsellor-student-login").show();
     }
        if ($(this).hasClass("student")) {
 
            $(this).parents(".sign-up-box ").find("h4.counseller").removeClass("active");
            $(this).parents(".sign-up-box ").find("h4.student").addClass("active");

            $(this).parents(".sign-up-box ").find(".partner-student-login").show();
            $(this).parents(".sign-up-box ").find(".counsellor-student-login").hide();
               }
    });
   

    $('.programs-page .help-box .help-tab-details .details-box .light-slider-arrow.right').on("click", function (e) {


        $(this).parents(".details-box ").find(".lSAction .lSNext").click();
        if ($(this).parents(".details-box ").find(".content-slider-programs .slide-1").hasClass("active")) {
            $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
            $(".programs-page .help-box .help-tab .prg-tab-first").addClass("active");
        }
        if ($(this).parents(".details-box ").find(".content-slider-programs .slide-2").hasClass("active")) {
            $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
            $(".programs-page .help-box .help-tab .prg-tab-second").addClass("active");
        }

        if ($(this).parents(".details-box ").find(".content-slider-programs .slide-3").hasClass("active")) {
            $(".programs-page .help-box .help-tab .col-md-4").removeClass("active");
            $(".programs-page .help-box .help-tab .prg-tab-third").addClass("active");
        }

    });

    function FixedProgram() {
        if ($(window).width() > 768) {

            var ProgramHeight = $(".programs-page-header").height() + 80;

            $(window).scroll(function () {

                var scroll = $(window).scrollTop();

                if (scroll >= ProgramHeight) {

                    $(".programs-page .sub-menu").addClass("fixed");
                    $(".programs-page .help-box").addClass("fixed");
                }
                else {
                   $(".programs-page .sub-menu").removeClass("fixed");
                    $(".programs-page .help-box").removeClass("fixed");
                    
                }
                
            
            });
        }

        if ($(window).width() <= 768) {

            var ProgramHeight = $(".programs-page-header").height() - 2;

            $(window).scroll(function () {

                var scroll = $(window).scrollTop();

                if (scroll >= ProgramHeight) {

                    $(".programs-page .sub-menu").addClass("fixed");
                    $(".programs-page .help-box").addClass("fixed");
                    $(".programs-page .product-class-tag").show();
                    
        
                }
                else {
                   $(".programs-page .sub-menu").removeClass("fixed");
                    $(".programs-page .help-box").removeClass("fixed");
                    $(".programs-page .product-class-tag").hide();
                    
                }
                
            
            });
        }

    }

    FixedProgram();



  

    //$('.programs-page .sub-menu ul li a').each(function () {
        
    $(document).on("scroll", onScroll);

    //smoothscroll
    

    $('.programs-page .sub-menu ul li a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $('.programs-page .sub-menu ul li a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 58
        }, 500, 'swing', function () {
            //window.location.hash = target;
            $(document).on("scroll", onScroll);
        });


        if ($(window).width() <= 768) {


            $('.programs-page .sub-menu ul li a').each(function () {
                $(this).removeClass('active');
            })
            $(this).addClass('active');
    
            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 100
            }, 500, 'swing', function () {
                //window.location.hash = target;
                $(document).on("scroll", onScroll);
            });


        }

    });

    $('a[href^="#"].btn-scroll').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
 var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 60
        }, 500, 'swing', function () {
            //window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });


    if ($(window).width() <= 768) {

        $('a[href^="#"].btn-scroll').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
     var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 100
            }, 500, 'swing', function () {
                //window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });

    }




    $("a.adimission-navigate").on('click', function (e) {
        e.preventDefault();
        // Make sure this.hash has a value before overriding default behavior
        var target = this.hash,

        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 50
        }, 500, 'swing', function () {

        });
    });
  

    function onScroll(event) {
        var scrollPos = $(document).scrollTop() + 60;
        $('.programs-page .sub-menu ul li a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.programs-page .sub-menu ul li a').removeClass("active");
                currLink.addClass("active");
            }
            else {
                currLink.removeClass("active");
                        
            }
        });
        





    }

    if ($(window).width() <= 768) {

        $('.programs-page .faq-section .faq-box strong').on('click', function (e) {
            e.preventDefault();

            $(this).parents(".faq-section ").find(".faq-box").addClass('for-collapse');
            $(this).parents(".faq-box ").removeClass('for-collapse');

            $(this).parents(".faq-section ").find(".faq-box.for-collapse ").find("p").slideUp();
            $(this).parents(".faq-section ").find(".faq-box.for-collapse ").find(".fa").addClass("fa-plus-circle");
            $(this).parents(".faq-section ").find(".faq-box.for-collapse ").find(".fa").removeClass("fa-minus-circle");

            $(this).parents(".faq-box ").find("p").slideToggle();
            $(this).parents(".faq-box ").find(".fa").toggleClass("fa-plus-circle, fa-minus-circle");


        });

        $('.programs-page .faq-section .faq-box.first-faq strong').click();
    }

   

    /*cart*/

    $('.new-cart-page .cart-absolute-box .amount-box.for-checkout a.apply-mobile-coupon').on("click", function (e) {
        $("body").addClass("modal-open");
        $(this).parents(".cart-absolute-box").find(".amount-box.for-checkout").hide();
        $(this).parents(".cart-absolute-box").find(".amount-box.for-pay").show();
        //$(".new-cart-page .cart-absolute-box .amount-box .promo-sec input").focus();
        $(".cart-disable-screen").fadeIn();
        
    });
    $('.new-cart-page .cart-absolute-box .amount-box.for-checkout  .btn-checkout').on("click", function (e) {
        $("body").addClass("modal-open");
        $(this).parents(".cart-absolute-box").find(".amount-box.for-checkout").hide();
        $(this).parents(".cart-absolute-box").find(".amount-box.for-pay").show();
        //$(".new-cart-page .cart-absolute-box .amount-box .promo-sec input").focus();
        $(".cart-disable-screen").fadeIn();
        
    });

    $('.new-cart-page .cart-absolute-box .amount-box.for-pay  .cart-close').on("click", function (e) {
        $("body").removeClass("modal-open");
        $(this).parents(".cart-absolute-box").find(".amount-box.for-checkout").show();
        $(this).parents(".cart-absolute-box").find(".amount-box.for-pay").hide();
        $(".cart-disable-screen").fadeOut();
    });

    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').on("click", function (e) {
          
         
           var PromoCode = 0;
           var action = 'apply';
           var amount = $('#actual_amount').val();
           PromoCode = $(this).parents(".promo-sec").find("input").val().toUpperCase();
        if ($(this).parents(".promo-sec").find("input").val().length > 0) {
          $("div.overlay-box").css("display", "block");
        $(this).parents(".promo-sec").find("input").hide();
         $.ajax({
            url:baseUrl+"login/use_coupon",
            type:"post",
            data:{'ci_csrf_token' : '',coupon:PromoCode, 'amount':amount,action:action},
            success:function(response){
              $("div.overlay-box").css("display", "none");
              var json=$.parseJSON(response);
              var message=json.message;
              var saved_amount=json.amount;
              
              if(message=='session_expired'){
                var url=baseUrl+'login/verifylogin?redirect_url='+baseUrl+'login/makepayment';
                
                window.location.href=url;
              }
              else if (message=='error') {
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-alert .promo-valid").hide();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-alert .promo-invalid").show();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".amount-pay .discounted-amount").hide();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-sec .code-invalid").show();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-sec .code-invalid span").text(PromoCode);
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".amount-pay .main-amount").text(amount);
               }else if(message=='success'){
                
                    saved_amount=saved_amount.toString().replace(/,/g, "");
                    if(json.amount==='0'){
                        $('.btn-paytm').text("Go To Dashboard");
                        $('.btn-paynow').hide();
                    }
                    
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-alert .promo-invalid").hide();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-alert .promo-valid").text("You saved ₹ "+parseFloat(amount-saved_amount)+"");
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-alert .promo-valid").show();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".amount-pay .discounted-amount").text(amount);
                   $(".new-cart-page .cart-absolute-box .for-checkout .amount-pay .main-amount").text(json.amount);
                   $(".new-cart-page .cart-absolute-box .for-checkout .apply-mobile-coupon").text("Coupon Applied");
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".for-checkout .apply-mobile-coupon").text("Coupon Applied");
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".amount-pay .discounted-amount").show();
                   $('.amount-payable-mobile').text("AMOUNT PAYBLE: ₹ "+json.amount);
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".amount-pay .main-amount").text(json.amount);
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-sec .code-valid").show();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-sec .code-valid span").text(PromoCode);
               }
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-sec .promo-apply").hide();
                   $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".promo-sec .promo-remove").show();

               
            }
         });
        }
    });

    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').on("click", function (e) {
      $("div.overlay-box").css("display", "block");
      var coupon = $("#coupon_code").val();
      var amount= $("#actual_amount").val(); 
      var action = 'remove';
      if(amount!=''){
        $.ajax({
            url:baseUrl+"login/use_coupon",
            type:"post",
            data:{'ci_csrf_token' : '',coupon:coupon, 'amount':amount,action:action},
            success:function(response){
             $("div.overlay-box").css("display", "none");
               var json=$.parseJSON(response);
               var message=json.message;
              
              if(message=='session_expired'){
               var url=baseUrl+'login/verifylogin?redirect_url='+baseUrl+'login/makepayment';
                
               window.location.href=url;
              }
              else if (message=='updated') {
                    
                    
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".promo-sec").find("input").val("");
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-alert .promo-valid").hide();
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-alert .promo-invalid").hide();

                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-sec .promo-apply").show();
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-sec .promo-remove").hide();
                    $(".new-cart-page .cart-absolute-box .for-checkout .amount-pay .main-amount").text(json.amount);
                   $(".new-cart-page .cart-absolute-box .for-checkout .apply-mobile-coupon").text("Apply Coupon");
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".amount-pay .discounted-amount").hide();

                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-apply').parents(".amount-box").find(".amount-pay .main-amount").text(json.amount);
                    $('.amount-payable-mobile').text("AMOUNT PAYBLE: ₹ "+json.amount);
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-sec .code-valid").hide();
                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-sec .code-invalid").hide();

                    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .promo-remove').parents(".amount-box").find(".promo-sec input").show();
                 }
                }
             });
          }
        });
    
    $('.new-cart-page .cart-absolute-box .amount-box .promo-sec .code-invalid .fa').on("click", function (e) {

        $(this).parents(".amount-box").find(".promo-sec .promo-remove").click();
        


    });

    $(".new-cart-page .cart-absolute-box .amount-box .promo-sec input").keyup(function () {
        $(this).parents(".amount-box").find(".promo-sec .promo-apply").show();
        $(this).parents(".amount-box").find(".promo-sec .promo-remove").hide();
        $(this).parents(".amount-box").find(".amount-pay .discounted-amount").hide();


    });

    /*end of cart*/
    $(".accordion-1 .accordion-section-1 h6").click(function(){
      
        $(this).parents(".accordion-section-1").find(".accordion-content-1").slideToggle();
        $(this).parents(".accordion-section-1").closest('.accordion-section-1').siblings().find(".accordion-content-1").hide();

        $(this).parents(".accordion-section-1").find(".accordion-title-1").toggleClass("active");
       $(this).parents(".accordion-section-1").closest('.accordion-section-1').siblings().find(".accordion-title-1").removeClass("active");


    });

    
    $(".sign-up-box  .fa-close").click(function(){
        $(this).parents('#emailErrorbyUrl').hide();
        $(this).parents('#emailError').hide();
    });


    $( ".placeholder-input input" ).focus(function() {
        $(this).parents(".placeholder-input").addClass("focused");
        $(this).parents(".placeholder-input").addClass("focused-blue");
    });

    $( ".placeholder-input" ).each(function(){
        $(this).find("input").focusout(function() {
            $(this).parents(".placeholder-input").removeClass("focused-blue");
            if ($(this).val().length > 0) {
                $(this).parents(".placeholder-input").addClass("focused");
            }
            else{$(this).parents(".placeholder-input").removeClass("focused");}
        });

    

        setTimeout(function(){        
            $(".sign-up-box  .fa-close").parents('#emailErrorbyUrl').hide();
            $(".sign-up-box  .fa-close").parents('#emailError').hide();
        }, 8000);
    });

       
    var checkEmail = $("#new-login-screens .sign-up-box #email").val();
    if(checkEmail){
        $(" #new-login-screens .sign-up-box #password").focus();
        $(" #new-login-screens .sign-up-box #username").focus();

    }

    $(window).load(function() {

        $( "input" ).each(function(){
        
            // console.log($(this).attr('type'));
            if ($(this).val().length > 0) {
                $(this).parents(".placeholder-input").addClass("focused");
            }
            else{$(this).parents(".placeholder-input").removeClass("focused");}
           

            if (checkEmail && $(this).attr('id')=='password') {
                $(this).parents(".placeholder-input").addClass("focused");
            }

            if (checkEmail && $(this).attr('name')=='username') {
                $(this).parents(".placeholder-input").addClass("focused");
            }
        
        }); 
    });


        $(" #new-login-screens .relative-span.type-password .fa").click(function(e){
            e.preventDefault();
            $(this).parents("span.type-password").find('input').toggleClass("typeText");
            $(this).toggleClass("fa-eye-slash");


            if ($(this).parents("span.type-password").find('input').hasClass("typeText")){
                $(this).parents("span.type-password").find('.fa').text("Hide");
                $(this).parents("span.type-password").find('input').attr({type:"text"});
            }
            else{
                $(this).parents("span.type-password").find('.fa').text("Show");
                $(this).parents("span.type-password").find('input').attr({type:"password"});
            }
        });

   

       $(".new-purchase-banner.expand-mode .fa-minus-circle ").click(function () {
           $(".new-purchase-banner.expand-mode").hide();
           $(".new-purchase-banner.collapse-mode").show();
           localStorage.setItem("p", "minus");
      
       });
    $(".new-purchase-banner.collapse-mode .fa-plus-circle ").click(function () {
        $(".new-purchase-banner.expand-mode").show();
        $(".new-purchase-banner.collapse-mode").hide();
        localStorage.setItem("p", "plus");
      
    });

    if(localStorage.getItem('p')=='plus'){
        $(".new-purchase-banner.expand-mode").show();
        $(".new-purchase-banner.collapse-mode").hide();
    }else if(localStorage.getItem('p')=='minus'){
        $(".new-purchase-banner.expand-mode").hide();
        $(".new-purchase-banner.collapse-mode").show();
    }

    /*Buy now bannner*/
    $(".offer-popup .mode-expand .fa-minus-circle ").click(function () {
        $(".offer-popup .mode-expand").hide();
        $(".offer-popup .mode-compress").show();
        localStorage.setItem("p", "minus");
         
    });
    $(".offer-popup .mode-compress .fa-plus-circle ").click(function () {
        $(".offer-popup .mode-expand").show();
        $(".offer-popup .mode-compress").hide();
        localStorage.setItem("p", "plus");
         
    });

    if(localStorage.getItem('p')=='plus'){
        $(".offer-popup.expand-mode").show();
        $(".offer-popup .mode-compress").hide();
    }else if(localStorage.getItem('p')=='minus'){
        $(".offer-popup .expand-mode").hide();
        $(".offer-popup .mode-compress").show();
    }


      /*$(".fa-eye").click(function(){
          var type = $("#first_password").attr("type");
          if(type=='password'){
              $("input[name='password']").prop("type", "text");
              $(".fa-eye").css('color','blue');
          }else{
              $("input[name='password']").prop("type", "password");
              $(".fa-eye").css('color','black');
          }
     
   
      });*/


      $('[data-toggle="tooltip"]').tooltip();

      $(document).ready(function () {
          $('[data-toggle="tooltip"]').tooltip();
      });


      $(window).scroll(function () {
          $(".tooltip ").hide();

      });



      $("#confirmpassword").blur(function (event) {
          $('.cPass').empty();
          $("#submitFrm").prop("disabled", false);
          if ($('#password').val() != $('#confirmpassword').val()) {
              $('.cPass').append("Password and Confirm Password don't match");
              $("#submitFrm").prop("disabled", true); event.preventDefault();
          }
      });

      $("#validate_email").blur(function (event) {
          if ($("#validate_email").val() != '') {
              $("#contact").prop("disabled", true);
              $('#contactdiv').remove();
          }
      });

      $("#contact").blur(function (event) {
          if ($("#contact").val() != '') {
              $("#validate_email").prop("disabled", true);
              $('#emaildiv').remove();
          }
      });

      $("#loginform #form-submit").click(function () {
          if ($("#validate_email").val() == '' && $("#contact").val() == '') {
              $("#validate_email").attr("required", "required");
          }
      });




      $(window).scroll(function () {
          var scroll = $(window).scrollTop();
          if ((scroll >= 30)) {
              $(".new-top-header ").addClass("up");
              $(".new-top-header .new-header-1").hide();

          }


          else {
              $(".new-top-header .new-header-1").show();
              $(".new-top-header ").removeClass("up");
          }

      });



      $('.new-top-header .new-header-2 .fa.fa-bars').on("click", function (e) {


          $(".mobile-fixed-header-menu").addClass("push-left");
          $("body").addClass("push-left");
          $(".new-overlay").show();
      });
      $('.mobile-fixed-header-menu .fa.fa-close').on("click", function (e) {

          $('.mobile-fixed-header-menu .menu-sign-up a').next(".validation-mobile").remove(); // remove it
          $('.mobile-fixed-header-menu .menu-sign-up #h2-email').next(".validation").remove(); // remove it
          $("#h2-email").val(' ');

          $(".mobile-fixed-header-menu").removeClass("push-left");
          $("body").removeClass("push-left");
          $(".new-overlay").hide();

          $('.mobile-fixed-header-menu .mobile-product ul').hide();
          $('.mobile-fixed-header-menu .mobile-product').removeClass("active");
      });

      $('.new-overlay').on("click", function (e) {

          $(".mobile-fixed-header-menu").removeClass("push-left");
          $("body").removeClass("push-left");
          $(".new-overlay").hide();

          $('.mobile-fixed-header-menu .mobile-product ul').hide();
          $('.mobile-fixed-header-menu .mobile-product').removeClass("active");
      });


      $('.mobile-fixed-header-menu .mobile-product').on('click', function (e) {
          e.preventDefault();

          $(this).find("ul").slideToggle();
          $(this).toggleClass("active");

      });


  

        
   // $('.bxslider').bxSlider();
   
      $(".absolute-button").click(function() {
          $('body').animate({
              scrollTop: $(".form-scroll").offset().top},
              'slow');
      });

     
    
     
});

/*//Others*/





$('input').keypress(function( e ) {
    var name = $(this).attr('name');
    //console.log(name);
    if(e.which === 13 && (name=='email' || name=='password')){
        //$("#new-login-screens #login-btn").click();
        //$(".homepage-display #startNow").click();
        return false;
    }
});

$('input').bind('change keydown keyup',function (){
    
     if($(this).val()){
           var name = $(this).attr("name");
           $(this).next(".form_error").remove(); // remove it
           $(this).next(".validation").remove(); // remove it
           $(".validation").remove(); // remove it
           $(".validation-mobile").remove(); // remove it
           $(".error").remove(); // remove it
            //$("input[name="+name+"]").css('border-color', '#e9e9e9');
       }
});

/*Buy now bannner*/

$(".offer-popup.mode-compress .fa").click(function () { 
    localStorage.clear();
    $(".offer-popup.mode-compress").hide();
    $(".offer-popup.mode-expand").show();
    localStorage.setItem("p1", "plus");
});

$(".offer-popup.mode-expand .fa").click(function () {
    localStorage.clear();
    $(".offer-popup.mode-compress").show();
    $(".offer-popup.mode-expand").hide();
    localStorage.setItem("p1", "minus");
          
});

       
      
if(localStorage.getItem('p1')=='plus'){
    $(".offer-popup.mode-compress").hide();
    $(".offer-popup.mode-expand").show();
}else if(localStorage.getItem('p1')=='minus'){
    $(".offer-popup.mode-compress").show();
    $(".offer-popup.mode-expand").hide();
}



$("input").keydown(function(){ 
    if($(this).val()){
        $(this).next(".form_error").remove(); // remove it
        $(this).next(".validation").remove(); // remove it
        $(".validation").remove(); // remove it
        $(".validation-mobile").remove(); // remove it
    }
});

$("textarea").keydown(function(){ 
    if($(this).val()){
        $(this).next(".validation").remove(); // remove it
        $(".validation").remove(); // remove it
        $(".validation-mobile").remove(); // remove it
    }
});

$("#nature-query").change(function(){
    $(".validation").remove(); // remove it
    $(".validation-mobile").remove(); // remove it
});

$("#validate_email").blur(function(event){
    if($("#validate_email").val()!=''){
        $("#contact").prop("disabled",true);
        $('#contactdiv').remove();
    }
});
$("#contact").blur(function(event){
    if($("#contact").val()!=''){
        $("#validate_email").prop("disabled",true);
        $('#emaildiv').remove();
    }
});

$("#loginform #loginbutton").click(function(){
    if($("#validate_email").val()=='' && $("#validate_email").val()==''){
        $("#validate_email").attr("required","required");
    }
});




$("form[name='ambassador'] input[type='email']").blur(function(event){
    var email = $(this).val();
    $(".ambassador-error").remove();
    $(this).find(".ambassador-error").remove();

    if(email){
        $("div.overlay-box").show();
        $.getJSON("https://api.hubuco.com/api/v3/?api=ncsDzryAk0DenEtBDmhYpYlGs&email="+email+"",
        function(data) {

            $("div.overlay-box").hide();
            if(data.result != 'ok'){

                $("#ambassador").prop("disabled", true);
                $("#ambassador").parent('form').find("input[type='email']").after('<div class="ambassador-error" style="font-size: 10px!important; color: red; text-align: left;">The email address you entered is not correct. Please try again.</div>');
                return false;
            }
            $("#ambassador").prop("disabled", false);
            
        });
    }
});
$(document).ready(function() {
  var errorheight = $(window).height();
    $(".slider").height(errorheight);
});
/*$("form[name='ambassador'] #ambassador").click(function (e) {
    console.log('hii');
    var email = $(this).parent('form').find("input[type='email']").val();
    $(this).parent('form').find(".ambassador-error").remove();
    $(".ambassador-error").remove();
    if(email){
        $.getJSON("https://api.hubuco.com/api/v3/?api=ncsDzryAk0DenEtBDmhYpYlGs&email="+email+"",
        function(data) {
            if(data.result != 'ok'){
                $("#ambassador").prop("disabled", true);
                $("#ambassador").parent('form').find("input[type='email']").after('<div class="ambassador-error" style="font-size: 10px!important; color: red; text-align: left;">The email address you entered is not correct. Please try again.</div>');
                return false;
            }
            
        });
    }
        
});*/
/*mapped school login screen*/
   $( " #new-login-screens.schoollogin-page .sign-up-box h4.click-student" ).on("click", function() {       
    $("#new-login-screens.schoollogin-page .placeholder-input input").val("").focusout();  
        $(this).addClass("active");  
        $("#new-login-screens.schoollogin-page .sign-up-box h4.click-counsellor" ).removeClass("active"); 
        $("#new-login-screens.schoollogin-page .sign-up-box-details.for-student").show(); 
        $("#new-login-screens.schoollogin-page .sign-up-box-details.for-counsellor" ).hide(); 
        
    });
    $( " #new-login-screens.schoollogin-page .sign-up-box h4.click-counsellor" ).on("click", function() {    
        $("#new-login-screens.schoollogin-page .placeholder-input input").val("").focusout();      
        $(this).addClass("active");  
        $("#new-login-screens.schoollogin-page .sign-up-box h4.click-student" ).removeClass("active"); 
        $("#new-login-screens.schoollogin-page .sign-up-box-details.for-counsellor").show(); 
        $("#new-login-screens.schoollogin-page .sign-up-box-details.for-student" ).hide(); 
        
    });
/*end*/

