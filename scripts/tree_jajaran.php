<?php

require_once 'session.php';
require_once 'connection.php';
$id_jajaran = isset($_SESSION['id_jajaran']) ? intval($_SESSION['id_jajaran']) : 0;
$user_level = isset($_SESSION['user_level']) ? intval($_SESSION['user_level']) : 0;

$data = array();
$sql = "SELECT * FROM `jajaran` ORDER by jajaran";
if ((int) $user_level == 2) {
    $sql = "SELECT * FROM `jajaran` where id='" . $id_jajaran . "' ORDER by jajaran";
}
$result = $mysqli->query($sql);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['text'] = $row['jajaran'];
            $data[] = $row;
        }
        $result->free();
    }
}
$mysqli->close(); //($connection);
echo json_encode($data);
?>
