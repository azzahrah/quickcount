<div id="layoutInput" class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',height:300,width:300,split:true,title:'Data User'">
        <table id="gridUser"></table>
        <div id="tbUser" style="padding:10px;">
            <input id="sbUser" class="easyui-searchbox" style="width:250px" data-options="prompt:'Ketik Nama User'"></input>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="qc.addUser();">Add</a>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true" onclick="qc.editUser();">Edit</a>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="qc.delUser();">Delete</a>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload',plain:true" onclick="qc.loadUser();">Reload</a>
        </div>
    </div>
</div>
<div id="dialogUser" class="easyui-dialog" data-options="closed:true,width:400,height:230" style="padding:10px;">
    <form id="formUser" method="post">
        <table>
            <input type='hidden' name="id" id="id">
            <input type='hidden' name="mode" id="mode">
            <tr><td>Nama Jajaran</td><td></td><td><input id="id_jajaran" name="id_jajaran" class="easyui-combobox" data-options="valueField:'id',textField:'jajaran',url:'scripts/combobox_jajaran.php',width:250"></td></tr>
            <tr><td>Nama Lengkap</td><td></td><td><input id="real_name" name="real_name" class="easyui-textbox" data-options="width:250"></td></tr>
            <tr><td>Login</td><td></td><td><input id="login" name="login" class="easyui-textbox" data-options="width:250"></td></tr>
            <tr><td>Password</td><td></td><td><input type="password" id="passwordx" name="passwordx" class="easyui-textbox" data-options="width:250"></td></tr>           
        </table>
    </form>
</div>