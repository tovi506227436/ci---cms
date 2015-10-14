<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/freeVideo.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
      <div id="con_video">

        <div id="part_five_1">
            <div class="fivetop">
            <a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a>
            <p class="biaoti2"><span>免费视频</span></p>
            <!--
            <p class="more2"><a href="#">更多></a></p>
            -->
            </div>
            
            <div class="videolis_2">
            	<?php foreach ($freeVideoData as $k=>$v):?>
            	<a href="<?php echo site_url('freeVideo'.'/'.$v['id']);?>">
                <div class="videosx">
                <a href="<?php echo site_url('freeVideo'.'/'.$v['id']);?>"><img src="<?php echo base_url('uploads/freevideo'.'/'.$v['thumbnail']);?>" alt="<?php echo $v['title']?>"  style="width:213px;height:105px"/></a>
                <p><a href="<?php echo site_url('freeVideo'.'/'.$v['id']);?>"><?php echo $v['title']?></a></p>
                </div>
                </a>
               <?php endforeach;?> 

            </div>
            <div id="part_five_2" >  
          		<div id="t2" style="width:600px;">
               		<?php echo $links?> 
            	 </div> 
          	</div> 

      </div>
       <div id="part_four">
          <div class="rtxz">
             <p class="biaoti2"><a href="#">专业发表</a></p>
             <p class="more2"><a href="#">更多></a></p>
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
<?php $this->load->view('home/public/bottom_view');?>  