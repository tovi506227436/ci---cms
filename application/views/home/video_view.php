<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/freeVideo.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
      <div id="con_video">

        <div id="part_five_1">
            <div class="fivetop">
            <p class="biaoti2"  style="background: url(../statics/home/images/two_bg.jpg) no-repeat "><span><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></span></p>
            <p class="biaoti2" style="padding-left:0px"><span><?php echo $IndustryName['0']['name']?></span></p>
            
            <!--<p class="more2"><a href="#">更多></a></p>
           
            --></div>
            
            <div class="videolis_2">
            	<?php foreach ($videoData as $k=>$v):?>
            	<a href="<?php echo site_url('video'.'/'.$v['id']);?>">
                <div class="videosx">
                <a href="<?php echo site_url('videoPlayer'.'/'.$v['id']);?>"><img src="<?php echo base_url('uploads/video'.'/'.$v['coverUrl']);?>" alt="<?php echo $v['title']?>"  style="width:213px;height:105px"/></a>
                <p><a href="<?php echo site_url('videoPlayer'.'/'.$v['id']);?>"><?php echo mb_substr($v['title'],0,18,'utf-8')?></a></p>
                </div>
                </a>
               <?php endforeach;?> 

            </div>
            <div id="part_five_2" >  
	          		<ul style="width:700px;margin:auto;text-align:center">
	               		<?php echo $links?> 
	             	</ul>
         	 	</div> 

      </div>
       <div id="part_four">
       
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
       <script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>
<?php $this->load->view('home/public/bottom_view');?>  