<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/node.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
<div id="con_video3">

        <div id="part_five_1">
            <div class="fivetop">
            <p class="biaoti2">
            	<a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a>            	
            	<span><?php echo $titleName?></span>
            </p>
            </div>
            
            <div class="videolis_3">
            <?php if($num>0){foreach ($data as $ak=>$av){?>         
            <?php if($av['thumbnail']!=0){?>
            	 <div class="wenzhang_2">     	 	
            	 	 <a href="<?php echo site_url('article/'.$av['id'])?>"><img style="width:158px;height:114px" src="<?php echo base_url('uploads/resourceImg').'/'.$av['thumbnail']?>" /></a>
            		 <p class="wenzhang_1_bt"><a href="<?php echo site_url('article/'.$av['id'])?>"><?php echo $av['title']?></a></p>
                   	 <p class="wenzhang_1_zw"><?php echo mb_substr($av['abstract'],0,130,'utf-8');?><?php if(strlen($av['abstract'])>390){echo '......';} ?></p>
                   	 <p class="wenzhang_1_sj">发表于：<?php echo date("Y-m-d",$av['time'])?></p>
                </div>
            <?php }else{?>
            	 <div class="wenzhang_1">
 					<p class="wenzhang_1_bt"><a href="<?php echo site_url('article/'.$av['id'])?>"><?php echo $av['title']?></a></p>
                    <p class="wenzhang_1_zw"><?php echo mb_substr($av['abstract'],0,130,'utf-8');?><?php if(strlen($av['abstract'])>390){echo '......';} ?></p>
                    <p class="wenzhang_1_sj">发表于：<?php echo date("Y-m-d",$av['time'])?></p>
                </div>
           <?php }?>
                           
            <?php }}else{?>
            	<center style="padding-top:200px;color:red"><h1>该栏目暂无数据，敬请等待！</h1></center>
            <?php }?>
               </div>
          <!--  <div id="part_five_2" >  
          	<div id="t2" style="width:600px;">
               
             </div> 
          </div> 
        -->
           		<div id="part_five_2" >  
	          		<ul style="width:700px;margin:auto;text-align:center">
	               		<?php echo $links?> 
	             	</ul>
         	 	</div> 
         </div>
         
       <div id="part_four">
        <?php foreach ($right  as $rk=>$rv):?>
          <div class="rtxz">
             <p class="biaoti2"><a href="<?php echo site_url('node/'.$rv['id']);?>"><?php echo $rv['name']?></a></p>
             <p class="more2"><a href="<?php echo site_url('node/'.$rv['id']);?>">更多></a></p>
            <div style="clear:both"></div> 
             <ul>
             <?php foreach ($rv['list']  as $rak=>$rav):?>
                <li class="xbth"><a href="<?php echo site_url('article/'.$rav['id']);?>"><?php echo mb_substr($rav['title'],0,12,'utf-8')?></a></li>
                <li class="timeh"><?php echo date("m .d",$rav['time'])?></li>
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
      <div style="clear:both"></div>
<?php $this->load->view('home/public/bottom_view');?>   