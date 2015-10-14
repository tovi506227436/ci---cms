<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/admin/updateAdmin");?>" method="post" class="Huiform" id="roleForm" >
      <table class="table table-bg">
      <input type="hidden" value="<?php echo $adminData['0']['id']?>" name="adminId">
        <tbody>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 用户名：</th>
            <td><input type="text" style="width:200px" class="input-text" id="user-name" name="adminName" value="<?php echo $adminData['0']['name']?>" datatype="*" nullmsg="管理员名不能为空"></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span> 密码：</th>
            <td><input type="password" style="width:300px" class="input-text" id="user-tel" name="pwd"  value="<?php echo $adminData['0']['pwd'];?>"  datatype="*"  nullmsg="密码不能为空"></td>
          </tr>
          <tr>
          	<th   class="text-r"><span class="c-red">*</span>角色：</th>
          	<th>
          		<select class="select" name="roleId" size="1">
          		  <?php foreach ($data as $k=>$v):?>
        			<option value="<?php echo $v['id']?>"  <?php if($adminData['0']['roleId']==$v['id']){echo 'selected';}?> ><?php echo $v['role_name']?></option>      		 		
        		 <?php endforeach;?>
     			</select>
          	</th>
          </tr>
           <tr>
            <th class="text-r"><span class="c-red">*</span> 状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" <?php if($adminData['0']['status']=='1'){echo 'checked';}?>> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0" <?php if($adminData['0']['status']=='2'){echo 'checked';}?>>停用
               </label>
           </td>
          </tr>
          <tr>
            <th></th>
            <td>
            <button type="submit" class="btn btn-success radius"  id="adminRoleSave" name="sub"  value="sub"><i class="icon-ok"></i>提交</button>
          </td>
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