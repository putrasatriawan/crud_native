<?php
include "koneksidatabase.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tb_mhs WHERE id = $id";
    $result = mysqli_query($db, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error fetching data']);
    }
} else {
    // Handle invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
}
?>
