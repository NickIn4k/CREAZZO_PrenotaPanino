<!-- FORM DATI PANINO -->
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Scelta panino</title>
        <link rel="stylesheet" href="../Style/Base.css">
    </head>
    <body>

        <header>
            <nav class="navbar">
                <a href="https://youtu.be/dn7qsrc_h_4?si=qcj88SIO4GW6rAxd" target="_blank"><img src="../imgs/logo2.png" alt="Logo Panineria" class="logo-img"></a>
                <h1 class="logo">La panineria dei programmatori</h1>
                <div class="nav-links">
                    <button><a href="Index.php">Home</a></button>
                    <button><a href="Fidelty.php">Servizi</a></button>
                    <button><a href="Output.php">Ordine</a></button>
                </div>
            </nav>
        </header>

        <main>
            <section id="home"> 
                <form>
                    <h2>Benvenuto nella panineria dei programmatori online!</h2>

                    <!--Nome e Cognome-->
                    <label for="nominativo">Nome e Cognome:</label>
                    <input type="text" id="nominativo" name="nominativo" oninput="controlloNome(this)"required><br><br>

                    <!--Data e Ora-->
                    <label for="dataOra">Data e Ora di ritiro:</label>
                    <input type="datetime-local" id="dataOra" name="dataOra" required><br><br>

                    <!-- Scelta Pane -->
                    <label for="pane">Scegli il tipo di pane:</label>
                    <select id="pane" name="pane" oninput="changePicture(this)" required>
                        <option value="" disabled selected>-- Seleziona il tipo di  pane --</option>
                        <option value="XAMPP">Pane XAMPP</option>   
                        <option value="XMIND">Pane XMIND</option>
                        <option value="IntelliJ">Pane IntelliJ</option>
                        <option value="VsCode">Pane VsCode</option>
                        <option value="VsCommunity">Pane VsCommunity</option>
                    </select><br><br>

                    <img src="../imgs/logo2.png" alt="Immagine Panini" class="img-panini" id="img-panini"><br><br>

                    <!-- Invio e Reset -->
                    <input type="submit" value="Invia">
                    <input type="reset" value="Resetta">
                </form>
            </section>
        </main>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p><br>
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>

    </body>

    <!-- Script in fondo perchè utilizzo l'onload -->
    <script src="../Script/Library.js"></script>
</html>
