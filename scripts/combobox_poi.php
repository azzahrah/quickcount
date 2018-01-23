<?php
require_once("session.php");
require_once("connection.php");
$q = isset($_POST['q']) ? "WHERE nopol like '%" . strval(mysql_real_escape_string($_POST['q'])) . "%'" : "";
$sql = "";
$userid = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
$sql = "select id,poi,Y(ogc_geom) as lat,X(ogc_geom) as lng,concat_ws(',',X(ogc_geom),Y(ogc_geom)) as latlng from `poi`";//  WHERE user_id='" . $userid . "'";
$rs = mysql_query($sql);
$result = array();
$first=true;
while ($row = mysql_fetch_array($rs)) {

    $opt = array();
    $opt['id'] = $row['id'];
    $opt['text'] = strtoupper($row['poi']);
    $opt['poi'] = strtoupper($row['poi']);
    $opt['lat'] = $row['lat'];
    $opt['lng'] = $row['lng'];
    if ($first == true) {
        $opt['selected'] = 'true';
        $first = false;
    }
    array_push($result, $opt);
}
echo json_encode($result, true);
?>