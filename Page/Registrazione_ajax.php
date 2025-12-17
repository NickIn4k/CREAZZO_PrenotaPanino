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

$email = $_POST['emailR'] ?? "";
$pwd1  = $_POST['pwdR1'] ?? "";
$pwd2  = $_POST['pwdR2'] ?? "";
$nominativo = $_POST['nominativo'] ?? "";

if ($pwd1 !== $pwd2) {
    $response["message"] = "Le password non corrispondono";
} else {

    $hashedPwd = password_hash($pwd1, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO utenti (email, password, nominativo) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $email, $hashedPwd, $nominativo);

    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Registrazione completata";
    } else {
        $response["message"] = "Email già registrata";
    }
    $stmt->close();
}

$conn->close();
echo json_encode($response);
