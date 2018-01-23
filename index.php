<?php require_once 'scripts/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title id='Description'>Pemberkasan Online </title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link href="js/bootstrap-3.3.6/dist/css/bootstrap.css?v=0.1" rel="stylesheet">
        <link href="js/bootstrap-3.3.6/dist/css/bootstrap-theme.css?v=0.1" rel="stylesheet">
        <link href="js/jquery-easyui-1.4.5/themes/bootstrap/easyui.css?v=0.1" rel="stylesheet">
        <link href="js/jquery-easyui-1.4.5/themes/icon.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-easyui-1.4.5/jquery.min.js"></script>
        <script type="text/javascript" src="js/chartjs/dist/Chart.bundle.js"></script>
        <script type="text/javascript" src="js/jquery-easyui-1.4.5/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="js/jquery-easyui-1.4.5/jquery.edatagrid.js"></script>
        <script src="js/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="js/Util.js"></script>
        <script src="js/quickcount.js"></script>
    </head>
    <body>
        <div class="easyui-layout" fit='true' border='false'>
            <div data-options="region:'north',height:168,border:false">
                <div id="header"><img src="images/logo.png" width="100%" height="110"></div>
                <?php include("scripts/menu.php"); ?>
            </div>
            <div id="container" data-options="region:'center',border:false">

            </div>
        </div>
    </body>
</html>