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
<link href="<?php echo base_url('statics/home/css/user.css')?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('statics/home/Hui/lib/icheck/icheck.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/home/Hui/lib/bootstrapSwitch/bootstrapSwitch.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/home/Hui/lib/font-awesome/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('statics/js/jquery.min.1.8.1.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/layer/layer.js')?>"></script>
<!--
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/jquery.min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/layer1.8/layer.min.js')?>"></script> 
-->
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/laypage/laypage.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/My97DatePicker/WdatePicker.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/icheck/jquery.icheck.min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/bootstrapSwitch/bootstrapSwitch.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/Validform_v5.3.2.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/lib/passwordStrength-min.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/static/h-ui/js/H-ui.js')?>"></script> 
<script type="text/javascript" src="<?php echo base_url('statics/js/H-ui.admin.js')?>"></script>
<script>
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#demoform1").Validform({
		tiptype:2
	});
	$("#demoform2").Validform({
		tiptype:2
	});
	$("#demoform3").Validform({
		tiptype:2
	});
});
</script>
<style>
.st{
	background:#D00202 ;
	color: #FFF;
}

</style> 
<!--[if IE 7]>
<link href="<?php echo base_url('statics/home/Hui/lib/font-awesome/font-awesome-ie7.min.css')?>" rel="stylesheet" type="text/css" />
<![endif]
<link href="<?php echo base_url('statics/home/Hui/lib/iconfont/iconfont.css')?>" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo base_url('statics/home/Hui/text/javascriptlib/DD_belatedPNG_0.0.8a-min.js')?>" ></script>
<script>DD_belatedPNG.fix('*');</script>-->
</head>
<script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>
<body>
    <div id="top">
       <div id="toponly">
       <ul class="top_menu">
          <li>爱消防在线</li>
          <li><a href="#">ixfcn.com</a></li>      
       </ul>  

       <div id="top_bar1">
            <ul><span class="fot" >
               <li><a href="<?php echo site_url();?>"><span style=" color:#ffffff">首页</span></a></li>
               	<?php foreach ($bottonNav as $k=>$v):?>
               	 <li><a href="<?php if($v['picType']=='1'){echo site_url('node/'.$v['id']);}
	               elseif ($v['picType']=='2'){echo site_url('video/'.$v['id']);}
	               elseif ($v['picType']=='3'){echo site_url('enterprise/'.$v['id']);}?>
	               "><?php echo $v['name']?></a><li>        
               <?php endforeach;?> 
               <li><a href="<?php echo site_url('about');?>">关于我们</a></li>
               </span>
            </ul>
        </div>
       </div>
       
    </div>       
    <div id="inzhong">
    
      <div id="left_a1">
         <div class="left_dh"><p class="left_dh1_p"><a href="<?php echo site_url('user')?>">企业展示主页></a></p></div>
         <div class="left_dh"><p class="left_dh1_p"><a href="<?php echo site_url('user_changepwd');?>">密码资料设置></a></p></div>
         <div class="left_dh"><p class="left_dh1_p"><a href="<?php echo site_url('user_history');?>">用户观看记录></a></p></div>
         <div class="left_dh"><p class="left_dh1_p"><a href="<?php echo site_url('user_picture');?>">企业图片上传></a></p></div>
         <div class="left_dh"><p class="left_dh1_p"><a href="<?php echo site_url('user_download');?>">资料表格下载></a></p></div>
      </div>
      <div id="right_a1">    
<script type="text/javascript">        
        $(function(){
			var mark="<?php echo $this->uri->segment(1);?>";		
			if(mark=='user'){				
				$(".left_dh:eq(0)").addClass('st');
				$(".left_dh1_p:eq(0)").addClass('st');
			}else if(mark=='user_changepwd'){
				$(".left_dh:eq(1)").addClass('st');
				$(".left_dh1_p:eq(1)").addClass('st');	
			}else if(mark=='user_history'){
				$(".left_dh:eq(2)").addClass('st');
				$(".left_dh1_p:eq(2)").addClass('st');
			}else if(mark=='user_picture'){
				$(".left_dh:eq(3)").addClass('st');
				$(".left_dh1_p:eq(3)").addClass('st');
			}else if(mark=='user_download'){
				$(".left_dh:eq(4)").addClass('st');
				$(".left_dh1_p:eq(4)").addClass('st');
			}
			var w=$("#container").width();
			var n="<?php echo $videoCompleteNum/10?>";
			var completeNum=n*w;
			$("#completeNum").width(completeNum);

        })        
</script>


          <div id="right_top">
             <div class="right_top_left">
             <?php if($userData['0']['logImg']){?>
             	<img style="width:100px;height:100px"  src="<?php echo base_url('uploads/log/'.$userData['0']['logImg'])?>" />
             <?php }else {?>
             	<img src="<?php echo base_url('statics/images/qy_logo.jpg')?>" />            	
             <?php }?>        
                 <p class="right_top_bt"><?php echo $userData['0']['companyName']?></p>
                 <p class="right_top_tg">注册类型：<?php if($userData['0']['type']=='1'){echo '企业';}elseif ($userData['0']['type']=='2'){echo '供应商';}elseif ($userData['0']['type']=='3'){echo '普通企业';}?></p>
                 <p class="right_top_tg">联系方式：<?php echo $userData['0']['contact']?></p>
                 <p class="right_top_tg">公司地址：<?php echo $userData['0']['companyAddress']?></p>
             </div>            
             <div class="right_top_right">
                <p class="right_top_right_wz">我的消防培训完成度：</p>
                <p id="jd"><?php echo $videoCompleteNum*10?>%</p>
                <div class="ld" id="container">
                   <div class="progress"><div class="progress-bar"><span class="sr-only" id="completeNum"></span></div></div>
                </div>
               <?php if($videoCompleteNum < 10){?>
                <a href="<?php echo site_url('video'.'/118')?>"><div class="ld_an"><p>立即观看视频</p></div></a>
               <?php }elseif ($videoCompleteNum = 10){?>
               	<a href="<?php echo site_url('')?>"><div class="ld_an"><p>上传资料</p></div></a>              	
               <?php }?>
             </div>        
          </div>
        