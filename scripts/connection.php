<?php
$mysqli = new mysqli("localhost", "root", "Azzahrah2014", "quickcount");
if ($mysqli->connect_errno) {
    echo json_encode(array("ERROR" => "Error Connect Database", "DESCR" => $mysqli->error));
    exit;
}
?>
