$(document).ready(function () {
    
  
    $("#email").on("focusout",function () {
        
        if($(this).val().length==0)
        {
            $(this).css("border-color","red");
           $("#h_email").append("This is empty");
        }
        else{
            $(this).css("border-color","white");
            $("#h_email").remove();
        }
    })
  
    $("#pass1").on("focusout",function () {
        
        if($(this).val().length==0)
        {
            $(this).css("border-color","red");
           $("#h_pass1").append("This is empty");
        }
        else{
            $(this).css("border-color","white");
            $("#h_pass1").remove();
        }
    })
   
    
})