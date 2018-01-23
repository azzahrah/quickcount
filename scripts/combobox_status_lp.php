<?php

require_once 'connection.php';
$id = isset($_POST['id']) ? $mysqli->real_escape_string($_POST['id']) : 0;
$result = $mysqli->query("select * from status_lp");
$response = array();
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($response, $row);
        }
    }
    $result->free();
}
$mysqli->close();
echo json_encode($response);
?>