$( document ).ready(function() {
    
  /*Start code for assess section*/
     var base_url = window.location.origin + '/';
    /*Stream choice*/
    $("#check_test").hide();
    $("#assessmenu").click(function(){
       $("#check_test").hide();
     });

    $(".row #choice").click(function(){ 
       
      var choice = $(this).attr("data-value");
      $("#stream .subtitle").hide();

      $.ajax({
            url: base_url+"assess/choice",
            type: "post",
            data: {'choice':choice},
            success: function (response) {
              var json = $.parseJSON(response);
              $("#rows").empty();
              $("#stream").show();

             
              $.each(json, function(i, row) {
                 var fa = '';
                 var style = '';
                 var cls = '';
                 var colmd = '';
                if(json[i].package_id=="2"){
                  colmd = 'col-md-5ths';
                }
                  


                 if(json[i].cStatus=="1"){
                   fa = '<i class="fa fa-check"></i>';
                   style = 'style="color:green"';
                   cls = "not-active disabled";
                 }
                 else if(json[i].cStatus!="1" && json[i].lockUnlock!="1"){
                       fa = '<i class="fa fa-lock"></i>';
                        style = 'style="color:red"';
                        cls = "not-active disabled";
                  }
                else{
                  fa = '<span style="color:#fff;">START</span>  <i class="fa fa-arrow-circle-right" style="color:#fff"></i>';
                 }
                
                $("#rows").append('<div class="col-md-3 '+colmd+'"><div class="panel panel-default tile"><div class="panel-heading"><h3 style="color:#fff;font-size:1.3em;font-weight:bold;">'+json[i].name+'</h3></div><div class="panel-body"><big> <i class="fa fa-clock-o"></i> '+json[i].recommended_time+' Minutes</big></div><div class="panel-footer"><a '+style+' href="#aptitude" id="'+json[i].id+'" class="btn-secondary btn-lg btn-block '+cls+'">'+fa+'</a></div></div></div></div>');
               });
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
         });
      });
      

    /*get subtest by maintest id*/
        var $tournament = $('#subtest');
        var $maintestid = $('#maintestid');
        /*if(localStorage.getItem("#subtest")) {
          $tournament.html(localStorage.getItem("#subtest"));
        }*/

        if(localStorage.getItem("#maintestid")) {
          $maintestid.val(localStorage.getItem("#maintestid"));
        }

        $('#rows').delegate('a','click',function() {
          
              var id = $(this).attr("id");
              $('#maintestid').removeAttr('value');
              $('#maintestid').val($('#maintestid').val() + id);
              localStorage.setItem("#maintestid", $maintestid.val());

              $.ajax({
                     url: base_url+"assess/subtest",
                     type: "post",
                     data: {'id':id},
                     success: function (response) {
                       var json = $.parseJSON(response);
                       
                       $("#subtest").empty();
                       $.each(json, function(i, row) {

                          var fa = '';
                           var style = '';
                           var cls = '';
                           if(row.status=="0" && row.a==1){
                             fa = '<i class="fa fa-lock"></i>';
                             style = 'style="color:red"';
                             cls = "not-active disabled";
                           }
                          else if(row.status=="1" && row.a==1){
                             fa = '<i class="fa fa-check"></i>';
                             style = 'style="color:green"';
                             cls = "not-active disabled";
                           }else{
                            fa = '<span style="color:#fff;">START</span>  <i class="fa fa-arrow-circle-right" style="color:#fff"></i>';
                           }
                          $("#subtest").append('<div class="col-md-3"><div class="panel panel-default tile"><div class="panel-heading"></div><div class="panel-body"><center><big><i class="fa '+row.font+' fa-2x"></i><br>'+json[i].subtest_name+'</big></center></div><div class="panel-footer"><a  class="btn btn-alt btn-md btn-block '+cls+'" '+style+' href="'+base_url+'assess/testinstruction/'+json[i].id+'" > '+fa+'</a></div></div></div>');
                        });
                        localStorage.setItem("#subtest", $tournament.html());
                      },
                     error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                     }
                  });
              });
      
        ////append maintest id on url
        $('#subtest').delegate('a','click',function() {
            var _href = $(this).attr("href"); 
            var maintestid = $('#maintestid').val();
            $(this).attr("href", _href + '/'+maintestid);
          });


        $(document).on("click",".option_new", function(){
          var $this = $(this).find("input:radio");
          $this.prop("checked", true);
          var count_q = $('#questions .question').attr('data-id');
          var status = $('#questions .question').attr('id');
          if(status==0 || count_q==1){ 
            $("#next").addClass("disabled");
            $("#submit").removeClass("disabled");
          }else{
            $("#next").removeClass("disabled");
            $("#submit").addClass("disabled");
          }
        });

        $('#questions .question ol li').on("click", function(){
          var $this = $(this).find("input:radio");
          $this.prop("checked", true);
          var status = $('#questions .question').attr('id');
          if(status==0){ 
            $("#next").addClass("disabled");
            $("#submit").removeClass("disabled");
          }else{
            $("#next").removeClass("disabled");
            $("#submit").addClass("disabled");
          }
        });

      //Insert answer of stream
      var startTime;
      $(document).on("click",".option_new", function(){
        $('#back').removeAttr("disabled");
        $( "#back" ).removeClass("wide disabled").addClass("wide");
        
        if(startTime) {
           var time = (new Date().getTime() - startTime);
          //startTime = undefined;
        } else {
          startTime = new Date().getTime();
          var time = 0;
        }

        var str = $("#submit").attr('class');
        var question_per_page = $("#questions").attr('class');
        var action = "next";
        var res = str.split(" "); 
        var test_id = $("#subtest_id").val();
        var test_main_id = $("#test_main_id").val();
        var limit = $(".questions").attr("id");
        var count_q = $('#questions .question').attr('data-id');

        if($('input[name="option_id"]:checked').length!=0 && res[1]=='disabled' && count_q!=1) {
        	var question_id = '';
            var option_id = $('input[name="option_id"]:checked').val();
            question_id = $('input[name="option_id"]:checked').attr('data-id');
            var test_id = $("#subtest_id").val();
            var test_main_id = $("#test_main_id").val();
            var status = $('#questions .question').attr('id');
            var action = "next";
            $.ajax({
                  url: base_url+"assess/answers",
                  type: "post",
                  data: {'action':action,'question_id':question_id,'test_id':test_id,'option_id':option_id,'test_main_id':test_main_id,'status':status,'time':time},
                  success: function (response) {
                      var json = $.parseJSON(response);
                      $("#questions").empty();
                       if(json.status=="1"){
                          location.href = base_url+'assess';
                        }
                        else if(json.status!="1"){
                        var pro = json[0].progress;
                        $("#testprogress").css('width', ''+pro+'%');

                        $.each(json, function(i, row) {
                          var qimg = '';
                          var oimg ='';
                          if(json[i].question_image!=''){
                           qimg = '<img class="mobqtimage" src="'+base_url+'uploads/question_images/'+json[i].question_image+'">';
                          }

                          $("#questions").append('<ul id="progress"></ul><div data-id="'+json[i].count_q+'" class="question" id="'+json[i].nxt_qstn+'"><div class="row"><div class="col-xs-12"><div class="content">'+json[i].question+'<br>'+qimg+'</div></div><div class="col-xs-12"><br><ol>');
                           
                           $.each(json[i].options, function(x, y) { 
                            if(json[i].options[x].option_image!=''){
                              oimg = '<img class="mobotimage" src="'+base_url+'uploads/option_images/'+json[i].options[x].option_image+'">';
                            }
                            $("#questions .question .row ol").append('<li class="option_new"><input id="option_id" name="option_id" data-id="'+json[i].id+'" value="'+json[i].options[x].option_id+'" type="radio"><label><span>one</span></label>'+oimg+json[i].options[x].option+'</li>');
                           });
                          
                          $("#questions").append('</ol></div></div></div>');
                        });
                      }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         }
           
      });

      
      $("#back").click(function(){ 
        var str = $("#submit").attr('class');
        $("#back").attr("disabled", true);
        $( "#back" ).removeClass( "wide" ).addClass( "wide disabled" );
        var question_per_page = $("#questions").attr('class');
        var action = "next";
        var res = str.split(" "); 
        var test_id = $("#subtest_id").val();
        var test_main_id = $("#test_main_id").val();
        var limit = $(".questions").attr("id");
        if(startTime) {
           var time = (new Date().getTime() - startTime);
          //startTime = undefined;
        } else {
          startTime = new Date().getTime();
          var time = 0;
        }
        //if($('input[name="option_id"]:checked').length!=0 && res[1]=='disabled') {
            
            var question_id = '';
            var option_id = $('input[name="option_id"]:checked').val();
            question_id = $('input[name="option_id"]:checked').attr('data-id');
            var status = $('#questions .question').attr('id');
            var action = "back";
            $.ajax({
                  url: base_url+"assess/backquestion",
                  type: "post",
                  data: {'action':action,'question_id':question_id,'test_id':test_id,'option_id':option_id,'test_main_id':test_main_id,'status':status,'time':time},
                  success: function (response) {
                      var json = $.parseJSON(response);
                      $("#questions").empty();
                       if(json.status=="1"){
                          location.href = base_url+'assess';
                        }
                        else if(json.status!="1"){
                        $.each(json, function(i, row) {
                          var qimg = '';
                          var oimg ='';
                          if(json[i].question_image!=''){
                           qimg = '<img class="mobqtimage" src="'+base_url+'uploads/question_images/'+json[i].question_image+'">';
                          }

                          $("#questions").append('<ul id="progress"></ul><div class="question" id="'+json[i].nxt_qstn+'"><div class="row"><div class="col-xs-12"><div class="content">'+json[i].question+'<br>'+qimg+'</div></div><div class="col-xs-12"><br><ol>');
                           
                           $.each(json[i].options, function(x, y) { 
                            if(json[i].options[x].option_image!=''){
                              oimg = '<img class="mobotimage" src="'+base_url+'uploads/option_images/'+json[i].options[x].option_image+'">';
                            }
                            $("#questions .question .row ol").append('<li class="option_new"><input id="option_id" name="option_id" data-id="'+json[i].id+'" value="'+json[i].options[x].option_id+'" type="radio"><label><span>one</span></label>'+oimg+json[i].options[x].option+'</li>');
                           });
                          
                          $("#questions").append('</ol></div></div></div>');
                        });
                      }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         //}
           
      });   
      
      ///insert last record while click on submit button
      $("#submit").click(function(){ 
          var str = $("#submit").attr('class');
          var res = str.split(" ");
          if($('input[name="option_id"]:checked').length!=0 && res[1]!='disabled') {
            $( "#submit" ).removeClass("wide").addClass("wide disabled");
            $("#questions .question:last-child").after("<div class='row' style='color:#00ccff; text-align:center; font-weight:bold'> Please Wait for 2 to 5 minutes while your results are generated</div>");
            var question_id = '';
            var option_id = $('input[name="option_id"]:checked').val();
            question_id = $('input[name="option_id"]:checked').attr('data-id');
            var test_id = $("#subtest_id").val();
            var test_main_id = $("#test_main_id").val();
            var time = 0;
            var action = "submit";
            var status = $('#questions .question').attr('id');
            $.ajax({
                  url: base_url+"assess/answers",
                  type: "post",
                  data: {'action':action,'question_id':question_id,'test_id':test_id,'option_id':option_id,'test_main_id':test_main_id,'status':status,'time':time},
                  success: function (response) {
                    var json = $.parseJSON(response);
                    if(json.status=="1"){
                      $("#stream").show();
                      location.href=base_url+'assess#stream';
                    }
                    else if(json.status=="3"){
                      location.href=base_url+'assess/report#report1';
                    }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          }
      });  
  
  /*End code of assess section*/

  /*Work style questions*/

  
   $(document).on("click","#testid", function(e){
       
       if($('input[name="button-group"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var career_id = $("#question_id").attr("data-id");
          var option_id= $('input[name="button-group"]:checked').val();
          var action = "get_question";
          e.stopImmediatePropagation();
            $.ajax({
                  url: base_url+"assess/wq",
                  type: "post",
                  data: {'action':action,'question_id':question_id,career_id:career_id,option_value:option_id},
                  success: function (response) {
                        var json = $.parseJSON(response);
                         if(json.end=="2"){
                           location.href=base_url+'assess/target#counselor';
                         }
                        else if(json.end=="1"){
                           location.href=base_url+'assess/streamactivity#counselor';
                         }
                         else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt="Submit";
                         }

                        if(json.question!=''){

                         var count = 25;
                         var count1 = json.workStylenxt;
                         if(count1>0){
                         $("#progressbar").empty();
                         for (i = 0; i < count; ++i) {
                          if((count-(count1))>i)
                            {
                             $("#progressbar").append('<li class="active"></li>');
                            }
                            else{
                              $("#progressbar").append('<li></li>');
                            }
                         }

                          $("#question").empty();
                          $("#question").append('<fieldset id="questions">');
                          $("#question #questions").append('<h2 class="fs-subtitle">'+json.question+'.</h2><input type="hidden" value="'+json.id+'" data-id="'+json.career_id+'" id="question_id" name="question_id"><div class="btns"><label><input type="radio" value="1" name="button-group"><span style="color:#fff;" class="btn first">Very Unhappy</span></label><label><input type="radio" value="2" name="button-group"><span style="color:#fff;" class="btn">Unhappy</span></label><label><input type="radio" value="3" name="button-group"><span style="color:#fff;" class="btn">Happy</span></label><label><input type="radio" value="4" name="button-group"><span style="color:#fff;" class="btn last">Very Happy</span></label></div><br><input type="button" value="'+nxt+'" class="next action-button" name="next" id="testid">');
                          $("#question").append('<fieldset>');
                        }
                    }else{
                    	$("#question").hide();
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
          e.stopImmediatePropagation();
            $.ajax({
                  url: base_url+"assess/generic_answer",
                  type: "post",
                  data: {'action':action,'question_id':question_id,category:category,option_value:option_id,option:option},
                  success: function (response) {
                        var json = $.parseJSON(response);
                        if(json.end=="2"){
                           location.href=base_url+'assess/target#counselor';
                         }
                         else if(json.end=="1"){
                           location.href=base_url+'assess/streamactivity#counselor';
                         }
                        else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt="Submit";
                         }
                         if(json.question!=''){

                         var count = 24;
                         var count1 = json.generic_lenxt;
                         if(count1>0){
                         $("#progressbar").empty();
                         for (i = 0; i < count; ++i) {
                          if((count-(count1))>i)
                            {
                             $("#progressbar").append('<li class="active"></li>');
                            }
                            else{
                              $("#progressbar").append('<li></li>');
                            }
                         }
                         if(json.question!=''){
                          $("#question").empty();
                          $("#question").append('<fieldset id="questions" style="text-align:left;">');
                          $("#question #questions").append('<h2 class="fs-subtitle" style="text-align:left;">'+json.question+'.</h2><input type="hidden" value="'+json.id+'" data-id="'+json.category+'" id="question_id" name="question_id"><div class="gnric_main">');
                            
                            $.each(json.options, function(x, y) {
                            $("#question #questions .gnric_main").append('<label><input class="chckdinput" type="radio" value="'+y.id+'" name="button-group"><span class="btn first">'+y.option+'</span></label><br>');
                            });
                          
                          $("#question #questions").append('</div><br><input type="button" value="'+nxt+'" class="next action-button" name="next" id="gnrics">');
                          $("#question").append('<fieldset>');
                      }
                        }else{
                        	$("#question").hide();
                        }
                    }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
      });


$(document).on("click",".gnric_main label", function(){  
            //$('input[type=radio').parent().next().removeClass('chckd');
            $(".gnric_main >label>span.chckd").removeClass("chckd");
            $(this).children('span').addClass('chckd');
    });

/*specifics question*/

   $(document).on("click","#specifics", function(){
       
       if($('input[name="button-group"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var career_id = $("#question_id").attr("data-id");
          var option_id= $('input[name="button-group"]:checked').val();
          var option =  $('input[name="button-group"]:checked').val();
          var action = "get_question";

            $.ajax({
                  url: base_url+"assess/specifics_answer",
                  type: "post",
                  data: {'action':action,'question_id':question_id,career_id:career_id,option_value:option_id,option:option},
                  success: function (response) {
                        var json = $.parseJSON(response);
                        if(json.end=="2"){
                           location.href=base_url+'assess/target#counselor';
                         }
                        else if(json.end=="1"){
                           location.href=base_url+'assess/streamactivity#counselor';
                         }
                        else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt="Submit";
                         }
                         if(json.question!=''){
                         var count = 25;
                         var count1 = json.specificsnxt;
                         if(count1>0){
                         $("#progressbar").empty();
                         for (i = 0; i < count; ++i) {
                          if((count-(count1))>i)
                            {
                             $("#progressbar").append('<li class="active"></li>');
                            }
                            else{
                              $("#progressbar").append('<li></li>');
                            }
                         }
   

                        $("#question").empty();
                        $("#question").append('<fieldset id="questions" style="text-align:left;">');
                        $("#question #questions").append('<h2 class="fs-subtitle" style="text-align:left;">'+json.question+'.</h2><input type="hidden" value="'+json.id+'" data-id="'+json.career_id+'" id="question_id" name="question_id"><div class="gnric_main">');
                          
                          $.each(json.options, function(x, y) {
                          $("#question #questions .gnric_main").append('<label><input type="radio" value="'+y.id+'" name="button-group"><span class="btn first">'+y.option+'</span></label><br>');
                          });
                        
                        $("#question #questions").append('</div><br><input type="button" value="'+nxt+'" class="next action-button" name="next" id="specifics">');
                        $("#question").append('<fieldset>');
                    }
                }else{
                	$("#question").empty();
                }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
      });
  


  $(document).on("click","#streamspecifics", function(){
       
       if($('input[name="button-group"]:checked').length!=0) {
          var question_id = $("#question_id").val();
          var stream_id = $("#question_id").attr("data-id");
          var option_id= $('input[name="button-group"]:checked').val();
          var option =  $('input[name="button-group"]:checked').val();
          var action = "get_question";

            $.ajax({
                  url: base_url+"assess/stremspecifics_answer",
                  type: "post",
                  data: {'action':action,'question_id':question_id,stream_id:stream_id,option_value:option_id,option:option},
                  success: function (response) {
                        var json = $.parseJSON(response);
                        
                        if(json.end=="2"){
                           location.href=base_url+'assess/target#counselor';
                         }
                        else if(json.end=="1"){
                           location.href=base_url+'assess/streamactivity#counselor';
                         }
                        else if(json.status==0){
                           var nxt="Next";
                         }
                         else if(json.status==1){
                           var nxt="Submit";
                         }

                         var count = 25;
                         var count1 = json.specificsnxt;
                         if(count1>0){
                         $("#progressbar").empty();
                         for (i = 0; i < count; ++i) {
                          if((count-(count1))>i)
                            {
                             $("#progressbar").append('<li class="active"></li>');
                            }
                            else{
                              $("#progressbar").append('<li></li>');
                            }
                         }

                        $("#question").empty();
                        $("#question").append('<fieldset id="questions" style="text-align:left;">');
                        $("#question #questions").append('<h2 class="fs-subtitle" style="text-align:left;">'+json.question+'.</h2><input type="hidden" value="'+json.id+'" data-id="'+json.stream_id+'" id="question_id" name="question_id"><div class="gnric_main">');
                          
                          $.each(json.options, function(x, y) {
                          $("#question #questions .gnric_main").append('<label><input class="chckdinput" type="radio" value="'+y.id+'" name="button-group"><span class="btn first">'+y.option+'</span></label><br>');
                          });
                        
                        $("#question #questions").append('</div><br><input type="button" value="'+nxt+'" class="next action-button btn btn-success btn-md shift-btn" name="next" id="streamspecifics">');
                        $("#question").append('<fieldset>');
                    }else{
                    	$("#question").hide();
                    }
                    },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
         
           }
      });

   /*Rank update */

    $("#saverank").click(function(){ 
          
          var data = $('form').serialize();
          $.ajax({
                  url: base_url+"assess/rank_update",
                  type: "post",
                  data: {'data':data},
                  success: function (response) {
                     if(response=="2"){
                           location.href=base_url+'assess/target#counselor';
                         }
                        else if(response=="1"){
                           location.href=base_url+'assess/streamactivity#counselor';
                         }
                   },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          
    }); 




     $("#submitschedule").click(function(){ 
          
          var data = $('form').serialize();
          $.ajax({
                  url: base_url+"assess/updateschedule",
                  type: "post",
                  data: {'data':data},
                  success: function (response) {
                     if(response=="2"){
                           location.href=base_url+'assess/thankyou';
                         }
                        else if(response=="1"){
                           location.href=base_url+'assess/thankyou';
                         }
                   },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          
    }); 

    
    $(".row #check_choice").click(function(){ 
          var pck_id = $(this).attr("data-id");
          $("#check_test").attr("data-id", pck_id);
          var action = 'check_package';
          $.ajax({
                  url: base_url+"assess/check_user_package",
                  type: "post",
                  data: {'action':action},
                  success: function (response) {
                    var json = $.parseJSON(response);
                    if(json.status=="1"){
                      location.href = base_url+'assess/completechoice';
                    }
                    else if(json.status=="2"){
                      $('#check_test').show();
                      //$("#stream").hide();
                    }
                    
                   },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          
    }); 

    /*Update incomplete test info table*/ 
    $("#wrap2").hide();
    $("#check_test").click(function(){ 
          
          var action = 'update_test_incompletion_info';
          var package_id = $("#check_test").attr("data-id");
          $("#wrap2").show();
          $("#hidetest").hide();
          if(package_id!=''){
            $.ajax({
                    url: base_url+"assess/update_test_incompletion_info",
                    type: "post",
                    data: {'action':action,package_id:package_id},
                    success: function (response) {
                      var json = $.parseJSON(response);
                      /*if all test completed*/
                      if(json.status==1){
                        $("#wrap2").hide();
                        alert("Your test is completed");
                        $("#check_test").hide();
                        $("#tests").show();
                        var url = base_url+json.redirect;
                        window.location.href = url;
                      }
                      else if(json.status==2){
                        $("#wrap2").hide();
                        alert("It seems your test is incomplete. Please complete your test to get your result");
                        $("#check_test").hide();
                        $("#tests").show();
                        var url = base_url+json.redirect;
                        window.location.href = url;
                        window.location.reload();
                      }
                     },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
              });
          }
          
    });

    


    /*motivators update */

   $("#mtvtrs").click(function(){ 
          
          var data = $('form').serialize();
          $.ajax({
                  url: base_url+"assess/motivators_update",
                  type: "post",
                  data: {'data':data},
                  success: function (response) {
                    if(response=="2"){
                           location.href=base_url+'assess/target#counselor';
                         }
                        else if(response=="1"){
                           location.href=base_url+'assess/streamactivity#counselor';
                         }
                   },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          
      }); 

  /* Code for book slot*/

    $('#iframecontainer').load(function(){
          var iframes = $('#iframecontainer').contents();
           iframes.find(".vi-calender > li").click(function(){  
              var v = iframe.find(this);
              var date = $(v).find("input").val();
              var studentId = 118;
              
              $.ajax({
                    url: base_url+"bookslot/booked_slot",
                    type: "post",
                    data: {'studentId':studentId,'date':date},
                    success: function (response) {
                       var json = $.parseJSON(response);
                       var slot = '';
                        $.each( json, function( key, value ) {
                          slot = value.slot;
                        //travesing all slots
                        iframe.find('.treatment-list').each(function () {
                          var list = $(this).find('li label');
                          //var input = $(this).find('li input');
                          $(list.get().reverse()).each(function () {
                              var currentSlot = $(this).attr("id");
                              var dates = $(this).attr("value");
                              if(currentSlot==slot && date==dates){

                                $(this).css('background-color', '#f00');
                                $(this).css('color', '#fff');
                                //$(input).attr('checked', true);
                              }
                          });
                        })
                      });
                       //window.location = "<?php echo base_url().'tests/questionsPerPage/'?>"+subtest_id+'/'+mainId+'/'+level_id;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
              });
            });
         
          /// booking slot of users
           var iframe = $('#iframecontainer').contents(); 
           iframe.find(".vi-calender > li #bookMyappoint").click(function(){ 
           var v = iframe.find(this);
           var getdate = $(v).find("input").val();  
           var slot = iframe.find(".treatment-item");
           var slotVal = $(slot).find("input[name=select-treatment-2]:checked").attr("id");
           var studentId = 118;
           if(slotVal==undefined){
              alert('Choose your slot time');
              return false;
            }else{
              $.ajax({
                  url: base_url+"bookslot/book",
                  type: "post",
                  data: {'studentId':studentId,'slot':slotVal,'date':getdate},
                  success: function (response) {
                     var json = $.parseJSON(response);
                     //window.location = "<?php echo base_url().'tests/questionsPerPage/'?>"+subtest_id+'/'+mainId+'/'+level_id;
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
            });
          }
        });
    });
/* End of book slot code*/

$("#validateMail").blur(function() { 
          var val = $(this).val();
          var name = $(this).attr("name");
          var id = $(this).attr("id");
          $("#submitFrm").prop("disabled",false);
          
            if(val!=''){
                $.ajax({
                    url: base_url+'login/validate',
                    type: "post",
                    data: {'value':val,'name':name},
                    success: function (response) {
                       var json = $.parseJSON(response);
                       var name = json.name;
                       var msg = json.message;
                       $('.lockscreen-email').empty();
                       
                        if(name=='email'){
                           $('.lockscreen-email').append(msg);
                       
                        $("#submitFrm").prop("disabled",true);
                        $("#validateMail").focus();
                        event.preventDefault();
                        }
                    }
                });
            }
        });

 $("#validatecontact").blur(function() { 
          var val = $(this).val();
          var name = $(this).attr("name");
          var id = $(this).attr("id");
          $("#submitFrm").prop("disabled",false);
          
            if(val!=''){
                $.ajax({
                    url: base_url+'login/validate',
                    type: "post",
                    data: {'value':val,'name':name},
                    success: function (response) {
                       var json = $.parseJSON(response);
                       var name = json.name;
                       var msg = json.message;
                       $('.lockscreen-contact').empty();
                       
                        if(name=='contactNumber'){
                           $('.lockscreen-contact').append(msg);
                       
                        $("#submitFrm").prop("disabled",true);
                        $("#validatecontact").focus();
                        event.preventDefault();
                        }
                    }
                });
            }
        });
        
        $('#confirmpassword').blur(function(event) {
            $('.cPass').empty();
            $("#submitFrm").prop("disabled",false);
            if($('#first_password').val()!='' && $('#confirmpassword').val()!='' && $('#first_password').val() != $('#confirmpassword').val()) {
                $('.cPass').append("Password and Confirm Password don't match");
                // Prevent form submission
                $("#submitFrm").prop("disabled",true);
                event.preventDefault();
            }
        });

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
              data: {'email':email},
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

      $("#vi-calender li").click(function(){
      var date =  $(this).attr("data-value");
      var day =  $(this).attr("data-id");
      var studentId = $("#submitnewphonenum").attr("data-id");
    $.ajax({
            url: base_url+"assess/booked_slot",
            type: "post",
            data: {'date':date,studentId:studentId,day:day},
            crossDomain:true,
            success: function (response) {
              var json = $.parseJSON(response);
              $.each( json, function( key, value ) {
                
                  /*$("#"+value.day +" #"+value.slot).addClass('reserved').removeClass('available');
                  $("#"+value.day +" #"+value.slot+" .tags >li >span").text('Reserved');
                  $("#"+value.day +" #"+value.slot+" .menu").remove();*/
                  $("#"+value.day +" #"+value.slot).hide();
                
              });
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
      });
  });

     /* Code for book slot*/
     $('ul[id^="menu"]').on('click', function() {   
      var date =  $(this).attr("data-value");
      var slotVal =  $(this).closest("div").attr("id");
      var day =  $(this).closest("div").attr("data-id");

      $(".bookedrecord").attr("data-value", date);
      $(".bookedrecord").attr("value", slotVal);
      $(".bookedrecord").attr("id", day);
      $("#otp_phone").show();
      $("#updatephone").show();
      $("#otp_phone > h4").show();
      $("#confirmotp").hide();
      
      
      /*$("#vi-days > div").removeClass('reserved');
      $("#vi-days > div").addClass('available');
      $("#vi-days > div .tags >li >span").text('Available');
      $("#"+slotVal).addClass('reserved').removeClass('available');
      $("#"+slotVal+" .tags >li >span").text('Reserved');
      $("#"+slotVal-1+" .menu >li").show();*/
     

    });
   

   $("#submitnewphonenum").on('click', function() {   
      var phone =  $("#newphonenum").val();
      var studentId = $("#submitnewphonenum").attr("data-id");
      if(phone!=''){
        $.ajax({
              url: base_url+"assess/confirmotp",
              type: "post",
              data: {'phone':phone,studentId:studentId},
              success: function (response) {
                  if(response==1){
                    $("#updatephone").hide();
                    $("#otp_phone > h4").hide();
                    $("#confirmotp").show();
                  }
                 },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
              }
        });
       } 
    });



   $("#otpsubmit").on('click', function() {   
      var otp =  $("#otp").val();
      var date =  $(".bookedrecord").attr("data-value");
      var slotVal =  $(".bookedrecord").val();
      var day =  $(".bookedrecord").attr("id");
      var studentId = $("#submitnewphonenum").attr("data-id");
      if(otp!=''){
         $.ajax({
            url: base_url+"assess/book",
            type: "post",
            data: {'slot':slotVal,'date':date,day:day,otp:otp,studentId:studentId},
            success: function (response) {
               $(".error").empty();
               if(response==1){
                $(".error").append("Sorry! you have entered wrong otp");
               }else{
                $(".error").css("color","green"); 
                $(".error").append("Your slot booked successfully");
                window.location= base_url+"assess/thanksforbooking"
               }
               $("#otp_phone").show();
               },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
       });
       } 
    });

    
    $("#saveaditonal").on('click', function() {   
      var careertext =  $("#careertext").val();
      if(careertext!=''){
        $.ajax({
              url: base_url+"assess/additional_career",
              type: "post",
              data: {'careertext':careertext},
              success: function (response) {
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
              }
        });
       } 
    });



    /* ICCC PAGE FUNCTION*/

    
  
    $(window).scroll(function () {
        $(".masters-details-popup").hide();
          var scrollForm = $(window).scrollTop();
            if (scrollForm >= 95)  {
                $(".iccc-form ").addClass("fixed-class");


            }
            

            else {
                $(".iccc-form").removeClass("fixed-class");
            }

        });

  
    // $(".iccc-form .iccc-form-box .btn-iccc-submit").on('click', function (e) {
    //     e.preventDefault();
        
    //     var name= $('input[name="form-name"]').val();
    //     var email= $('input[name="form-email"]').val();
    //     var mobile= $('input[name="form-mobile"]').val();
    //     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    //     var page = $(".iccc-form .iccc-form-box .btn-iccc-submit").attr("data-page");

    //     var path='';

    //     if(page==='iccc-lucknow'){
    //       path=base_url+"prelogin/icccLucknow";
    //     }else{
    //       path=base_url+"prelogin/iccc"
    //     }
        

    //     $(".validation").remove(); // remove it
    //     if(!name){
    //       $('input[name="form-name"]').after('<div class="validation" style="color:red;font-size:  10px;">Name field can not be blank.</div>');
    //       $('input[name="form-name"]').focus();
    //     }else if(!email){
    //       $('input[name="form-email"]').after('<div class="validation" style="color:red;font-size:  10px;">Email field can not be blank.</div>');
    //       $('input[name="form-email"]').focus();
    //     } else if (!filter.test(email)) {
    //       $('input[name="form-email"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid email address.</div>');
    //       $('input[name="form-email"]').focus();
    //     }
    //     else if(!mobile){
    //       $('input[name="form-mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Mobile number field can not be blank.</div>');
    //       $('input[name="form-mobile"]').focus();
    //     }else if($.isNumeric(mobile)==false || mobile.length<10){
    //       $('input[name="form-mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid mobile number.</div>');
    //       $('input[name="form-mobile"]').focus();
    //     }
    //     else{

    //       $('input[name="name"]').val(name);
    //       $('input[name="email"]').val(email);
    //       $('input[name="mobile"]').val(mobile);
    //       //$('input[name="school"]').val(school);
    //       var registerdata = $('#register-for-the-iccc').serialize();
    //       if (registerdata) {
    //           $.ajax({
    //               url: path,
    //               type: "post",
    //               data: {'data': registerdata },
    //               success: function (response) {
                    
                    
    //               },
    //               error: function (jqXHR, textStatus, errorThrown) {
    //                   console.log(textStatus, errorThrown);
    //               }
    //           });
    //       }

    //       //$(".iccc-bg .before-submit").hide();
    //       //$(".iccc-bg .after-submit").show();
    //       $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-first").hide();
    //       $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-second").show();
    //       $(".icc-tab-box").find(".tab-list .tab-list-first").removeClass("active");
    //       $(".icc-tab-box").find(".tab-list .tab-list-second").addClass("active");

    //       $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-third").hide();
    //       $(".icc-tab-box").find(".tab-list .tab-list-third").removeClass("active");

    //       $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-fourth").hide();
    //       $(".icc-tab-box").find(".tab-list").show();

    //       $(".iccc-final-popup").fadeIn();
    //     }

    // });


    /*iccc dubai*/
     $(".iccc-form .iccc-form-box #register-for-the-iccc-dubai .btn-dubai-iccc-submit").on('click', function (e) {
        e.preventDefault();
        
        var name= $('input[name="form-name"]').val();
        var email= $('input[name="form-email"]').val();
        var mobile= $('input[name="form-mobile"]').val();
        var school= $('input[name="form-school"]').val();
        var designation= $('input[name="form-designation"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var page = $(".iccc-form .iccc-form-box .btn-iccc-submit").attr("data-page");

        var path='';

        /*if(page==='iccc-lucknow'){
          path=base_url+"prelogin/icccLucknow";
        }else{
          path=base_url+"prelogin/iccc"
        }*/
        
        path=base_url+"prelogin/icccDubai";

        $(".validation").remove(); // remove it
        if(!name){
          $('input[name="form-name"]').after('<div class="validation" style="color:red;font-size:  10px;">Name field can not be blank.</div>');
          $('input[name="form-name"]').focus();
        }else if(!email){
          $('input[name="form-email"]').after('<div class="validation" style="color:red;font-size:  10px;">Email field can not be blank.</div>');
          $('input[name="form-email"]').focus();
        } else if (!filter.test(email)) {
          $('input[name="form-email"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid email address.</div>');
          $('input[name="form-email"]').focus();
        }
        else if(!mobile){
          $('input[name="form-mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Mobile number field can not be blank.</div>');
          $('input[name="form-mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<3){
          $('input[name="form-mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid mobile number.</div>');
          $('input[name="form-mobile"]').focus();
        }else if(!school){
          $('input[name="form-school"]').after('<div class="validation" style="color:red;font-size:  10px;">School field can not be blank.</div>');
          $('input[name="form-school"]').focus();
        } else if (!designation) {
          $('input[name="form-designation"]').after('<div class="validation" style="color:red;font-size:  10px;">Designation field can not be blank.</div>');
          $('input[name="form-designation"]').focus();
        }
        else{

          $('input[name="name"]').val(name);
          $('input[name="email"]').val(email);
          $('input[name="mobile"]').val(mobile);
          $('input[name="organisation"]').val(school);
          $('input[name="designation"]').val(designation);
          var registerdata = $('#register-for-the-iccc-dubai').serialize();
          if (registerdata) {
              $.ajax({
                  url: path,
                  type: "post",
                  data: {'data': registerdata },
                  success: function (response) {
                    
                    
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }

          $(".iccc-bg .before-submit").hide();
          $(".iccc-bg .after-submit").show();
          /*$(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-first").hide();
          $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-second").show();
          $(".icc-tab-box").find(".tab-list .tab-list-first").removeClass("active");
          $(".icc-tab-box").find(".tab-list .tab-list-second").addClass("active");

          $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-third").hide();
          $(".icc-tab-box").find(".tab-list .tab-list-third").removeClass("active");

          $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-fourth").hide();
          $(".icc-tab-box").find(".tab-list").show();

          $(".iccc-final-popup").fadeIn();*/
        }

    });

  
    $(".iccc-final-popup .icc-tab-box #iccc-dubai-application-form .mobile-btn-iccc-dubai").on('click', function (e) {
        e.preventDefault();

        var name= $('#iccc-dubai-application-form input[name="name"]').val();
        var email= $('#iccc-dubai-application-form input[name="email"]').val();
        var mobile= $('#iccc-dubai-application-form input[name="mobile"]').val();
        var school= $('input[name="school"]').val();
        var designation= $('input[name="designation"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        console.log(name);

        var page = $(".btn-submit").attr("data-page");
        
        var path='';

        /*if(page==='iccc-lucknow'){
          path=base_url+"prelogin/icccLucknow";
        }else{
          path=base_url+"prelogin/iccc"
        }*/
        
        path=base_url+"prelogin/icccDubai";

        $(".validation").remove(); // remove it
        if(!name){
          $('#iccc-dubai-application-form input[name="name"]').after('<div class="validation" style="color:red;font-size:  10px;">Name field can not be blank.</div>');
          $('#iccc-dubai-application-form input[name="name"]').focus();
        }else if(!email){
          $('#iccc-dubai-application-form input[name="email"]').after('<div class="validation" style="color:red;font-size:  10px;">Email field can not be blank.</div>');
          $('#iccc-dubai-application-form input[name="email"]').focus();
        } else if (!filter.test(email)) {
          $('#iccc-dubai-application-form input[name="email"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid email address.</div>');
          $('#iccc-dubai-application-form input[name="email"]').focus();
        }
        else if(!mobile){
          $('#iccc-dubai-application-form input[name="mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Mobile number field can not be blank.</div>');
          $('#iccc-dubai-application-form input[name="mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<3){
          $('#iccc-dubai-application-form input[name="mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid mobile number.</div>');
          $('input[name="mobile"]').focus();
        }else if(!school){
          $('#iccc-dubai-application-form input[name="school"]').after('<div class="validation" style="color:red;font-size:  10px;">School field can not be blank.</div>');
          $('input[name="school"]').focus();
        } else if (!designation) {
          $('#iccc-dubai-application-form input[name="designation"]').after('<div class="validation" style="color:red;font-size:  10px;">Designation field can not be blank.</div>');
          $('input[name="designation"]').focus();
        }else{
          $('#iccc-dubai-application-form input[name="name"]').attr('name','form-name');
          $('#iccc-dubai-application-form input[name="email"]').attr('name','form-email');
          $('#iccc-dubai-application-form input[name="mobile"]').attr('name','form-mobile');
          $('#iccc-dubai-application-form input[name="school"]').attr('name','form-school');
          $('#iccc-dubai-application-form input[name="designation"]').attr('name','form-designation');
          var data = $('#iccc-dubai-application-form').serialize();
          if (data && name.length>0 && email) {
              $.ajax({
                  url: path,
                  type: "post",
                  data: {'data': data },
                  success: function (response) {
                      var json = $.parseJSON(response);
                       if(json.status=="1"){
                         $(this).parents(".my-tab-function").find("ul #education-tab").click();
                          !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                          n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                          n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                          t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                          document,'script','https://connect.facebook.net/en_US/fbevents.js');
                          fbq('init', '263133604031761', {
                          });
                          fbq('track', 'Lead');


                          /*LinkedIn Code*/
                            _linkedin_partner_id = "236866";
                            window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
                            window._linkedin_data_partner_ids.push(_linkedin_partner_id);
                            (function(){var s = document.getElementsByTagName("script")[0];
                            var b = document.createElement("script");
                            b.type = "text/javascript";b.async = true;
                            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                            s.parentNode.insertBefore(b, s);})();

                          /*End Linkedin Code*/

                          /*Quora tracking code*/
                             !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                              qp('init', '988fc98327ae4c43a375230f3c92a57f');
                              qp('track', 'GenerateLead');
                       }
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }

          //$(this).parents(".tab-details").find("#iccc-dubai-application-form").hide();
          //$(this).parents(".tab-details").find(".tab-details-box.tab-details-fourth").show();
           $('input[name="form-name"]').val(name);
           $('input[name="form-email"]').val(email);
           $('input[name="form-mobile"]').val(mobile);
           $('input[name="form-school"]').val(school);
           $('input[name="form-designation"]').val(designation);
           $(".iccc-final-popup .icc-tab-box .tab-details-first-dubai").hide();
           $(".iccc-final-popup .icc-tab-box .tab-details-fourth").show();

          /*$(this).parents(".tab-details").find(".tab-details-box.tab-details-first").hide();
          $(this).parents(".tab-details").find(".tab-details-box.tab-details-second").show();
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-first").removeClass("active");
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").addClass("active");*/
        }
    });

    $(".iccc-form .iccc-form-box .btn-iccc-submit").on('click', function (e) {
        e.preventDefault();
        
        var name= $('input[name="form-name"]').val();
        var email= $('input[name="form-email"]').val();
        var mobile= $('input[name="form-mobile"]').val();
        var school= $('input[name="form-school"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

        $(".validation").remove(); // remove it
        if(!name){
          $('input[name="form-name"]').after('<div class="validation" style="color:red;font-size:  10px;">Name field can not be blank.</div>');
          $('input[name="form-name"]').focus();
        }else if(!email){
          $('input[name="form-email"]').after('<div class="validation" style="color:red;font-size:  10px;">Email field can not be blank.</div>');
          $('input[name="form-email"]').focus();
        } else if (!filter.test(email)) {
          $('input[name="form-email"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid email address.</div>');
          $('input[name="form-email"]').focus();
        }
        else if(!mobile){
          $('input[name="form-mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Mobile number field can not be blank.</div>');
          $('input[name="form-mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $('input[name="form-mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid mobile number.</div>');
          $('input[name="form-mobile"]').focus();
        }else if(!school){
          $('input[name="form-school"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter school or organization name.</div>');
          $('input[name="form-school"]').focus();
        }
        else{

          $('input[name="name"]').val(name);
          $('input[name="email"]').val(email);
          $('input[name="mobile"]').val(mobile);
          $('input[name="school"]').val(school);
          var registerdata = $('#register-for-the-iccc').serialize();
          if (registerdata) {
              $.ajax({
                  url: base_url+"prelogin/iccc_old",
                  type: "post",
                  data: {'data': registerdata },
                  success: function (response) {

                    
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }

          $(".iccc-bg .before-submit").hide();
          $(".iccc-bg .after-submit").show();
          
        }

    });


    $(" .icc-mobile-btn a").on('click', function (e) {
        e.preventDefault();
        $("body").addClass("body-fixed");

        $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-first").show();
        $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-first-dubai").show();
        $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-second").hide();
        $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-fourth").hide();
        $(".icc-tab-box").find(".tab-list").show();
        $(".icc-tab-box").find(".tab-list .tab-list-first").addClass("active");
        $(".icc-tab-box").find(".tab-list .tab-list-second").removeClass("active");
        $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-third").hide();
        $(".icc-tab-box").find(".tab-list .tab-list-third").removeClass("active");

        $(".iccc-final-popup .tab-details #iccc-application-form").show();

        $(".icc-mobile-btn").fadeOut();
        $(".iccc-final-popup").fadeIn();
        $('.icc-first-input').focus();

    });

   




    $('.new-top-header .new-header-2 .fa.fa-bars').on("click", function (e) {


        $(".mobile-fixed-header-menu").addClass("push-left");
        $("body").addClass("push-left");
        $(".new-overlay").show();
    });
    $('.mobile-fixed-header-menu .ion-android-close').on("click", function (e) {

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


    $(".accordion .accordion-section h6").on('click', function (e) {
        e.preventDefault();

        $(this).toggleClass("active");
        $(this).parents(".accordion-section").find(".accordion-content").slideToggle();
        $(this).parents(".accordion-section").closest('.accordion-section').siblings().find(".accordion-content").slideUp();
        $(this).parents(".accordion-section").closest('.accordion-section').siblings().find("h6").removeClass("active");
    });


    $(".iccc-section-box.program-over-view ul.content li strong").on('click', function (e) {
        e.preventDefault();

        $(this).parents("li").toggleClass("active");
        $(this).parents("li").find("p").slideToggle();
        $(this).parents("li").closest('li').siblings().find("p").slideUp();
       $(this).parents("li").closest('li').siblings().removeClass("active");
    });


   $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-first .btn.btn-next").on('click', function (e) {
        e.preventDefault();

        var name= $('#iccc-application-form input[name="name"]').val();
        var email= $('#iccc-application-form input[name="email"]').val();
        var mobile= $('#iccc-application-form input[name="mobile"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        console.log(name);

        var page = $(".btn-submit").attr("data-page");
        
        var path='';

        if(page==='iccc-lucknow'){
          path=base_url+"prelogin/icccLucknow";
        }else{
          path=base_url+"prelogin/iccc_old"
        }

        $(".validation").remove(); // remove it
        if(!name){
          $('#iccc-application-form input[name="name"]').after('<div class="validation" style="color:red;font-size:  10px;">Name field can not be blank.</div>');
          $('#iccc-application-form input[name="name"]').focus();
        }else if(!email){
          $('#iccc-application-form input[name="email"]').after('<div class="validation" style="color:red;font-size:  10px;">Email field can not be blank.</div>');
          $('#iccc-application-form input[name="email"]').focus();
        } else if (!filter.test(email)) {
          $('#iccc-application-form input[name="email"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid email address.</div>');
          $('#iccc-application-form input[name="email"]').focus();
        }
        else if(!mobile){
          $('#iccc-application-form input[name="mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Mobile number field can not be blank.</div>');
          $('#iccc-application-form input[name="mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $('#iccc-application-form input[name="mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid mobile number.</div>');
          $('input[name="mobile"]').focus();
        }else{
          $('#iccc-application-form input[name="name"]').attr('name','form-name');
          $('#iccc-application-form input[name="email"]').attr('name','form-email');
          $('#iccc-application-form input[name="mobile"]').attr('name','form-mobile');
          var data = $('#iccc-application-form').serialize();
          if (data && name.length>0 && email) {
              $.ajax({
                  url: path,
                  type: "post",
                  data: {'data': data },
                  success: function (response) {
                      var json = $.parseJSON(response);
                       if(json.status=="1"){
                         $(this).parents(".my-tab-function").find("ul #education-tab").click();
                          !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                          n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                          n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                          t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                          document,'script','https://connect.facebook.net/en_US/fbevents.js');
                          fbq('init', '263133604031761', {
                          });
                          fbq('track', 'Lead');


                          /*LinkedIn Code*/
                            _linkedin_partner_id = "236866";
                            window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
                            window._linkedin_data_partner_ids.push(_linkedin_partner_id);
                            (function(){var s = document.getElementsByTagName("script")[0];
                            var b = document.createElement("script");
                            b.type = "text/javascript";b.async = true;
                            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                            s.parentNode.insertBefore(b, s);})();

                          /*End Linkedin Code*/
                          /*Quora tracking code*/
                             !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                              qp('init', '988fc98327ae4c43a375230f3c92a57f');
                              qp('track', 'GenerateLead');
                       }

                       

                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }

          $(this).parents(".tab-details").find("#iccc-application-form").hide();
          $(this).parents(".tab-details").find(".tab-details-box.tab-details-fourth").show();
          //  $('input[name="form-name"]').val(name);
          //  $('input[name="form-email"]').val(email);
          //  $('input[name="form-mobile"]').val(mobile);

          // $(this).parents(".tab-details").find(".tab-details-box.tab-details-first").hide();
          // $(this).parents(".tab-details").find(".tab-details-box.tab-details-second").show();
          // $(this).parents(".icc-tab-box").find(".tab-list .tab-list-first").removeClass("active");
          // $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").addClass("active");
        }
    });

    /*$(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-first .btn.btn-next").on('click', function (e) {
        e.preventDefault();

        var name= $('#iccc-application-form input[name="name"]').val();
        var email= $('#iccc-application-form input[name="email"]').val();
        var mobile= $('#iccc-application-form input[name="mobile"]').val();
        var school= $('#iccc-application-form input[name="organisation"]').val();
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

        $(".validation").remove(); // remove it
        if(!name){
          $('#iccc-application-form input[name="name"]').after('<div class="validation" style="color:red;font-size:  10px;">Name field can not be blank.</div>');
          $('#iccc-application-form input[name="name"]').focus();
        }else if(!email){
          $('#iccc-application-form input[name="email"]').after('<div class="validation" style="color:red;font-size:  10px;">Email field can not be blank.</div>');
          $('#iccc-application-form input[name="email"]').focus();
        } else if (!filter.test(email)) {
          $('#iccc-application-form input[name="email"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid email address.</div>');
          $('#iccc-application-form input[name="email"]').focus();
        }
        else if(!mobile){
          $('#iccc-application-form input[name="mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Mobile number field can not be blank.</div>');
          $('#iccc-application-form input[name="mobile"]').focus();
        }else if($.isNumeric(mobile)==false || mobile.length<10){
          $('#iccc-application-form input[name="mobile"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid mobile number.</div>');
          $('input[name="mobile"]').focus();
        }else if(!school){
          $('#iccc-application-form input[name="organisation"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter school or organization name.</div>');
          $('#iccc-application-form input[name="organisation"]').focus();
        }else{
          $('#iccc-application-form input[name="name"]').attr('name','form-name');
          $('#iccc-application-form input[name="email"]').attr('name','form-email');
          $('#iccc-application-form input[name="mobile"]').attr('name','form-mobile');
          var data = $('#iccc-application-form').serialize();
          if (data) {
              $.ajax({
                  url: base_url+"prelogin/iccc",
                  type: "post",
                  data: {'data': data },
                  success: function (response) {
                      var json = $.parseJSON(response);
                       if(json.status=="1"){
                         $(this).parents(".my-tab-function").find("ul #education-tab").click();
                       }
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                  }
              });
          }

           $(this).parents(".tab-details").find("#iccc-application-form").hide();
           $(this).parents(".tab-details").find(".tab-details-box.tab-details-fourth").show();
           $('input[name="form-name"]').val(name);
           $('input[name="form-email"]').val(email);
           $('input[name="form-mobile"]').val(mobile);

          
        }
    });*/

    $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-second .btn.btn-pre").on('click', function (e) {
        e.preventDefault();

        
          $(this).parents(".tab-details").find(".tab-details-box.tab-details-first").show();
          $(this).parents(".tab-details").find(".tab-details-box.tab-details-second").hide();
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").removeClass("active");
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-first").addClass("active");

          
        
    });


    $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-second .btn.btn-next").on('click', function (e) {
        e.preventDefault();

        var organisation= $('#iccc-application-form input[name="organisation"]').val();
        var designation= $('#iccc-application-form input[name="designation"]').val();
        var year_of_experience= $('#iccc-application-form input[name="year_of_experience"]').val();
        

        $(".validation").remove(); // remove it
        if(!organisation){
          $('#iccc-application-form input[name="organisation"]').after('<div class="validation" style="color:red;font-size:  10px;">This field can not be blank.</div>');
          $('#iccc-application-form input[name="organisation"]').focus();
        }else if(!designation){
          $('#iccc-application-form input[name="designation"]').after('<div class="validation" style="color:red;font-size:  10px;">Designation field can not be blank.</div>');
          $('#iccc-application-form input[name="designation"]').focus();
        } 
        else if(!year_of_experience){
          $('#iccc-application-form input[name="year_of_experience"]').after('<div class="validation" style="color:red;font-size:  10px;">Years of experience field can not be blank.</div>');
          $('#iccc-application-form input[name="year_of_experience"]').focus();
        }else if($.isNumeric(year_of_experience)==false){
          $('#iccc-application-form input[name="year_of_experience"]').after('<div class="validation" style="color:red;font-size:  10px;">Please enter valid year.</div>');
          $('#iccc-application-form input[name="year_of_experience"]').focus();
        }else{
          $(this).parents(".tab-details").find(".tab-details-box.tab-details-second").hide();
          $(this).parents(".tab-details").find(".tab-details-box.tab-details-third").show();
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").removeClass("active");
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-third").addClass("active");

          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").removeClass("filled");
          $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").addClass("filled");
      }
    });



    $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-third .btn.btn-pre").on('click', function (e) {
        e.preventDefault();


        $(this).parents(".tab-details").find(".tab-details-box.tab-details-second").show()
        $(this).parents(".tab-details").find(".tab-details-box.tab-details-third").hide();

        $(this).parents(".icc-tab-box").find(".tab-list .tab-list-second").addClass("active");
        $(this).parents(".icc-tab-box").find(".tab-list .tab-list-third").removeClass("active");
    });

        $(".iccc-final-popup .icc-tab-box .tab-details .tab-details-box.tab-details-third .btn.btn-submit").on('click', function (e) {
            e.preventDefault();

            var first_answer= $('#iccc-application-form textarea[name="first_answer"]').val();
            var second_answer= $('#iccc-application-form textarea[name="second_answer"]').val();

            /*var first_answer= $('#iccc-application-form #first_answer').val();
            var second_answer= $('#iccc-application-form #second_answer').val();*/
             
        var page = $(".btn-submit").attr("data-page");
        
        var path='';

        if(page==='iccc-lucknow'){
          path=base_url+"prelogin/icccLucknow";
        }else{
          path=base_url+"prelogin/iccc"
        }

            $(".validation").remove(); // remove it
            if(!first_answer){
              $('#iccc-application-form textarea[name="first_answer"]').after('<div class="validation" style="color:red;font-size:  10px;">This field can not be blank.</div>');
              $('#iccc-application-form textarea[name="first_answer"]').focus();
            }/*else if(first_answer.length>100){
              $('#iccc-application-form textarea[name="first_answer"]').after('<div class="validation" style="color:red;font-size:  10px;">Answer length should be less than 100 words.</div>');
              $('#iccc-application-form textarea[name="first_answer"]').focus();
            }*/
            else if(!second_answer){
              $('#iccc-application-form textarea[name="second_answer"]').after('<div class="validation" style="color:red;font-size:  10px;">This field can not be blank.</div>');
              $('#iccc-application-form textarea[name="second_answer"]').focus();
            }/*else if(second_answer.length>200){
              $('#iccc-application-form textarea[name="second_answer"]').after('<div class="validation" style="color:red;font-size:  10px;">Answer length should be less than 200 words.</div>');
              $('#iccc-application-form textarea[name="second_answer"]').focus();
            }*/
            else{

              $('#iccc-application-form input[name="form-name"]').attr('name','name');
              $('#iccc-application-form input[name="form-email"]').attr('name','email');
              $('#iccc-application-form input[name="form-mobile"]').attr('name','mobile');
              var data = $('#iccc-application-form').serialize();
              if (data) {
                  $.ajax({
                      url: path,
                      type: "post",
                      data: {'data': data },
                      success: function (response) {

                        $('#iccc-application-form')[0].reset();
                         !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                          n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                          n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                          t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                          document,'script','https://connect.facebook.net/en_US/fbevents.js');
                          fbq('init', '263133604031761', {
                          });
                          fbq('track', 'Lead');
                          /*var json = $.parseJSON(response);
                           if(json.status=="1"){
                             $(this).parents(".my-tab-function").find("ul #education-tab").click();
                           }*/
                          
                           /*LinkedIn Code*/
                            _linkedin_partner_id = "236866";
                            window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
                            window._linkedin_data_partner_ids.push(_linkedin_partner_id);
                            (function(){var s = document.getElementsByTagName("script")[0];
                            var b = document.createElement("script");
                            b.type = "text/javascript";b.async = true;
                            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                            s.parentNode.insertBefore(b, s);})();

                          /*End Linkedin Code*/

                          /*Quora tracking code*/
                             !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
                              qp('init', '988fc98327ae4c43a375230f3c92a57f');
                              qp('track', 'GenerateLead');
                      },
                      error: function (jqXHR, textStatus, errorThrown) {
                          console.log(textStatus, errorThrown);
                      }
                  });
              }

               $('input[name="form-name"]').val('');
               $('input[name="form-email"]').val('');
               $('input[name="form-mobile"]').val('');
               
               if ($(window).width() <= 768) {
                $(this).parents(".tab-details").find(".tab-details-box.tab-details-third").hide();
                $(this).parents(".icc-tab-box").find(".tab-list ").hide();
                $(this).parents(".tab-details").find(".tab-details-box.tab-details-fourth").show();
                }else{
                    $(this).parents(".iccc-final-popup").hide();
                    $('.iccc-form .iccc-form-box #form-iccc').css("display","none");
                    $('.iccc-form .iccc-form-box #message-section').css("display","block");
                  }
              
              
              
          }
        });

    $(".iccc-final-popup .icc-tab-box .close-iccc-form").on('click', function (e) {
        e.preventDefault();
        var url = window.location.href;
        if(url==base_url+'iccc-dubai'){
         $('#iccc-dubai-application-form')[0].reset(); 
       }else{
          $('#iccc-application-form')[0].reset(); 
       }
        
        $("body").removeClass("body-fixed");

        $(this).parents(".iccc-final-popup ").fadeOut();

        
        if ($(window).width() <= 768) {

            $(".icc-mobile-btn").fadeIn();
        }

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

    $(".iccc-section-box.masters .masters-box").on('mouseenter', function () {
        $(this).find(".masters-details-popup").show();
    });

    $(".iccc-section-box.masters .masters-box").on('mouseleave', function () {
        $(this).find(".masters-details-popup").hide();
    });


    $(".iccc-form .iccc-form-box .btn-iccc-reload").on('click', function (e) {
        e.preventDefault();

        location.reload();

      });
    /* ICCC PAGE FUNCTION*/


});