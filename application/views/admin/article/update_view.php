<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
<link href="<?php echo base_url('statics/css/H-ui.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/css/H-ui.admin.css')?>" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('statics/font/font-awesome.min.css')?>"/>
<!--[if IE 7]>
<link href="<?php echo base_url('statics/font/font-awesome-ie7.min.css')?>" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo base_url('statics/js/DD_belatedPNG_0.0.8a-min.js')?>" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url('statics/js/jquery.min.1.8.1.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('statics/layer/layer.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('statics/js/pagenav.cn.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/laydate/laydate.js')?>"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/ueditor/ueditor.config.js')?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/ueditor/ueditor.all.min.js')?>"> </script>   
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/ueditor/lang/zh-cn/zh-cn.js')?>"></script>

<style>
.input-text:hover, .textarea:hover {
    border: 1px solid #3BB4F2;
}
.textarea {
    height: 100px;
    resize: none;
    font-size: 14px;
    padding: 4px;
}
.input-text, .textarea {
    box-sizing: border-box;
    border: 1px solid #DDD;
    width: 100%;
    transition: all 0.2s linear 0s;
}

.radius {
    border-radius: 4px;
    overflow: hidden;
}

</style>

<title>上海消防cms管理系统</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<body>
<div class="Huialert Huialert-info" style="height:40px">
<a class="btn btn-primary radius ab" href="<?php echo site_url('admin/article/index');?>">返回文章列表</a>
<a class="btn btn-success radius r mr-20 ab" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a>
</div>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/article/updateArticle");?>" method="post" enctype="multipart/form-data" />
      <table class="table table-bg">
        <tbody>
          <tr>
          <input type="hidden"  name="id"  value="<?php echo $data['0']['id']?>">
          <input type="hidden"  name="thumbnail2" id="thumbnail2" value="<?php echo $data['0']['thumbnail'];?>"> 
            <th width="100" class="text-r"><span class="c-red">*</span> 标题：</th>
            <td><input type="text" style="width:500px" class="input-text" id="title" name="title" value="<?php echo $data['0']['title']?>" datatype="*" nullmsg="文章标题不能为空"></td>
          </tr>
         <tr>
          <tr>
            <th width="100" class="text-r">缩略图：</th>
            <td><input type="file" style="width:500px" class="input-text" id="thumbnail" name="thumbnail"></td>                  
         </tr>

         <tr>
         	<th width="100" class="text-r"></th>
            <td>
             <?php if($data['0']['thumbnail']){
             	$imgUrl=base_url('uploads/resourceImg/'.$data['0']['thumbnail']);
             	echo  "<img src=$imgUrl  style='width:300px;height:300px'>";            	            	
             }?>                  
 			</td>
         </tr>  
          <tr>
          <th class="text-r">资源分类：</th>
          	<th>
          		<select class="select" name="classId" size="1" datatype="select" nullmsg="请选择资源分类！" errormsg="请选择资源分类" >	
          		<option value="">请选择资源分类</option>	
        			<?php foreach ($resourceClass as $k=>$v):?>
        				<optgroup label="<?php echo $v['name'];?>" style="color:#000;font-weight:blod;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu">
        					<?php foreach ($v['list'] as $listK=>$listV):?>
								<option value="<?php echo $listV['id']?>"  <?php if($listV['id']==$data['0']['classId']){echo 'selected';}?>><?php echo $listV['name']?></option>								
							<?php endforeach;?>
						</optgroup>
        			<?php endforeach;?>      		 		       		
     			</select>
          	</th>
         </tr>   
         <tr>
           <th width="100" class="text-r"><span class="c-red">*</span>简介：</th>        
           <td><textarea class="textarea radius"  name="abstract"><?php echo $data['0']['abstract']?></textarea></td>
         </tr>                        
         <tr>
           <th width="100" class="text-r"><span class="c-red">*</span> 正文：</th>        
          <td><script id="editor"  name="content" type="text/plain" style="width:100%;height:500px;"><?php echo $data['0']['content']?></script></td>
         </tr>                            
           <tr>
            <th class="text-r"> <span class="c-red">*</span>推荐：</th>
            <td>
            <label>
                <input name="top" type="radio" id="six_1" value="1" <?php if($data['0']['top']=='1'){echo 'checked';}?>> 是
           	</label>
               <label>
                <input type="radio" name="top" value="2" id="six_0" <?php if($data['0']['top']=='2'){echo 'checked';}?>>否
               </label>
           </td>
          </tr>
          
          <tr>
            <th class="text-r"><span class="c-red">*</span>阅读权限：</th>
            <td>
            <label>
                <input name="member" type="radio" id="six_1" value="1" <?php if($data['0']['member']=='1'){echo 'checked';}?>>会员观看
           	</label>
               <label>
                <input type="radio" name="member" value="2" id="six_0" <?php if($data['0']['member']=='2'){echo 'checked';}?>>无限制
              </label>
           </td>
          </tr>
                            
          <tr>
            <th width="100" class="text-r">来源：</th>
            <td><input type="text" style="width:500px" class="input-text" id="source" name="source"  value="<?php echo $data['0']['source']?>"></td>
          </tr>
           <tr>
            <th width="100" class="text-r">阅读数：</th>
            <td><input type="text" style="width:200px" class="input-text" id="ReadingNumber" name="ReadingNumber" value="<?php echo $data['0']['ReadingNumber']?>"></td>
          </tr>
           <tr>
            <th class="text-r"> <span class="c-red">*</span>状态：</th>
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
            <th width="100" class="text-r"> 排序：</th>
            <td><input type="text" style="width:200px" class="input-text" id="orderlist" name="orderlist" value="<?php echo $data['0']['orderlist'];?>"></td>
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
<script type="text/javascript" src="<?php echo base_url('statics/js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/js/Validform_v4.0_min.js')?>"></script>
<script type="text/javascript">
var ue = UE.getEditor('editor');
var ue2 = UE.getEditor('abstract');

$(".Huiform").Validform(); 
</script>
</body>
</html>