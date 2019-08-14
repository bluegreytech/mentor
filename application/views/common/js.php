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


      
       
    },
    errorPlacement: function (error, element) {

         console.log('dd', element.attr("name"))
            if (element.attr("name") == "remember_me") {
                error.appendTo("#remerror");
            } else {
                error.insertAfter(element)
            }
        }
    
});

$(document).ready(function(){
  url="<?php echo base_url(); ?>home/getstandard"
  
     $("#iam").hide();
    $('#Streambox').on('change', function() {
       $('#iam').show();
      var id= this.value ;
      $.ajax({
        type: "POST",
        url: url,
        data:{id:id},
        success: function(data){
         // console.log(data);
            $('#StandardId').html('<option value="">Please Select</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    //console.log(this.StandardId);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.StandardId).text('Class '+this.Standard);           
                            $('#StandardId').append(option);
                        });
                    }
        }
      });    
    });
});
</script>
</body>

</html>