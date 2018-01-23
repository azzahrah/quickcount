<?php
require_once 'session.php';
require_once("connection.php");
$session_id_jajaran = isset($_SESSION['id_jajaran']) ? intval($_SESSION['id_jajaran']) : 0;
$user_level = isset($_SESSION['user_level']) ? intval($_SESSION['user_level']) : 0;

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
$id_jajaran = isset($_POST['id_jajaran']) ? intval($_POST['id_jajaran']) : 0;
$search = isset($_POST['search']) ? $mysqli->real_escape_string($_POST['search']) : '';
$offset = ($page - 1) * $rows;
$where = "";

if ($search != "") {
    $where = " AND view_user like '%$search%' ";
}

$total = 0;

$result = $mysqli->query("select count(*) as total from view_user  " . $where);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $total = $row['total'];
    }
}
$data = array();
$data["total"] = $total;
$data["rows"] = array();

$result = $mysqli->query("select * from view_user " . $where . " limit $offset,$rows");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        array_push($data['rows'], $row);
    }
    $result->free();
}
$mysqli->close();
echo json_encode($data);
?>
