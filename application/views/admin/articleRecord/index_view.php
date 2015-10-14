<?php $this->load->view('admin/public/header_view');?>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 内容管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<form  action="<?php echo site_url('admin/ArticleRecord/index')?>"   enctype="application/x-www-form-urlencoded">
<div class="pd-20">
  <div class="text-c">
  <input type="text" name="title" id=""  value="<?php echo $title ;?>"  placeholder="文章标题" style="width:250px" class="input-text">
    <input type="text" name="name" id=""  value="<?php echo $name ;?>"  placeholder="用户名" style="width:250px" class="input-text">
   	<input placeholder="请输入日期" style="width:240px;height:30px" id="start_time" name="start_time" value="<?php echo $start_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
	-
	<input placeholder="请输入日期" style="width:240px;height:30px"  id="end_time"  name="end_time"	value="<?php echo $end_time ;?>" class="laydate-icon input-text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">       
   
    <button type="submit" name="sub"  id="" class="btn btn-success"><i class="icon-search"></i>搜索</button>
  	 <input type="reset" name="button"  id="reset" class="btn btn-primary" value="重置"></i>
  </div>
</form>
  <div class="cl pd-5 bg-1 bk-gray mt-20"> 
  <span class="l">
  	<a href="javascript:;" onClick="delectData('确认要删除吗？','<?php echo site_url('admin/articleRecord/delectArray')?>','<?php echo site_url('admin/articleRecord/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a> 
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
        <th width="100">用户名</th>    
        <th width="200">文章</th>             
        <th width="30">时间</th>      
        <th width="40">操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <td><input type="checkbox" class="deleteId"  value="<?php echo $v['id'] ;?>" name="checkboxId"></td>
        <td><?php echo $v['id'] ;?></td>
        <td><?php echo $v['user'] ;?></td>  
        <td><?php echo $v['article'] ;?></td>   
        <td><?php echo date('Y-m-d :H:i:s',$v['time']);?></td>        
        <td class="f-14 article-manage">       	   	
        	<a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/articleRecord/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/articleRecord/index');?>')" class="ml-5" style="text-decoration:none">
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
		window.location.href="<?php echo site_url('admin/ArticleRecord/index')?>"; 
	})	
})
</script>
</html>