
//Globals
window.onload = loadBasket;

//Get basket from session storage or create one if it does not exist
function getBasket(){
    let basket;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basket = [];
    }
    else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

//Displays basket in page.
function loadBasket(){
    let basket = getBasket();//Load or create basket
    
    //Build string with basket HTML
    let htmlStr = "<form action='checkout.php' method='post'>";
    let prodIDs = [];
    let totalAmount =0;
    //to get total price
    for(let i=0; i<basket.length; ++i){
      let  total =  basket[i].price;
      total = parseInt(total,10);
      totalAmount = totalAmount+total;
    }
    

    for(let i=0; i<basket.length; ++i){
        htmlStr += "<h3><br>Product "+(i+1)+": </h3><h4> Make : <i>" + basket[i].make + "</i> <br> Model : <i>"+ basket[i].name +"</i> <br>  Price : <i>" + basket[i].price + " </h4><hr id='zigzag'  >";
        prodIDs.push({id: basket[i].id,make: basket[i].make, count: 1,amount:totalAmount});//Add to product array
    }
    //Add hidden field to form that contains stringified version of product ids.
    htmlStr += "<input type='hidden' name='prodIDs' value='" + JSON.stringify(prodIDs) + "'>";
    
    //Add checkout and empty basket buttons
    htmlStr += "<input type='submit' style='border:1px solid red ;color: red;'value='Place Order'></form>";
    
    htmlStr += "<br><button onclick='emptyBasket()' id = 'basketForm' style='border:1px solid red ;color: red; float: right;' >Empty Basket</button>";
    
    //Display nubmer of products in basket
    document.getElementById("basketDiv").innerHTML = htmlStr;
}

//Adds an item to the basket
function addToBasket(prodID, make,prodName,price){

    let basket = getBasket();//Load or create basket
    
    //Add product to basket
    basket.push({id: prodID, make: make,name : prodName,price:price});
    
    //Store in local storage
    sessionStorage.basket = JSON.stringify(basket);
    
    //Display basket in page.
    loadBasket();      
}

//Deletes all products from basket
function emptyBasket(){
    sessionStorage.clear();
    loadBasket();
}


