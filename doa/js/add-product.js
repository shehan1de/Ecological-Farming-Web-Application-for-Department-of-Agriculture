var productImageSelector = document.querySelectorAll(".product-image-selector");
var fileInput = document.querySelectorAll(".file-input");

var productImage = document.querySelectorAll(".product-image-photo img");


productImageSelector[0].addEventListener("click", function (event) {
    fileInput[0].click();
});

productImageSelector[1].addEventListener("click", function (event) {
    fileInput[1].click();
});

productImageSelector[2].addEventListener("click", function (event) {
    fileInput[2].click();
});

productImageSelector[3].addEventListener("click", function (event) {
    fileInput[3].click();
});

productImageSelector[4].addEventListener("click", function (event) {
    fileInput[4].click();
});



fileInput[0].addEventListener("change", function (event) {
    change(event , 0)
});

fileInput[1].addEventListener("change", function (event) {
    change(event , 1)
});

fileInput[2].addEventListener("change", function (event) {
    change(event , 2)
});

fileInput[3].addEventListener("change", function (event) {
    change(event , 3)
});

fileInput[4].addEventListener("change", function (event) {
    change(event , 4)
});


function change(event, num ){

    var selectedFile = event.target.files[0];

    if (selectedFile) {
        
        var fileReader = new FileReader();

        fileReader.onload = function (e) {

            // document.querySelectorAll(".product-image-content")[num].style.display ="none";
            
            productImage[num].src = e.target.result;

        };

        fileReader.readAsDataURL(selectedFile);
        
    }

}