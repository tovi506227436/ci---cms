<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/article.css')?>" rel="stylesheet" type="text/css" />

<?php $this->load->view('home/public/header_view');?>
<div id="zhongjian" >
 		<div class="fivetop_3" >
            <p class="biaoti2">
            	<a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a>           	
            	<a href="<?php echo site_url('node'.'/'.$article['nodeName']['0']['id']);?>"><?php echo $article['nodeName']['0']['name']?></a>
            </p>
        </div>
      <div id="news_xx">
        <p class="news_xx_bt"><?php echo $article['0']['title']?></p>
        <div class="news_xx_bz_1">
        <!-- <div class="news_xx_bz"> -->
              <center> <span class="news_xx_ly">文章来源：<?php echo $article['0']['source']?></span>
               <span class="news_xx_rq">更新日期：<?php echo date("Y-m-d",$article['0']['time'])?></span>
              <span class="news_xx_rq">阅读次数：<?php echo $article['0']['ReadingNumber']?></span></center>
        <!-- </div> -->
        </div>
        <div class="news_img_1">
               <?php if ($article['0']['thumbnail']){?>
               		<img  style="width:100%; height:auto;"   src="<?php echo base_url('uploads/resourceImg').'/'.$article['0']['thumbnail']?>" id="thumbnail"/>
               <?php }?>               
        </div>
        <div class="news_xx_zw"><?php echo $article['0']['content']?></div>
      </div>
      <script src="<?php echo base_url('statics/home/js/jquery.imgbox.pack.js')?>"></script>

     <div id="part_four">
        <div id="part_four">
        <?php foreach ($getRightNode  as $rk=>$rv):?>
          <div class="rtxz">
             <p class="biaoti2"><a href="<?php echo site_url('node/'.$rv['id']);?>"><?php echo $rv['name'];?></a></p>
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
       <div id="part_three_new">
          <div id="news_kx">
            <div class="newstop">
              <p class="biaoti2"><a href="<?php echo site_url('node/'.$nodeData['0']['id']);?>"><?php echo $nodeData['0']['name']?></a></p>
              <p class="more2"><a href="<?php echo site_url('node/'.$nodeData['0']['id']);?>">更多></a></p>
            </div> 
            <div class="news_kx2">            
           <?php foreach ($article['list'] as $ak=>$av):?>   
              <div class="news_kx_1">
              <?php if($av['thumbnail']!=0){?>
                	<a href="<?php echo site_url('article/'.$av['id'])?>"><img style="width:111px;height:79px" src="<?php echo base_url('uploads/resourceImg').'/'.$av['thumbnail']?>" /></a>
            <?php }?> 
                <p class="news_kx_bt1"><a href="<?php echo site_url('article/'.$av['id'])?>"><?php echo  mb_substr($av['title'],0,10,'utf-8');?></a></p>
                <div class="news_kx_xxnr1"><?php echo mb_substr($av['abstract'],0,55,'utf-8');?>.....</div>
              </div>
           <?php endforeach;?>
            </div>            
        </div>      
      </div>
     <div style="clear:both"></div>
   </div>
<script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
</script>
<script>


</script>
<?php $this->load->view('home/public/bottom_view');?>   