<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contenuto = file_get_contents("../Access.txt");

        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        $isValida = false;

        if($username != null){
            $righe = explode("\n", $contenuto);
            foreach($righe as $riga){
                $lista = explode(";", trim($riga));
                if($username==$lista[0] && $password==$lista[1]){
                    $isValida = true;
                    break;
                }
            }

            if($isValida){
                $_SESSION['form2'] = [
                    'username' => $_POST['username'] ?? '',
                    'password' => $_POST['password'] ?? ''
                ];
                echo "<p style='color: green; font-weight: bold;'>Accesso effettuato con successo! Lo sconto verrà applicato al checkout.</p>";
            } else {
                echo "<p style='color: red; font-weight: bold;'>Credenziali non valide. Riprova oppure procedi senza Fidelity e-card.</p>";
            }
        }
    }

    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hai una Fidelity e-card?</title>
        <link rel="stylesheet" href="../Style/Base.css">
    </head>
    <body>

        <header>
            <nav class="navbar">
                <a href="https://youtu.be/dn7qsrc_h_4?si=qcj88SIO4GW6rAxd" target="_blank"><img src="../imgs/logo2.png" alt="Logo Panineria" class="logo-img"></a>
                <h1 class="logo">La panineria dei programmatori</h1>
                <div class="nav-links">
                    <button><a href="Index.php">Home</a></button>
                    <button><a href="Fidelity.php">Servizi</a></button>
                    <button><a href="Output.php">Ordine</a></button>
                </div>
            </nav>
        </header>

        <main>
            <section id="fidelity"> 
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <h2>Sei membro tesserato?<br>Accedi a sconti speciali!</h2>
                    <!-- Nome utente -->
                    <label for="username">Nome utente Fidelity e-card:</label>
                    <input type="text" id="username" name="username" onchange="controllaFidelity()"
                    value="<?= (isset($_SESSION['form2']['username'])) ? htmlspecialchars($_SESSION['form2']['username']): '' ?>"><br><br>

                    <!-- Password -->
                    <label for="password">Password Fidelity e-card:</label>
                    <input type="password" id="password" name="password" onchange="controllaFidelity()"
                    value="<?= (isset($_SESSION['form2']['password'])) ? htmlspecialchars($_SESSION['form2']['password']): '' ?>"><br><br>

                    <!-- Invio e Reset -->
                    <input type="submit" value="Invia">
                    <input type="reset" value="Resetta">
                    <button type="button" onclick="window.location.href='Output.php'">Salta</button>
                </form>
            </section>
        </main>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p>
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>

    </body>

    <!-- Script in fondo perchè utilizzo l'onload -->
    <script src="../Script/Library.js"></script>
</html>
