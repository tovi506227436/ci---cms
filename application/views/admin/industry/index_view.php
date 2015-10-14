<?php $this->load->view('admin/public/header_view');?>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span>行业分类管理 <span class="c-gray en">&gt;</span> 行业分类列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <a href="javascript:;" onClick="delectData('确认要删除吗？','<?php echo site_url('admin/industry/delectArray')?>','<?php echo site_url('admin/industry/index')?>')" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>    
     <a class="btn btn-primary radius" href="javascript:;" onClick="layer_show('500','600','添加行业分类','<?php echo site_url('admin/industry/add');?>')"><i class="icon-plus"></i>添加行业分类</a></span>
    <span class="r">共有数据：<strong><?php echo $user_num?></strong> 条</span>
  </div>
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="7">行业分类列表</th>
      </tr>
      <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="40">序号</th>
        <th width="150">行业分类</th>   
        <th width="100">排序</th>
        <th width="100">是否已启用</th>
        <th width="130">时间</th>
        <th width="70">操作</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <td><input type="checkbox" class="deleteId"  value="<?php echo $v['id'] ;?>" name="checkboxId"></td>
        <td><?php echo $v['id'] ;?></td>
        <td><?php echo $v['industryName'] ;?></td>
         <td><?php echo $v['orderlist'] ;?></td>      
        <td class="admin-status">     
           	<?php if($v['status']=='1'){
        		echo "<span class='label label-success'>已启用</span>";        		
        	}elseif($v['status']=='2'){
        		echo "<span class='label'>已停用</span>";       		
        	}?>  
        
        </td>
        <td><?php echo date("Y-m-d  H:i:s",$v['time']);?></td>
        <td class="f-14 admin-manage">	       
	        <a title="编辑" href="javascript:;" onClick="layer_show('','','行业分类设置','<?php echo site_url('admin/industry/update?id='.$v['id']);?>')" class="ml-5" style="text-decoration:none">
	         	<i class="icon-edit"></i>
	        </a>
	        <a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/industry/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/industry/index');?>')" class="ml-5" style="text-decoration:none">
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