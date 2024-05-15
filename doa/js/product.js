console.log("hello")

var allProductImages = document.querySelectorAll(".product-images");

for(var i = 0; i < allProductImages.length; i++){

    
    // console.log(allProductImages[i])

    allProductImages[i].addEventListener("mouseover", function(event){
        // console.log("hellop")
        document.getElementById("product-image").src = event.target.src;
    })

    allProductImages[i].addEventListener("click", function(event){
        document.getElementById("product-image").src = event.target.src;
    })

}

var product = document.querySelector(".product-content-ul");

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





