<?php
    session_start();

    /* DEBUG COOKIE
    $dati = json_decode($_COOKIE["DatiPanino"], true);
    echo "dati: ". var_dump($dati);
    */
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
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

        <main>
            <h2>Riepilogo Ordine</h2>
            <?php
                if(isset($_SESSION['form1'])){
                    echo "<h3>Ordine di: " . htmlspecialchars($_SESSION['form1']['nominativo']) . "</h3>";
                    echo "<h4>Data e Ora di ritiro: " . htmlspecialchars($_SESSION['form1']['dataOra']) . "</h4>";
                }
            ?>
            <table>
                <tr>
                    <th>Voce</th>
                    <th>Dettagli</th>
                    <th>Costo (€)</th>
                </tr>
                <tr>
                    <td>Hamburger</td>
                    <td>Carne bovina</td>
                    <td>3.0</td>
                </tr>
            <?php
                //dati da sessione
                foreach($_SESSION['form1'] as $key => $value){
                    if($key != 'nominativo' && $key != 'dataOra'){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($key) . "</td>";

                        if(is_array($value)){
                            echo "<td>" . htmlspecialchars(ritornaNomi($value)) . "</td>";
                            echo "<td>" . htmlspecialchars(ritornaCosti($value)) . "</td>";
                        }
                        else {
                            $appoggio = explode("-", $value);
                            echo "<td>" . htmlspecialchars($appoggio[0]) . "</td>";
                            echo "<td>" . htmlspecialchars($appoggio[1]) . "</td>";
                        }

                        echo "</tr>";
                    }        
                }

                function ritornaNomi($lista){
                    $nomi = [];
                    foreach($lista as $item){
                        $parti = explode("-", $item);
                        $nomi[] = $parti[0];
                    }
                    return implode(", ", $nomi);
                }

                function ritornaCosti($lista){
                    $costi = [];
                    foreach($lista as $item){
                        $parti = explode("-", $item);
                        $costi[] = $parti[1];
                    }
                    return implode(", ", $costi);
                }
            ?>
            </table>
            <?php
                $totale = 3.0;
                foreach($_SESSION['form1'] as $key => $value){
                    if($key != 'nominativo' && $key != 'dataOra'){
                        if(is_array($value)){
                            foreach($value as $item){
                                $parti = explode("-", $item);
                                $totale += floatval($parti[1]);
                            }
                        }
                        else {
                            $parti = explode("-", $value);
                            $totale += floatval($parti[1]);
                        }
                    }        
                }
                echo "<h4>Totale Ordine: " . $totale . " €</h4>";
                if(isset($_SESSION['form2'])){
                    $sconto = $totale * 0.2;
                    $totaleScontato = $totale - $sconto;
                    echo "<h4>Sconto Fidelity (20%): -" . $sconto . " €</h4>";
                    echo "<h3>Totale da Pagare: " . $totaleScontato . " €</h3>";
                }
            ?>

            <!-- Count delle visite (non legate ad un utente specifico) -->
            <?php
            
            ?>

            <!-- stampa su file con php -->
            <?php
                // Ripetizione di codice, migliorabile in futuro (versione di base) 
                $txt = "Voce\t\tDettagli\t\tCosto (€)\n";
                $txt .= "Hamburger\tCarne bovina\t3.0\n";

                // Dati da sessione
                foreach($_SESSION['form1'] as $key => $value){
                    if($key != 'nominativo' && $key != 'dataOra'){
                        if(is_array($value)){
                            $nomi = [];
                            $costi = [];
                            foreach($value as $item){
                                $parti = explode("-", $item);
                                $nomi[] = $parti[0];
                                $costi[] = $parti[1];
                            }
                            $txt .= "$key\t" . implode(", ", $nomi) . "\t" . implode(", ", $costi) . "\n";
                        } else {
                            $parti = explode("-", $value);
                            $nome = $parti[0];
                            $costo = $parti[1];
                            $txt .= "$key\t$nome\t$costo\n";
                        }
                    }
                }

                // Totale e sconto
                $txt .= "\n\nTotale Ordine\t\t$totale\n";
                if(isset($_SESSION['form2'])){
                    $txt .= "Sconto Fidelity (20%)\t\t$sconto\n";
                    $txt .= "Totale da Pagare\t\t$totaleScontato\n";
                }

                // Scrittura su file
                $file = fopen("../txt/Ordini.txt", "a");
                fwrite($file, "\n###############################################\n");
                fwrite($file, "Ordine di: " . ($_SESSION['form1']['nominativo']) . "\n");
                fwrite($file, "Data e Ora di ritiro: " . ($_SESSION['form1']['dataOra']) . "\n");
                fwrite($file, "\n-----------------------\n\n");
                fwrite($file, $txt);
                fclose($file);
            ?>
        </main>

        <footer>
            <p>&copy; 2025 "La panineria dei programmatori". Tutti i diritti riservati.</p>
            <img src="../imgs/capyburger.png" alt="capybara" class="logo-img-footer">
            <p>Progettato e sviluppato da Creazzo Nicola</p>
        </footer>

    </body>

    <!-- Script in fondo perchè utilizzo l'onload -->
    <script src="../Script/Library.js"></script>
</html>
