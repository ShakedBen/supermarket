function init()
{
	crateprod();
	onLoadCartNumbers();


}


function crateProdObj(_name,_price,_sale_price,_inCart,_info,_image,_tag)
{		let all_obj=this;
		let sum=0;
		this.inCart=_inCart;
		this.name=_name;
		this.price=_sale_price;
		this.sale_price=_sale_price;
		this.info=_info;
		this.image=_image;
                this.tag=_tag;
			
		this.newDiv=document.createElement("div");
		this.newDiv.className="prod";
		prods.appendChild(this.newDiv);
			
		this.newDiv.innerHTML+="<h2>"+this.name+"</h2>"
			
		this.newimg=document.createElement("img");
		this.newimg.src ="_images\/"+this.image;
		this.newDiv.appendChild(this.newimg);
		this.newDiv.innerHTML+="<div> price for student: "+this.sale_price+" ₪ </div>";
		this.newDiv.innerHTML+="<div>"+this.info+"</div>";
		this.newDiv.onclick=function()
		{
			cartNumbers(all_obj);
			totalCost(all_obj);
				sum+=1;
			alert("you add one of "+all_obj.name+" and amount of "+all_obj.name+" is: "+sum);			
			}
		this.newDiv.onmouseover=function() 
		{
			all_obj.newDiv.style.transform = "scale(1.1,1.1)";
			all_obj.newDiv.style.color='red';
			}
		this.newDiv.onmouseout=function()
		{
		all_obj.newDiv.style.transform = "scale(1,1)";
		all_obj.newDiv.style.color='black';
			}
}

function crateprod()
{
	let prod1=new crateProdObj("coca cola",10,7,0,"the original cola","cola1.png","cocacola");
	let prod2=new crateProdObj("zero cola",10,7,0,"the original cola","zero1.jpg","zerocola");
	let prod3=new crateProdObj("diet cola",10,7,0,"the original cola","dietcola.jpg","dietcola");
	let prod4=new crateProdObj("sprite",10,7,0,"the original sprite","sprite1.png","sprite");
	let prod5=new crateProdObj("diet sprite",10,7,0,"the original sprite diet","dsprite1.jpg","dietsprite");
	let prod6=new crateProdObj("fanta orange",10,7,0,"the original fanta orange","fanta1.jpg","fantaorange");
	let prod7=new crateProdObj("fanta exotic",10,7,0,"the original fanta exotic","fantae.png","fantaexotic");
	let prod8=new crateProdObj("water",7,5,0,"water for health and soul","water.jpg","water");
	let prod9=new crateProdObj("soda",6,4,0,"water with gases","soda.jpg","soda");
	let prod10=new crateProdObj("orange",8,5,0,"only orange","o1.jpg","orange");
	let prod11=new crateProdObj("fuze tea",9,7,0,"fuze tea peach","fuze.png","fuzetea");
	let prod12=new crateProdObj("diet fuze tea",9,7,0,"fuze tea diet peach","fuzed.jpg","dietfuzetea");
}
function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if( productNumbers ) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(product, action) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if( action ) {
        localStorage.setItem("cartNumbers", productNumbers - 1);
        document.querySelector('.cart span').textContent = productNumbers - 1;
        console.log("action running");
    } else if( productNumbers ) {
        localStorage.setItem("cartNumbers", productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem("cartNumbers", 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}

function setItems(product) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null) {
        let currentProduct = product.tag;
    
        if( cartItems[currentProduct] == undefined ) {
            cartItems = {
                ...cartItems,
                [currentProduct]: product
            }
        } 
        cartItems[currentProduct].inCart += 1;

    } else {
        product.inCart = 1;
        cartItems = { 
            [product.tag]: product
        };
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

function totalCost( product, action ) {
    let cart = localStorage.getItem("totalCost");

    if( action) {
        cart = parseInt(cart);

        localStorage.setItem("totalCost", cart - product.price);
    } else if(cart != null) {
        
        cart = parseInt(cart);
        localStorage.setItem("totalCost", cart + product.price);
    
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}

function displayCart() {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    let cart = localStorage.getItem("totalCost");
    cart = parseInt(cart);

    let productContainer = document.querySelector('.products');
    
    if( cartItems && productContainer ) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map( (item, index) => {
            productContainer.innerHTML += 
            `<div class="product">
			<ion-icon name="close-circle-outline">
			</ion-icon><img src="./_images/${item.image}"/>
                <span class="sm-hide">${item.name}</span>
            </div>
            <div class="price sm-hide">$${item.price},00</div>
            <div class="quantity"><ion-icon class="decrease" name="arrow-back-circle-outline"></ion-icon>
                    <span>${item.inCart}</span>  
            <ion-icon class="increase" name="arrow-forward-circle-outline"></ion-icon>
            </div>
            <div class="total">$${item.inCart * item.price},00</div>`;
        });

        productContainer.innerHTML += `
            <div class="basketTotalContainer">
                <h4 class="basketTotalTitle">Basket Total</h4>
                <h4 class="basketTotal">$${cart},00</h4>
            </div>`

        deleteButtons();
        manageQuantity();
    }
}

function manageQuantity() {
    let decreaseButtons = document.querySelectorAll('.decrease');
    let increaseButtons = document.querySelectorAll('.increase');
    let currentQuantity = 0;
    let currentProduct = '';
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    for(let i=0; i < increaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = decreaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = decreaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            if( cartItems[currentProduct].inCart > 1 ) {
                cartItems[currentProduct].inCart -= 1;
                cartNumbers(cartItems[currentProduct], "decrease");
                totalCost(cartItems[currentProduct], "decrease");
                localStorage.setItem('productsInCart', JSON.stringify(cartItems));
                displayCart();
            }
        });

        increaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = increaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = increaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            cartItems[currentProduct].inCart += 1;
            cartNumbers(cartItems[currentProduct]);
            totalCost(cartItems[currentProduct]);
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));
            displayCart();
        });
    }
}

function deleteButtons() {
    let deleteButtons = document.querySelectorAll('.product ion-icon');
    let productNumbers = localStorage.getItem('cartNumbers');
    let cartCost = localStorage.getItem("totalCost");
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    let productName;
    console.log(cartItems);

    for(let i=0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', () => {
            productName = deleteButtons[i].parentElement.textContent.toLocaleLowerCase().replace(/ /g,'').trim();
           
            localStorage.setItem('cartNumbers', productNumbers - cartItems[productName].inCart);
            localStorage.setItem('totalCost', cartCost - ( cartItems[productName].price * cartItems[productName].inCart));

            delete cartItems[productName];
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));

            displayCart();
            onLoadCartNumbers();
        })
    }
}

