<?php

require_once("connection.php");
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
$id_desa = isset($_POST['id_desa']) ? intval($_POST['id_desa']) : 0;
$search = isset($_POST['search']) ? $mysqli->real_escape_string($_POST['search']) : '';
$offset = ($page - 1) * $rows;
$where = " WHERE id_desa='" . $id_desa . "' ";

if ($search != "") {
    $where = " AND like '%$search%' ";
}

$total = 0;

$result = $mysqli->query("select count(*) as total from view_calon  " . $where);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total = $row['total'];
        }
        $result->free();
    }
}
$data = array();
$data["total"] = $total;
$data["rows"] = array();

$result = $mysqli->query("select * from view_calon " . $where . " limit $offset,$rows");
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data['rows'], $row);
        }
        $result->free();
    }
}
$mysqli->close();
echo json_encode($data);
?>
