<?php
session_start();
header('Content-Type: application/json');

$response = [
    "success" => false,
    "message" => ""
];

$conn = new mysqli("localhost", "root", "", "db_accessi_panineria");
if ($conn->connect_error) {
    $response["message"] = "Errore di connessione";
    echo json_encode($response);
    exit;
}

$email = $_POST['email'] ?? "";
$pwd   = $_POST['pwd'] ?? "";

$stmt = $conn->prepare("SELECT id, password FROM utenti WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $response["message"] = "Utente inesistente";
} else {
    $row = $result->fetch_assoc();

    if (password_verify($pwd, $row['password'])) {

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email']   = $email;
        $_SESSION['logged_in'] = true;

        $response["success"] = true;
        $response["message"] = "Login effettuato con successo";
    } else {
        $response["message"] = "Password errata";
    }
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>
