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

//registrasi
const btn = document.querySelector("#btn-registrasi");
btn.addEventListener("click", function (e) {

    const username = document.getElementById("username").value;
    const password1 = document.getElementById("password1").value;
    const password2 = document.getElementById("password2").value;
    if ((username == "") || (password1 == "") || (password2 == "")) {
        e.preventDefault();
        const p_mb = document.querySelector(".parent-mb");
        p_mb.style.opacity = 1;
        p_mb.style.visibility = "visible";
    }

});

function passwordInvalid() {
    alert("confirmasi password tidak valid!");
}
function usernameTersedia() {
    alert("Username telah di pakai");
}

const cb = document.querySelector('#cb');
const pw1 = document.querySelector('#password1');
const pw2 = document.querySelector('#password2');
cb.addEventListener("click",function(){ 
       if(pw1.type=='password'){
        pw1.type='text';
       }else if(pw1.type=='text'){
        pw1.type='password';
       }

       if(pw2.type=='password'){
        pw2.type='text';
       }else if(pw2.type=='text'){
        pw2.type='password';
       }
});

