<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link href="<?php echo base_url('statics/css/H-ui.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/css/H-ui.login.css')?>" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="<?php echo base_url('statics/js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/js/H-ui.js')?>"></script>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
   <form action="<?php echo site_url("admin/login/Login");?>"  method="post"  id="loginFrom">
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_username_error');?></div></center>
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_pwd_error');?></div></center>     
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_code_error');?></div></center>     
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_code2_error');?></div></center>     
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_code4_error');?></div></center>                    
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_code3_error');?></div></center>               
     <center> <div class="col-5" style="color:red"><?php echo $this->session->flashdata('admin_login_error');?></div></center>     
      <div class="formRow user">
        <input id="username"  name="username" type="text" placeholder="账户"  onBlur="if(this.value==''){$(this).next().show();return;}"   onFocus="if(this.value==''){$(this).next().hide();return}" class="input_text input-big" datatype="*" nullmsg="用户名不能为空">
        <div class="col-5 log" style="color:red;display:none" >用户名不得为空 </div>
      </div>
      <div class="formRow password">
        <input id="pwd" name="pwd" type="password" placeholder="密码" class="input_text input-big" onBlur="if(this.value==''){$(this).next().show();return;}"  onFocus="if(this.value==''){$(this).next().hide();return}" >
        <div class="col-5 log" style="color:red;display:none" >密码不得为空 </div>
      </div>
      <div class="formRow yzm">
        <input  name="code" id="code" class="input_text input-big" type="text"  placeholder="请输入验证码"  onBlur="if(this.value==''){$(this).next().show();return;}"  onFocus="if(this.value==''){$(this).next().hide();return}" value="" style="width:150px;">
       	 <div class="col-5 log" style="color:red;display:none" >验证码不得为空 </div>
       </div>
    	<img  style="padding-left: 153px;margin-top: 20px;" id="code_img"   placeholder="请输入验证码"   src="<?php echo site_url('admin/login/outputCheckcode');?>" onclick="document.getElementById('code_img').src='<?php echo site_url('admin/login/outputCheckcode');?>?time='+Math.random();void(0);">
      	<a id="kanbuq" href="javascript:;"   onclick="document.getElementById('code_img').src='<?php echo site_url('admin/login/outputCheckcode');?>?time='+Math.random();void(0);">看不清，换一张</a> 
      <div class="formRow">
        <input name="sub" type="button" id="sub"  class="btn radius btn-success btn-big" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
        <input name="reset" type="reset" class="btn radius btn-default btn-big" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
      </div>
    </form>
  </div>
</div>
<div class="footer">上海司耀信息技术中心</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script type="text/javascript">
$("#sub").click(function(){
	if(checkfrom()==false){
		return;
	}
	$("#loginFrom").submit();
})

$("#loginform").keydown(function(e){
 var e = e || event,
 keycode = e.which || e.keyCode;
 if (keycode==13) {
	 if(checkfrom()==false){
			return;
		}
		$("#loginFrom").submit();
 }
});
function  checkfrom(){
	var username=$("#username").val();
	var pwd=$("#pwd").val();
	var code=$("#code").val();
	if(username==""){
		$(".log:eq(0)").show();
		return false;
	};
	if(pwd==""){
		$(".log:eq(1)").show();
		return false;
	};
	if(code==""){
		$(".log:eq(2)").show();
		return false;
	};	
}
</script>
</body>
</html>

