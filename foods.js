var total = 0;
var food_dict = {};    
var cart = document.getElementById("carto");


cart.addEventListener("click",function(){ 
<<<<<<< HEAD
    var input =  '<?= "INSERT INTO order_details(id,mid,oid,quantity,item_total) VALUES (2,1,2'+food_dict['1']+'100) ";$res = $db->query($sql); ?>;'

    localStorage.setItem('sql_line',input);
    console.log(localStorage.getItem('sql_line'));
=======
    console.log(food_dict);
    var input =  '<?= "INSERT INTO order_details(id,mid,oid,quantity,item_total) VALUES (2,1,2,'+food_dict[1]+',100) ";$res = $db->query($sql); ?>;'

    alert(Object.keys(food_dict).length);
>>>>>>> d12e67b6c901baaf3a2a01f5e1a9ec86460af877

})




function cartMake(but)
{
   var item = document.getElementById(but);
   var plus = document.getElementById("add"+but);
   var minus = document.getElementById("subtract"+but);
   console.log(item.textContent+but);
   if(item.textContent=='Order')
   {item.innerHTML = "1";
    plus.style.visibility = "visible";  minus.style.visibility = "visible";
    cartProcess(but,1);
    
    }
   
    plus.addEventListener("click",function(){ 
        item = document.getElementById(but); item.innerHTML = parseInt(item.textContent)+1; cartProcess(but,1);});

    minus.addEventListener("click",function(){ 
        item = document.getElementById(but); 
        if(parseInt(item.textContent)>1) 
        
        item.innerHTML = parseInt(item.textContent)-1;
        else if(parseInt(item.textContent)==1) {item.innerHTML = "Order"; plus.style.visibility = "hidden";  minus.style.visibility = "hidden";}
        cartProcess(but,-1);})
   
}



function cartProcess(ID,count)
{
    //show cart or no
<<<<<<< HEAD

=======
    if(document.getElementById(ID).textContent != 'Order')
    food_dict[ID] = parseInt(document.getElementById(ID).textContent);
    else
    delete food_dict[ID];
>>>>>>> d12e67b6c901baaf3a2a01f5e1a9ec86460af877
    total = total+count;
    if(total>0)
        cart.style.visibility = "visible";
    else
        cart.style.visibility = "hidden";
    
}

