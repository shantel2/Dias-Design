window.addEventListener('load',(e)=>{

    
let itemsInCart = []; //items in cart
let single_item = document.querySelector("#buyItems");
const total = document.querySelector("#sum-prices");
const products = document.querySelectorAll(".products");
//var id = 0;
var button = document.getElementsByClassName('btn');

var trying = document.getElementById('1');
console.log("trying", trying);


//function to add total price of items in cart
const calculateTotal = function(){
    let sumT = 0;
    itemsInCart.forEach(prod =>{
        sumT += prod.price;
    });
    return sumT;
}

//function
const updateShoppingCartHTML = function(){
    //generate html code for each element in the cart
    if(itemsInCart.length > 0){
        let result = itemsInCart.map(product=>{

          return `<li class="buyItem">
            <img id = ${product.image} src=${product.image}>
            <div>
                <h5>${product.name}</h5>
                <h6 class = "total-price" id="total_price"> Total: $${product.price}</h6>
                <div>
					<h4> Quantity: ${product.count}</h4>
					<h4 id = "unit-price" >Unit Price: $${product.basePrice}</h4>
                    
                    <label for="size" class = "size-label" >Size:</label>
                    <select id='size' class = 'size-options'> 
                    <option value="small">Small</option>
                        <option value="med">Medium</option>
                        <option value="large">Large</option>
                        <option value="audi">X-Large</option>
                    </select>
          
                    <label for="color" class = "color-options">Colors:</label>
                    <select id='color'> 
                    <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                    </select>
                    <button id = 'del-btn'>Delete</button>
                </div>
            </div>
        </li>
        `
        });

        single_item.innerHTML=result.join('');
        total.innerHTML= '$ ' + calculateTotal();

    } else{
        single_item.innerHTML='<h4 class = "empty"> Your cart is empty</h4>';
       // document.getElementsByClassName('check-out').remove();
        document.getElementsByClassName('check-out').classList.add('hidden');
        total.innerHTML= '$ 0';
    }
}

//function to add product to cart
function updateProductInCart(product){
    //loops throuhg the items in the cart and checks if the product is already there
    //if product is already there it updates the proce of the item in the cart
    for (let i = 0; i<itemsInCart.length ; i++){
        if(itemsInCart[i].id == product.id){
            itemsInCart[i].count+=1;
            itemsInCart[i].price = itemsInCart[i].basePrice * itemsInCart[i].count;
            return;
        }
    }

    //if element is not already in cart, it will be added 
    itemsInCart.push(product);
    console.log(itemsInCart);

    if(itemsInCart.length >0)
    {
        itemsInCart.forEach(item =>{
            console.log(`prod_id: ${item.prod_db_id}`);
            console.log(`quan: ${item.count}`);
        });
    }
}

/* loop through each button and add an event listener */
for (x of button) {
    //id+=1;
    x.addEventListener('click', (e)=>{
        var btn_parent = e.target.parentNode;

		prod_div_id =  e.target.id.replace("prod","").replace(".jpg","");
		var prod_price = document.getElementById(prod_div_id).childNodes[7].childNodes[1].innerHTML.replace("$", ""); //price of item
        let prod_db = document.getElementById(prod_div_id).childNodes[9].childNodes[1].innerHTML;

		var prod_name = document.getElementById(prod_div_id).childNodes[5].childNodes[1].innerHTML;
       
        var prod_image = e.target.id;
		
        let productForCart = {//makes the product for the cart
            name: prod_name,
            image: prod_image,
            id: prod_image,
            prod_db_id: prod_db,
            count: 1,
            price: +prod_price,//the '+' sign converts the price to int
            basePrice: +prod_price
        }   

        updateProductInCart(productForCart); ///add product to cart
        updateShoppingCartHTML();//creates html code for product
    });

}

single_item.addEventListener('click', (e)=>{
    //get the delete button
    var del_btn = document.getElementById('del-btn'); //get the delete button
    //console.log("i am del", del_btn);

    item_for_del = del_btn.parentNode.parentNode.parentNode;
    //console.log(item_for_del.childNodes[1].id);
    
    //loops through the elements in the cart and romoves the selected element
    for(let i=0; i<itemsInCart.length; i++){
        if (e.target === del_btn){
            if(itemsInCart[i].id===item_for_del.childNodes[1].id){
                item_for_del.remove();
                itemsInCart.splice(i,1);
                console.log('item removed');
            }            
        }
        updateShoppingCartHTML();
    }
   
});

const CHECKOUT_BUTTON = $(".check-out");

let cartData = {cart: itemsInCart};
CHECKOUT_BUTTON.on('click',e=>{
    $.ajax({
        type: "POST",
        url: "checkout.php",
        data: cartData,
        dataType: "html"
    }).done(response=>{
        alert(response);
        itemsInCart = [];
        $("#buyItems").empty();
        $("#buyItems").append(" <h4 class=\"empty\">Your shopping cart is empty</h4> ");
        $("#sum-prices").empty();
        $("#sum-prices").append("$ 0");
    }).fail(()=>{
        alert('failed to place order');
    });
});








});
