var menuIcon = document.querySelector(".menu-icon");
var menu = document.querySelector(".nav-2-content-2");
var menuUlHeight = document.querySelector(".nav-2-content-2 ul").offsetHeight;

menuIcon.addEventListener("click", function () {
    menuIcon.classList.toggle("active");
    menu.classList.toggle("active");

    if (menu.classList[1] == "active") {
        menu.style.height = menuUlHeight + "px"
    } else {
        menu.style.height = 0 + "px"
    }
});

var profileIcon = document.getElementById("profile-icon");

if (profileIcon) {

    profileIcon.addEventListener("click", function () {
        document.querySelector(".profile-menu").classList.toggle("active");
    });

}

var profileIcon2 = document.getElementById("profile-icon-mobile");

if (profileIcon2) {

    profileIcon2.addEventListener("click", function () {
        document.querySelector(".profile-menu").classList.toggle("active");
    });

}

var navProfileClose = document.querySelector(".nav-profile-close");

navProfileClose.addEventListener("click", function () {
    document.querySelector(".profile-menu").classList.toggle("active");
});




var login = document.getElementById("login");

if (login) {

    login.addEventListener("click", function () {
        window.location.href = "login.php";
    });

}

var signup = document.getElementById("signup");

if (signup) {

    signup.addEventListener("click", function () {
        window.location.href = "signup.php";
    });

}
