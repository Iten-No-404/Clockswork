$(document).ready(function () {
    
    $email=1;
    $pass1=1;
    $validemail=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


  function check()
   { $("#email").on("focusout",function () {
        
        if( ($(this).val().length==0 || !$(this).val().match($validemail) ) &&  $("#h_email").empty())
        {
            $(this).css("border-color","red");
           $("#h_email").append("This is empty");
           $email++;
        }
        else{
            $(this).css("border-color","white");
            $("#h_email").remove();
            $email=0;
        }
    })
  
    $("#pass1").on("focusout",function () {
        
        if($(this).val().length==0 &&   $("#h_pass1").empty() )
        {
            $(this).css("border-color","red");
           $("#h_pass1").append("This is empty");
           $pass1++;
        }
        else{
            $(this).css("border-color","white");
            $("#h_pass1").remove();
            $pass1=0;
        }
    })
  }
  check();
  function sad() {
     
    if($email==0 && $pass1==0 )
        {
            console.log("ok");
        
            $("#submit").prop('disabled', false);
            setTimeout(sad,1000);


        }
    else
    { 

        $("#submit").prop('disabled', true);
        console.log("sad");
       setTimeout(sad,1000);
    

    }
      
  }
  $("#submit").prop('disabled', true);
  sad();
  $("#submit").prop('disabled', false);
    
})