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
                    <button><a href="Fidelity.php">Servizi</a></button>
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
                        <option value="XAMPP-3">Pane XAMPP - 3€</option>   
                        <option value="XMIND-5">Pane XMIND - 5€</option>
                        <option value="IntelliJ-4">Pane IntelliJ - 4€</option>
                        <option value="VsCode-2">Pane VsCode - 2€</option>
                        <option value="VsCommunity-3">Pane VsCommunity - 3€</option>
                    </select><br><br>

                    <img src="../imgs/buns.png" alt="Immagine Panini" class="img-panini" id="img-panini"><br><br>

                    <!-- Scelta Ingredienti -->
                    <!-- Sistema di div annidiati per usare la CSS grid -->
                    <label>Scegli gli ingredienti:</label><br>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente1" name="ingrediente[]" value="Lettuce-0.3">
                            <label for="ingrediente1">Lattuga (+0.30€)</label>
                        </div>
                        <img src="../imgs/lettuce.png" alt="Lattuga" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente2" name="ingrediente[]" value="Tomato-0.3">
                            <label for="ingrediente2">Pomodoro (+0.30€)</label>
                        </div>
                        <img src="../imgs/tomato.png" alt="Pomodoro" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente3" name="ingrediente[]" value="Cheese-0.3">
                            <label for="ingrediente3">Formaggio (+0.30€)</label>
                        </div>
                        <img src="../imgs/cheese.png" alt="Formaggio" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente4" name="ingrediente[]" value="Bacon-0.5">
                            <label for="ingrediente4">Bacon (+0.50€)</label>
                        </div>
                        <img src="../imgs/bacon.png" alt="Bacon" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente5" name="ingrediente[]" value="Onion-0.8">
                            <label for="ingrediente5">Onion rings (+0.80€)</label>
                        </div>
                        <img src="../imgs/onion.png" alt="Onion rings" class="icon-ingrediente">
                    </div>

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
