<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/index.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('statics/home/css/reaech.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
  <div id="con_video">

        <div id="part_five_1">
            <div class="fivetop">
            
            <p class="biaoti2"><span>搜索结果 “<?php echo $title?$title:' ';?>” 共<?php echo $num?$num:'0';?>条记录</span></p>           
            </div>
           <?php if(count($searchData)>0 ){?>
           <?php foreach ($searchData as $k=>$v):?>
            <div class="wx_ydjl_1" style="width:auto;padding-right:20px">
                <ul>
                  <li class="xg_wz_bt"><a href="<?php echo site_url('article'.'/'.$v['id'])?>"><?php echo $v['title']?></a></li>
                  <li class="xg_wz_sj" style="float:right">更新时间:<?php echo date("Y-m-h",$v['time'])?></li>
                </ul>
                <div style="clear:both"></div>
            </div>
            <?php endforeach;?>
            <?php }else{ ?>
            	<center><h1><?php if($searchErroe==""){echo '暂无搜索结果';} ?></h1></center>          	
            <?php }?>
           <center><h1 style="color:red"><?php echo $searchErroe;?></h1></center>
          
		</div>
		<div id="part_five_2" >  
	          		<ul style="width:700px;margin:auto;text-align:center">
	               		<?php echo $links?> 
	             	</ul>
         	 	</div> 
	</div>
  <div style="clear:both"></div> 
    <script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>         
           
          
   <?php $this->load->view('home/public/bottom_view');?>   
 