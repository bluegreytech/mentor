 
$(document).ready(function() {

    var base_url = window.location.origin + '/';
    var csrfValue = $("#csrf_mindler_token").val();
  
  //Insert answer of stream
      var startTime;
      
      $(document).on('ifChanged','.test-questions-box .radio input[type="radio"]', function (event) {
        
        if(startTime) {
           var time = (new Date().getTime() - startTime);
        } else {
          startTime = new Date().getTime();
          var time = $("#current_time").val();
        }

        var count_q = $('.mi-question').val();
        if($('input[name="option_id"]:checked').length!=0 && count_q!=1) {

            var question_id = '';
            var option_id = $('input[name="option_id"]:checked').val();
            question_id = $('input[name="option_id"]:checked').attr('data-id');
            var test_id = $("#subtest_id").val();
            var test_main_id = $("#test_main_id").val();
            var status = $('.mi-question').attr('id');
            var action = "next";
            $.ajax({
                  url: base_url+"assess/answers",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'question_id':question_id,'test_id':test_id,'option_id':option_id,'test_main_id':test_main_id,'status':status,'time':time},
                  success: function (response) {
                      var json = $.parseJSON(response);
                      $(".test-questions-box").empty();
                       if(json.status=="1"){
                          location.href = base_url+'assess';
                        }
                        else if(json.status!="1"){

                          $('.mi-question').val(json[0].count_q);
                          var pro = json[0].progress;
                          var val = Math.round(pro);
                          $(".progress-bar").css('width', ''+val+'%');
                          $(".progress-bar").html(val+'%');

                          $.each(json, function(i, row) {
                            var qimg = '';
                            var oimg ='';
                            if(json[i].question_image!=''){
                             qimg = '<div class="question-image"><img class="mobqtimage" src="'+base_url+'uploads/question_images/'+json[i].question_image+'"></div>';
                            }

                            var additional_info = '';
                            if(json[i].additional_info){
                                //additional_info = '<i class="fa fa-info-circle fa-tooltip margin-left-5" data-placement="top" data-toggle="tooltip"  data-original-title="' + json[i].additional_info + '"></i>';
                                additional_info = '<span class="fa fa-info-circle fa-tooltip " ><span class="test-tootip"><i class="fa  fa-caret-left"></i><span class="tooltip-close"><span class="fa pe-7s-close"></span></span>' + json[i].additional_info + '</span></span>';

                              }

                            $(".test-questions-box").append('<div class=" margin-bottom-30"><button class="btn btn-xs btn-default" id="new-back-btn"><i class="fa fa-chevron-left font-size-10 margin-right-3"></i>back</button></div><h5>' + json[i].question + additional_info + '</h5>' + qimg);
                             
                             $.each(json[i].options, function(x, y) { 
                              if(json[i].options[x].option_image!=''){
                                oimg = '<img class="mobotimage" src="'+base_url+'uploads/option_images/'+json[i].options[x].option_image+'">';
                              }

                              $(".test-questions-box").append('<div class="radio"><label class="option_new"><input type="radio" data-id="'+json[i].id+'" value="'+json[i].options[x].option_id+'" class="icheck-blue" name="option_id" id="option_id" >'+oimg+json[i].options[x].option+'</label></div>');
                             
                              $('input').iCheck({
                                checkboxClass: 'iCheck-blue',
                                radioClass: 'iradio_square-blue'
                              });

                             });
                            
                        });

                        App.initPopover();
                      }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         }
          else if($('input[name="option_id"]:checked').length!=0 && count_q==1) {
            $('#modal-before-test-submit').fadeIn();
            $("#new-back-btn").hide();
          }
           
      });

      $('#go-back').click(function() {
        $('#modal-before-test-submit').fadeOut();
        $(".test-questions-box input[type=radio]").attr('checked', false);
        var manageradiorel = $("input:radio[name ='option_id']:checked").val();
        $(".test-questions-box input[value="+manageradiorel+"]").parents(".iradio_square-blue").addClass("checked");
      });

      /* Back previous question*/

      var startTime;
      //$(".test-questions-box #new-back-btn").click(function(){ 
      $(document).on('click',".test-questions-box #new-back-btn", function (event) {
        //var str = $("#submit").attr('class');
            if(startTime) {
               var time = (new Date().getTime() - startTime);
            } else {
              startTime = new Date().getTime();
              var time = $("#current_time").val();
            }
            var test_id = $("#subtest_id").val();
            var test_main_id = $("#test_main_id").val();
            var status = $('.mi-question').attr('id');
            var action = "back";
            $.ajax({
                  url: base_url+"assess/backquestion",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'test_id':test_id,'test_main_id':test_main_id,'status':status,'time':time},
                  success: function (response) {
                      var json = $.parseJSON(response);
                      $(".test-questions-box").empty();
                       if(json.status=="1"){
                          location.href = base_url+'assess';
                        }
                        else if(json.status!="1"){
                        
                        var pro = json[0].progress;
                        var val = Math.round(pro);
                        $(".progress-bar").css('width', ''+val+'%');
                        $(".progress-bar").html(val+'%');
                        var mival = $('.mi-question').val();
                        $('.mi-question').val(parseInt(mival)+1);

                        $.each(json, function(i, row) {
                          var qimg = '';
                          var oimg ='';
                          if(json[i].question_image!=''){
                           qimg = '<div class="question-image"><img class="mobqtimage" src="'+base_url+'uploads/question_images/'+json[i].question_image+'"></div>';
                          }

                          var additional_info = '';
                          if(json[i].additional_info){
                              //additional_info = '<i class="fa fa-info-circle fa-tooltip margin-left-5" data-placement="top" data-toggle="tooltip"  data-original-title="' + json[i].additional_info + '"></i>';
                              additional_info = '<span class="fa fa-info-circle fa-tooltip " ><span class="test-tootip"><i class="fa  fa-caret-left"></i><span class="tooltip-close"><span class="fa pe-7s-close"></span></span>' + json[i].additional_info + '</span></span>';
                              }

                          $(".test-questions-box").append('<div class=" margin-bottom-30"><button class="btn btn-xs btn-default" id="new-back-btn"><i class="fa fa-chevron-left font-size-10 margin-right-3"></i>back</button></div><h5>' + json[i].question + additional_info + '<h5>' + qimg);
                           
                           $.each(json[i].options, function(x, y) { 

                            if(json[i].options[x].option_id==json[i].selecteValue){
                              selectedValue = 'checked';

                            }else{
                              selectedValue = '';
                            }

                            if(json[i].options[x].option_image!=''){
                              oimg = '<img class="mobotimage" src="'+base_url+'uploads/option_images/'+json[i].options[x].option_image+'">';
                            }
                            $(".test-questions-box").append('<div class="radio"><label class="option_new"><input type="radio" data-id="'+json[i].id+'" '+selectedValue+' value="'+json[i].options[x].option_id+'" class="icheck-blue" name="option_id" id="option_id" >'+oimg+json[i].options[x].option+'</label></div>');
                           
                            $('input').iCheck({
                              checkboxClass: 'iCheck-blue',
                              radioClass: 'iradio_square-blue'
                            });

                             $(".test-questions-box input[type=radio]").attr('checked', false);
                             $(".test-questions-box input[value="+json[i].selecteValue+"]").parents(".iradio_square-blue").addClass("checked");

                           });
                          
                        });
                        $(".test-questions-box #new-back-btn").prop("disabled", true);

                        App.initPopover();

                      }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         //}
           

      });

      var startTime;
      $("#submitmodal").click(function(){ 
          //var str = $("#submit").attr('class');
          //var res = str.split(" ");
          $('#modal-after-test-submit').fadeIn();

          setTimeout(function () {
                setTimeout(function () {
                    $("#15secDelay").show();
                    toggleDiv();
                }, 9000);
          }, 1000);

          localStorage.clear();
          if($('input[name="option_id"]:checked').length!=0) {
            var question_id = '';
            var option_id = $('input[name="option_id"]:checked').val();
            question_id = $('input[name="option_id"]:checked').attr('data-id');
            var test_id = $("#subtest_id").val();
            var test_main_id = $("#test_main_id").val();
            var status = $('.mi-question').attr('id');

            if(startTime) {
            var time = (new Date().getTime() - startTime);
            } else {
              startTime = new Date().getTime();
              var time = $("#current_time").val();
            }
            var action = "submit";
            
            $.ajax({
                  url: base_url+"assess/answers",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'question_id':question_id,'test_id':test_id,'option_id':option_id,'test_main_id':test_main_id,'status':status,'time':time},
                  success: function (response) {
                    var json = $.parseJSON(response);
                    if(json.status=="1"){
                      location.href=base_url+'assess/mytest';
                    }
                    else if(json.status=="3"){
                      location.href=base_url+'assess/mytest';
                    }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          

          /*LeadSquared*/

          $.ajax({
                    url: base_url+"assess/leadsquared",
                    type: "post",
                    data: {'csrf_mindler_token':csrfValue,'action':'submit','testmainId':test_main_id,subtestId:test_id},
                    success: function (response) {
                       
                     },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
              });

          }
      }); 
    


    /*User activity */

    /*Rank update */
      $(document).on('click', "#Button5", function () {
         
          var data = $('#rankform').serialize();
          var element = $('#rankform #career_id').length; 
          if(data && (element==5 || element==6)){
            $("#blue-scheme .mindler-loader").css("display", "flex");
            $.ajax({
                    url: base_url+"assess/rank_update",
                    type: "post",
                    data: {'csrf_mindler_token':csrfValue,'data':data},
                    success: function (response) {
                      $("#blue-scheme .mindler-loader").css("display", "none");
                      if(response==2){
                          $.ajax({
                              url: base_url+"assess/leadsquared",
                              type: "post",
                              data: {'csrf_mindler_token':csrfValue,'action':'activityStarted'},
                              success: function (data) {
                                 
                               },
                              error: function(jqXHR, textStatus, errorThrown) {
                                 console.log(textStatus, errorThrown);
                              }
                        });
                           window.location.href=base_url+'assess/workstyle';
                         }
                        else if(response==1){
                           window.location.href=base_url+'assess/generics';
                         }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
              });
          }
    }); 

    /*Work style questions*/
    $(document).on("click","#testid", function(e){
      if($('input[name="switch"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var career_id = $("#question_id").attr("data-id");
          var option_id= $('input[name="switch"]:checked').val();
          var action = "get_question";
          var btn = $(this).val();
          if(btn=='Submit'){
             $("#blue-scheme .mindler-loader").css("display", "flex");
          }
          
          e.stopImmediatePropagation();
            $.ajax({
                  url: base_url+"assess/wq",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'question_id':question_id,career_id:career_id,option_value:option_id},
                  success: function (response) {
                        $("#blue-scheme .mindler-loader").css("display", "none");
                        var json = $.parseJSON(response);
                         if(json.end=="2"){
                           location.href=base_url+'assess/generics';
                         }
                        else if(json.end=="1"){
                           location.href=base_url+'assess/motivators';
                         }
                         else if(json.status==0){
                           $("#testid").val('Next');
                         }
                         else if(json.status==1){
                           $("#testid").val('Submit');
                         }

                        if(json.question!=''){
                         var count = 25;
                         var count1 = json.workStylenxt;
                         var w = (count-count1)*4;
                         if(count1>0){
                          $(".progress-bar").css('width', ''+w+'%');
                          $("#question_id").val(json.id);
                          $("#question_id").attr('data-id',json.career_id);
                          $("#questions > h5").empty();
                          $("#questions > h5").append(json.question);
                          $("#testid").parents("#questions").find(".radio input[name=switch]").attr('checked', false);
                          $("#testid").parents("#questions").find(".radio .iradio_square-blue").removeClass("checked");
                        }
                    }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
    });
    

    /*generics question*/

    $(document).on("click","#gnrics", function(e){
       
       if($('input[name="button-group"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var category = $("#question_id").attr("data-id");
          var option_id= $('input[name="button-group"]:checked').val();
          var option =  $('input[name="button-group"]:checked').val();
          var action = "get_question";
          var btn = $(this).val();

          if(btn=='Submit'){
             $("#blue-scheme .mindler-loader").css("display", "flex");
          }
          e.stopImmediatePropagation();
            $.ajax({
                  url: base_url+"assess/generic_answer",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'question_id':question_id,category:category,option_value:option_id,option:option},
                  success: function (response) {
                        $("#blue-scheme .mindler-loader").css("display", "none");
                        var json = $.parseJSON(response);

                        if(json.end=="2" || json.end=="1"){
                            $.ajax({
                                  url: base_url+"assess/leadsquared",
                                  type: "post",
                                  data: {'csrf_mindler_token':csrfValue,'action':'activityStarted'},
                                  success: function (data) {
                                     
                                   },
                                  error: function(jqXHR, textStatus, errorThrown) {
                                     console.log(textStatus, errorThrown);
                                  }
                            });
                        }

                        if(json.end=="2"){
                           location.href=base_url+'assess/motivators';
                         }
                         else if(json.end=="1"){
                           location.href=base_url+'assess/motivators';
                         }
                        else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt='Submit';
                         }
                         if(json.question!=''){

                         var count = 24;
                         var count1 = json.generic_lenxt;
                         var w = (count-count1)*4;
                         if(count1>0){
                           
                           if(json.question!=''){
                            $("#gnrics-questions").empty();
                            $("#gnrics-questions").append('<div class="progress progress-sm"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="0%" style="width: '+w+'%"></div></div><h5>'+json.question+'</h5><input name="question_id" data-id="'+json.category+'" id="question_id" type="hidden" value="'+json.id+'">');
                              
                              $.each(json.options, function(x, y) {
                              $("#gnrics-questions").append('<div class="radio"><label><input type="radio" value="'+y.id+'" class="icheck-blue" name="button-group" >'+y.option+'</label></div>');

                                $('input').iCheck({
                                  checkboxClass: 'iCheck-helper',
                                  radioClass: 'iradio_square-blue'
                                });
                              });
                            
                            $("#gnrics-questions").append('<div class=" margin-top-15" ><input id="gnrics" value="'+nxt+'" class="btn btn-primary next-profile-btn" type="submit">');

                       
                        }
                      }
                    }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
     });

    /*motivators update */

    $(document).on('click', "#mtvtrs", function () {
          
          var data = $('#motivators_form').serialize();
          var element = $('#motivators_form #motivator').length; 
          if(data && element==10){
            $("#blue-scheme .mindler-loader").css("display", "flex");
            $.ajax({
                    url: base_url+"assess/motivators_update",
                    type: "post",
                    data: {'csrf_mindler_token':csrfValue,'data':data},
                    success: function (response) {
                      $("#blue-scheme .mindler-loader").css("display", "none");
                      if(response==2){
                             window.location.href = base_url+'assess/specifics';
                           }
                          else if(response==1){
                             window.location.href =base_url+'assess/specifics';
                           }
                     },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
            });
          }
          
      }); 


      /*specifics question*/

      $(document).on("click","#specifics", function(){
       
       if($('input[name="button-group"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var career_id = $("#question_id").attr("data-id");
          var option_id= $('input[name="button-group"]:checked').val();
          var option =  $('input[name="button-group"]:checked').val();
          var action = "get_question";
          var btn = $(this).val();

          if(btn=='Submit'){
             $("#blue-scheme .mindler-loader").css("display", "flex");
          }
            $.ajax({
                  url: base_url+"assess/specifics_answer",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'question_id':question_id,career_id:career_id,option_value:option_id,option:option},
                  success: function (response) {
                        $("#blue-scheme .mindler-loader").css("display", "none");
                        var json = $.parseJSON(response);
                        if(json.end=="2"){
                           location.href=base_url+'assess/schedule';
                         }
                        else if(json.end=="1"){
                           location.href=base_url+'assess/schedule';
                         }
                        else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt="Submit";
                         }
                          
                         var count = 25;
                         var count1 = json.specificsnxt;
                         var w = (count-count1)*4;
                         if(count1>0){
                            if(json.question!=''){
                              $("#specific-questions").empty();
                              $("#specific-questions").append('<div class="progress progress-sm"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="0%" style="width: '+w+'%"></div></div><h5>'+json.question+'</h5><input name="question_id" data-id="'+json.career_id+'" id="question_id" type="hidden" value="'+json.id+'">');
                                
                                $.each(json.options, function(x, y) {
                                $("#specific-questions").append('<div class="radio"><label><input type="radio" value="'+y.id+'" class="icheck-blue" name="button-group" >'+y.option+'</label></div>');

                                  $('input').iCheck({
                                    checkboxClass: 'iCheck-helper',
                                    radioClass: 'iradio_square-blue'
                                  });
                                });
                              
                                $("#specific-questions").append('<div class="margin-top-15"><input id="specifics" value="' + nxt + '" class="btn btn-primary next-profile-btn" type="submit">');
                            }
                          }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
      });


    /*Stream specific*/

    $(document).on("click","#stream-specifics", function(){
       
       if($('input[name="button-group"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var career_id = $("#question_id").attr("data-id");
          var option_id= $('input[name="button-group"]:checked').val();
          var option =  $('input[name="button-group"]:checked').val();
          var action = "get_question";
          var btn = $(this).val();

          if(btn=='Submit'){
             $("#blue-scheme .mindler-loader").css("display", "flex");
          }
            $.ajax({
                  url: base_url+"assess/stremspecifics_answer",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'action':action,'question_id':question_id,stream_id:career_id,option_value:option_id,option:option},
                  success: function (response) {
                        $("#blue-scheme .mindler-loader").css("display", "none");
                        var json = $.parseJSON(response);
                        if(json.end=="2"){
                           location.href=base_url+'assess/schedule';
                         }
                        else if(json.end=="1"){
                           location.href=base_url+'assess/schedule';
                         }
                        else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt="Submit";
                         }
                          
                         var count = 25;
                         var count1 = json.specificsnxt;
                         var w = (count-count1)*4;
                         if(count1>0){
                            if(json.question!=''){
                              $("#specific-questions").empty();
                              $("#specific-questions").append('<div class="progress progress-sm"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="0%" style="width: '+w+'%"></div></div><h5>'+json.question+'</h5><input name="question_id" data-id="'+json.stream_id+'" id="question_id" type="hidden" value="'+json.id+'">');
                                
                                $.each(json.options, function(x, y) {
                                $("#specific-questions").append('<div class="radio"><label><input type="radio" value="'+y.id+'" class="icheck-blue" name="button-group" >'+y.option+'</label></div>');

                                  $('input').iCheck({
                                    checkboxClass: 'iCheck-helper',
                                    radioClass: 'iradio_square-blue'
                                  });
                                });
                              
                                $("#specific-questions").append('<div class="margin-top-15" ><input id="stream-specifics" value="' + nxt + '" class="btn btn-primary next-profile-btn" type="submit">');
                            }
                          }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
      });


   /* typical day*/

   $("#submitschedule").click(function(){ 
          //$('input:hidden[value="0"]', '#schedule').removeAttr('value');
          var data = $('#schedule').serialize();
          //console.log(data); return false;
          $("#blue-scheme .mindler-loader").css("display", "flex");
          $.ajax({
                  url: base_url+"assess/updateschedule",
                  type: "post",
                  data: {'csrf_mindler_token':csrfValue,'data':data},
                  success: function (response) {
                    $("#blue-scheme .mindler-loader").css("display", "none");
                    if(response==2 || response==1){
                          $.ajax({
                                url: base_url+"assess/leadsquared",
                                type: "post",
                                data: {'csrf_mindler_token':csrfValue,'action':'activityCompleted'},
                                success: function (data) {

                                 },
                                error: function(jqXHR, textStatus, errorThrown) {
                                   console.log(textStatus, errorThrown);
                                }
                          });
                    }
                    if(response==2){
                           window.location.href=base_url+'assess/testslot';
                    }
                    else if(response==1){
                       window.location.href=base_url+'assess/testslot';
                    }else{
                      $("#schedule_error").show();
                    }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          
    });

   /*my action plan*/

   $(document).on('ifChanged','.checkbox-wrapper input[type="checkbox"]', function (event) { 
       var $lis = $('.project-files > li').hide();
       //For each one checked
       $('input:checked').each(function()
       {
         $lis.filter('.' + $(this).attr('rel')).show();
       });      
    }).find('input:checkbox').change();

   /*End of action plan*/


   /*footer newsletter subscription*/
   $('.subscription-box #newsletter-button').click(function() { 

        remove_validation('.new-top-header .start-free a');
        remove_validation(".mobile-signup-section button");
        remove_validation(".desktop-signup-section button");
        remove_validation('.mobile-fixed-header-menu .menu-sign-up a');
        remove_validation("#startNow"); // remove it
        remove_validation("#signUpByEmail"); // remove it
        $('#h-email').val(' ');
        $(".mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $(".desktop-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#mobile-signup-section button").closest("div.content").find("input[type='email']").val(' ');
        $("#h2-email").val(' ');
        $("#signUpByEmail").val(' ');

        var email = $(".subscription-box .newsletter-value").val(); 
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (email.length == 0) {
           $(this).next(".validation").remove(); // remove it
           $(this).after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter email address</div>');
           $('.subscription-box .newsletter-value').focus();
        }
        else if (!filter.test(email)) {
            $(this).next(".validation").remove(); // remove it
            $(this).after('<div class="validation" style="color:red;text-align: left;font-size: 12px;">Please enter valid email address</div>');
            $('.subscription-box .newsletter-value').focus();
        }
        else{
          $(this).next(".validation").remove(); // remove it
          $("div.overlay-box").css("display", "block");
          $.ajax({
              url: base_url+'login/newsletter',
              type: "post",
              data: {'csrf_mindler_token':csrfValue,'email':email},
              success: function (response) {
              $("div.overlay-box").css("display", "none");
                if(response==1){
                 // alert("Thanks for your interest will get back to you soon!");
                 $(this).next(".validation").remove(); // remove it
                 $(".subscription-box .newsletter-value").val(' ');
                 $('.subscription-box #newsletter-button').after('<div class="validation" style="color:green;text-align: left;font-size: 12px;">Thanks for subscribing!</div>');
                }
              }
          });
      }
  });


  function remove_validation(arg){
      //console.log(arg); return false;
      $(""+arg+"").next(".validation").remove(); // remove it
      $(""+arg+"").closest("div.content").find("input[type='email']").next(".validation-mobile").remove(); // remove it
      $(""+arg+"").next(".validation-mobile").remove(); // remove it
      return true;
  }



 });

      