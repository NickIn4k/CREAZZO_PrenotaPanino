<?php
    // Elimina le preferenze dell'utente
    session_start();

    // Unset perchè non resetta tutto (come destroy) e permette di mantenere la sessione attiva
    session_unset();

    // Elimina il cookie dei dati del panino
    setcookie('DatiPanino', '', time() - 3600, '/');

    // Redirect alla pagina principale
    header('Location: Index.php');

?>