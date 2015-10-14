<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/index.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
    <div id="con">
       <div id="part_one">
       <!--
           <div class="part_oneleft">
              <img style="width:227px;height:163px"  src="<?php echo base_url('uploads/resourceImg/'.$top['0']['list']['0']['thumbnail'])?>" alt="行业图片" />
              <div class="indnew">
                 <div class="inew">
                    <p class="biaoti"><a href="<?php echo site_url('node/'.$top['0']['id'])?>"><?php echo $top['0']['name']?></a></p>
                    <p class="more"><a href="<?php echo site_url('node/'.$top['0']['id'])?>">更多></a></p>
                 </div>
                 <div style="height:100px">                
                 	<p class="wzt"><a href="<?php echo site_url('article/'.$top['0']['list']['0']['id'])?>"><?php echo $top['0']['list']['0']['title']?></a></p>
                 	<p class="wzs"><?php echo mb_substr($top['0']['list']['0']['abstract'],0,120,'utf-8');?>。。。。。</p>
                 </div>
                <ul>
               <?php foreach ($top['0']['list']  as $Tk=>$Tv):?>
                    <li><a href="<?php echo site_url('article/'.$Tv['id'])?>"><?php echo mb_substr($Tv['title'],0,10,'utf-8')?></a></li>
               <?php endforeach;?>    
                </ul>                
             </div>
           </div>
           -->

           <div id="part_oneleft">
            <?php foreach ($top['0']['list']  as $Tk=>$Tv):?>
              <div class="sy_lb sy<?php echo $Tk ?>">
              <img style="width:227px;height:163px"  src="<?php echo base_url('uploads/resourceImg/'.$Tv['thumbnail'])?>" alt="行业图片" />
              <div class="indnew">
                 <div class="inew">
                    <p class="biaoti"><a href="<?php echo site_url('node/'.$top['0']['id'])?>"><?php echo $top['0']['name']?></a></p>
                    <p class="more"><a href="<?php echo site_url('node/'.$top['0']['id'])?>">更多></a></p>
                 </div>
                 <div style="height:100px">
                 	<p class="wzt"><a href="<?php echo site_url('article/'.$Tv['id'])?>"><?php echo $Tv['title']?></a></p>
                 	<p class="wzs"><?php echo mb_substr($Tv['abstract'],0,120,'utf-8');?>。。。。。</p>
                 </div>
              </div>
              </div>
           <?php endforeach;?>
            <ul id="tab1" >
                 <li class="t1 ll" style="float:left"><a  class="t1" href="<?php echo site_url('article/'.$top['0']['list']['0']['id'])?>" ><?php  echo mb_substr($top['0']['list']['0']['title'],0,10,'utf-8')?></a></li>
                 <li class="t2 ll" style="float:left"><a class="t2" href="<?php echo site_url('article/'.$top['0']['list']['1']['id'])?>" ><?php  echo mb_substr($top['0']['list']['1']['title'],0,10,'utf-8')?></a></li>
                 <li class="t3 ll" style="float:left"><a class="t3"  href="<?php echo site_url('article/'.$top['0']['list']['2']['id'])?>" ><?php  echo mb_substr($top['0']['list']['2']['title'],0,10,'utf-8')?></a></li>
            </ul>               
           </div>
               <script>
    	$(function(){     	
    		$(".ll").mouseover(function(){
				var i=$(this).index();
				$(".sy_lb").hide();
				$(".sy_lb").eq(i).show();
			})
        })
    </script>          
           
           <div id="part_oneright">
               <div class="sign_bar">             
               <p id="isLogin" style="float:left">会员登录</p>
               <a href="<?php echo site_url('quit');?>" style="display:none" id="quit"><p style="float:right;margin-right:5px">安全退出</p></a>
               </div>
               <div class="sign"> 
               	    <span id="userData" style="display:none;font-size:13px">
               	   		<p><span>会员名称：</span><span><?php echo get_cookie('userName');?></span></p>
               	   		<p>公司类型：<?php  
               	   				if(get_cookie('type')=='1'){
               	   					echo '企业';
               	   				}elseif(get_cookie('type')=='2'){
               	   					echo '供应商';
               	   				}elseif(get_cookie('type')=='3'){
               	   					echo '普通企业';
               	   				}              	   			               	   			
               	   		?>
               	   		</p>
               	   		<p>会员类型：<?php if(get_cookie('level')=='1'){
               	   					echo '普通会员';
               	   				}elseif(get_cookie('level')=='2'){
               	   					echo '会员';
               	   				}?>
               	   		</p>
               	   		<p>公司名称：<?php echo mb_substr(get_cookie('companyName'),0,9,'utf-8');?></p>
               	   		<center style="margin-top:10px"><a href="<?php echo site_url('user');?>">【进入】个人资料</a></center>
               	    </span>          
                   <form  action=""  name="loginForm"  method="post" id="loginForm">
                     <input class="text_sign" type="text" placeholder="用户名" id="userName" name="userName" />
                     <input class="text_sign2" type="password" placeholder="密码"  id="pwd" name="pwd" />
                     <input class="sign_btn" type="button" value="登  录" name="login"	 id="login"/>                   
                     <input class="sign_btn2" type="button" value="注  册" name="register" id="register"/>                    
                   </form>
                   <p class="error" id="error" ><?php echo $this->session->flashdata('error');?></p>
                   <p class="ts" id="ts"><a href="#">忘记密码？</a></p>
                </div>                  
           </div>
       </div>
 <script type="text/javascript">
 	$(function(){
		$("#register").click(function(){
			window.location.href="<?php echo site_url('home/index/register');?>";
		})
 	 })
 
 </script>
       <div id="part_two">
       <?php foreach ($left  as $lk=>$lv):?>
          <div class="rtx">
             <p class="biaoti2"><a href="<?php echo site_url('node/'.$lv['id']);?>"><?php echo $lv['name']?></a></p>
             <p class="more2"><a href="<?php echo site_url('node/'.$lv['id']);?>">更多></a></p>
             <ul>
             <?php foreach ($lv['list']  as $lak=>$lav):?>
                <li class="xbth"><a href="<?php echo site_url('article/'.$lav['id']);?>"><?php echo mb_substr($lav['title'],0,12,'utf-8')?></a></li>
                <li class="timeh"><?php echo date("m .d",$lav['time'])?></li>                    
              <?php endforeach;?>
             </ul>
          </div>
         <?php endforeach;?>
       </div>
       
        <div id="part_three">
          <div id="news">
            <div class="newstop">
              <p class="biaoti2"><a href="<?php echo site_url('node/'.$middle['0']['id']);?>"><?php echo $middle['0']['name']?></a></p>
              <p class="more2"><a href="<?php echo site_url('node/'.$middle['0']['id']);?>">更多></a></p>
            </div> 
            <?php foreach ($middle['list']  as $mk=>$mv):?>
              <div class="newlis">
                  <img style="width:158px;height:114px" src="<?php echo base_url('uploads/resourceImg/'.$mv['thumbnail'])?>" alt="最新要闻" /img>
                  <p class="newbt"><a href="<?php echo site_url('article/'.$mv['id']);?>"><?php echo mb_substr($mv['title'],0,20,'utf-8')?></a></p>
                  <p class="newzw"><a href="#"><?php echo mb_substr($mv['abstract'],0,70,'utf-8')?>......</a></p>
                  <p class="newy">[来源:<?php echo mb_substr($mv['source'],0,20,'utf-8')?>]</p>
                  <p class="newt">更新日期：<?php echo date("Y.m.d",$mv['time'])?></p>
              </div>
           <?php endforeach;?> 
          </div>
  
       </div>
       
       <div id="part_four">
           <div class="rtxj">
             <p class="biaoti2"><a href="#">交易平台</a></p>
             <p class="more2"><a href="#">更多></a></p>
             <div class="shopping">
             <a href="#"><img src="<?php echo base_url('statics/home/images/shoppping_bg.jpg')?>" /></a>
             
             </div>

       </div>
                     
          <?php foreach ($right  as $rk=>$rv):?> 
          <div class="rtxz">
             <p class="biaoti2"><a href="<?php echo site_url('node/'.$rv['id']);?>"><?php echo $rv['name']?></a></p>
             <p class="more2"><a href="<?php echo site_url('node/'.$rv['id']);?>">更多></a></p>
             <ul>
             
               <?php foreach ($rv['list']  as $rak=>$rav):?>
                <li class="xbth"><a href="<?php echo site_url('article/'.$rav['id']);?>"><?php echo mb_substr($rav['title'],0,12,'utf-8')?></a></li>
                <li class="timeh"><?php echo date("m .d",$rav['time'])?></li>                    
              <?php endforeach;?>
                
             </ul>
          </div>                
         <?php endforeach;?>
       </div>
       
       <div id="part_five">
            <div class="fivetop">
            <p class="biaoti2"><a href="<?php echo site_url('video'.'/'.'118');?>">在线视频</a></p>
            <img src="<?php echo base_url('statics/home/images/vip.jpg')?>" />
            <p class="more2"><a href="<?php echo site_url('video'.'/'.'118');?>">更多></a></p>
            </div>
            
            <div class="videolis">           
            	<?php foreach ($videoData as $Vk=>$Vv):?>
	                <div class="videosx">
	                <a href="<?php echo site_url('videoPlayer'.'/'.$Vv['id']);?>"><img src="<?php echo base_url('uploads/video'.'/'.$Vv['coverUrl']);?>" alt="<?php echo $Vv['title']?>"  style="width:213px;height:105px"/></a>
	                <p><a href="<?php echo site_url('videoPlayer'.'/'.$Vv['id']);?>"><?php echo mb_substr($Vv['title'],0,18,'utf-8')?></a></p>
	                </div>
                <?php endforeach;?>
            </div>
       </div>
    </div>
      <script>
$(function(){
	var isUserName="<?php echo get_cookie('userName');?>";	
	if(isUserName){
		showHide();
	}
	
	$("#login").click(function(){	
		if($("#userName").val()==""){
				$("#error").show();
				$("#error").text('用户名不可为空');
				return false;
		};
		if($("#pwd").val()==""){
				$("#error").show();
				$("#error").text('密码不可为空');
				return false;
		};
		var loginData={name:$("#userName").val(),pwd:$("#pwd").val()};	
		$.ajax({
			type:"post",
			url: "<?php echo site_url('home/index/login');?>",
			data:loginData,
			success:function(msg){
				if(msg=='-1'){					
					$("#error").text('用户名不可为空');									
				}else if(msg=='-2'){
					$("#error").text('密码不可为空');			
				}else if(msg=='-3'){
					$("#error").text('用户名或密码错误');			
				}else if(msg=='2'){	
					showHide();	
					window.location.reload();		
				}
			}
											
		});
		
	})

	function showHide(){
		$("#loginForm").hide();	
		$("#ts").hide();
		$("#error").hide();
		$("#userData").show();					
		$("#isLogin").text('会员信息');
		$("#quit").show();				
	}
	function stop(){
		   return false;
	}
	document.oncontextmenu=stop;
})
</script>
<?php $this->load->view('home/public/bottom_view');?>   
 