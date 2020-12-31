function freechecked()
{
    var radio =document.getElementById("freeapp");

    var textbox = document.getElementById("app-price");

    if (radio.checked == true){
        textbox.disabled = true;
      } else {
        textbox.disabled = false;
      }
}

function premiumchecked()
{
    var radio =document.getElementById("premiumapp");

    var textbox = document.getElementById("app-price");

    if (radio.checked == true){
        textbox.disabled = false;
      } else {
        textbox.disabled = true;
      }
}

$(document).ready(function () {
   
  $("#application_name").on("focusout",function () {
      if($(this).val().length==0 &&   $("#app-name").empty())
      {
          $(this).css("border-color","red");
         $("#app-name").append("Application name can't be empty!");
         
      }
      else{
          $("#app-name").remove();
          $(this).css("border-color","white");
      }
  }
  );
  $("#application-link").on("focusout",function () {
      
      if($(this).val().length==0 && $("#app-link").empty())
      {
         $("#app-link").append("Please input the app download link!");
         $(this).css("border-color","red");
      }
      else{
          $("#app-link").remove();
          $(this).css("border-color","white");
      }
  })
})