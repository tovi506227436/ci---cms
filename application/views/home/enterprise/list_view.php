<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/enterprise.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
<?php $this->load->view('home/enterprise/left_view');?>   
        <div id="part_five_11">
            <div class="fivetop">
            <p class="biaoti2"><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></p>  
            <p class="biaoti2" style="background:url();padding-left:0"><a href="#">企业列表</a></p>
            </div>
            <div style="height:1000px">
           <?php foreach ($enterpriseList as $k=>$v):?>
            <div class="wx_ydjl_1">
                <ul>
                  <li class="xg_wz_bt"><a href="<?php echo site_url('introduction'.'/'.$v['id'])?>"><?php echo $v['companyName']?></a></li>
                </ul>
                <div style="clear:both"></div>
            </div>
           <?php endforeach;?>
           
           </div>
            <div id="part_five_2">  
               <div id="t2" style="width:600px;">
               <?php echo $links?> 
             </div>    
           </div>


         
        </div>
       


         <div style="clear:both"></div>
       </div>


<?php $this->load->view('home/public/bottom_view');?>   

</body>
</html>
