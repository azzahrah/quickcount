<?php

require_once 'session.php';
require_once 'connection.php';
$session_id_jajaran = isset($_SESSION['id_jajaran']) ? intval($_SESSION['id_jajaran']) : 0;
$session_user_level = isset($_SESSION['user_level']) ? intval($_SESSION['user_level']) : 0;
$show_all_jajaran = isset($_POST['show_all_jajaran']) ? intval($_POST['show_all_jajaran']) : 0;
$user_level = isset($_POST['user_level']) ? $mysqli->real_escape_string($_POST['user_level']) : "admin";
$id_jajaran = isset($_POST['id_jajaran']) ? intval($_POST['id_jajaran']) : 0;

$data = array();

$sql = "SELECT * FROM `view_hasil` where id_jajaran='" . $session_id_jajaran . "'";
if ($session_user_level == 1) {
    if ($show_all_jajaran == 1) {
        $sql = "SELECT * FROM `view_hasil`";
    } else {
        $sql = "SELECT * FROM `view_hasil` where id_jajaran='" . $id_jajaran . "'";
    }
}

if ($user_level == 'polsek') {
    //$sql = "SELECT * FROM `view_hasil` where id_jajaran='" . $id_jajaran . "' ORDER by desa";
}
$result = $mysqli->query($sql);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //$row['show_all_jajaran']=$show_all_jajaran;
            $data[] = $row;
        }
        $result->free();
    }
}
$mysqli->close(); //($connection);
echo json_encode($data);
?>
