function QuickCount() {
    var Q = this;
    Q.mainLayout;
    Q.id_jajaran;
    Q.treeuser;
    Q.treeJajaran;
    Q.treemenu;
    Q.dialogDesa;
    Q.dialogJajaran;
    Q.formJajaran;
    Q.formDesa;
    Q.gridDesa;
    Q.gridUser;
    Q.dialogUser;
    Q.show_all_jajaran = 1;
    // Q.change_page = function (page) {
    //     switch (page) {
    //         case 'home':
    //             break;
    //         case 'input':
    //             break;
    //         case 'user':
    //             break;
    //     }
    // };

    Q.convert = function (rows) {
        function exists(rows, parent) {
            for (var i = 0; i < rows.length; i++) {
                if (rows[i].id === parent)
                    return true;
            }
            return false;
        }

        var nodes = [];
        // get the top level nodes
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            if (!exists(rows, row.parent)) {
                nodes.push({
                    id: row.id,
                    text: row.text
                });
            }
        }

        var toDo = [];
        for (var i = 0; i < nodes.length; i++) {
            toDo.push(nodes[i]);
        }
        var index = 0;
        while (toDo.length) {
            var node = toDo.shift(); // the parent node
            // get the children nodes
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                if (row.parent === node.id) {
                    var child = {id: row.id, text: row.text};
                    if (node.children) {
                        node.children.push(child);
                    } else {
                        node.children = [child];
                    }
                    //toDo.push(child);
                }
            }
            ////console.log((index++)+"."+ toDo.length);
        }
        ////console.log(nodes);
        return nodes;
    };
    //SELECT id_desa,desa.desa,GROUP_CONCAT(CONCAT(no_urut,'.',nama) SEPARATOR ',') AS peserta FROM calon, desa WHERE calon.`id_desa`=desa.id 
    Q.change_jajaran = function (id) {
        console.log('ID Jajaran:' + id);
        Q.gridCalon.datagrid('loadData', {
            total: 0,
            rows: []
        });
        Q.gridDesa.datagrid('loadData', {
            total: 0,
            rows: []
        });

        Q.id_jajaran = id;
        Q.gridDesa.datagrid('reload');
    };

    Q.init = function () {
        Q.mainLayout = $("#mainLayout");
        Q.treeJajaran = $("#treeJajaran");
        Q.treeJajaran.tree({
            width: 250,
            panelWidth: 300,
            url: 'scripts/tree_jajaran.php',
            onBeforeLoad: function (param) {
                console.log('onBeforeLoad');
            },
            loadFilter: function (rows) {
                if (rows !== undefined && rows !== null) {
                    return Q.convert(rows);
                }
            }, onClick: function (node) {
                Q.change_jajaran(node.id);
            }, onLoadSuccess: function (node, data) {
                if (data == undefined || data == null)
                    return;
                for (var i in data) {
                    Q.id_jajaran = data[i].id;
                    Q.change_jajaran(Q.id_jajaran);
                    break;
                }
            }, onError: function (e1, e2) {
                console.log(e1);
                console.log(e2);

            }
        });
        Q.gridDesa = $('#gridDesa');
        Q.gridDesa.datagrid({
            toolbar: '#tbDesa',
            fit: true, singleSelect: true, rownumbers: true, pagination: true,
            url: 'scripts/tabel_desa.php',
            columns: [[
                    {field: 'id', title: 'ID', hidden: true, width: 100},
                    {field: 'jajaran', title: 'Kecamatan', width: 200},
                    {field: 'desa', title: 'Desa', width: 200},
                    {field: 'jml_dpt', title: 'Jumlah DPT', width: 120},
                    {field: 'jml_dpt_tambahan', title: 'DPT Tambahan', width: 120},
                    {field: 'jml_dpt_total', title: 'Total DPT', width: 120},
                    {field: 'jml_suara_sah', title: 'Suara Sah', width: 120},
                    {field: 'jml_suara_tdk_sah', title: 'Tidak Sah', width: 120},
                    {field: 'jml_suara_golput', title: 'Golput', width: 120}
                ]],
            onBeforeLoad: function (param) {
                if (Q.id_jajaran == undefined) {
                    return;
                }
                param.id_jajaran = Q.id_jajaran;
            }, onClickRow: function (index, row) {
                if (row == null) {
                    return;
                }
                Q.id_desa = row.id;
                Q.gridCalon.datagrid('reload');
            }

        });
        Q.dialogDesa = $("#dialogDesa");
        Q.dialogDesa.dialog({
            buttons: [
                {
                    text: 'Save',
                    iconCls: 'icon-save',
                    handler: function () {
                        Q.saveDesa();
                    }
                },
                {
                    text: 'Close',
                    iconCls: 'icon-close',
                    handler: function () {
                        Q.dialogDesa.dialog('close');
                    }
                }
            ]
        });
        Q.formDesa = $("#formDesa");


        Q.gridCalon = $('#gridCalon');
        Q.gridCalon.datagrid({
            toolbar: '#tbCalon',
            height: 300,
            fit: true, singleSelect: true, rownumbers: true, pagination: true,
            url: 'scripts/tabel_calon.php',
            columns: [[
                    {field: 'id', title: 'ID', hidden: true, width: 100},
                    {field: 'desa', title: 'Desa', width: 100},
                    {field: 'no_urut', title: 'No Urut', width: 100},
                    {field: 'nama', title: 'Nama Calon', width: 200},
                    {field: 'suara', title: 'Jumlah Suara', width: 200}
                ]],
            onBeforeLoad: function (param) {
                if (Q.id_desa == undefined) {
                    return;
                }
                param.id_desa = Q.id_desa;
            }
        });
        Q.dialogCalon = $("#dialogCalon");
        Q.dialogCalon.dialog({
            buttons: [
                {
                    text: 'Save',
                    iconCls: 'icon-save',
                    handler: function () {
                        Q.saveCalon();
                    }
                },
                {
                    text: 'Close',
                    iconCls: 'icon-close',
                    handler: function () {
                        Q.dialogCalon.dialog('close');
                    }
                }
            ]
        });
        Q.formCalon = $("#formCalon");

        Q.dialogJajaran = $("#dialogJajaran");
        Q.dialogJajaran.dialog({
            buttons: [
                {
                    text: 'Save',
                    iconCls: 'icon-save',
                    handler: function () {
                        Q.saveJajaran();
                    }
                },
                {
                    text: 'Close',
                    iconCls: 'icon-close',
                    handler: function () {
                        Q.dialogJajaran.dialog('close');
                    }
                }
            ]
        });
        Q.formJajaran = $("#formJajaran");
    };
    Q.init_user = function () {
        Q.mainLayout = $("#mainLayout");
        Q.gridUser = $('#gridUser');
        Q.gridUser.datagrid({
            toolbar: '#tbUser',
            fit: true, singleSelect: true, rownumbers: true, pagination: true,
            url: 'scripts/tabel_user.php',
            columns: [[
                    {field: 'id', title: 'ID', hidden: true, width: 100},
                    {field: 'jajaran', title: 'Jajaran', width: 200},
                    {field: 'login', title: 'Login', width: 200},
                    {field: 'real_name', title: 'Name', width: 120}
                ]]
            , onBeforeLoad: function (param) {
            }
            , onClickRow: function (index, row) {
            }

        });
        Q.dialogUser = $("#dialogUser");
        Q.dialogUser.dialog({
            buttons: [
                {
                    text: 'Save',
                    iconCls: 'icon-save',
                    handler: function () {
                        Q.saveUser();
                    }
                },
                {
                    text: 'Close',
                    iconCls: 'icon-close',
                    handler: function () {
                        Q.dialogUser.dialog('close');
                    }
                }
            ]
        });
        Q.formUser = $("#formUser");
    };
    Q.change_menu = function (id) {

    };
    Q.init_menu = function () {
        Q.treemenu = $("#treeMenu");
        Q.treemenu.tree({
            width: 250,
            panelWidth: 300,
            url: 'scripts/tree_menu.php',
            onBeforeLoad: function (param) {
                console.log('onBeforeLoad');
            }, onClick: function (node) {
                Q.change_menu(node.id);
            }, onError: function (e1, e2) {
                console.log(e1);
                console.log(e2);

            }
        });
    };


    Q.addJajaran = function () {
        Q.dialogJajaran.dialog('open').dialog('center').dialog('setTitle', 'Add Jajaran');
        Q.formJajaran.form('load', {
            id: 0,
            mode: 'add'
        });
    };
    Q.editJajaran = function () {
        var node = Q.treeJajaran.tree('getSelected');
        if (node == null) {
            alert('Pilih Jajaran');
            return;
        }
        node['mode'] = 'edit';
        node['jajaran'] = node['text'];
        console.log(node);
        Q.dialogJajaran.dialog('open').dialog('center').dialog('setTitle', 'Edit Jajaran');
        Q.formJajaran.form('load', node);
    };
    Q.delJajaran = function () {
        var node = Q.treeJajaran.tree('getSelected');
        if (node == null) {
            alert('Pilih Jajaran');
            return;
        }
        node['mode'] = 'delete';
        console.log(node);
        Q.formJajaran.form('load', node);

        if (confirm('Hapus Data')) {
            Q.saveJajaran();
        }
    };
    Q.loadJajaran = function () {
        Q.treeJajaran.tree('reload');
    };
    Q.saveJajaran = function () {
        Q.formJajaran.form('submit', {
            url: 'scripts/save_jajaran.php',
            onSubmit: function () {
                // do some check
                // return false to prevent submit;
            },
            success: function (data) {
                console.log(data);
                Q.treeJajaran.tree('reload');
            }
        });
    };
    /* Desa */
    Q.addDesa = function () {
        Q.dialogDesa.dialog('open').dialog('center').dialog('setTitle', 'Add Desa');
        Q.formDesa.form('clear');
        Q.formDesa.form('load', {
            id: 0,
            mode: 'add'
        });
    };
    Q.editDesa = function () {
        var node = Q.gridDesa.datagrid('getSelected');
        if (node == null) {
            alert('Pilih Desa');
            return;
        }
        node['mode'] = 'edit';
        node['jajaran'] = node['text'];
        console.log(node);
        Q.dialogDesa.dialog('open').dialog('center').dialog('setTitle', 'Edit Desa');
        Q.formDesa.form('load', node);
    };
    Q.delDesa = function () {
        var node = Q.gridDesa.datagrid('getSelected');
        if (node == null) {
            alert('Pilih Desa');
            return;
        }
        node['mode'] = 'delete';
        console.log(node);
        Q.formDesa.form('load', node);

        if (confirm('Hapus Data')) {
            Q.saveDesa();
        }
    };
    Q.loadDesa = function () {
        Q.gridDesa.datagrid('reload');
    };
    Q.saveDesa = function () {
        Q.formDesa.form('submit', {
            url: 'scripts/save_desa.php',
            onSubmit: function () {
                // do some check
                // return false to prevent submit;
            },
            onError:function(e1,e2,e3){
              console.log(e1);
            },
            success: function (data) {
                console.log(data);
                Q.gridDesa.datagrid('reload');
            }
        });
    };



    /* Calon */
    Q.addCalon = function () {
        Q.dialogCalon.dialog('open').dialog('center').dialog('setTitle', 'Add Calon Kepala Desa');
        Q.formCalon.form('clear');
        Q.formCalon.form('load', {
            id: 0,
            mode: 'add'
        });
    };
    Q.editCalon = function () {
        var node = Q.gridCalon.datagrid('getSelected');
        if (node == null) {
            alert('Pilih Calon');
            return;
        }
        node['mode'] = 'edit';
        node['jajaran'] = node['text'];
        console.log(node);
        Q.dialogCalon.dialog('open').dialog('center').dialog('setTitle', 'Edit Desa');
        Q.formCalon.form('load', node);
    };
    Q.delCalon = function () {
        var node = Q.gridCalon.datagrid('getSelected');
        if (node == null) {
            alert('Pilih Calon');
            return;
        }
        node['mode'] = 'delete';
        console.log(node);
        Q.formCalon.form('load', node);

        if (confirm('Hapus Data')) {
            Q.saveCalon();
        }
    };
    Q.loadCalon = function () {
        Q.gridCalon.datagrid('reload');
    };
    Q.saveCalon = function () {
        Q.formCalon.form('submit', {
            url: 'scripts/save_calon.php',
            onSubmit: function () {
                // do some check
                // return false to prevent submit;
            },
            success: function (data) {
                console.log(data);
                Q.gridCalon.datagrid('reload');
            }
        });
    };
    /* User */
    Q.addUser = function () {
        Q.dialogUser.dialog('open').dialog('center').dialog('setTitle', 'Add User');
        Q.formUser.form('clear');
        Q.formUser.form('load', {
            id: 0,
            mode: 'add'
        });
    };
    Q.editUser = function () {
        var row = Q.gridUser.datagrid('getSelected');
        console.log(row);
        if (row == null) {
            alert('Pilih Calon');
            return;
        }
        row['mode'] = 'edit';
        Q.dialogUser.dialog('open').dialog('center').dialog('setTitle', 'Edit User');
        Q.formUser.form('load', row);
    };
    Q.delUser = function () {
        var node = Q.gridUser.datagrid('getSelected');
        if (node == null) {
            alert('Pilih Calon');
            return;
        }
        node['mode'] = 'delete';
        console.log(node);
        Q.formUser.form('load', node);

        if (confirm('Hapus Data')) {
            Q.saveUser();
        }
    };
    Q.loadUser = function () {
        Q.gridUser.datagrid('reload');
    };
    Q.saveUser = function () {
        Q.formUser.form('submit', {
            url: 'scripts/save_user.php',
            onSubmit: function () {
                // do some check
                // return false to prevent submit;
            },
            success: function (data) {
                console.log(data);
                Q.gridUser.datagrid('reload');
            }
        });
    };
    var randomScalingFactor = function () {
        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    };
    var randomColorFactor = function () {
        return Math.round(Math.random() * 255);
    };
    var randomColor = function () {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
    };
    Q.change_show_all = function (obj) {
        console.log(obj);
    };
    Q.timer;
    Q.jqhr;
    Q.charts = [];
    Q.generate_chart = function () {
        if (Q.timer) {
            clearTimeout(Q.timer);
        }
        if (Q.jqhr) {
            Q.jqhr.abort();
        }
        console.log('id_jajaran:' + Q.id_jajaran + ',show_all_jajaran:' + Q.show_all_jajaran);
        var kecamatan = [];

        Q.jqhr = $.ajax({
            url: 'scripts/load_hasil.php',
            data: {id: Math.random(), id_jajaran: Q.id_jajaran, show_all_jajaran: Q.show_all_jajaran},
            dataType: 'json',
            type: 'post',
            success: function (result) {
                var html = "<center><table>";
                var data = [];
                var index = 0;
                var total = data.length;
                //get kecamatan
                for (var i in result) {
                    var d = result[i];
                    d.jml_dpt = parseInt(d.jml_dpt, 10);
                    d.jml_dpt_tambahan = parseInt(d.jml_dpt_tambahan, 10);
                    d.jml_dpt_total = parseInt(d.jml_dpt_total, 10);
                    d.jml_suara_sah = parseInt(d.jml_suara_sah, 10);
                    d.jml_suara_tdk_sah = parseInt(d.jml_suara_tdk_sah, 10);
                    d.jml_suara_golput = parseInt(d.jml_suara_golput, 10);
                    d.suara = parseInt(d.suara, 10);

                    //console.log(d.show_all_jajaran);
                    if (kecamatan[d.id_jajaran] == undefined) {
                        kecamatan[d.id_jajaran] = {
                            id: d.id_jajaran,
                            jajaran: d.jajaran,
                            desa: []
                        };
                    }
                }

                //get Desa
                for (var i in result) {
                    var d = result[i];
                    var k = kecamatan[d.id_jajaran];
                    if (k != undefined) {
                        if (k.desa[d.id_desa] == undefined)
                        {
                            k.desa[d.id_desa] = {
                                id: d.id_desa,
                                id_jajaran: d.id_jajaran,
                                jml_dpt: d.jml_dpt,
                                jml_dpt_tambahan: d.jml_dpt_tambahan,
                                jml_dpt_total: d.jml_dpt_total,
                                jml_suara_sah: d.jml_suara_sah,
                                jml_suara_tdk_sah: d.jml_suara_tdk_sah,
                                jml_suara_golput: d.jml_suara_golput,
                                desa: d.desa,
                                config: {
                                    title: '',
                                    labels: [],
                                    datasets: [
                                        {
                                            label: '',
                                            backgroundColor: [randomColor(), randomColor()],
                                            borderColor: "rgba(255,99,132,1)",
                                            borderWidth: 1,
                                            pointBackgroundColor: "rgba(151,187,205,1)",
                                            hoverBackgroundColor: "rgba(255,99,132,0.4)",
                                            hoverBorderColor: "rgba(255,99,132,1)",
                                            data: []
                                        }
                                    ]
                                },
                                calon: []
                            };
                        }
                    }
                }

                //get Peserta
                for (var i in result) {
                    var data = result[i];
                    var k = kecamatan[data.id_jajaran];
                    if (k != undefined) {
                        var d = k.desa[data.id_desa];
                        if (d != undefined) {
                            if (d.calon[data.id] == undefined) {
                                d.calon[data.id] = {
                                    id: data.id,
                                    no_urut: data.no_urut,
                                    nama: data.nama,
                                    suara: data.suara
                                };
                            }
                        }
                    }
                }
                var html = "<center>";
                for (var i in kecamatan) {
                    var kec = kecamatan[i];
                    html += "<table>";
                    //Start TD Chart Title
                    html += "<tr><td><center><h1>" + kec.jajaran + "</h1></center></td></tr>";
                    //Start TD Chart
                    html += "<tr><td>";
                    //Start tabel Chart
                    html += "<center><table class='mytbl'><tr>";
                    for (var j in kec.desa) {
                        var des = kec.desa[j];
                        des.config.title.text = des.desa;

                        html += "<td style='width:360px;height:210px;border:1px solid blue;text-align:center;align:center;'>";
                        html += "<canvas id='chart_" + des.id + "' width='350' height='200'></canvas>";
                        var perolehanSuara = 0;
                        for (var k in des.calon) {
                            var cal = des.calon[k];
                            perolehanSuara += parseInt(cal.suara, 10);
                            des.config.labels.push(cal.nama);
                            des.config.datasets[0].data.push(cal.suara);
                            des.config.datasets[0].label = des.desa;
                        }
                        html += "<center>"; //Start Center Info
                        html += "<table>"; //Start Tabel Info
                        html += "<tr><td style='width:120px;'>DPT</td><td style='width:10px;'>:</td><td>" + des.jml_dpt + "</td></tr>";
                        html += "<tr><td>DPT Tambahan</td><td>:</td><td>" + des.jml_dpt_tambahan + "</td></tr>";
                        html += "<tr><td>DPT Total</td><td>:</td><td>" + des.jml_dpt_total + "</td></tr>";
                        html += "<tr><td>Suara Sah</td><td>:</td><td>" + des.jml_suara_sah + "</td></tr>";
                        html += "<tr><td>Suara Tidak Sah</td><td>:</td><td>" + des.jml_suara_tdk_sah + "</td></tr>";
                        html += "<tr><td>Suara Golput</td><td>:</td><td>" + des.jml_suara_golput + "</td></tr>";
                        var total = parseInt(des.jml_suara_sah, 10) + parseInt(des.jml_suara_tdk_sah, 10) + parseInt(des.jml_suara_golput, 10);
                        console.log('total:' + total + ',total2:' + des.jml_dpt_total);
                        if (parseInt(total, 10) != parseInt(des.jml_dpt_total, 10)) {
                            html += "<tr><td>ERROR</td><td>:</td><td style='color:red;font-size:14px;'>Jumlah DPT Total Tidak Sama</td></tr>";
                        }
                        if (perolehanSuara != des.jml_suara_sah) {
                            html += "<tr><td>ERROR</td><td>:</td><td style='color:red;font-size:14px;'>Suara Sah Tidak Sama</td></tr>";
                        } else if (perolehanSuara <= 0) {
                            console.log('perolehanSuara:' + perolehanSuara);
                            html += "<tr><td>ERROR</td><td>:</td><td style='color:red;font-size:14px;'>Perolehan Suara Kosong</td></tr>";
                        }
                        html += "</table>"; //End Tabel Info
                        html += "</center>"; //End Center Info
                        html += "</td>"; //End TD Chart
                    }
                    //End table chart
                    html += "</tr></table>";
                    //End TD Chart
                    html += "</center></td></tr>";
                    html += "</table>";
                    html += "<br>";
                }
                html += "</center>";
                $("#chartContainer").html(html);

                for (var i in kecamatan) {
                    var kec = kecamatan[i];
                    for (var j in kec.desa) {
                        var des = kec.desa[j];
                        var ctx = $("#chart_" + des.id);
                        var myBarChart = new Chart(ctx, {
                            type: 'bar',
                            data: des.config,
                            options: {
                                seriesDefaults: {
                                    pointLabels: {
                                        show: true
                                    }
                                },
                                legend: {
                                    display: false
                                },
                                responsive: true,
                                maintainAspectRatio: true,
                                scaleFontColor: "#ff0000",
                                defaultFontSize: 12,
                                defaultFontStyle: "bold",
//                                scaleStartValue: 0,
//                                scaleStepWidth: 50,
//                                defaultFontFamily: "'Open Sans', sans-serif",
//                                defaultFontSize: 12,
//                                defaultFontStyle: "bold",
//                                defaultFontColor: "#545454",
                                title: {
                                    text: des.desa,
                                    //position:'bottom',
                                    display: true,
                                    fontFamily: "'Open Sans', sans-serif",
                                    fontSize: 13,
                                    fontStyle: "bold",
                                    fontColor: "blue"
                                },
                                scales: {
                                    xAxes: [{
                                            gridLines: {
                                                display: false
                                            },
                                            ticks: {
                                                beginAtZero: true,
                                                maxRotation: 0,
                                                autoSkip: false,
                                                fontFamily: "'Open Sans', sans-serif",
                                                fontSize: 12,
                                                fontStyle: "bold",
                                                fontColor: "#F00"
                                            }
                                        }]
                                    ,
                                    yAxes: [{
                                            gridLines: {
                                                display: false,
                                                color: "#CCC8BC",
                                                lineWidth: 0,
                                                zeroLineWidth: 0,
                                                zeroLineColor: "#2C292E",
                                                drawTicks: true,
                                                tickMarkLength: 1
                                            },
                                            ticks: {
                                                display: false,
                                                beginAtZero: true,
                                                fontFamily: "'Open Sans', sans-serif",
                                                fontSize: 12,
                                                fontStyle: "bold",
                                                fontColor: "#545454",
                                            }
                                        }]
                                }, animation: {
                                    onComplete: function () {
                                        var chartInstance = this.chart;
                                        var ctx = chartInstance.ctx;
                                        ctx.textAlign = "center";
                                        ctx.fillStyle = "#FF0000";//Chart.helpers.getValueOrDefault(optionTicks.fontColor, globalDefaults.defaultFontColor);
                                        ctx.font = Chart.helpers.fontString(20, "bold", "'Open Sans', sans-serif");
                                        Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
                                            var meta = chartInstance.controller.getDatasetMeta(i);
                                            Chart.helpers.each(meta.data.forEach(function (bar, index) {
                                                //console.log(bar);
                                                //console.log(bar._chart.height +':'+ bar._model.y);
                                                ctx.fillText(dataset.data[index], bar._model.x, bar._model.y - 20);
                                                //ctx.drawText(bar._model.x,bar._model.y,bar._model.x+100,bar._model.y+100,dataset.data[index],"center");
                                            }), this)
                                        }), this);
                                    }
                                }
                            }
                        });
                        //Q.charts[des.id] = myBarChart;
                    }
                }
                Q.timer = setTimeout(function () {
                    Q.generate_chart();
                }, 30000);
            }
        });
    }
    Q.currPage;
    Q.change_page = function (page) {
        Q.currPage = page;
        switch (page) {
            case 'input':
                $("#container").panel('refresh', 'scripts/page_input.php');
                break;
            case 'user':
                $("#container").panel('refresh', 'scripts/page_user.php');
                break;
            case 'berkas':
                $("#container").panel('refresh', 'scripts/page_berkas.php');
                break;
            case 'chart':
                console.log('chart');
                $("#container").panel('refresh', 'scripts/page_chart.php');
                break;
        }
    };
}
var qc = new QuickCount();

$(document).ready(function () {
    $(".collapse navbar-collapse ul li a");
    $("#container").panel({
        onLoad: function () {
            switch (qc.currPage) {
                case 'input':
                    qc.init();
                    $("#layoutInput").layout();
                    break;
                case 'user':
                    qc.init_user();
                    break;
                case 'chart':
                    $('#sbShowAll').switchbutton({
                        onText: 'Semua Polsek', offText: 'Perpolsek',
                        checked: true,
                        onChange: function (checked) {
                            console.log(checked);
                            if (checked === true) {
                                qc.show_all_jajaran = 1;
                            } else {
                                qc.show_all_jajaran = 0;
                            }
                            console.log(qc.show_all_jajaran);
                            qc.generate_chart();
                        }
                    });
                    var cboJajaran = $('#cboJajaran');
                    cboJajaran.combobox({
                        width: 250,
                        height: 30,
                        widthPanel: 300,
                        url: 'scripts/combobox_jajaran.php',
                        valueField: 'id',
                        textField: 'jajaran',
                        onSelect: function (rec) {
                            qc.id_jajaran = rec.id;
                            qc.generate_chart();
                        },
                        onBeforeLoad: function (param) {

                        },
                        onLoadSuccess: function (data) {
                            if (data == undefined) {
                                return;
                            }
                            for (var i in data) {
                                qc.id_jajaran = data[i].id
                                cboJajaran.combobox('setValue', data[i].id);
                                break;
                            }
                            qc.generate_chart();
                        }
                    });
                    break;
            }
        }
    });
    qc.change_page('chart');
});