<?php

require_once("connection.php");
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : "";
$jajaran = isset($_POST['jajaran']) ? $mysqli->real_escape_string($_POST['jajaran']) : "";

$response = array();
$response['msg'] = 'Unknow Error';
$response['code'] = 'ERROR';
$response['data']=$_POST;
switch ($mode) {
    case 'add':
        if (!$mysqli->query("INSERT INTO jajaran (`jajaran`) values('" . $jajaran . "')")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Insert Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    case 'edit':
        if (!$mysqli->query("UPDATE jajaran SET jajaran='" . $jajaran . "' where id='" . $id . "'")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Edit Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    case 'delete':
        if (!$mysqli->query("DELETE FROM jajaran where id='" . $id . "'")) {
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