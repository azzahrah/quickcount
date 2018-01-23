<?php

require_once("connection.php");
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
$id_jajaran = isset($_POST['id_jajaran']) ? intval($_POST['id_jajaran']) : 0;
$search = isset($_POST['search']) ? $mysqli->real_escape_string($_POST['search']) : '';
$offset = ($page - 1) * $rows;
$where = " WHERE id_jajaran='". $id_jajaran ."'";

if ($search != "") {
    $where = " AND view_desa like '%$search%' ";
}

$total = 0;

$result = $mysqli->query("select count(*) as total from view_desa  " . $where);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $total = $row['total'];
    }
}
$data = array();
$data["total"] = $total;
$data["rows"] = array();

$result = $mysqli->query("select * from view_desa " . $where . " limit $offset,$rows");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        array_push($data['rows'], $row);
    }
    $result->free();
}
$mysqli->close();
echo json_encode($data);
?>
