<?php
    // Resetta l'intera applicazione
    session_start();
    
    session_unset();
    session_destroy();

    // Elimina il cookie dei dati del panino
    setcookie('DatiPanino', '', time() - 3600, '/');

    // Redirect alla pagina principale
    header('Location: Index.php');

?>