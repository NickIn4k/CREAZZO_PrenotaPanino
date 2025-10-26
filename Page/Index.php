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
                    <select id="pane" name="pane" oninput="changePicture(this, 'img-panini')" required>
                        <option value="" disabled selected>-- Seleziona il tipo di  pane --</option>
                        <option value="XAMPP-3">Pane XAMPP - 3€</option>   
                        <option value="XMIND-5">Pane XMIND - 5€</option>
                        <option value="IntelliJ-4">Pane IntelliJ - 4€</option>
                        <option value="VsCode-2">Pane VsCode - 2€</option>
                        <option value="VsCommunity-3">Pane VsCommunity - 3€</option>
                    </select><br><br>

                    <img src="../imgs/buns/buns.png" alt="Immagine Panini" class="img-panini" id="img-panini"><br><br>

                    <!-- Scelta Ingredienti -->
                    <!-- Sistema di div annidiati per usare la CSS grid -->
                    <label>Scegli gli ingredienti:</label><br>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente1" name="ingrediente[]" value="Lettuce-0.3">
                            <label for="ingrediente1">Lattuga (+0.30€)</label>
                        </div>
                        <img src="../imgs/ingredients/lettuce.png" alt="Lattuga" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente2" name="ingrediente[]" value="Tomato-0.3">
                            <label for="ingrediente2">Pomodoro (+0.30€)</label>
                        </div>
                        <img src="../imgs/ingredients/tomato.png" alt="Pomodoro" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente3" name="ingrediente[]" value="Cheese-0.3">
                            <label for="ingrediente3">Formaggio (+0.30€)</label>
                        </div>
                        <img src="../imgs/ingredients/cheese.png" alt="Formaggio" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente4" name="ingrediente[]" value="Bacon-0.5">
                            <label for="ingrediente4">Bacon (+0.50€)</label>
                        </div>
                        <img src="../imgs/ingredients/bacon.png" alt="Bacon" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="checkbox" id="ingrediente5" name="ingrediente[]" value="Onion-0.8">
                            <label for="ingrediente5">Onion rings (+0.80€)</label>
                        </div>
                        <img src="../imgs/ingredients/onion.png" alt="Onion rings" class="icon-ingrediente">
                    </div>

                    <!-- Dimensione del panino -->
                    <label>Dimensione del panino:</label><br>
                    <div class="info">
                        <input type="radio" id="piccolo" name="dimensione" value="Piccolo-0" required>
                        <label for="piccolo">Piccolo (base)</label>
                    </div>
                    <div class="info">
                        <input type="radio" id="medio" name="dimensione" value="Medio-1">
                        <label for="medio">Medio (+1.00€)</label>
                    </div>
                    <div class="info">
                        <input type="radio" id="grande" name="dimensione" value="Grande-2">
                        <label for="grande">Grande (+2.00€)</label>
                    </div><br>

                    <!-- Contorno -->
                    <label for="contorno">Scegli il contorno:</label><br>
                    <select id="contorno" name="contorno" oninput="changePicture(this, 'img-contorni')" required>
                        <option value="" disabled selected>-- Seleziona il contorno --</option>
                        <option value="Nessuno-0">Nessuno (0€)</option>
                        <option value="Patatine-1.5">Patatine fritte (+1.50€)</option>
                        <option value="Anelli-1.8">Anelli di cipolla (+1.80€)</option>
                        <option value="Insalata-1">Insalata mista (+1.00€)</option>
                    </select><br><br>

                    <img src="../imgs/Nessuno-0.png" alt="Immagine Contorni" class="img-panini" id="img-contorni"><br><br>

                    <!-- Scelta Bibita -->
                    <label>Scegli la tua bibita:</label><br>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="radio" id="acqua" name="bibita" value="Acqua-1">
                            <label for="acqua">Acqua naturale o frizzante (+1.00€)</label>
                        </div>
                        <img src="../imgs/Acqua-1.png" alt="Onion rings" class="icon-ingrediente">
                    </div>
                    
                    <div class="ingrediente">
                        <div class="info">
                            <input type="radio" id="coca" name="bibita" value="CocaCola-2">
                            <label for="coca">Coca-Cola (+2.00€)</label>
                        </div>
                        <img src="../imgs/CocaCola-2.png" alt="Onion rings" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="radio" id="fanta" name="bibita" value="Fanta-2">
                            <label for="fanta">Fanta (+2.00€)</label>
                        </div>
                        <img src="../imgs/Fanta-2.png" alt="Onion rings" class="icon-ingrediente">
                    </div>

                    <div class="ingrediente">
                        <div class="info">
                            <input type="radio" id="poretti" name="bibita" value="BirraPoretti-3">
                            <label for="poretti">Birra Poretti (+3.00€)</label>
                        </div>
                        <img src="../imgs/BirraPoretti-3.png" alt="Onion rings" class="icon-ingrediente">
                    </div><br>

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
