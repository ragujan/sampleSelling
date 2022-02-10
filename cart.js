function getCart() {
    return JSON.parse(globalThis.localStorage.getItem('cart') ?? "{}");
}
function saveCart(cart){
    globalThis.localStorage.setItem('cart',JSON.stringify(cart));
}
// let keyvalue={x:ID};
// let myobject=[{ID:100},{ID:200}];
// myobject.push(keyvalue);
function addToCart(id,count){
    count = count ?? 1;
    let cart = getCart();
    console.log(cart);

    if(typeof(cart[id]) === 'number'){
        cart[id] += count;
    } else{
        cart[id] = count;
    }
    saveCart(cart);
}
function removeFromCart(id,count){
    count = count ?? 1;
    let cart = getCart();

    if(typeof(cart[id]) === 'number'){
        cart[id] -= count;
    } else{
        cart[id] = 0;
    }
    if(cart[id] < 0){
        cart[id] = 0;
    }
    saveCart(cart);
}


// function addToCart(x){
//     let cartItem = [];
//     // if(cartItem.includes(x)){
//     //     console.log('already there');
//     //     return true;
//     // }else{
//     //     cartItem.push(x);
//     //     return false;
//     // }
//     let a= localStorage.getItem("cartItem");
//     console.log(a);
//      let results=a.includes(x);
//      console.log(results); 
//      if(results == true){
//          console.log('already there');
//      }else{
//          cartItem[{a},{x}];
//          console.log('should add');
//      }
   
//     console.log(a);
//     localStorage.setItem("cartItem",cartItem);
// }