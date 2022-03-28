let cartRows = getCart();
let cartRowCount = Object.keys(cartRows).length;
let cartBag = document.getElementById("cartItems");
cartBag.innerHTML = cartRowCount;

function getCart() {
  return JSON.parse(globalThis.localStorage.getItem("cart") ?? "{}");
}

function saveCart(cart) {
  globalThis.localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(id) {
  let cartQTY = document.getElementById("selectQTY").value;

  if (cartQTY == "") {
    document.getElementById("selectQTY").style.background = "red";
  } else {
    let cartQTYString = `${cartQTY}`;
    let productIDString = `${id}`;
    let combined = productIDString + " " + cartQTYString;
    let form = new FormData();
    form.append("ID", combined);
    let url = "../viewsingleproduct/addtocartLocalStorage.php";
    fetch(url, { body: form, method: "POST" })
      .then((response) => response.text())
      .then((text) => {
        console.log(text);
        let cartQtyinNum = parseInt(cartQTY);
        let cart = getCart();
        if (typeof cart[id] === "number") {
          //cart[id] = cartQtyinNum;
          cart = { id, cartQTYString };
        } else {
          // cart[id] = cartQtyinNum;
          cart = { id, cartQTYString };
        }
        saveCart(cart);
        let cartRows = getCart();
        let cartRowCount = Object.keys(cartRows).length;
        let cartBag = document.getElementById("cartItems");
        cartBag.innerHTML = cartRowCount;
      });
  }
}

function addToCart2(id) {
  let cartQTY = document.getElementById("selectQTY").value;

  if (cartQTY == "") {
  } else {
    const f = new FormData();
    f.append("id", id);
    f.append("qty", cartQTY);
    let url = "../viewsingleproduct/addtoCartLocalStorage2.php";
    let api = fetch(url, { body: f, method: "POST" })
      .then((response) => response.json())
      .then((data) => {
        let cartIDAndQtyValidated = data;
        let validtaedQty = data["QTY"];
        let intQTY = parseInt(validtaedQty);
        console.log(cartIDAndQtyValidated["ID"]);
        let cart = getCart();
        console.log(typeof cart);
        console.log(cart);
        //cart.push ({ id,intQTY });
        // cart[cartIDAndQtyValidated["ID"]] = parseInt(
        //   cartIDAndQtyValidated["QTY"]
        // );
        saveCart(cart);
        let cartRows = getCart();
        let cartRowCount = Object.keys(cartRows).length;
        let cartBag = document.getElementById("cartItems");
        cartBag.innerHTML = cartRowCount;
      });
  }
}

let newAddtoCart = (id) => {
  let existingCart = getCart();
  let localArray = [];
  let intID;
  let intQTY;
  const cartRowCount = Object.keys(existingCart).length;
  let qty = document.getElementById("selectQTY").value;

  const f = new FormData();
  f.append("id", id);
  f.append("qty", qty);
  let url = "../viewsingleproduct/addtoCartLocalStorage2.php";
  let api = fetch(url, { body: f, method: "POST" })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
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
              console.log(`id is not in the ${index}th index of array`);
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

function removeFromCart(id, count) {
  count = count ?? 1;
  let cart = getCart();

  if (typeof cart[id] === "number") {
    cart[id] -= count;
  } else {
    cart[id] = 0;
  }
  if (cart[id] < 0) {
    cart[id] = 0;
  }
  saveCart(cart);
}

function goToviewCart(id) {
  let existingCart = getCart();
  let localArray = [];
  let intID;
  let intQTY;
  const cartRowCount = Object.keys(existingCart).length;

  const f = new FormData();
  f.append("id", id);

  let url = "../viewsingleproduct/goToViewCartLocalStorage.php";
  let api = fetch(url, { body: f, method: "POST" })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      if (data["id"] !== "Nope") {
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
              //existingCart[index] = data;
              console.log(`id is in the ${index}th index  of array`);
            } else {
              localArray.push(existingCart[index]);
              console.log(`id is not in the ${index}th index of array`);
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

          window.location = "../viewcart/viewcart.php?X=" + id;
        }
      } else {
        console.log("Nope Nope");
      }
    });
}
