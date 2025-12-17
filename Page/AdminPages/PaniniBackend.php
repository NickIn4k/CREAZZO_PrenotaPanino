<?php
    $conn = new mysqli("localhost", "root", "", "db_panini_prenotati");
    if ($conn->connect_error) {
        die(json_encode([]));
    }

    $sql = "SELECT id, pane FROM tipoPanini";
    $result = $conn->query($sql);

    $panini = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $panini[] = $row;
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($panini);
?>
