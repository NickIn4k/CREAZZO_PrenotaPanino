<?php
    session_start();
    header('Content-Type: application/json');

    // Cattura warning/notices PHP e impedisce output HTML 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $response = [
        "success" => false,
        "message" => ""
    ];

    try {
        // Connessione
        $conn = new mysqli("localhost", "root", "", "db_accessi_panineria");
        $conn->set_charset("utf8mb4");

        // Dati
        $email = $_POST['email'] ?? "";
        $pwd   = $_POST['pwd'] ?? "";

        // Check
        if ($email === "" || $pwd === "")
            throw new Exception("Compila tutti i campi");

        // PDO - query
        $stmt = $conn->prepare("SELECT id, password FROM utenti WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // get_result() crea messaggi html di errore
        $result = $stmt->get_result();

        if ($result->num_rows === 0) 
            $response["message"] = "Utente inesistente";
        else {
            $row = $result->fetch_assoc();

            if (password_verify($pwd, $row['password'])) {
                $_SESSION['user_id']   = $row['id'];
                $_SESSION['email']     = $email;
                $_SESSION['logged_in'] = true;

                $response["success"] = true;
                $response["message"] = "Login effettuato con successo";
            } else {
                $response["message"] = "Password errata";
            }
        }

        $stmt->close();
        $conn->close();

    } catch (Throwable $e) {
        $response["message"] = "Errore interno del server";
        // $response["message"] = $e->getMessage();
    }
    echo json_encode($response);
?>