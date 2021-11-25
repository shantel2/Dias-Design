let cart = document.querySelectorAll(".button is-link is-outlined py-4 is-medium is-fullwidth")

for(let i=0; i<cart.length; i++)
{
    cart[i].addEventListener('click',() =>{console.log("added to cart")})
}