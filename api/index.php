<?php

include '../config.php';

$conn = new mysqli(HOST, USER, PASS, BASE);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $leads = array();

    while ($row = $result->fetch_assoc()) {
        $leads[] = $row;
    }

    header('Content-Type: application/json');

    echo json_encode($leads);
} else {
    header('Content-Type: application/json');
    echo json_encode(array("message" => "Nenhum lead encontrado."));
}

$conn->close();

?>
