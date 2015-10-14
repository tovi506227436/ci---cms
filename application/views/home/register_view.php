<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>爱消防在线</title>
<link href="<?php echo base_url('statics/home/css/reg.css')?>" rel="stylesheet" />
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/html5.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/respond.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/PIE_IE678.js')?>"></script>
<![endif]-->
<link href="<?php echo base_url('statics/home/Hui/static/h-ui/css/H-ui.min.css')?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('statics/home/Hui/lib/icheck/icheck.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/home/Hui/lib/bootstrapSwitch/bootstrapSwitch.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/home/Hui/lib/font-awesome/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/jquery.min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/layer1.8/layer.min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/laypage/laypage.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/My97DatePicker/WdatePicker.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/icheck/jquery.icheck.min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/bootstrapSwitch/bootstrapSwitch.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/Validform_v5.3.2.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/passwordStrength-min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/static/h-ui/js/H-ui.js')?>"></script> 
<script>
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#demoform").Validform({
		tiptype:2
	});
});
</script> 
<link href="<?php echo base_url('statics/home/css/index.css')?>" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="<?php echo base_url('statics/home/Hui/lib/font-awesome/font-awesome-ie7.min.css')?>" rel="stylesheet" type="text/css" />
<![endif]
<link href="<?php echo base_url('statics/home/Hui/lib/iconfont/iconfont.css')?>" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/text/javascriptlib/DD_belatedPNG_0.0.8a-min.js')?>" ></script>
<script>DD_belatedPNG.fix('*');</script>-->
</head>

<?php $this->load->view('home/public/header_view');?>
    
    <div id="con_1">
           <form action="<?php echo site_url('home/index/regSub');?>"   method="post"  enctype="multipart/form-data" class="form form-horizontal responsive" id="demoform">
            <div class="row cl">
				<label class="form-label col-2">用户名：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text"  name="name"   value="<?php echo $this->session->flashdata('name');?>"   placeholder="用户名" datatype="*" nullmsg="请输入用户名！">
				</div>
				<div class="col-5" ></div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">密码：</label>
				<div class="formControls col-5">
					<input type="password" class="input-text" name="pwd"  placeholder="密码" datatype="*" nullmsg="请输入用户登陆密码！">
				</div>
				<div class="col-5"> </div>
			</div>
           <div class="row cl">
				<label class="form-label col-2">公司类型：</label>
				<div class="formControls skin-minimal col-5">
					<div class="radio-box">
						<input type="radio" id="sex-1"  class="companyType"  value="1" name="type" datatype="*" nullmsg="请选择公司类型！">
						<label for="sex-1" >普通企业</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="sex-2"  class="companyType"  value="2"  name="type" >
						<label for="sex-2" >供应商</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="sex-3"  class="companyType"  value="3" name="type"  >
						<label for="sex-3" >施工企业</label>
					</div>
				</div>
				<div class="col-5"> </div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">公司名称：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="公司名称"  value="<?php echo $this->session->flashdata('companyName');?>"   name="companyName"  datatype="*" nullmsg="请输入公司名称！">
				</div>
				<div class="col-5"> </div>
			</div>
            
            <div class="row cl">
				<label class="form-label col-2">公司行业类型：</label>
				<div class="formControls col-5"> <span class="select-box">
					<select class="select" size="1" name="industryClass" datatype="*" nullmsg="请选择类型！">
						<option value="" selected>公司类型</option>
						<?php foreach ($industryClass as $k=>$v):?>
							<option value="<?php echo $v['id'];?>"    <?php if($v['id']==$this->session->flashdata('industryClass')){echo 'selected';}?> ><?php echo $v['industryName'];?></option>
						<?php endforeach;?>
						
					</select>
					</span> </div>
				<div class="col-5"> </div>
			</div>           
            
			<div class="row cl">
				<label class="form-label col-2">联系人：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="联系人" name="corporation"  value="<?php echo $this->session->flashdata('corporation');?>"   id="corporation" datatype="*" nullmsg="联系人不能为空">
				</div>
				<div class="col-5"> </div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">联系方式：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="联系方式" name="contact" id="contact"   value="<?php echo $this->session->flashdata('contact');?>"    datatype="*" nullmsg="联系方式不能为空">
				</div>
				<div class="col-5"> </div>
			</div>
				<div class="col-5"> </div>
              
                <div class="row cl">
				<label class="form-label col-2">联系地址：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="联系地址" name="companyAddress"   value="<?php echo $this->session->flashdata('companyAddress');?>"   datatype="*" nullmsg="请输入企业联系地址！">
				</div>
				<div class="col-5"> </div>
			</div>
                
                
                <div class="row cl">
				<label class="form-label col-2">公司简介：</label>
				<div class="formControls col-5">
					<textarea name="companyProfile"   cols="" rows="" class="textarea"  placeholder="公司简介...最少输入20个字符" datatype="*10-500" nullmsg="备注不能为空！" onKeyUp="textarealength(this,500)"><?php echo  $this->session->flashdata('companyProfile');?></textarea>
					<p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
				</div>
				<div class="col-5"> </div>
			</div>	
			<div class="row cl">
				<label class="form-label col-2">营业执照：</label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="license1" id="uploadfile-2" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn">浏览文件</a>
					<input type="file" multiple   name="license"  class="input-file">
					</span> </div>
				<div class="col-5"> </div>
			</div>
            
            <div class="row cl">
				<label class="form-label col-2">税务登记：</label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text"  name="tax1"  id="uploadfile-2" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"> 浏览文件</a>
					<input type="file" multiple  name="tax"    class="input-file">
					</span> </div>
				<div class="col-5"> </div>
			</div>
			
						  
            <div class="row cl" id="prove" style="display:none">
				<label class="form-label col-2">施工证明：</label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="prove1"  id="prove2"   datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"> 浏览文件</a>
					<input type="file" multiple class="input-file"   name="prove" id="prove3" >
					</span> </div>
				<div class="col-5"> </div>
			</div> 
			           
         	 <div class="row cl" id="Product" style="display:none">
				<label class="form-label col-2">产品检验报告：</label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="Product1" id="Product2"   datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn">浏览文件</a>
					<input type="file" multiple  class="input-file"  name="Product" id="Product3">
					</span> </div>
				<div class="col-5"> </div>
			</div>			
            <div class="row cl">
				<div class="col-10 col-offset-2">
					<input class="btn btn-primary" type="submit"  name="sub"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
			
		</form>
</div>
    </div>    
   <?php $this->load->view('home/public/bottom_view');?> 
</body>
<script>
$(function(){
	var imgError="<?php echo $this->session->flashdata('imgError');?>";
	if(imgError){
		layer.msg(imgError); 
	}
	var userError="<?php echo $this->session->flashdata('userError');?>";
	if(userError){
		layer.msg(userError); 
	}
	$(".companyType").click(function(){
		if($(this).val()=='1'){
			$("#prove").hide();
			$("#Product").hide();
			$("#Product2").removeAttr("datatype");
			$("#Product3").removeAttr("type");
			$("#Product3").removeAttr("name");
			
			$("#prove2").removeAttr("datatype");
			$("#prove3").removeAttr("type");
			$("#prove3").removeAttr("name");

		}
		if($(this).val()=='2'){
			$("#Product").show();
			$("#prove").hide();
			$("#prove2").removeAttr("datatype");
			$("#prove3").removeAttr("type");
			$("#prove3").removeAttr("name");


			$("#Product2").attr('datatype','*');
			$("#Product3").attr('type','file');
			$("#Product3").attr('name','Product');
			

			
		}
		if($(this).val()=='3'){			
			$("#Product").hide();
			$("#prove").show();
			$("#prove2").attr('datatype','*');
			$("#prove3").attr('type','file');
			$("#prove3").attr('name','prove');

			
			
			$("#Product2").removeAttr("datatype");
			$("#Product3").removeAttr("type");
			$("#Product3").removeAttr("name");

			
		}					
	})
			
})  
</script>
<script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>
</html>
