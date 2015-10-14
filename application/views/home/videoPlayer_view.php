<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/freeVideo.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/home/css/player.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>   
   <div id="zhongjian_v">
   <div id="part_five_1">
    <div class="fivetop">
   		    <a href="<?php echo site_url();?>">
            	<p class="biaoti2"  style="background: url(../statics/home/images/two_bg.jpg) no-repeat ">首页&nbsp&nbsp>></p>
            </a>
           <a href="<?php echo site_url('video'.'/'.$videoPlayerData['IndustryName']['0']['id'])?>">
            	<p class="biaoti2"><?php echo $videoPlayerData['IndustryName']['0']['name']?></p>
            </a>
            <p class="more2"><a href="<?php echo site_url('video'.'/'.$videoPlayerData['IndustryName']['0']['id'])?>">更多></a></p>
           
            </div>
     </div>       
      <div id="news_xx">
        <p class="news_xx_bt"><?php echo $videoPlayerData['0']['title']?></p>
        <div class="news_img_1" style="width:600px;height:auto">

<video id="v1">
	<source  src="<?php echo base_url('uploads/video'.'/'.$videoPlayerData['0']['videoUrl'])?>" type="video/mp4" />
		   浏览器不支持
</video>

<div id="vid">
	<div id="div1">
		<div id="div2"></div>
	</div>	
	<div id="but">
		<input type="text"  style="float:left;width:50px" value="播放"  class="player"/>
		<input type="text" value="00:00:00" style="float:left;width:60px"  class="player"/>
		<span style="float:left;line-height:38px">/</span>
		
		<input type="text" value="00:00:00" style="float:left;width:60px"  class="player"/>
		<input type="text" value="静音" 		style="float:right;width:60px"  class="player"/>
		<input type="text" value="全屏" 		style="float:right;width:60px"  class="player"/>
	</div>
</div>
        </div>
        <div style="padding:25px;">
        	<p class="news_xx_zw" style="background-color:'#FBFBFB'">
        		<?php echo $videoPlayerData['0']['abstract']?>
        	</p>
        </div>       	
       </div>
       
     <div id="part_four" style="margin-top:-79px;">
        <?php foreach ($RightData as $Rk=>$Rv):?>
          <div class="rtxz" style="height:207px">
             <p class="biaoti2"><a href="<?php echo site_url('video'.'/'.$Rv['id'])?>"><?php echo $Rv['name'];?></a></p>
             <p class="more2"><a href="<?php echo site_url('video'.'/'.$Rv['id'])?>">更多></a></p>
             <ul>
             
                <?php foreach ($Rv['list'] as $Lk=>$Lv):?>          
                <li class="xbth"><a href="<?php echo site_url('videoPlayer'.'/'.$Lv['id']);?>"><?php echo mb_substr($Lv['title'],0,10,'utf-8');?></a></li>
                <li class="timeh"><?php echo date("Y-m-d",$Lv['time'])?></li> 
                <li style="clear: both"></li>              
               <?php endforeach;?>   

             </ul>
          </div>
        <?php endforeach;?>   
       </div>
       </div>
       </div>
<script>
var isHistoryData="<?php echo $isHistoryData['0']['id'];?>";

if(isHistoryData){
	layer.alert('观看该视频任务你已完成，请观看其他视频', {icon: 1});		
}
 
</script>  
 <script type="text/javascript">
$(function(){
	var oV=document.getElementById('v1');
	var aInput=$('.player');
	var oDiv1=document.getElementById('div1');
	var oDiv2=document.getElementById('div2');
	var zhe=document.getElementById('zhe');
	var videof=document.getElementById('videof');
	var timer=null;	
	var payTime=null;
	var payTime2=null;
	function record(){
		var updateData={'vodeId':"<?php echo $videoPlayerData['0']['id'];?>",'palyTime':oV.currentTime};
		$.ajax({
			type:"post",
			url: "<?php echo site_url('recordingSpot');?>",
			data:updateData,
			success:function(msg){																		
			}											
		});		
	}	
	
	var recordingSpot="<?php echo $recordingSpot['0']['recordingSpot']?>";
	if(changeTime(recordingSpot)=='NaN:NaN:NaN'){
		//aInput[2].value='00:00:00';
		aInput[1].value='00:00:00';
	}else{
		aInput[1].value=changeTime(recordingSpot);
	}
	//aInput[1].value=changeTime(recordingSpot);
	oV.duration=recordingSpot;
	aInput[0].onclick=function(){
		if(oV.paused){
			oV.play();
			this.value="暂停";
			timer=setInterval(nowTime,1000);
			payTime=setInterval(record,3*60*1000);
			//aInput[2].value=changeTime(oV.duration);
			if(changeTime(oV.duration)=='NaN:NaN:NaN'){
				//aInput[2].value='00:00:00';
				aInput[2].value='00:00:00';
			}else{
				aInput[2].value=changeTime(oV.duration);
			}


			
			oV.currentTime=recordingSpot;
			if(recordingSpot>0){
				aInput[1].value=changeTime(recordingSpot);
			}								
		}else{
			oV.pause();
			this.value="播放";
			clearInterval(timer);
			clearInterval(payTime);			
			aInput[2].value=changeTime(oV.duration);
			
		}
	}
	oV.onclick=function(){
		if(oV.paused){
			oV.play();
			aInput[0].value="暂停";
			timer=setInterval(nowTime,1000);
			//aInput[2].value=changeTime(oV.duration);	
			
			if(changeTime(oV.duration)=='NaN:NaN:NaN'){
				//aInput[2].value='00:00:00';
				aInput[2].value='00:00:00';
			}else{
				aInput[2].value=changeTime(oV.duration);
			}
			
			
			oV.currentTime=recordingSpot;
			payTime=setInterval(record,3*60*1000);
			if(recordingSpot>0){
				aInput[1].value=changeTime(recordingSpot);
			}			
			
		}else{
			oV.pause();
			aInput[0].value="播放";
			clearInterval(timer);
			clearInterval(payTime);
			aInput[2].value=changeTime(oV.duration);
			
		}
	}
	
	if(changeTime(oV.duration)=='NaN:NaN:NaN'){
		aInput[2].value='00:00:00';
	}else{
		aInput[2].value=changeTime(oV.duration);
	}
	
	function changeTime(iNum){
		iNum=parseInt(iNum);
		var iH=toZero(Math.floor(iNum/3600));
		var iM=toZero(Math.floor(iNum%3600/60));
		var is=toZero(Math.floor(iNum%60));
		return iH + ':' + iM + ':' +is;
		
	}
	function toZero(num){
		if(num<=9){
			return '0'+ num;
		}else{
			return ''+ num;
		}		
	}
	function nowTime(){
		aInput[1].value=changeTime(oV.currentTime);		
		var sclae=oV.currentTime/oV.duration;
		oDiv2.style.left=sclae * (oDiv1.offsetWidth-oDiv2.offsetWidth)+'px';
	}	

	aInput[3].onclick=function(){
		if(oV.muted){
			oV.volume = 1;
			this.value='静音';
			oV.muted=false;
		}else{
			oV.volume = 0;
			this.value='取消静音';
			oV.muted=true;
		}	
	}
	
	oDiv2.onmousedown=function(ev){
		var ev=ev ||window.event;	
		disX=ev.clientX-oDiv2.offsetLeft;
		document.onmousemove=function(ev){
			var L=ev.clientX-disX;
			
			if(L<0){
				L=0;
			}else if(L>oDiv2.offsetWidth){
				//alert('禁止快进');
				L=oDiv2.offsetWidth;
			}
			oDiv2.style.left=L+'px';

			var scale=L/(oDiv1.offsetWidth-oDiv2.offsetWidth);			
			oV.currentTime=scale * oV.duration;
		};
		document.onmouseup=function(){
			document.onmousemove=null;
		};
		return false;
	}
	var a="1";
	function record2(){
		var updateData={'vodeId':"<?php echo $videoPlayerData['0']['id'];?>",'palyTime':videof.currentTime};
		$.ajax({
			type:"post",
			url: "<?php echo site_url('recordingSpot');?>",
			data:updateData,
			success:function(msg){																		
			}											
		});		
	}
	aInput[4].onclick=function(){
		var w=$(window).width();
		var h=$(window).height();
		$("body").width(w);
		$("body").height(h);
		$("body").css({'overflow':'hidden'});
		$("#zhe").width(w);
		$("#zhe").height(h);
		$("#videof").width(w);
		$("#videof").height(h);			
		$("#zhe").show();
		aInput[2].value=changeTime(videof.duration);		
		oV.pause();	
		videof.play();
		payTime2=setInterval(record2,3*60*1000);			
		videof.currentTime=oV.currentTime
		videof.onclick=function(){
			if(videof.paused){					
				videof.play();
				payTime2=setInterval(record2,3*60*1000);					
			}else{
				videof.pause();	
				clearInterval(payTime2);												
			}
		}		 
		$(document).keydown(function(event){ 
			if(event.keyCode == 27){				
				$("#zhe").hide();
				videof.pause();	
				oV.play();
				oV.currentTime=videof.currentTime;
				aInput[1].value=changeTime(videof.currentTime);
				var sclae=videof.currentTime/videof.duration;
				oDiv2.style.left=sclae * (oDiv1.offsetWidth-oDiv2.offsetWidth)+'px';
				var w=$(window).width();
				var h=$(window).height();
				var sT=$(window).scrollTop();
				var sL=$(window).scrollLeft();
				var w1=w+sL+'px';
				var h1=h+sT+'px';
				$("body").width(w1);
				$("body").height(h1);
				$("body").css({'overflow':''});					
			}
		})


		videof.addEventListener('ended',function(){
			var updateData={vodeId:"<?php echo $videoPlayerData['0']['id'];?>"};
			a=2;
			$.ajax({
				type:"post",
				url: "<?php echo site_url('complete');?>",
				data:updateData,
				success:function(msg){				
					layer.alert('观看完成&nbsp&nbsp+1', {icon: 1});					
				}											
			});
		},false)				
}	
	if(a==1){
		oV.addEventListener('ended',function(){
			var updateData={vodeId:"<?php echo $videoPlayerData['0']['id'];?>"};					
				$.ajax({
					type:"post",
					url: "<?php echo site_url('complete');?>",
					data:updateData,
					success:function(msg){				
						layer.alert('观看完成&nbsp&nbsp+1', {icon: 1});					
					}											
				});			
		},false)	
	
	}	
	
})	
</script>
<script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>
<div id="zhe" style="display:none" >
<div id="home" style="text-align:center;height:40px;line-height:40px;color:#fff">
	<p><a href="<?php echo site_url('')?>" style="cursor:pointer">返回首页</a></p>
</div>
<div id="">
	<video id="videof"   autoplay  src="<?php echo base_url('uploads/video'.'/'.$videoPlayerData['0']['videoUrl'])?>" type="video/mp4">
</div>
</div>
<?php $this->load->view('home/public/bottom_view');?>  