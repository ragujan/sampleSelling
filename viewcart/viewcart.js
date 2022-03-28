function getCart() {
  return JSON.parse(globalThis.localStorage.getItem("cart") ?? "{}");
}
let cartRows = getCart();
let cartRowCount = Object.keys(cartRows).length;
let cartBag = document.getElementById("cartItems");
cartBag.innerHTML = cartRowCount;

const rowHolderDiv = document.getElementById("cartRowHolder");

function loadCart() {
  let cartRows = getCart();
  let outArray = [];
  let myid = 111;

  if (cartRows.length == undefined) {
    console.log("added first time");
    let myArray = { id: myid, qty: 33 };
    let secondMyArray = { id: 555, qty: 33 };
    let thirdMyArray = { id: 1000, qty: 1000 };
    let ab = [];
    ab.push(myArray);
    ab.push(secondMyArray);
    ab.push(thirdMyArray);
    globalThis.localStorage.setItem("cart", JSON.stringify(ab));
    console.log(ab);
  } else {
    let mA = cartRows.find((a, i) => {
      console.log(i);
      if (a.id === myid) {
        console.log("ID found in the array --------------");
        console.log("array index " + i);
        console.log(cartRows[i]);

        cartRows[i] = { id: myid, qty: 25 };
        console.log(cartRows[i]);
        console.log(cartRows);
        console.log("ID found in the array --------------");
        // globalThis.localStorage.setItem("cart", JSON.stringify(cartRows));
      } else {
        console.log("Couldn't found a the aray");
        console.log(cartRows[i]);
        console.log(cartRows);
        outArray.push(cartRows[i]);
      }

      console.log("Out Array ++++++++++");
      console.log(outArray);
      if (outArray.length === cartRows.length) {
        console.log("Insert the new one");
        let newIDQ = { id: myid, qty: 2000 };
        outArray.push(newIDQ);
        globalThis.localStorage.setItem("cart", JSON.stringify(outArray));
      } else {
        globalThis.localStorage.setItem("cart", JSON.stringify(cartRows));
      }
    });
  }
}

let newAddtoCart = (id, qty) => {
  let existingCart = getCart();
  let localArray = [];
  const cartRowCount = Object.keys(existingCart).length;

  if (existingCart.length === undefined) {
    let newArray = { id: id, qty: qty };
    let objectArray = [];
    objectArray.push(newArray);
    globalThis.localStorage.setItem("cart", JSON.stringify(objectArray));
  } else {
    let searchArray = existingCart.find((a, index) => {
      if (a.id == id) {
        existingCart[index] = { id: id, qty: qty };
        console.log(`id is in the ${index}th index  of array`);
      } else {
        localArray.push(existingCart[index]);
        console.log(`id is not in the ${index}th index of array`);
      }
      if (localArray.length === existingCart.length) {
        let newItemarray = { id: id, qty: qty };
        localArray.push(newItemarray);
        globalThis.localStorage.setItem("cart", JSON.stringify(localArray));
      } else {
        globalThis.localStorage.setItem("cart", JSON.stringify(existingCart));
      }
    });
  }
};
let showCartItems = () => {
  let cartRows = getCart();

  if (cartRows.length !== undefined) {
    const f = new FormData();
    f.append("cartArrays", JSON.stringify(cartRows));
    let url = "../viewcart/showCartRows.php";
    let send = fetch(url, { body: f, method: "POST" })
      .then((response) => response.text())
      .then((text) => {
        console.log(text);
        rowHolderDiv.innerHTML = text;
      });
  } else {
  }
};

showCartItems();
// newAddtoCart(132,512);
// loadCart();
