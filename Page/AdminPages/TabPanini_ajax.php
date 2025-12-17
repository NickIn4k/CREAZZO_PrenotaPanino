<?php
    $conn = new mysqli("localhost", "root", "", "db_panini_prenotati");

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $id = $_GET['q'];

    $sql = "SELECT * FROM tipoPanini WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<table border='1'>
            <tr>
                <th>Pane</th>
                <th>Ingredienti</th>
                <th>Dimensione</th>
                <th>Contorno</th>
                <th>Bibita</th>
                <th>Data Ordine</th>
            </tr>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['pane'] . "</td>";
            echo "<td>" . $row['ingredienti'] . "</td>";
            echo "<td>" . $row['dimensione'] . "</td>";
            echo "<td>" . $row['contorno'] . "</td>";
            echo "<td>" . $row['bibita'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nessun ordine trovato</td></tr>";
    }

    echo "</table>";

    $stmt->close();
    $conn->close();
?>
