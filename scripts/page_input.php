<div id="layoutInput" class="easyui-layout" data-options="fit:true,border:false">
    <div data-options="region:'west',width:300,split:true,title:'Data Jajaran'">
        <div class="easyui-layout" data-options="fit:true,border:false">
            <div data-options="region:'north',height:40" style="padding:5px;">
                <center>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="qc.addJajaran();">Add</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true" onclick="qc.editJajaran();">Edit</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="qc.delJajaran();">Delete</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload',plain:true" onclick="qc.loadJajaran();">Reload</a>
                </center>
            </div>
            <div  data-options="region:'center'">
                <ul id="treeJajaran"></ul>
            </div>
        </div>

    </div>
    <div data-options="region:'center',border:false">
        <div class="easyui-layout" data-options="fit:true,border:false">
            <div data-options="region:'center',height:300,width:300">
                <table id="gridDesa"></table>
                <div id="tbDesa" style="padding:5px;">
                    <span style="font-size: 14px;font-weight: bold;padding-right: 20px;">Data-data Desa >> </span>
<!--                    <input id="sbDesa" class="easyui-searchbox" style="width:250px" data-options="prompt:'Ketik Nama Desa'"></input>-->
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="qc.addDesa();">Add</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true" onclick="qc.editDesa();">Edit</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="qc.delDesa();">Delete</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload',plain:true" onclick="qc.loadDesa();">Reload</a>
                </div>
            </div>
            <div data-options="region:'south',height:200,split:true">
                <table id="gridCalon"></table>
                <div id="tbCalon" style="padding:5px;">
                    <span style="font-size: 14px;font-weight: bold;padding-right: 20px;">Data-data Calon >></span>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="qc.addCalon();">Add</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true" onclick="qc.editCalon();">Edit</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="qc.delCalon();">Delete</a>
                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload',plain:true" onclick="qc.loadCalon();">Reload</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dialogDesa" class="easyui-dialog" data-options="closed:true,width:400,height:400" style="padding:10px;">
    <form id="formDesa" method="post">
        <table class="tblForm">
            <input type='hidden' name="id" id="id">
            <input type='hidden' name="mode" id="mode">
            <tr><td>Nama Jajaran</td><td></td><td><input id="id_jajaran" name="id_jajaran" class="easyui-combobox" data-options="mode:'remote',valueField:'id',textField:'jajaran',url:'scripts/combobox_jajaran.php',width:250,height:30"></td></tr>
            <tr><td>Nama Desa</td><td></td><td><input id="desa" name="desa" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Jumlah DPT</td><td></td><td><input id="jml_dpt" name="jml_dpt" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>DPT Tambahan</td><td></td><td><input id="jml_dpt_tambahan" name="jml_dpt_tambahan" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Total DPT</td><td></td><td><input id="jml_dpt_total" name="jml_dpt_total" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Suara SAH</td><td></td><td><input id="jml_suara_sah" name="jml_suara_sah" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Suara Tidak SAH</td><td></td><td><input id="jml_suara_tdk_sah" name="jml_suara_tdk_sah" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Suara Golput</td><td></td><td><input id="jml_suara_golput" name="jml_suara_golput" class="easyui-textbox" data-options="width:250,height:30"></td></tr>

        </table>
    </form>
</div>
<div id="dialogJajaran" class="easyui-dialog" data-options="closed:true,width:400,height:160" style="padding:10px;">
    <form id="formJajaran" method="post">
        <table class="tblForm">
            <input type='hidden' name="id" id="id">
            <input type='hidden' name="mode" id="mode">
            <tr><td>Nama Jajaran</td><td></td><td><input id="jajaran" name="jajaran" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
        </table>
    </form>
</div>
<div id="dialogCalon" class="easyui-dialog" data-options="closed:true,width:400,height:280" style="padding:10px;">
    <form id="formCalon" method="post">
        <table class="tblForm">
            <input type='hidden' name="id" id="id">
            <input type='hidden' name="mode" id="mode">
            <tr><td>Nama Desa</td><td></td><td><input id="id_desa" name="id_desa" class="easyui-combobox" data-options="mode:'remote',valueField:'id',textField:'desa',url:'scripts/combobox_desa.php',width:250,height:30"></td></tr>
            <tr><td>Nomor Urut</td><td></td><td><input id="no_urut" name="no_urut" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Nama Calon</td><td></td><td><input id="nama" name="nama" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
            <tr><td>Jumlah Suara</td><td></td><td><input id="suara" name="suara" class="easyui-textbox" data-options="width:250,height:30"></td></tr>
        </table>
    </form>
</div>