var signupContent = document.getElementById("news-img");

signupContent.addEventListener("click", function(){
    console.log("cl");
    document.getElementById("input-file").click();
});

document.getElementById("input-file").addEventListener("change", function (event) {
    change(event , 0);
});

function change(event, num ){

    var selectedFile = event.target.files[0];

    if (selectedFile) {
        
        var fileReader = new FileReader();

        fileReader.onload = function (e) {

            // document.querySelectorAll(".product-image-content")[num].style.display ="none";
            // signupContent.style.display ="flex";
            signupContent.src = e.target.result;

        };

        fileReader.readAsDataURL(selectedFile);
        
    }

}