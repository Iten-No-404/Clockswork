$(document).ready(function () {
   
    $("#name").on("focusout",function () {
        if($(this).val().length==0 &&   $("#h_name").empty())
        {
            $(this).css("border-color","red");
           $("#h_name").append("This is empty");
           
        }
        else{
            $("#h_name").remove();
            $(this).css("border-color","white");
        }
    }
    );
    $("#email").on("focusout",function () {
        
        if($(this).val().length==0 &&      $("#h_email").empty())
        {
           $("#h_email").append("This is empty");
           $(this).css("border-color","red");
        }
        else{
            $("#h_email").remove();
            $(this).css("border-color","white");
        }
    })
    $("#number").on("focusout",function () {
        
        if($(this).val().length==0 &&  $("#h_number").empty())
        {
            $(this).css("border-color","red");
           $("#h_number").append("This is empty");
        }
        else{
            $("#h_number").remove();
            $(this).css("border-color","white");
        }
    })
    $("#pass1").on("focusout",function () {
        
        if($(this).val().length==0  && $("#h_pass1").empty())
        {
            $(this).css("border-color","red");
           $("#h_pass1").append("This is empty");
        }
        else{
            $("#h_pass1").remove();
            $(this).css("border-color","white");
        }
    })
    $("#pass2").on("focusout",function () {
        
        if($(this).val().length==0 &&  $("#h_pass2").empty())
        {
            $(this).css("border-color","red");
           $("#h_pass2").append("This is empty");
        }
        else{
            $("#h_pass2").remove();
            $(this).css("border-color","white");
        }
    })
   
    
})