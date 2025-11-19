<?php
    session_start();

    $loginMsg = "";
    $signupMsg = "";

    // Se il form è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Connessione ad oggetti
        $conn = new mysqli("localhost", "root", "", "db_accessi_panineria");
        if ($conn->connect_error)
            die("Errore connessione: " . $conn->connect_error);

        // Controllo modalità
        $mode = $_POST["mode"] ?? "";

        // LOGIN
        if ($mode === "login") {
            $email = $_POST['email'] ?? "";
            $pwd   = $_POST['pwd'] ?? "";

            $sql = "SELECT * FROM utenti WHERE email = '$email'";
            $rslt = $conn->query($sql);

            if ($rslt === FALSE) {
                die("Errore nella query: " . $conn->error);
            }

            if ($rslt->num_rows == 0) {
                $loginMsg = "<p style='color:red;'>Utente inesistente!</p>";
            } else {
                $row = $rslt->fetch_assoc();
                if ($pwd == $row['password']) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['email']   = $email;
                    $loginMsg = "<p style='color:green;'>Login effettuato con successo!</p>";
                } else {
                    $loginMsg = "<p style='color:red;'>Password errata!</p>";
                }
            }
        }

        // REGISTRAZIONE
        if ($mode === "register") {
            $email = $_POST['email1'] ?? "";
            $pwd1  = $_POST['pwd1'] ?? "";
            $pwd2  = $_POST['pwd2'] ?? "";

            if ($pwd1 !== $pwd2) {
                $signupMsg = "<p style='color:red;'>Le password non corrispondono!</p>";
            } else {
                $sql = "INSERT INTO utenti (email, password) VALUES ('$email', '$pwd1')";
                if ($conn->query($sql) === TRUE) {
                    $signupMsg = "<p style='color:green;'>Registrazione completata!</p>";
                } else {
                    $signupMsg = "<p style='color:red;'>Email già registrata!</p>";
                }
            }
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accedi</title>
        <link rel="stylesheet" href="../Style/Base.css">
    </head>
    <body>

        <header>
            <nav class="navbar">
                <a href="https://youtu.be/dn7qsrc_h_4?si=qcj88SIO4GW6rAxd" target="_blank"><img src="../imgs/capyburger.png" alt="capybara" class="logo-img"></a>
                <div class="nav-links">
                    <button><a href="Index.php">Home</a></button>
                    <button><a href="Fidelity.php">Servizi</a></button>
                    <button><a href="Output.php">Ordine</a></button>
                    <button><a href="Reset.php">Reset</a></button>
                    <button><a href="Elimina.php">Elimina</a></button>
                </div>
            </nav>
        </header>

        <!-- Unico Form -->
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <h1>Accedi</h1>
            <!-- Radio Buttons per selezionare modalità -->
            <div class="modeSelector">
                <label>
                    <input type="radio" name="mode" value="login" checked onclick="switchMode('login')"> Sign In
                </label>
                <label>
                    <input type="radio" name="mode" value="register" onclick="switchMode('register')"> Sign Up
                </label>
            </div>

            
            <!-- LOGIN -->
            <div id="loginFields">
                <hr>
                <h2>Log in</h2>
                <?= $loginMsg ?>

                <label>Email:</label>
                <input type="email" name="email">

                <label>Password:</label>
                <input type="password" name="pwd">
            </div>

            <!-- SIGN UP -->
            <div id="signupFields" style="display:none;">
                <hr>
                <h2>Sign up</h2>
                <?= $signupMsg ?>

                <label>Email:</label>
                <input type="email" name="email1">

                <label>Password:</label>
                <input type="password" name="pwd1">

                <label>Ripeti Password:</label>
                <input type="password" name="pwd2">
            </div>

            <div class="btnGestione">
                <button type="submit">Invia</button>
                <button type="reset">Cancella</button>
            </div>
        </form>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p>
            <img src="../imgs/capyburger.png" alt="capybara" class="logo-img-footer">
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>
    </body>
    <script type="text/javascript" src= "../Script/Library.js"></script>
</html>