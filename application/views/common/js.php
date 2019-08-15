<script src="<?php echo base_url(); ?>default/js/main.min.js"></script>
<script src="<?php echo base_url(); ?>default/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>default/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>default/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>default/js/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>


<script>
function openwtsapp() {
    document.getElementById("msg").style.visibility = "visible";
    document.getElementById("msg").style.left = "25px";
}
</script>
<script type="text/javascript">
  $(".social-open-menu").click(function() {
  $(".social-itens").toggleClass("open");
  $(".social-itens").toggleClass("hidden");
});
//

$("#registrationForm").validate(
    {
    rules:{  
        username:{
          required: true,

        },     
        email:{
          required: true,
          email: true
        },
        password:{
           required: true,         
        },
         repassword:{
           required: true,  
           equalTo:'#password'       
        },
        assessment:{
           required: true,  
        },
        careerchoice:{
           required: true, 
        }


      
       
    },
    // submitHandler: function(form) {
    // alert("Submitted!");
    //  var $form = $(form);
    //  $form.submit();
    // // url="<?php //echo base_url();?>home/register"
    // // // var $form = $(form);
    // // // $form.submit();
    // // $.ajax({
    // //     url: "", 
    // //     type: "POST",             
    // //     data: new FormData(this),
    // //     cache: false,             
    // //     processData:false,      
    // //     success: function(data)   
    // //     {
    // //     $('#loading').hide();
    // //     $("#message").html(data);
    // //     }
    // // });
    // },
    errorPlacement: function (error, element) {

         console.log('dd', element.attr("name"))
            if (element.attr("name") == "assessment") {
                error.appendTo("#assessmenterror");
            }else if(element.attr("name") == "careerchoice"){
               error.appendTo("#careerchoiceerror");
            }
            else{
                error.insertAfter(element)
            }
        }
    
});

$(document).ready(function(){
 // alert();
$(careerchoice1).hide();
$(careerchoice2).hide();
    $('#assessment').on('change', function() {
      // $('#iam').show();
      var valuedata= this.value ;

    
      if(valuedata=="student"){       
          $(careerchoice1).show();
          $(careerchoice2).hide();
          
      }else if(valuedata=="professionals"){            
            $(careerchoice1).hide();
            $(careerchoice2).show();
      }
    });

      $('#careerchoice').on('change', function() {
      // $('#iam').show();
      var valuedata= this.value ;

      //alert(valuedata);
      if(valuedata=="two_to_seven"){ 
        two_to_seven=['87','88'];
       // alert(two_to_seven);
        $("#careerchoiceassess").val(two_to_seven);    
         
          
      }else if(valuedata=="nine_to_tweleve"){  
          nine_to_tweleve=['89','90','91','92','93','94'];
       $("#careerchoiceassess").val(nine_to_tweleve);           
         
      }else if(valuedata=="subject_selector"){  
         subject_selector=['85']; 
       $("#careerchoiceassess").val(subject_selector);             
         
      }else if(valuedata=="engineer_selector"){ 
          engineer_selector=['78','83']; 
        $("#careerchoiceassess").val(engineer_selector);             
         
      }
    });
});
</script>
</body>

</html>