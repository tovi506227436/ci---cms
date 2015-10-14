<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/user/updateUser");?>" method="post">
      <table class="table table-bg">
        <tbody>
        <input type="hidden" value="<?php echo $data['0']['id'];?>" name="id" >
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 用户名：</th>
            <td><input type="text" style="width:300px" class="input-text" id="name" name="name"  value="<?php echo $data['0']['name']; ?>" datatype="*" nullmsg="会员名不能为空"></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span> 密码：</th>
            <td><input type="password" style="width:300px" class="input-text" id="user-tel" name="pwd" value="<?php echo $data['0']['pwd']; ?>" datatype="*"  nullmsg="密码不能为空"></td>
          </tr>
          	         
           <tr>
         	<th width="100" class="text-r">审核图片：</th>
            <td>
             <?php  $imgUrl=base_url('uploads/userImg/'.$data['0']['license']);
             	    echo  "<span>营业执照：</span><img src=$imgUrl  style='width:150px;height:150px' class='pic'>";            	            	
             ?>
             
             <?php  $imgUrl=base_url('uploads/userImg/'.$data['0']['tax']);
             	    echo  "<span>税务登记：</span><img src=$imgUrl  style='width:150px;height:150px' class='pic'>";            	            	
             ?>
             
             <?php if($data['0']['type']=='1'){
             	$imgUrl=base_url('uploads/resourceImg/'.$data['0']['prove']);
             	echo  "<span>施工证明：</span><img src=$imgUrl  style='width:150px;height:150px' class='pic'>";            	            	
             }?>
             
             <?php if($data['0']['type']=='2'){
             	$imgUrl=base_url('uploads/resourceImg/'.$data['0']['Product']);
             	echo  "<span>产品检验报告：</span><img src=$imgUrl  style='width:150px;height:150px' class='pic'>";            	            	
             }?>
                               
 			</td>
         </tr> 
         <tr>
            <th class="text-r">审核：</th>
            <td>
            <label>
                <input name="examine" type="radio" id="six_1" value="3" <?php if($data['0']['examine']=='3'){echo 'checked';}?>> 通过
           	</label>
               <label>
                <input type="radio" name="examine" value="2" id="six_0" <?php if($data['0']['examine']=='2'){echo 'checked';}?>>未通过
               </label>
           </td>
          </tr>
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 公司名称：</th>
            <td><input type="text" style="width:300px" class="input-text" id="companyName" name="companyName"   value="<?php echo $data['0']['companyName']; ?>"  datatype="*" nullmsg="公司名称不能为空"></td>
          </tr>
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 联系方式：</th>
            <td><input type="text" style="width:300px" class="input-text" id="contact" name="contact" datatype="*"  value="<?php echo $data['0']['contact']; ?>" nullmsg="联系方式不能为空"></td>
          </tr>
          <tr>
            <th  class="text-r" nullmsg="公司名称不能为空"><span class="c-red">*</span> 公司简介：</th>
            <td><textarea name="companyProfile"  style="width: 566px; height: 216px;"><?php echo $data['0']['companyProfile']; ?></textarea></td>
          </tr>
          <tr>
            <th  class="text-r"><span class="c-red">*</span> 公司地址：</th>
            <td><input type="text" style="width:300px"  class="input-text" id="companyAddress" name="companyAddress" datatype="*"  value="<?php echo $data['0']['companyAddress']; ?>" nullmsg="公司地址不能为空"></td>
          </tr>
          <tr>
          	<th class="text-r">所属行业：</th>
          	<th>
          		<select class="select" name="industryClass" size="1">		
        			<?php foreach ($industry as $k=>$v):?>
        				<option value="<?php echo $v['id']?>" <?php if($data['0']['industryClass']==$v['id']){echo 'selected';}?>><?php echo $v['industryName']?></option>
        			<?php endforeach;?>      		 		       		
     			</select>
          	</th>
          </tr>       
          
          	<th class="text-r">用户分类：</th>
          	<th>
          		<select class="select" name="type" size="1">		
        			<option value="1" <?php if($data['0']['type']=='1'){echo 'selected';}?>>普通企业</option> 
        			<option value="2" <?php if($data['0']['type']=='2'){echo 'selected';}?>>供应商</option>
        			<option value="3" <?php if($data['0']['type']=='3'){echo 'selected';}?>>施工企业</option>     		 		       		
     			</select>
          	</th>
          <tr>
          	<th   class="text-r">用户等级：</th>
          	<th>
          		<select class="select" name="level" size="1">       		         			
        			<option value="2" <?php if($data['0']['level']=='2'){echo 'selected';}?>>会员</option>
        			<option value="1" <?php if($data['0']['level']=='1'){echo 'selected';}?>>普通会员</option>         			    		 		       		
     			</select>
          	</th>
          </tr>         
          <tr>
            <th class="text-r">状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" <?php if($data['0']['status']=='1'){echo 'checked';}?>> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0" <?php if($data['0']['status']=='2'){echo 'checked';}?>>停用
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
<div id="rongqi"  style="display:none">
   <img src="" id="pic" style="height:auto" >   
</div> 
<script>
	$(".pic").click(function(){
        var picUrl=$(this).attr("src");    
        var w=$(document).width();
        var h=$(document).height();
        $("#pic").attr("src",picUrl);  	
     	$("#rongqi").show();
     	layer.open({
     	    type: 1,
     	    title: false,
     	    closeBtn: false,
     	    scrollbar: false,
     	    area: '1000px',
     	    skin: 'layui-layer-nobg', //没有背景色
     	    shadeClose: true,
     	    content: $('#rongqi')
     	});
 	    	       	    
      });
	$("#rongqi").click(function(e){		
		$("#rongqi").hide();
		layer.closeAll(); //疯狂模式，关闭所有层
	})
</script>	
<script type="text/javascript">
$(".Huiform").Validform(); 
</script>
</body>
</html>