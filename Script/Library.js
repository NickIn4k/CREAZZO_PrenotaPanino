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

window.onload = getToday;