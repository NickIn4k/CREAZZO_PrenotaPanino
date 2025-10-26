function getToday(){
    const today = new Date().toISOString().slice(0,16);
    document.getElementById("dataOra").setAttribute("max", today);
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

window.onload = getToday;