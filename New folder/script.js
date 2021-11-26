const responsiveNavbar = (function () {
	const button = document.querySelector("#menuButton");//get menu button
	const navbar = document.querySelector("#navbar"); //get nav bar
	button.addEventListener("click", function () {//adds listner to button
		if (navbar.className === "navbar") {
			navbar.className += " navbarResponsive";
		}
		else {
			navbar.className = "navbar";
		}
	});
})();

function closeCart() {
	const cart = document.querySelector('.producstOnCart');//get products on cart
	cart.classList.toggle('hide'); //hide cart icon
	document.querySelector('body').classList.toggle('stopScrolling')
}

const openShopCart = document.querySelector('.shoppingCartButton');
openShopCart.addEventListener('click', () => {
	const cart = document.querySelector('.producstOnCart');
	cart.classList.toggle('hide');
	document.querySelector('body').classList.toggle('stopScrolling');
});

const closeShopCart = document.querySelector('#closeButton');
const overlay = document.querySelector('.overlay');
closeShopCart.addEventListener('click', closeCart);
overlay.addEventListener('click', closeCart);