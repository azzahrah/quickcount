<?php
require_once 'session.php';
require_once 'connection.php';
$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;
$new_password = isset($_POST['new_password']) ? $mysqli->real_escape_string($_POST['new_password']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = 'Update Password Error';
if ($new_password != '') {
    if ($mysqli->query("UPDATE user set password=PASSWORD('" . $new_password . "') WHERE id='". $user_id ."'")) {
        $response['code'] = 'SUCCESS';
        $response['msg'] = 'Update Password Success';
    } else {
        $response['code'] = 'ERROR';
        $response['msg'] = 'Update Password Error' . $mysqli->error;
    }
}
$mysqli->close();
print json_encode($response);
?>