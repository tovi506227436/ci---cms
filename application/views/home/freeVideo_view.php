<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/freeVideo.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>   
   <div id="zhongjian_v">
   <div id="part_five_1">
    <div class="fivetop">
    		<a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a>
            <a href="<?php echo site_url('freeVideoList')?>"><p class="biaoti2"><span>免费视频</span></p>
            </a>
            <p class="more2"><a href="<?php echo site_url('freeVideoList')?>">更多></a></p>
           
            </div>
     </div>   
      <div id="news_xx">
        <p class="news_xx_bt"><?php echo $freevideo['0']['title']?></p>
        <div class="news_img_1" style="width:600px;height:500px">
   			<embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer" src="<?php echo $freevideo['0']['url']?>" wmode="transparent" play="true" loop="false" menu="false" allowscriptaccess="never" allowfullscreen="true" height="480" width="620">
        </div>
        <p class="news_xx_zw">
        	<?php echo $freevideo['0']['abstract']?>
        </p>       	
       </div>
     <div id="part_four">
           <div class="rtxz">
             <p class="biaoti2"><span>免费视频列表</a></span>
           
             <ul>
               <?php foreach ($rightFreevideo as $Rk=>$Rv):?>          
                <li class="xbth"><a href="<?php echo site_url('freeVideo'.'/'.$Rv['id']);?>"><?php echo mb_substr($Rv['title'],0,10,'utf-8');?></a></li>
                <li class="timeh"><?php echo date("Y-m-d",$Rv['time'])?></li> 
                <li style="clear: both"></li>              
             <?php endforeach;?>                
             </ul>
          </div>
       </div>

       </div>
  <script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>     
       
      
       
       </div>
<?php $this->load->view('home/public/bottom_view');?>  