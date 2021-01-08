$(document).ready(function () {
    

    $letter=/^[A-Za-z]+$/;

    $email=1;


  function check()
   { $("#Review_Description").on("focusout",function () {
        
        if( ($(this).val().length==0 || !$(this).val().match($letter) ) &&  $("#Review").empty())
        {
            $(this).css("border-color","red");
           $("#Review").append("This is empty");
           $email++;
        }
        else{
            $(this).css("border-color","white");
            $("#Review").remove();
            $email=0;
        }
    })
  

  }
  check();
  function sad() {
     
    if($email==0 )
        {
            console.log("ok");
        
            $("#review").prop('disabled', false);

            setTimeout(sad,1000);

        }
    else
    { 

        $("#review").prop('disabled', true);
        console.log("sad");
       setTimeout(sad,1000);
    

    }
      
  }
  $("#review").prop('disabled', true);
  sad();

    
})