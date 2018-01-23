<?php

//require_once 'session.php';
require_once 'connection.php';
$user_level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';
$user_id = isset($_SESSION['user_id']) ? $mysqli->real_escape_string($_SESSION['user_id']) : '';

$id = isset($_POST['id']) ? $mysqli->real_escape_string($_POST['id']) : '';
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : '';
$login = isset($_POST['login']) ? $mysqli->real_escape_string($_POST['login']) : '';
$real_name = isset($_POST['real_name']) ? $mysqli->real_escape_string($_POST['real_name']) : '';
$password = isset($_POST['passwordx']) ? $mysqli->real_escape_string($_POST['passwordx']) : '';
$id_jajaran = isset($_POST['id_jajaran']) ? intval($_POST['id_jajaran']) : 0;

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = 'Unauthorized user...';
switch ($mode) {
    case 'add':
        $sql = "INSERT INTO user (`login`,`real_name`,`id_jajaran`,`password`) ";
        $sql .=" VALUES('{$login}','{$real_name}','{$id_jajaran}',PASSWORD('{$password}'))";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Sukses Tambah Data User';
        } else {
            $response['code'] = 'ERROR';
            $response['msg'] = "Tambah Data User Error :" . $mysqli->error;
        }
        break;
    case 'edit':
        $sql = "";
        $sqlPass = "";
        if ($password != '') {
            $sqlPass = ",password=PASSWORD('" . $password . "') ";
        }
        $sql = "UPDATE user SET id_jajaran='{$id_jajaran}',login='{$login}',real_name='{$real_name}' " . $sqlPass . " WHERE id='{$id}' ";
        $response['sql'] = $sql;
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Sukses Edit Data User';
        } else {
            $response['code'] = 'ERROR';
            $response['msg'] = "Edit Data User Error :" . $mysqli->error;
        }
        break;
    case 'delete':
        $sql = "delete from user where id='{$id}' and id<>'{$_SESSION['user_id']}' LIMIT 1";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Sukses Hapus Data User';
        } else {
            $response['code'] = 'ERROR';
            $response['msg'] = "Hapus Data User Error :" . mysql_error();
        }
        break;
}
print json_encode($response);
?>