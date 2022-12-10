
function checkName(event) {

    var field = event.target;
    var nameLength = field.value.length;

  
    if (nameLength > 20 || nameLength < 1) {
  
      alert("The food name cannot be empty or longer than 20 characters.");
    }
}
  

function checkDesc(event) {

    var field = event.target;
    var descLength = field.value.length;

  
    if (descLength > 255) {
  
      alert("The description cannot be longer than 255 characters.");
    }
}
  
function checkPrice(event) {

    var field = event.target;
    var price = field.value;

  
    if (price > 999999 || price < 0) {
  
      alert("The price cannot exceed 999,999 or be negative.");
    }
}


  
  
  
    var foodname = document.getElementById("foodname");
    foodname.addEventListener("blur", checkName);
  
    var fooddesc = document.getElementById("fooddesc");
    fooddesc.addEventListener("blur", checkDesc);
  
    var foodprice = document.getElementById("foodprice");
    foodprice.addEventListener("blur", checkPrice);

  
  