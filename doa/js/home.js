const headerContent = document.querySelectorAll(".header-content");

let slideIndex = 0;
showSlides("def");

function showSlides(data) {

    

    let i;

    for (i = 0; i < headerContent.length; i++) {
        headerContent[i].style.opacity = 0;
        if(!data == "def"){
            break
        }
    }

    slideIndex++;

    if (slideIndex > headerContent.length) {
        slideIndex = 1;
    }

    headerContent[slideIndex - 1].style.opacity = 1;

    setTimeout(showSlides, 3000);
}


var product = document.querySelector(".section-content-3-content-1");

var productLeftArrow = document.getElementById("product-left-arrow");
var productRightArrow = document.getElementById("product-right-arrow");

productLeftArrow.addEventListener("click", function(){
    for(let i = 0; i < 20; i++){
        setTimeout(function(){
            product.scrollLeft -= i;
        },10 * i)
    }
});

productRightArrow.addEventListener("click", function(){
    for(let i = 0; i < 20; i++){
        setTimeout(function(){
            product.scrollLeft += i;
        },10 * i)
    }
});

