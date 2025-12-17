<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabelle Panini</title>
        <link rel="stylesheet" href="../../Style/Base.CSS">

        <script type="text/javascript">
            // funzione di caricamento nella tabella
            function CaricaRecord(str){
                if(str=="")
                    return;

                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200)
                        document.getElementById("tabellaPanini").innerHTML = this.responseText;
                }

                xmlhttp.open("GET", "TabPanini_ajax.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

    </head>
    <body>
        <header>
            <nav class="navbar">
                <a href="https://youtu.be/dn7qsrc_h_4?si=qcj88SIO4GW6rAxd" target="_blank"><img src="../../imgs/capyburger.png" alt="capybara" class="logo-img"></a>
                <div class="nav-links">
                    <button><a href="../Index.php">Home</a></button>
                    <button><a href="../Fidelity.php">Servizi</a></button>
                    <button><a href="../Output.php">Ordine</a></button>
                    <button><a href="../Login.php">Login</a></button>
                    <button><a href="../Reset.php">Reset</a></button>
                    <button><a href="../Elimina.php">Elimina</a></button>
                </div>
            </nav>
        </header>
        <h1> Tabella Panini: </h1>
        <main>
            <form>
                <select id="panini"name="panini" onchange="CaricaRecord(this.value)">
                </select>
            </form>
            
            <div id="tabellaPanini"></div>
        </main>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p>
            <img src="../../imgs/capyburger.png" alt="capybara" class="logo-img-footer">
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const select = document.getElementById("panini");

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "PaniniBackend.php", true);
            xmlhttp.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200){
                    try {
                        let panini = JSON.parse(this.responseText);
                        panini.forEach(panino => {
                            let option = document.createElement("option");
                            option.value = panino.id;
                            option.text = panino.pane;
                            select.appendChild(option);
                        });
                    } catch(e) {
                        console.error("Errore nel parsing del JSON:", e, this.responseText);
                    }
                }
            }
            xmlhttp.send();
        });
    </script>
    <script type="text/javascript" src= "../../Script/Library.js"></script>
</html>
