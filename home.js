const links = document.querySelectorAll(".page-header ul a");

for (const link of links) {
    link.addEventListener("click", clickHandler);
}

function clickHandler(e) {
    e.preventDefault();
    const href = this.getAttribute("href");
    const offsetTop = document.querySelector(href).offsetTop;

    scroll({
        top: offsetTop,
        behavior: "smooth"
    });
}



let homediv = document.getElementById('homediv1');
let cHeight = document.documentElement.clientHeight;
let mintButtonDivContainerY = homediv.getBoundingClientRect().y;
let mintButtonDivContainerH = homediv.getBoundingClientRect().height;
console.log(cHeight, mintButtonDivContainerY, mintButtonDivContainerH);
let popularsamplebox = document.getElementById('popularsamplediv')
let mps = document.getElementById('MPS');
window.addEventListener('scroll', () => {
    let windowvalue = window.scrollY;

    if (windowvalue <= 20) {

        //popularsamplebox.classList.toggle('d-none'); 
        popularsamplebox.classList.add('d-none');
        popularsamplebox.classList.remove('makeAnimation');;

    } else {
        console.log(windowvalue);

        popularsamplebox.classList.remove('d-none');
        popularsamplebox.classList.add('makeAnimation');
        //popularsamplebox.classList.add('makeAnimation');
    }
    // popularsamplebox.style.bottom = (windowvalue / 100) + '%';
    // console.log("the calculation " + windowvalue / 50)

})