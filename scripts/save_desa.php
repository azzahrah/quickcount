<?php

require_once("connection.php");
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$id_jajaran = isset($_POST['id_jajaran']) ? intval($_POST['id_jajaran']) : 0;
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : "";
$desa = isset($_POST['desa']) ? $mysqli->real_escape_string($_POST['desa']) : "";
$jml_dpt = isset($_POST['jml_dpt']) ? intval($_POST['jml_dpt']) : 0;
$jml_dpt_tambahan = isset($_POST['jml_dpt_tambahan']) ? intval($_POST['jml_dpt_tambahan']) : 0;
$jml_dpt_total = isset($_POST['jml_dpt_total']) ? intval($_POST['jml_dpt_total']) : 0;
$jml_suara_sah = isset($_POST['jml_suara_sah']) ? intval($_POST['jml_suara_sah']) : 0;
$jml_suara_tdk_sah = isset($_POST['jml_suara_tdk_sah']) ? intval($_POST['jml_suara_tdk_sah']) : 0;
$jml_suara_golput = isset($_POST['jml_suara_golput']) ? intval($_POST['jml_suara_golput']) : 0;

$response = array();
$response['msg'] = 'Unknow Error';
$response['code'] = 'ERROR';
$response['data']=$_POST;
switch ($mode) {
    case 'add':
    if (!$mysqli->query("INSERT INTO desa (`id_jajaran`,`desa`,`jml_dpt`,`jml_dpt_tambahan`,`jml_dpt_total`) values('" . $id_jajaran . "','" . $desa . "','" . $jml_dpt . "','" . $jml_dpt_tambahan . "','" . $jml_dpt_total . "')")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Insert Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    case 'edit':
        if (!$mysqli->query("UPDATE desa set id_jajaran='" . $id_jajaran. "',desa='" . $desa . "',jml_dpt='" . $jml_dpt . "',jml_dpt_tambahan='" . $jml_dpt_tambahan . "',jml_dpt_total='" . $jml_dpt_total . "',jml_suara_sah='" . $jml_suara_sah . "',jml_suara_tdk_sah='" . $jml_suara_tdk_sah . "',jml_suara_golput='" . $jml_suara_golput . "' where id='" . $id . "'")) {
            $response['msg'] = $mysqli->error;
        } else {
            $response['msg'] = 'Edit Data Success';
            $response['code'] = 'SUCCESS';
        }
        break;
    case 'delete':
        if (!$mysqli->query("DELETE FROM desa where id='" . $id . "'")) {
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