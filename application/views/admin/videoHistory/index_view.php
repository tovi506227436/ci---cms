<?php $this->load->view('admin/public/header_view');?>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 内容管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
  <div class="cl pd-5 bg-1 bk-gray mt-20"> 
  <span class="l">
  	<a href="javascript:;" onClick="delectData('确认要删除吗？','<?php echo site_url('admin/videoHistory/delectArray')?>','<?php echo site_url('admin/videoHistory/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a> 
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
        <th width="100">视频标题</th>    
        <th width="200">用户</th>             
        <th width="30">时间</th>      
        <th width="40">操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <td><input type="checkbox" class="deleteId"  value="<?php echo $v['id'] ;?>" name="checkboxId"></td>
        <td><?php echo $v['id'] ;?></td>
        <td><?php echo $v['title'] ;?></td>  
        <td><?php echo $v['username'] ;?></td>   
        <td><?php echo date('Y-m-d :H:i:s',$v['time']);?></td>        
        <td class="f-14 article-manage">       	   	
        	<a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/videoHistory/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/videoHistory/index');?>')" class="ml-5" style="text-decoration:none">
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
		window.location.href="<?php echo site_url('admin/videoHistory/index')?>"; 
	})	
})
</script>
</html>