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

function changePicture(input){
    const img = document.getElementById("img-panini");
    img.src = "../imgs/"+input.value+".png";
}

window.onload = getToday;