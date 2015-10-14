<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/user/add")?>" method="post">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 用户名：</th>
            <td><input type="text" style="width:300px" class="input-text" id="name" name="name" datatype="*" nullmsg="会员名不能为空"></td>
          </tr>          
          <tr>
            <th class="text-r"><span class="c-red">*</span> 密码：</th>
            <td><input type="text" style="width:300px" class="input-text" id="user-tel" name="pwd"  datatype="*"  nullmsg="密码不能为空"></td>
          </tr>
          
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 公司名称：</th>
            <td><input type="text" style="width:300px" class="input-text" id="companyName" name="companyName" datatype="*" nullmsg="公司名称不能为空"></td>
          </tr>
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 联系方式：</th>
            <td><input type="text" style="width:300px" class="input-text" id="contact" name="contact" datatype="*" nullmsg="联系方式不能为空"></td>
          </tr>
          <tr>
            <th  class="text-r" nullmsg="公司名称不能为空"><span class="c-red">*</span> 公司简介：</th>
            <td><textarea name="companyProfile"  style="width: 566px; height: 216px;"></textarea></td>
          </tr>
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 公司地址：</th>
            <td><input type="text" style="width:300px"  class="input-text" id="companyAddress" name="companyAddress" datatype="*" nullmsg="公司地址不能为空"></td>
          </tr>
          <tr>
          	<th class="text-r">所属行业：</th>
          	<th>
          		<select class="select" name="industryClass" size="1">		
        			<?php foreach ($data as $k=>$v):?>
        				<option value="<?php echo $v['id']?>"><?php echo $v['industryName']?></option>
        			<?php endforeach;?>      		 		       		
     			</select>
          	</th>
          </tr>       
          <tr>
          	<th class="text-r">用户类别：</th>
          	<th>
          		<select class="select" name="type" size="1">		
        			<option value="1">普通企业</option> 
        			<option value="2">供应商</option>
        			<option value="3">施工企业</option>       		 		       		
     			</select>
          	</th>
          </tr>
          <tr>
          	<th   class="text-r">会员等级：</th>
          	<th>
          		<select class="select" name="level" size="1">       		        			
        			<option value="1">普通会员</option> 
        			<option value="2">会员</option>         				 		       		
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