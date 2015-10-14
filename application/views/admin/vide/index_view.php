<?php $this->load->view('admin/public/header_view');?>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 视频管理 <span class="c-gray en">&gt;</span> 视频列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<form  action="<?php echo site_url('admin/vide/index')?>"   enctype="application/x-www-form-urlencoded">
<div class="pd-20">
  <div class="text-c">
  <select class="select" name="classId" size="1" >	
          		<option value="">请选择视频行业</option>	
        			<?php foreach ($industry as $k=>$v):?>
						<option value="<?php echo $v['id']?>"   <?php if($v['id']==$classId){echo 'selected';}?>><?php echo $v['industryName']?></option>
        			<?php endforeach;?>      		 		       		
     			</select>
  <select name="status" class="select">
    <option value="0" <?php if($status=='0'){echo 'selected';}?>>视频状态</option>
    <option value="1" <?php if($status=='1'){echo 'selected';}?>>已启用</option>
    <option value="2" <?php if($status=='2'){echo 'selected';}?>>已停用</option>
  </select>
   日期范围：
   	<input placeholder="请输入日期" style="width:240px" id="start_time" name="start_time" value="<?php echo $start_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
	-
	<input placeholder="请输入日期" style="width:240px"  id="end_time"  name="end_time"	value="<?php echo $end_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">   
    <input type="text" name="title" id=""  value="<?php echo $title ;?>"  placeholder="视频标题" style="width:250px" class="input-text">
    <button type="submit" name="sub"  id="" class="btn btn-success"><i class="icon-search"></i>搜索</button>
  	 <input type="reset" name="button"  id="reset" class="btn btn-primary" value="重置"></i>
  </div>
</form>
  <div class="cl pd-5 bg-1 bk-gray mt-20"> 
  <span class="l">
  	<a href="javascript:;" onClick="delectData('确认要删除吗？','<?php echo site_url('admin/vide/delectArray')?>','<?php echo site_url('admin/vide/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a> 
    <a class="btn btn-primary radius" onClick="layer_show('','','添加视频','<?php echo site_url('admin/vide/add');?>')">
  	<i class="icon-plus"></i> 添加视频</a>
  </span> 
  <span class="r">共有数据：<strong><?php echo $num;?></strong> 条</span> </div>
  <table class="table table-border table-bordered table-bg table-hover table-sort">   
    <thead>
    <tr>
       <th scope="col" colspan="11">行业分类列表</th>
    </tr>
      <tr class="text-c">
        <th width="5px"><input type="checkbox" name="" value=""></th>
        <th width="20">ID</th>
        <th width="150">标题</th>   
        <th width="50">分类</th>      
        <th width="40">排序</th>            
        <th width="30">发布时间</th>
        <th width="30">发布状态</th>
        <th width="40">操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <td><input type="checkbox" class="deleteId"  value="<?php echo $v['id'] ;?>" name="checkboxId"></td>
        <td><?php echo $v['id'] ;?></td>
        <td><?php echo $v['title'] ;?></td>  
        <td><?php echo $IndustryClass[$v['classId']] ;?></td>   
        <td><?php echo $v['orderlist'] ;?></td>        
        <td><?php echo date('Y-m-d :H:i:s',$v['time']);?></td>
        <td class="admin-status">     
           	<?php if($v['status']=='1'){
        		echo "<span class='label label-success'>已启用</span>";        		
        	}elseif($v['status']=='2'){
        		echo "<span class='label'>已停用</span>";       		
        	}?>         
        </td>
        <td class="f-14 article-manage">
        	 <a title="编辑" href="javascript:;" onClick="layer_show('1000','','视频修改','<?php echo site_url('admin/vide/update?id='.$v['id']);?>')" class="ml-5" style="text-decoration:none">
	         	<i class="icon-edit"></i>
	        </a>       	
        	<a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/vide/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/vide/index');?>')" class="ml-5" style="text-decoration:none">
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
		window.location.href="<?php echo site_url('admin/vide/index')?>"; 
	})	
})
</script>
</html>