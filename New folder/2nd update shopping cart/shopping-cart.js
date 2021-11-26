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
            <img src=${product.image}>
            <div>
                <h5>${product.name}</h5>
                <h6> Total: $${product.price}</h6>
                <div>
					<h4> Quantity: ${product.count}</h4>
					<h4 id = "unit-price" >Unit Price: ${product.basePrice}</h4>
                    
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
                    <button id = 'del-btn' onclick= del('+id+') >Delete</button>
                </div>
            </div>
        </li>
        `
        });

        single_item.innerHTML=result.join('');
       // document.getElementsByClassName('check-out').classList.remove('hidden');
        total.innerHTML= '$' + calculateTotal();

    } else{
        //document.getElementsByClassName('check-out').classList.add('hidden');
        single_item.innerHTML='<h4 class = "empty"> Your cart is empty</h4>';
        total.innerHTML= '$0';
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
    console.log(product);
    itemsInCart.push(product);
}

/* loop through each button and add an event listener */
for (x of button) {
    //id+=1;
    x.addEventListener('click', (e)=>{
        var btn_parent = e.target.parentNode;

		prod_div_id =  e.target.id.replace("prod","").replace(".jpg","");
		//console.log("plzzz work",document.getElementById(prod_div_id).childNodes);
		var prod_price = document.getElementById(prod_div_id).childNodes[7].childNodes[1].innerHTML.replace("$", ""); //price of item

		var prod_name = document.getElementById(prod_div_id).childNodes[5].childNodes[1].innerHTML;
       
        var prod_image = e.target.id;
		
        let productForCart = {//makes the product for the cart
            name: prod_name,
            image: prod_image,
            id: prod_image,
            count: 1,
            price: +prod_price,//the '+' sign converts the price to int
            basePrice: +prod_price
        }   

        updateProductInCart(productForCart); ///add product to cart
        updateShoppingCartHTML();//creates html code for product
    });

}

//delete image
function del(item){
    document.getElementById(item).remove();
}








