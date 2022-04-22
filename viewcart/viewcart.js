function getCart() {
  let getItemCart = globalThis.localStorage.getItem("cart");
  let check = true;
  // if(getItemCart == undefined || getItemCart == null || getItemCart == "[]"){
  //   console.log("yo");
  //   console.log(getItemCart);
  //   globalThis.localStorage.clear();
  // }
  // globalThis.localStorage.getItem("cart") && "{}";
  return JSON.parse(globalThis.localStorage.getItem("cart") ?? "{}");
}
// function checkthins() {
//   console.log(globalThis.localStorage.getItem("cart") && "{}");
// }
// checkthins();
// function upDateCartBagGui(arrayName) {
//   let cartRowCount = arrayName.length;
//   let cartBag = document.getElementById("cartItems");
//    cartBag.innerHTML = cartRowCount;
// }

// upDateCartBagGui(getCart());

function upDateCartBagGui(arrayName){
  let cartRowCount = Object.keys(arrayName).length;
  let cartBag = document.getElementById("cartItems");
  cartBag.innerHTML = cartRowCount;
}

upDateCartBagGui(getCart());
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
        rowHolderDiv.innerHTML = text;
      });
  } else {
  }
};

let newAddtoCart2 = (id, qty) => {
  let existingCart = getCart();
  let localArray = [];
  let intID;
  let intQTY;
  const cartRowCount = Object.keys(existingCart).length;

  const f = new FormData();
  f.append("id", id);
  f.append("qty", qty);
  let url = "../viewsingleproduct/addtoCartLocalStorage2.php";
  let api = fetch(url, { body: f, method: "POST" })
    .then((response) => response.json())
    .then((data) => {
      //console.log(data);
      if (data["ID"] !== "Nope") {
        intQTY = parseInt(data["qty"]);
        intID = parseInt(data["id"]);

        if (existingCart.length === undefined) {
          let newArray = data;
          let objectArray = [];
          objectArray.push(newArray);
          globalThis.localStorage.setItem("cart", JSON.stringify(objectArray));
        } else {
          let arraySearch = existingCart.find((a, index) => {
            if (a.id == intID) {
              existingCart[index] = data;
              console.log(`id is in the ${index}th index  of array`);
            } else {
              localArray.push(existingCart[index]);
              // console.log(`id is not in the ${index}th index of array`);
            }
            if (localArray.length === existingCart.length) {
              let newItemarray = data;
              localArray.push(newItemarray);
              globalThis.localStorage.setItem(
                "cart",
                JSON.stringify(localArray)
              );
            } else {
              globalThis.localStorage.setItem(
                "cart",
                JSON.stringify(existingCart)
              );
            }
          });
        }
      } else {
        console.log("Nope Nope");
      }
    });
};

showCartItems();

// newAddtoCart(132,512);
// loadCart();

let newAddtoCart3 = (id, qty) => {
  let existingCart = getCart();
  let localArray = [];
  let intID;
  let intQTY;

  const f = new FormData();
  f.append("id", id);
  f.append("qty", qty);
  let url = "../viewcart/addtoCartLocalStorage.php";
  let api = fetch(url, { body: f, method: "POST" })
    .then((response) => response.json())
    .then((data) => {
      if (data["ID"] !== "Nope") {
        intQTY = parseInt(data["qty"]);
        intID = parseInt(data["id"]);

        if (existingCart.length === undefined) {
          let newArray = data;
          let objectArray = [];
          objectArray.push(newArray);
          globalThis.localStorage.setItem("cart", JSON.stringify(objectArray));
        } else {
          let arraySearch = existingCart.find((a, index) => {
            if (a.id == intID) {
              existingCart[index] = data;
            } else {
              localArray.push(existingCart[index]);
            }
            if (localArray.length === existingCart.length) {
              let newItemarray = data;
              localArray.push(newItemarray);
              globalThis.localStorage.setItem(
                "cart",
                JSON.stringify(localArray)
              );
            } else {
              globalThis.localStorage.setItem(
                "cart",
                JSON.stringify(existingCart)
              );
            }
          });
        }
      } else {
        console.log("Nope Nope");
      }
    });
};

let newQtySelect = (id, qtynSPrice) => {
  let inputID = document.getElementById("cartQtyId" + id);
  let changingQty = inputID.value;
  let url = "../viewcart/addtoCartLocalStorage.php";
  let existingCart = getCart();
  let localArray = [];
  let intID;
  let intQTY;
  let f = new FormData();
  f.append("id", id);
  f.append("qty", changingQty);
  let checkID = fetch(url, {
    body: f,
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data["ID"] !== "Nope") {
        intQTY = parseInt(data["qty"]);
        intID = parseInt(data["id"]);

        if (existingCart.length === undefined) {
          let newArray = data;
          let objectArray = [];
          objectArray.push(newArray);
          globalThis.localStorage.setItem("cart", JSON.stringify(objectArray));
        } else {
          let arraySearch = existingCart.find((a, index) => {
            if (a.id == intID) {
              existingCart[index] = data;
            } else {
              localArray.push(existingCart[index]);
            }
            if (localArray.length === existingCart.length) {
              let newItemarray = data;
              localArray.push(newItemarray);
              globalThis.localStorage.setItem(
                "cart",
                JSON.stringify(localArray)
              );
            } else {
              globalThis.localStorage.setItem(
                "cart",
                JSON.stringify(existingCart)
              );
            }
          });
        }

        document.getElementById("qtyAndSamplePrice" + id).innerText =
          qtynSPrice * intQTY;
          upDateSubTotal();
      } else {
        console.log("Nope Nope");
        inputID.value = 1;
        inputID.setAttribute("min", 1);
      }
    });
};

let removeFromCart = (id) => {
  let cartRows = getCart();
  let newCartRows = [];
  console.log("+++++");
  let check = cartRows.find((a, index) => {
    if (a.id == id) {
    } else {
      newCartRows.push(cartRows[index]);
    }
  });
  console.log(newCartRows);
  globalThis.localStorage.setItem("cart", JSON.stringify(newCartRows));
  showCartItems();
  upDateCartBagGui(newCartRows);
  if (newCartRows == 0) {
    console.log("Empty");
    globalThis.localStorage.clear();
  }
  console.log("-----");
};

let upDateSubTotal = () => {
  const subTotalSpan = document.getElementById("subTotalValue");
  let cartRows = JSON.stringify(getCart());
  let url = "../viewcart/getSubTotal.php";
  const form = new FormData();
  form.append("cartRows", cartRows);
  let sendFetch = fetch(url, { body: form, method: "POST" })
    .then((response) => {
    
      return response.text();
    })
    .then((text) => {
      console.log(text);
      subTotalSpan.innerHTML = text; 
    });
};
upDateSubTotal();
