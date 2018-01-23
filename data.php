<!DOCTYPE html>
<html ng-app="dataApp" lang="en">
    <head>
        <title id='Description'>Pemberkasan Online </title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="js/jqwidgets-ver4.1.2/jqwidgets/styles/jqx.base.css" type="text/css" />
        <link rel="stylesheet" href="js/jqwidgets-ver4.1.2/jqwidgets/styles/jqx.darkblue.css" type="text/css" />
        <script type="text/javascript" src="js/jqwidgets-ver4.1.2/scripts/jquery-1.11.1.min.js" ></script>
        <script type="text/javascript" src="js/jqwidgets-ver4.1.2/scripts/angular.min.js"></script>
        <script type="text/javascript" src="js/jqwidgets-ver4.1.2/jqwidgets/jqx-all.js"></script>
        <script type="text/javascript" src="js/jqwidgets-ver4.1.2/jqwidgets/jqxangular.js"></script>
        <script type="text/javascript" src="js/ngStatistik.js"></script>
        <script>
            $(function () {
                $("#menu").load('php_script/menuContent.php', function () {
                    console.log('init menu');
                    $("#jqxMenu").jqxMenu({width: '100%', height: '30px', theme: 'darkblue'});
                    $("#jqxMenu").css('visibility', 'visible');
                });
            });
        </script>
<!--        <script type="text/javascript" src="js/data_laka.js"></script>-->
<!--        <script type="text/javascript" src="js/main.js"></script>-->

    </head>
    <body ng-controller="dataController">
        <div id="main">
            <div id="header"><img src="images/logo1.jpg" width="1044"></div>
            <div id="menu"></div>
            <div id="container">
                <div style="padding:10px 5px;">
                    <jqx-button ng-click="chartdata_bytime('day')">Hari</jqx-button>&nbsp;
                    <jqx-button ng-click="chartdata_bytime('week')">Minggu</jqx-button>&nbsp;
                    <jqx-button ng-click="chartdata_bytime('month')">Bulan</jqx-button>
                </div>
                <jqx-chart id='chartContainer' jqx-settings="chartSettings" style="width: 1044px; height: 500px"></jqx-chart>
            </div>
        </div>

    </body>
</html>