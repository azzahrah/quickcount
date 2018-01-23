<div class="panel panel-info" style="width: 1044px;">
    <div class="panel-heading">
        Data Laporan  (Laka)
    </div>
    <div class="panel-body" style="padding: 10px;">
        <table id="gridLaporan" class="easyui-datagrid" data-options="title:'Data Laporan Polisi (Laka)',url:'scripts/load_lp.php', pagination:true,singleSelect:true,nowrap:false,striped:true,autoRowHeight:true,fitColumns:true,toolbar:'#tbLaporan'" style="width:98%;max-height: 300px;">
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
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="javascript:$('#gridKorban').edatagrid('addRow')">Filter</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="main.showDialogUpdateStatus();">Update Status</a>
            
            

        </div>
        <br>
        <table id="gridKorban" class="easyui-edatagrid" data-options="title:'Data Korban', pagination:true,singleSelect:true,nowrap:false,striped:true,autoRowHeight:true,fitColumns:true,toolbar:'#toolbarKorban'" style="width:98%;max-height: 300px;">
            <thead>
                <tr>
                    <th data-options="field:'id',width:200,hidden:true">Code</th>
                    <th data-options="field:'nama',width:200" editor="{type:'validatebox',options:{required:true}}">Nama</th>
                    <th data-options="field:'alamat',width:200" editor="{type:'validatebox',options:{required:true}}">Alamat</th>
                    <th data-options="field:'luka',width:200" editor="{type:'validatebox',options:{required:true}}">Luka</th>
                    <th data-options="field:'ket',width:200" editor="{type:'validatebox',options:{required:true}}">Keterangan</th>
                </tr>
            </thead>
        </table>
        <div id="toolbarKorban" style="padding:5px;">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#gridKorban').edatagrid('addRow')">New</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#gridKorban').edatagrid('destroyRow')">Destroy</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#gridKorban').edatagrid('saveRow')">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#gridKorban').edatagrid('cancelRow')">Cancel</a>     
        </div>
        <br>
        <table id="gridSaksi" class="easyui-edatagrid" data-options="title:'Data Saksi',url:'scripts/load_korban.php', pagination:true,singleSelect:true,nowrap:false,striped:true,autoRowHeight:true,fitColumns:true,toolbar:'#toolbarSaksi'" style="width:98%;max-height: 300px;">
            <thead>
                <tr>
                    <th data-options="field:'id',width:200,hidden:true">Code</th>
                    <th data-options="field:'nama',width:200" editor="{type:'validatebox',options:{required:true}}">Nama</th>
                    <th data-options="field:'alamat',width:200" editor="{type:'validatebox',options:{required:true}}">Alamat</th>
                    <th data-options="field:'luka',width:200" editor="{type:'validatebox',options:{required:true}}">Luka</th>
                    <th data-options="field:'ket',width:200" editor="{type:'validatebox',options:{required:true}}">Keterangan</th>
                </tr>
            </thead>
        </table>
        <div id="toolbarSaksi" style="padding:5px;">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#gridSaksi').edatagrid('addRow')">New</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#gridSaksi').edatagrid('destroyRow')">Destroy</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#gridSaksi').edatagrid('saveRow')">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#gridSaksi').edatagrid('cancelRow')">Cancel</a>     
        </div>
        <br>
        <table id="gridPelaku" class="easyui-edatagrid" data-options="title:'Data Pelaku',url:'scripts/load_korban.php', pagination:true,singleSelect:true,nowrap:false,striped:true,autoRowHeight:true,fitColumns:true,toolbar:'#toolbarPelaku'" style="width:98%;max-height: 300px;">
            <thead>
                <tr>
                    <th data-options="field:'id',width:200,hidden:true">Code</th>
                    <th data-options="field:'nama',width:200" editor="{type:'validatebox',options:{required:true}}">Nama</th>
                    <th data-options="field:'alamat',width:200" editor="{type:'validatebox',options:{required:true}}">Alamat</th>
                    <th data-options="field:'luka',width:200" editor="{type:'validatebox',options:{required:true}}">Luka</th>
                    <th data-options="field:'ket',width:200" editor="{type:'validatebox',options:{required:true}}">Keterangan</th>
                </tr>
            </thead>
        </table>
        <div id="toolbarPelaku" style="padding:5px;">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#gridPelaku').edatagrid('addRow')">New</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#gridPelaku').edatagrid('destroyRow')">Destroy</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#gridPelaku').edatagrid('saveRow')">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#gridPelaku').edatagrid('cancelRow')">Cancel</a>     
        </div>
    </div>
</div>

<div id="dialogUpdateStatus" class="easyui-dialog" data-options="closed:true,title:'Update Status Laporan',width:400,height:240,buttons:'#buttonsUpdateStatus'" style="padding:10px;">
    <form id="formUpdateStatus" name="formUpdateStatus">
        <table class="tblForm">
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="mode" name="mode">
            <tr><td>No.Laporan</td><td>:</td><td> <input name="nopol" class="easyui-textbox" data-options="width:250,height:30,readonly:true"></input></td></tr>
            <tr><td>Status</td><td>:</td><td> <input  name="cboStatusLP"   class="easyui-combobox" data-options="valueField:'id',textField:'status',url:'scripts/combobox_status_lp.php', width:250,height:30"></input></td></tr>
            <tr><td>Keterangan</td><td>:</td><td> <input name="ket" class="easyui-textbox" data-options="multiline:true,width:250,height:60"></input></td></tr>            
        </table>
    </form>
</div>
<div id="buttonsUpdateStatus" style="padding: 5px;">
    <a class="easyui-linkbutton" data-options="iconCls:'icon-save'" onclick="javascript:alert('Not Working')">Update Status</a>&nbsp;
    <a class="easyui-linkbutton" data-options="iconCls:'icon-remove'">Tutup</a>
</div>