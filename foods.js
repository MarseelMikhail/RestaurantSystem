var total = 0;
var food_dict = {};    
var cart = document.getElementById("carto");
var save = document.getElementById("store");


cart.addEventListener("click",function(){ 
    var input =  '<?= "INSERT INTO order_details(id,mid,oid,quantity,item_total) VALUES (2,1,2'+food_dict['1']+'100) ";$res = $db->query($sql); ?>;'

    
    console.log('NEWW');
    sessionStorage.setItem("naam", "kaam");

});



var run=0;
var arr=[];
function passId(btn)
{
 
    
    var item = document.getElementById(btn);
    var plus = document.getElementById("add"+btn);
    var minus = document.getElementById("subtract"+btn);

    if(item.textContent=='Order' && !arr.includes(btn))
    {   cartMake(btn);
        run=1;
    }
    arr.push(btn);
    if(item.textContent=='Order' )
    {   
        item.innerHTML = "1";
   
        plus.style.visibility = "visible";  minus.style.visibility = "visible";
        cartProcess(btn,1);
        save.setAttribute('value',JSON.stringify(food_dict));
        run=0;
    }

}


function cartMake(but)
{  run = 0;
   var item = document.getElementById(but);
   var plus = document.getElementById("add"+but);
   var minus = document.getElementById("subtract"+but);
   console.log(item.textContent+but);
   if(item.textContent=='Order')
   {
    item.innerHTML = "1";
   
    plus.style.visibility = "visible";  minus.style.visibility = "visible";
    cartProcess(but,1);
    save.setAttribute('value',JSON.stringify(food_dict));
    

    }

    plus.addEventListener("click",function(){ 
        
        item = document.getElementById(but); item.innerHTML = parseInt(item.textContent)+1; console.log('1'); cartProcess(but,1); save.setAttribute('value',JSON.stringify(food_dict));});

    minus.addEventListener("click",function(){ 
        
        item = document.getElementById(but); 
        if(parseInt(item.textContent)>1) 
        
        item.innerHTML = parseInt(item.textContent)-1;
        else if(parseInt(item.textContent)==1) {item.innerHTML = "Order"; plus.style.visibility = "hidden";  minus.style.visibility = "hidden"; run=1;}
        cartProcess(but,-1); save.setAttribute('value',JSON.stringify(food_dict));});


 
}



function cartProcess(ID,count)
{
    //show cart or no
    
    if(document.getElementById(ID).textContent != 'Order')
    food_dict[ID] = parseInt(document.getElementById(ID).textContent);
    else
    delete food_dict[ID];
    total = total+count;
    if(total>0)
        cart.style.visibility = "visible";
    else
        cart.style.visibility = "hidden";
    
}
