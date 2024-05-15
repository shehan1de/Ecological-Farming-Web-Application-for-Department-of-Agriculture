var profileImage = document.getElementById("profile-image");

profileImage.addEventListener("click", function(){
    
    document.getElementById("image-input").click();
    
});

document.getElementById("image-input").addEventListener("change", function (event) {
    var selectedFile = event.target.files[0];

    if (selectedFile) {
        
        var fileReader = new FileReader();

        fileReader.onload = function (e) {

            document.getElementById("profile-img") .src = e.target.result;

        };

        fileReader.readAsDataURL(selectedFile);
        
    }
});
