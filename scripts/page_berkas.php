<div class="panel panel-info" style="width: 100%;">
    <div class="panel-heading">
        Data Berkas Perkaran Laporan (Laka)
    </div>
    <div class="panel-body" style="padding: 10px;">
        <table id="gridLaporan" class="easyui-datagrid" data-options="
               title:'Data Laporan (Laka)',
               url:'scripts/load_lp.php', 
               pagination:true,singleSelect:true,nowrap:false,striped:true,
               autoRowHeight:true,fitColumns:true,toolbar:'#tbLaporan',
               onClickRow:main.onClickRow
               " style="width:98%;max-height: 300px;">
            <thead>
                <tr>
                    <th data-options="field:'id',width:200,hidden:true">Code</th>
                    <th data-options="field:'nama_penyidik',width:200" >Penyidik</th>
                    <th data-options="field:'no_lp',width:200" >No.LP</th>
                    <th data-options="field:'tgl_lp',width:200" >Tanggal LP</th>
                    <th data-options="field:'tgl_update',width:200" >Tanggal Update</th>
                    <th data-options="field:'status',width:200" >Status</th>
                    <th data-options="field:'progress',width:200,formatter:util.formatStatus" >Progress</th>

                </tr>
            </thead>
        </table>
        <div id="tbLaporan" style="padding: 5px;">
            <input id="ss" class="easyui-searchbox" data-options="prompt:'Ketik Nomor Laporan',height:30,width:250"></input>

            &nbsp;Filter Data:
            <input class="easyui-datebox" data-options="width:100,height:30"></input> S/D 
            <input class="easyui-datebox" data-options="width:100,height:30"></input>

        </div>
        <br>
        <table id="gridBerkas" class="easyui-datagrid" data-options="url:'scripts/load_berkas.php',title:'Data Berkas Perkara ', pagination:true,singleSelect:true,nowrap:false,striped:true,autoRowHeight:true,fitColumns:true,toolbar:'#tbBerkas'" style="padding-top: 10px;width:98%;max-height: 300px;">
            <thead>
                <tr>
                    <th data-options="field:'id',width:200,hidden:true">Code</th>
                    <th data-options="field:'tgl_upload',width:120" >Tanggal Upload</th>
                    <th data-options="field:'nama_berkas',width:200" >Nama Berkas</th>
                    <th data-options="field:'ket',width:250" >Keterangan</th>
                    <th data-options="field:'file',width:100,formatter:util.formatDownload">Download</th>
                </tr>
            </thead>
        </table>

        <div id="tbBerkas" style="padding: 5px;">
            <input id="ss" class="easyui-searchbox" data-options="prompt:'Ketik Nama Berkas',height:30,width:250"></input>
            &nbsp;Manajemen Berkas:
            <a class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#dialogBerkas').dialog('open');">Tambah Berkas</a>&nbsp;
            <a class="easyui-linkbutton" data-options="iconCls:'icon-remove'">Hapus Berkas</a>
        </div>
    </div>
</div>

<div id="dialogBerkas" class="easyui-dialog" data-options="closed:true,title:'Tambah Berkas',width:400,height:230,buttons:'#btnUpload'" style="padding:10px;">
    <form id="formKorban" name="formKorban">
        <table class="tblForm">
            <tr><td>Jenis berkas</td><td>:</td><td> <input  name="cboJenisBerkas"   class="easyui-combobox" data-options="valueField:'id',textField:'nama_berkas',url:'scripts/combobox_jenis_berkas.php', width:250,height:30"></input></td></tr>
            <tr><td>Keterangan</td><td>:</td><td> <input name="ket" class="easyui-textbox" data-options="multiline:true,width:250,height:50"></input></td></tr>
            <tr><td>File Upload</td><td>:</td><td> <input name="file" class="easyui-filebox" data-options="width:250,height:30"></input></td></tr>            
        </table>
    </form>
</div>
<div id="btnUpload" style="padding: 5px;">
    <a class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="javascript:alert('Not Working')">Upload Berkas</a>&nbsp;
    <a class="easyui-linkbutton" data-options="iconCls:'icon-remove'">Tutup</a>
</div>