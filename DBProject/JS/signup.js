$(document).ready(function () {

 $letter=/^[A-Za-z]+$/;
 $validemail=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
$name=1;
$email=1;
$pass1=1;
$pass2=1;
$num=1;


function check()
  {  
  

      $("#name").on("focusout",function () {
        if(($(this).val().length==0  || !$(this).val().match($letter))   &&  $("#h_name").empty())
        {
            $(this).css("border-color","red");
           $("#h_name").append("This is empty or in valid input");
           $name++;
           
        }
        else{
            $("#h_name").remove();
            $(this).css("border-color","white");
            $name=0;
          

        }
    }
    )
    $("#email").on("focusout",function () {
        
        if(($(this).val().length==0 || !$(this).val().match($validemail) ) && $("#h_email").empty())
        {
           $("#h_email").append("This is empty");
           $(this).css("border-color","red");
           $email++;
        }
        else{
            $("#h_email").remove();
            $(this).css("border-color","white");
            $email=0;
        }
    })
    $("#number").on("focusout",function () {
        
        if($(this).val().length==0 &&  $("#h_number").empty())
        {
            $(this).css("border-color","red");
           $("#h_number").append("This is empty");
           $num++;
        }
        else{
            $("#h_number").remove();
            $(this).css("border-color","white");
            $num=0;
        }
    })
    $("#pass1").on("focusout",function () {
        
        if($(this).val().length==0  && $("#h_pass1").empty())
        {
            $(this).css("border-color","red");
           $("#h_pass1").append("This is empty");
           $pass1++;
        }
        else{
            $("#h_pass1").remove();
            $(this).css("border-color","white");
            $pass1=0;
        }
    })
    $("#pass2").on("focusout",function () {
        
        if($(this).val().length==0 &&  $("#h_pass2").empty())
        {
            $(this).css("border-color","red");
           $("#h_pass2").append("This is empty");
           $pass2++;
        }
        else{
            $("#h_pass2").remove();
            $(this).css("border-color","white");
            $pass2=0;
        }
    })
    
        
        
  
    
}
check();
function sad() {
    
   

  if($name==0 && $email==0 && $pass1==0 && $pass2==0 && $num==0 )
    {
        console.log("ok");
    
        $("#submit").prop('disabled', false);
        setTimeout(sad,1000);


    }
else
{ 
    console.log($name);
    $("#submit").prop('disabled', true);
    console.log("sad");
   setTimeout(sad,1000);
   

}
 
}
$("#submit").prop('disabled', true);

sad();

console.log("bra sad");

    
})