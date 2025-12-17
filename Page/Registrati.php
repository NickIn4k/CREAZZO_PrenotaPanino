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
                    <button><a href="Login.php">Login</a></button>
                    <button><a href="Reset.php">Reset</a></button>
                    <button><a href="Elimina.php">Elimina</a></button>
                </div>
            </nav>
        </header>

        <main>
            <div id="msgR"></div>

            <form id="registerForm">
                <h1>Login</h1>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd" required>

                <input type="submit">
                <input type="reset">
            </form>

           <script>
                document.getElementById("registerForm").addEventListener("submit", function(e) {
                    e.preventDefault(); // blocca il submit classico

                    let xhr = new XMLHttpRequest();
                    let formData = new FormData(this);

                    xhr.open("POST", "Registrazione_ajax.php", true);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            let response = JSON.parse(xhr.responseText);

                            let msg = document.getElementById("msgR");
                            msg.style.color = response.success ? "green" : "red";
                            msg.innerText = response.message;

                            if (response.success) {
                                document.getElementById("registerForm").reset();
                            }
                        }
                    };

                    xhr.send(formData);
                });
            </script>
        </main>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p>
            <img src="../imgs/capyburger.png" alt="capybara" class="logo-img-footer">
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>
    </body>
    <script type="text/javascript" src= "../Script/Library.js"></script>
</html>
