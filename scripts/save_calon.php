<?php

require_once("connection.php");
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : "";
$id_desa = isset($_POST['id_desa']) ? intval($_POST['id_desa']) : 0;
$no_urut = isset($_POST['no_urut']) ? intval($_POST['no_urut']) : 0;
$suara = isset($_POST['suara']) ? intval($_POST['suara']) : 0;
$nama = isset($_POST['nama']) ? $mysqli->real_escape_string($_POST['nama']) : "";
$response = array();
$response['msg'] = 'Unknow Error';
$response['code'] = 'ERROR';
$response['data']=$_POST;
switch ($mode) {
    case 'add':
        if (!$mysqli->query("INSERT INTO calon (`id_desa`,`no_urut`,`nama`,`suara`) values('" . $id_desa . "','" . $no_urut . "','" . $nama . "','" . $suara . "')")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Insert Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    case 'edit':
        if (!$mysqli->query("UPDATE calon SET id_desa='" . $id_desa . "',no_urut='" . $no_urut . "',nama='" . $nama . "',suara='" . $suara . "' where id='" . $id . "'")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Edit Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    case 'delete':
        if (!$mysqli->query("DELETE FROM calon where id='" . $id . "'")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Delete Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    default:
        $response['msg'] = 'Undefine Mode Data';
        break;
}
$mysqli->close();
echo json_encode($response, true);
?>