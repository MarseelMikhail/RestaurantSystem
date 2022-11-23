
function cartMake(but)
{
   var item = document.getElementById(but);
   var plus = document.getElementById("add"+but);
   var minus = document.getElementById("subtract"+but);
   console.log(item.textContent+but);
   if(item.textContent=='Order')
   {item.innerHTML = "1";
    plus.style.visibility = "visible";  minus.style.visibility = "visible";
    
    }
   
    plus.addEventListener("click",function(){ item = document.getElementById(but); item.innerHTML = parseInt(item.textContent)+1;});
    minus.addEventListener("click",function(){ item = document.getElementById(but); item.innerHTML = parseInt(item.textContent)-1;})
   
}