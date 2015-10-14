<?php $this->load->view('admin/public/header_view');?>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 内容管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<form  action="<?php echo site_url('admin/article/index')?>"   enctype="application/x-www-form-urlencoded">
<div class="pd-20">
  <div class="text-c">
  <select class="select" name="classId" size="1" >	
          		<option value="">请选择资源分类</option>	
        			<?php foreach ($resourceClass as $k=>$v):?>
        				<optgroup label="<?php echo $v['name'];?>" style="color:#000;font-weight:blod;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu">
        					<?php foreach ($v['list'] as $listK=>$listV):?>
								<option value="<?php echo $listV['id']?>"   <?php if($listV['id']==$classId){echo 'selected';}?>><?php echo $listV['name']?></option>								
							<?php endforeach;?>
						</optgroup>
        			<?php endforeach;?>      		 		       		
     			</select>
  <select name="top" class="select">
    <option value="0" <?php if($cltop=='0'){echo 'selected';}?>>是否推荐</option>
    <option value="1" <?php if($top=='1'){echo 'selected';}?>>推荐</option>
    <option value="2" <?php if($top=='2'){echo 'selected';}?>>不推荐</option>
  </select>
  <select name="status" class="select">
    <option value="0" <?php if($status=='0'){echo 'selected';}?>>文章状态</option>
    <option value="1" <?php if($status=='1'){echo 'selected';}?>>已启用</option>
    <option value="2" <?php if($status=='2'){echo 'selected';}?>>已停用</option>
  </select>
   日期范围：
   	<input placeholder="请输入日期" style="width:240px" id="start_time" name="start_time" value="<?php echo $start_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
	-
	<input placeholder="请输入日期" style="width:240px"  id="end_time"  name="end_time"	value="<?php echo $end_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">   
    <input type="text" name="title" id=""  value="<?php echo $title ;?>"  placeholder="文章标题" style="width:250px" class="input-text">
    <button type="submit" name="sub"  id="" class="btn btn-success"><i class="icon-search"></i>搜索</button>
  	 <input type="reset" name="button"  id="reset" class="btn btn-primary" value="重置"></i>
  </div>
</form>
  <div class="cl pd-5 bg-1 bk-gray mt-20"> 
  <span class="l">
  	<a href="javascript:;" onClick="delectData('确认要删除吗？','<?php echo site_url('admin/article/delectArray')?>','<?php echo site_url('admin/article/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a> 
    <a class="btn btn-primary radius" href="<?php echo site_url('admin/article/add');?>">
  	<i class="icon-plus"></i> 添加文章</a>
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
        <th width="20">推荐</th>
        <th width="20">阅读/次</th>
        <th width="30">阅读限制</th>
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
        <td><?php echo  $resourceData[$v['classId']]   ;?></td>
        <td><?php echo $v['orderlist'] ;?></td>
        <td class="admin-status">     
           	<?php if($v['top']=='1'){
        		echo "<span class='label label-success'>推荐</span>";        		
        	}elseif($v['top']=='2'){
        		echo "<span class='label'>推荐</span>";       		
        	}?>         
        </td>
        <td><?php echo $v['ReadingNumber'] ;?></td>
        <td class="admin-status">     
           	<?php if($v['member']=='1'){
        		echo "<span class='label label-success'>会员观看</span>";        		
        	}elseif($v['member']=='2'){
        		echo "<span class='label'>无限制</span>";       		
        	}?>         
        </td>
        
        <td><?php echo date('Y-m-d :H:i:s',$v['time']);?></td>
        <td class="admin-status">     
           	<?php if($v['status']=='1'){
        		echo "<span class='label label-success'>已启用</span>";        		
        	}elseif($v['status']=='2'){
        		echo "<span class='label'>已停用</span>";       		
        	}?>         
        </td>
        <td class="f-14 article-manage">
        	 <a title="编辑" href="<?php echo site_url('admin/article/updateArticle?id='.$v['id']);?>" class="ml-5" style="text-decoration:none">
	         	<i class="icon-edit"></i>
	        </a>       	
        	<a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/article/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/article/index');?>')" class="ml-5" style="text-decoration:none">
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
		window.location.href="<?php echo site_url('admin/article/index')?>"; 
	})	
})
</script>
</html>