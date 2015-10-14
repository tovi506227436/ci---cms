<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/admin/addAdmin")?>" method="post">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 用户名：</th>
            <td><input type="text" style="width:200px" class="input-text" id="user-name" name="adminName" datatype="*" nullmsg="管理员名不能为空"></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span> 密码：</th>
            <td><input type="text" style="width:300px" class="input-text" id="user-tel" name="pwd"  datatype="*"  nullmsg="密码不能为空"></td>
          </tr>
          <tr>
          	<th   class="text-r">角色：</th>
          	<th>
          		<select class="select" name="roleId" size="1">
          		  <?php foreach ($data as $k=>$v):?>
        			<option value="<?php echo $v['id']?>"><?php echo $v['role_name']?></option>      		 		
        		 <?php endforeach;?>
     			</select>
          	</th>
          </tr>
           <tr>
            <th class="text-r">状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" checked> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0">停用
               </label>
           </td>
          </tr>
          <tr>
            <th></th>
            <td><button class="btn btn-success radius" type="submit"  name="sub"  value="sub"><i class="icon-ok"></i> 确定</button></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script type="text/javascript">
$(".Huiform").Validform(); 
</script>
</body>
</html>