<?php $this->load->view('admin/public/header_view');?>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span>用户中心 <span class="c-gray en">&gt;</span>会员列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<form  action="<?php echo site_url('admin/user/index')?>"   enctype="application/x-www-form-urlencoded">
<div class="pd-20">
  <div class="text-c">
  <select name="type" class="select">
  	<option value="0" <?php if($type=='0'){echo 'selected';}?>>用户分类</option> 
  	<option value="1" <?php if($type=='1'){echo 'selected';}?>>普通企业</option> 
  	<option value="2" <?php if($type=='2'){echo 'selected';}?>>供应商</option>
  	<option value="3" <?php if($type=='3'){echo 'selected';}?>>施工企业</option>  
  </select>      
  <select name="level" class="select">
    <option value="0" <?php if($level=='0'){echo 'selected';}?>>用户等级</option>    
    <option value="2" <?php if($level=='2'){echo 'selected';}?>>会员</option>
    <option value="1" <?php if($level=='1'){echo 'selected';}?>>普通会员</option>  
  </select>
  <select name="examine" class="select">
    <option value="0" <?php if($examine=='0'){echo 'selected';}?>>审核状态</option>    
    <option value="1" <?php if($examine=='1'){echo 'selected';}?>>未审核</option>
    <option value="2" <?php if($examine=='2'){echo 'selected';}?>>未通过</option>
    <option value="3" <?php if($examine=='3'){echo 'selected';}?>>通过</option>  
  </select>
  <select name="status" class="select">
    <option value="0" <?php if($status=='0'){echo 'selected';}?>>会员状态</option>
    <option value="1" <?php if($status=='1'){echo 'selected';}?>>正常</option>
    <option value="2" <?php if($status=='2'){echo 'selected';}?>>停用</option>
  </select>
   日期范围：
   	<input placeholder="请输入开始日期" style="height:20px;width:215px"  id="start_time" name="start_time" value="<?php echo $start_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
	-
	<input placeholder="请输入结束日期" style="height:20px;width:215px"  id="end_time"  name="end_time"	value="<?php echo $end_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">   
    <input type="text" name="name" id="" placeholder="用户名" style="width:150px" class="input-text">
    <input type="text" name="companyName" id="" value="<?php echo $companyName ;?>"   placeholder="公司名称" style="width:200px" class="input-text">
    <button type="submit" name="sub"  id="" class="btn btn-success"><i class="icon-search"></i>搜索</button>
    <input type="reset" name="button"  id="reset" class="btn btn-primary" value="重置"></i>
    
  </div>
</form>
<div class="cl pd-5 bg-1 bk-gray mt-20"> 
  <span class="l">
  	<a href="javascript:;" onClick="delectData(''确认要删除吗？'','<?php echo site_url('admin/user/delectArray')?>','<?php echo site_url('admin/user/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a> 
    <a class="btn btn-primary radius" onClick="layer_show('800','','添加会员','<?php echo site_url('admin/user/add');?>')">
  	<i class="icon-plus"></i> 添加会员</a>
  </span> 
  <span class="r">共有数据：<strong><?php echo $num;?></strong> 条</span> </div>
  <table class="table table-border table-bordered table-bg table-hover table-sort">
   
    <thead>
      <tr class="text-c">
        <th width="5px"><input type="checkbox" name="" value=""></th>
        <th width="20">ID</th>     
        <th width="50">用户名</th>
        <th width="200">公司名称</th>
        <th width="40">联系人</th>
        <th width="50">行业分类</th>
        <th width="50">用户分类</th>
        <th width="50">联系方式</th>    
        <th width="40">用户等级</th>      
        <th width="30">用户状态</th>
        <th width="30">审核状态</th>
        <th width="80">注册时间</th>
        <th width="50">完成视频记录</th>
        <th width="40">操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <td><input type="checkbox" class="deleteId"  value="<?php echo $v['id'] ;?>" name="checkboxId"></td>
        <td><?php echo $v['id'] ;?></td>
        <td><?php echo $v['name'] ;?></td>
        <td><?php echo $v['companyName'] ;?></td>
        <td><?php echo $v['corporation'] ;?></td>
        <td><?php echo $v['industryName'] ;?></td>    
        <td class="admin-status">     
           	<?php if($v['type']=='1'){
        		echo "<span class='label label-success'>普通企业</span>";        		
        	}elseif($v['type']=='2'){
        		echo "<span class='label label-success'>供应商</span>";       		
        	}elseif($v['type']=='3'){
        		echo "<span class='label label-success'>施工企业</span>";       		
        	}?>         
        </td>
        <td><?php echo $v['contact'] ;?></td>  
        <td class="admin-status">     
           	<?php if($v['level']=='2'){
        		echo "<span class='label label-success'>会员</span>";        		
        	}elseif($v['level']=='1'){
        		echo "<span class='label'>普通会员</span>";       		
        	}?>         
        </td>               
        <td class="admin-status">     
           	<?php if($v['status']=='1'){
        		echo "<span class='label label-success'>已启用</span>";        		
        	}elseif($v['status']=='2'){
        		echo "<span class='label label-danger'>已停用</span>";       		
        	}?>         
        </td>
        <td class="admin-status">     
           	<?php if($v['examine']=='1'){
        		echo "<span class='label label-danger'>未审核</span>";        		
        	}elseif($v['examine']=='2'){
        		echo "<span class='label label-warning'>未通过</span>";       		
        	}elseif($v['examine']=='3'){
        		echo "<span class='label label-success'>通过</span>";       		
        	}?>         
        </td>
        <td><?php echo date('Y-m-d :H:i:s',$v['time']);?></td>
        <td>
        	 <a title="观看完成视频记录" href="javascript:;" onClick="layer_show('600','800','观看完成视频记录','<?php echo site_url('admin/user/videocomplete?userId='.$v['id']);?>')" class="ml-5" style="text-decoration:none">
	         	查看详情</br>
	         	[完成：<span style="color:red"><?php echo $v['videocompleteNum']*10?>%</span>]
	        </a>
	    </td>
        <td class="f-14 article-manage">
        	 <a title="编辑" href="javascript:;" onClick="layer_show('900','','会员修改','<?php echo site_url('admin/user/updateUser?id='.$v['id']);?>')" class="ml-5" style="text-decoration:none">
	         	<i class="icon-edit"></i>
	        </a>       	
        	<a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/user/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/user/index');?>')" class="ml-5" style="text-decoration:none">
	        <i class="icon-trash"></i>
	        </a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
   <div id="pageNav" class="pageNav"> <?php echo $links ?></div>
</div>
</body>
<script  type="text/javascript">
$(function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库	
	$("#reset").click(function(){
		window.location.href="<?php echo site_url('admin/user/index')?>"; 
	})
})
</script>
</html>