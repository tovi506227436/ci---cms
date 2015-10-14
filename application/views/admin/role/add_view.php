<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <form class="Huiform" id="roleForm" action="<?php  echo site_url("admin/role/add")?>" method="post">
    <table class="table table-border table-bordered table-bg">
      <tbody>
        <tr>
          <th class="text-r" width="80"><span class="c-red">*</span>角色名称：</th>
          <td><input name="roleName" type="text" id="roleName" class="input-text" value="<?php echo $role_name;?>"  datatype="*" nullmsg="角色不能为空">              	  
          </td>
        </tr>
        <tr>
          <th class="text-r va-t" style="text-align:center">权限：</th>
          <td>
            <table class="table table-border table-bordered table-bg">
              <tbody>
                <tr>               
                  <?php foreach ($data as $k=>$v):?>
                 	 <div class="formControls col-10">
				
				<dl class="permission-list">
					<dt style="clear:both">
						<label>
							<input type="checkbox" value="<?php echo $v['id']?>" id="user-Character-1">
							<?php echo $v['name']?>
						</label>
					</dt>
					<dd style="float:left" >
						<dl class="cl permission-list2">
							<?php foreach ($v['list'] as $x=>$y):?>
							<dd>
								<label class="">
									<input type="checkbox" name="prive[]"  value="<?php echo $y['id'];?>"
									<?php if(in_array($y['id'],$role)){echo "checked";}?> > <?php echo $y['name']?>
								</label>								
							</dd>
							<?php endforeach;?> 
						</dl>
					</dd>
				</dl>
			</div>            
                 <?php endforeach;?> 
               </tr> 
          </tbody>
            </table>
          </td>
        </tr>
         <tr>
            <th class="text-r"> 状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" checked> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0" >停用
               </label>
           </td>
          </tr>
        <tr>
          <th class="text-r va-t">描述：</th>
          <td><textarea name="description"  class="textarea" id="description" placeholder="描述下角色所具有的权限" style="width:500px; height:50px; resize:none"></textarea> 
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
 <script>
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
		
	});
});
</script>
<script>
$(function(){
	$(".Huiform").Validform(); 	
})
</script>
</body>
</html>