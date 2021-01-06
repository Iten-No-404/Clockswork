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
