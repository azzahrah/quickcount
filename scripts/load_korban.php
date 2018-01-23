<?php
require_once 'connection.php';
$result = $mysqli->query("select * from korban");
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