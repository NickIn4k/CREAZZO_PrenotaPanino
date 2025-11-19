function getToday(){
    const today = new Date().toISOString().slice(0,16);
    const picker = document.getElementById("dataOra")
    if(picker != null)
        picker.setAttribute("min", today);
    console.log(today);
}

function controlloNome(input){
    const nomePattern = /^[A-Za-z ]+$/;
    if(input.value!="" && !nomePattern.test(input.value)){
        alert("Per favore, inserisci un nome valido.");
        input.value = input.value.slice(0, -1);
    }
}

function changePicture(input, nomeImg){
    const img = document.getElementById(nomeImg);
    if(nomeImg === 'img-contorni')
        img.src = "../imgs/"+input.value+".png";
    else
        img.src = "../imgs/buns/"+input.value+".png";
}

function controllaFidelity(){
    const username = document.getElementById("username");
    const password = document.getElementById("password");

    if(username.value.trim() !== "")
        password.required = true;
    else
        password.required = false;

    if(password.value.trim() !== "")
        username.required = true;
    else
        username.required = false;

}

function switchMode(mode) {
    const loginFields = document.getElementById("loginFields");
    const signupFields = document.getElementById("signupFields");

    if (mode === "login") {
        loginFields.style.display = "block";
        signupFields.style.display = "none";
    } else {
        loginFields.style.display = "none";
        signupFields.style.display = "block";
    }
}

window.onload = getToday;