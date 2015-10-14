<?php $this->load->view('admin/public/header_view');?>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span>免费视频管理 <span class="c-gray en">&gt;</span> 免费视频列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <a href="javascript:;" onClick="delectData('确认要删除吗？','<?php echo site_url('admin/freevideo/delectArray')?>','<?php echo site_url('admin/freevideo/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>    
     <a class="btn btn-primary radius" href="javascript:;" onClick="layer_show('','900','添加免费视频','<?php echo site_url('admin/freevideo/add');?>')"><i class="icon-plus"></i>添加免费视频</a></span>
    <span class="r">共有数据：<strong><?php echo $num?></strong> 条</span>
  </div>
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="8">免费视频列表</th>
      </tr>
      <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="40">序号</th>
        <th width="300">标题</th>
        <th width="300">url</th>
        <th width="50">排序</th>
        <th width="50">是否已启用</th>
        <th width="100">时间</th>
        <th width="70">操作</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <td><input type="checkbox" class="deleteId"  value="<?php echo $v['id'] ;?>" name="checkboxId"></td>
        <td><?php echo $v['id'] ;?></td>
        <td><?php echo $v['title'] ;?></td>
        <td><?php echo $v['url'] ;?></td>
        <td><?php echo $v['orderlist'] ;?></td>       
        <td class="admin-status">     
           	<?php if($v['status']=='1'){
        		echo "<span class='label label-success'>已启用</span>";        		
        	}elseif($v['status']=='2'){
        		echo "<span class='label'>已停用</span>";       		
        	}?>  
        
        </td>
         <td><?php echo $v['time'] ;?></td>
        <td class="f-14 admin-manage">	       
	        <a title="编辑" href="javascript:;" onClick="layer_show('','','管理员设置','<?php echo site_url('admin/freevideo/update?id='.$v['id']);?>')" class="ml-5" style="text-decoration:none">
	         	<i class="icon-edit"></i>
	        </a>
	        <a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/freevideo/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/freevideo/index');?>')" class="ml-5" style="text-decoration:none">
	        <i class="icon-trash"></i>
	        </a>
        </td>
      </tr>
      <?php endforeach;?>  
    </tbody> 
  </table>
</div>
 <div id="pageNav" class="pageNav"> <?php echo $links ?></div>
</html>