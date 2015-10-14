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



<script type="text/javascript" src="<?php echo base_url('statics/uploadify/jquery.uploadify-3.1.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/uploadify/uploadify.css')?>"/>
<title>上海消防cms管理系统</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<body>
<script type="text/javascript">
var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
var i=0;//初始化数组下标
$(function() {
    $('#file_upload').uploadify({
    	'auto'     : true,//关闭自动上传
    	'removeTimeout' : 1,//文件队列上传完成1秒后删除
    	'swf'      : "<?php echo base_url('statics/uploadify/uploadify.swf')?>",
        'uploader' : "<?php echo base_url('admin/vide/add')?>",
        'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		'buttonText' : '选择视频',//设置按钮文本
        'multi'    : true,//允许同时上传多张图片
        'uploadLimit' : 1,//一次最多只允许上传10张图片
        'fileTypeDesc' : 'Image Files',//只允许上传图像
        'fileTypeExts' : '*.mp4',//限制允许上传的图片后缀
        'fileSizeLimit' : '2000MB',//限制上传的图片不得超过200KB 
        'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
               img_id_upload[i]=data;
               i++; 
              //alert(data);          
			 $("#id_file2").text(data);
			 $("#videoUrl").val(data);
        },
        'onQueueComplete' : function(queueData) {  
        }  
    });
});
</script>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/vide/update")?>" method="post"  id="videform"  enctype="multipart/form-data"/>
      <table class="table table-bg">
        <tbody>
         <input type="hidden"  name="id"  value="<?php echo $data['0']['id']?>">
         <input type="hidden"  name="coverUrl2" id="coverUrl2" value="<?php echo $data['0']['coverUrl'];?>"> 
         <input type="hidden"  name="videoUrl2" id="videoUrl2" value="<?php echo $data['0']['videoUrl'];?>"> 
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 视频标题：</th>
            <td><input type="text" style="width:500px" class="input-text" id="title" name="title"  value="<?php echo $data['0']['title']?>">
            	
            </td>   
          </tr>
         <tr>
         <tr>
            <th width="100" class="text-r"><span class="c-red">*</span>缩略图：</th>
            <td><input type="file" style="width:500px" class="input-text" id="coverUrl" name="coverUrl" datatype="*" nullmsg="缩略图不能为空">
          	<span style="padding-left:5px;color:red"><?php echo $this->session->flashdata('coverUrlError');?></span> 
            </td>
         </tr> 
          <tr>
         	<th width="100" class="text-r"></th>
            <td>
             <?php if($data['0']['coverUrl']){
             	$imgUrl=base_url('uploads/video/'.$data['0']['coverUrl']);
             	echo  "<img src=$imgUrl  style='width:300px;height:300px'>";            	            	
             }?>                  
 			</td>
         </tr> 
         <tr>
           <th width="100" class="text-r"><span class="c-red" >*</span>视频：</th>
           	<th >	
            	<input type="file" name="file_upload" id="file_upload" />
            	<span id="id_file2" style="display:inline-block;width:70px;height:20px;float:left;overflow:hidden"></span>
            	<input type="hidden"  name="videoUrl" id="videoUrl" value="<?php echo $data['0']['videoUrl'];?>">
			</th>		
			<th><input type="hidden" value="1215154" name="tmpdir" id="id_file"></th>
         </tr> 
         <tr>
          <th width="100" class="text-r"><span class="c-red">*</span> 摘要：</th>        
          <td><script id="editor" name="abstract" type="text/plain" style="width:100%; height:200px;" >
          		<?php echo $data['0']['abstract']?>
          </script>

          </td>
         </tr>     
          <tr>
          <th class="text-r"><span class="c-red">*</span>视频行业：</th>
          	<th>
          		<select class="select" name="classId" id="classId">	
          		<option value="">请选择视频行业</option>	
        			<?php foreach ($industry as $k=>$v):?>
						<option class="clssId" value="<?php echo $v['id']?>"  <?php if($v['id']==$data['0']['classId']){echo 'selected';}?>><?php echo $v['industryName']?></option>					
        			<?php endforeach;?>      		 		       		
     			</select>
          	</th>                   	
         </tr> 
          <tr>
          <th class="text-r">资源分类：</th>
         <th>
          		<select class="select" name="resourceClass" size="1" datatype="select" nullmsg="请选择资源分类！" errormsg="请选择资源分类" >	
          		<option value="">请选择资源分类</option>	
        			<?php foreach ($resourceClass as $k=>$v):?>
        				<optgroup label="<?php echo $v['name'];?>" style="color:#000;font-weight:blod;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu">
        					<?php foreach ($v['list'] as $listK=>$listV):?>
								<option value="<?php echo $listV['id']?>"  <?php if($listV['id']==$data['0']['resourceClass']){echo 'selected';}?>><?php echo $listV['name']?></option>								
							<?php endforeach;?>
						</optgroup>
        			<?php endforeach;?>      		 		       		
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
<script type="text/javascript">
$(function(){
	var ue = UE.getEditor('editor');	
})	
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/ueditor/ueditor.config.js')?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/ueditor/ueditor.all.min.js')?>"> </script>   
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/ueditor/lang/zh-cn/zh-cn.js')?>"></script>

</body>
</html>