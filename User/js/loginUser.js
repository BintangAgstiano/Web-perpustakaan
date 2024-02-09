//login
const btn_login = document.getElementById("btn_login");
btn_login.addEventListener("click", function (event) {

    const Username = document.getElementById("username_login").value;
    const Password1 = document.getElementById("password1_login").value;
    const Password2 = document.getElementById("password2_login").value;
    if ((Username == "") || (Password1 == "") || (Password2 == "")) {
        event.preventDefault();
        const p_mb = document.querySelector(".parent-mb");
        p_mb.style.opacity = 1;
        p_mb.style.visibility = "visible";
    }

});
const x = document.querySelector(".x");
x.addEventListener("click", function () {
    const p_mb = document.querySelector(".parent-mb");
    p_mb.style.opacity = 0;
    p_mb.style.visibility = "hidden";
});

const btn_ok = document.querySelector(".oke");
btn_ok.addEventListener("click", function () {
    const p_mb = document.querySelector(".parent-mb");
    p_mb.style.opacity = 0;
    p_mb.style.visibility = "hidden";
});

function veifyPassword() {
    alert("Password salah");
}

function passwordInvalid() {
    alert("Confirmasi password tidak valid");
}

