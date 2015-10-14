<?php $this->load->view('admin/public/header_view');?>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
  <div class="cl pd-5 bg-1 bk-gray">
    <span class="l">
      <!--<a href="javascript:;" onClick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>-->
      <a class="btn btn-primary radius" href="javascript:;" onClick="layer_show('','','添加角色','<?php echo site_url('admin/role/add');?>')"><i class="icon-plus"></i> 添加角色</a>
    </span>
    <span class="r">共有数据：<strong><?php echo count($data);?></strong> 条</span>
  </div>
  <table class="table table-border table-bordered table-hover table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="6">角色管理</th>
      </tr>
      <tr class="text-c">
        <!--<th width="25"><input type="checkbox" value="" name=""></th>-->
        <th width="40">序号</th>
        <th width="200">角色名</th>
        <th>描述</th>
        <th>状态</th>       
        <th width="260" >操作</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">
        <!--<td><input type="checkbox" value="" name=""></td>-->
        <td><?php echo $k+1 ;?></td>
        <td><?php echo $v['role_name'] ;?></td>
        <td><a href="#"><?php echo $v['description'] ;?></a></td>
        <td class="admin-status">     
           	<?php if($v['status']=='1'){
        		echo "<span class='label label-success'>已启用</span>";        		
        	}elseif($v['status']=='2'){
        		echo "<span class='label'>已停用</span>";       		
        	}?>  
        
        </td>
        <td class="f-14">
        <a title="编辑" href="javascript:;" onClick="layer_show('','','权限设置','<?php echo site_url('admin/role/edit?roleId='.$v['id']);?>')" class="ml-5" style="text-decoration:none">
	         	<i class="icon-edit"></i>
	    </a>
	    <a title="删除" href="javascript:;" onClick="user_del2('<?php echo site_url('admin/role/delect');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/role/index');?>')" class="ml-5" style="text-decoration:none">
	        <i class="icon-trash"></i>
	    </a>               
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
</body>

</html>