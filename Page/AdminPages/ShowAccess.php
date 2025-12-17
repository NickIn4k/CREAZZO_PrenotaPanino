<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ricerca utenti</title>
        <link rel="stylesheet" href="../../Style/Base.css">
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

        <!-- Form ricerca singolo utente -->
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <h1>Ricerca utenti</h1>
            <input type="hidden" name="search" value="single">

            <label for="nominativo">Nome e Cognome:</label>
            <input type="text" id="nominativo" name="nominativo" oninput="controlloNome(this)" required><br><br>
            
            <div class="btnGestione">
                <button type="submit">Invia</button>
                <button type="reset">Cancella</button>
            </div>

            <div>
                <table>
                    <?php
                        // Se il form è stato inviato e il campo "search" vale "single"
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"]) && $_POST["search"] === "single") {

                            echo "<hr>";

                            echo "<tr>".
                                "<th>id</th>".
                                "<th>nominativo</th>".
                                "<th>email</th>".
                                "<th>codice sconto</th>".
                            "</tr>";

                            // Connessione ad oggetti
                            $conn = new mysqli("localhost", "root", "", "db_accessi_panineria");
                            if ($conn->connect_error)
                                die("Errore connessione: " . $conn->connect_error);

                            $ap = $_POST['nominativo'];
                            $sql = "SELECT * FROM utenti2 WHERE nominativo = '$ap'";

                            $rslt = $conn->query($sql);

                            if ($rslt && $rslt->num_rows > 0) {
                                $row = $rslt->fetch_assoc();
                                echo "<tr><td>". $row["id"]. "</td>".
                                    "<td>". $row["nominativo"]. "</td>".
                                    "<td>". $row["email"]. "</td>".
                                    "<td>". $row["cod_sconto"]. "</td></tr>";
                            }

                            $conn->close();
                        }

                    ?>
                </table>
            </div>
        </form>

        <hr>

        <!-- Form lista completa utenti -->
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <h1>Indica tutti gli utenti del sito</h1>
            <input type="hidden" name="search" value="list">
    
            <div class="btnGestione">
                <button type="submit">Invia</button>
            </div>

            <div>
                <table>
                    <?php
                        // Se il form è stato inviato e il campo "search" vale "list"
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"]) && $_POST["search"] === "list") {

                            echo "<hr>";

                            echo "<tr>".
                                    "<th>id</th>".
                                    "<th>nominativo</th>".
                                    "<th>email</th>".
                                    "<th>codice sconto</th>".
                                "</tr>";

                            // Connessione ad oggetti
                            $conn = new mysqli("localhost", "root", "", "db_accessi_panineria");
                            if ($conn->connect_error)
                                die("Errore connessione: " . $conn->connect_error);

                            $sql = "SELECT * FROM utenti2";
                            $rslt = $conn->query($sql);

                            if ($rslt && $rslt->num_rows > 0) {
                                while ($row = $rslt->fetch_assoc()) {
                                    echo "<tr><td>". $row["id"]. "</td>".
                                        "<td>". $row["nominativo"]. "</td>".
                                        "<td>". $row["email"]. "</td>".
                                        "<td>". $row["cod_sconto"]. "</td></tr>";
                                }
                            }

                            $conn->close();
                        }
                    ?>
                </table>
            </div>
        </form>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p>
            <img src="../../imgs/capyburger.png" alt="capybara" class="logo-img-footer">
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>
    </body>
    <script type="text/javascript" src= "../../Script/Library.js"></script>
</html>
