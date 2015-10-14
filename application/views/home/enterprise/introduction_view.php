<?php $this->load->view('home/public/headerCss_view');?>
<link href="<?php echo base_url('statics/home/css/enterprise.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('home/public/header_view');?>
<?php $this->load->view('home/enterprise/left_view');?>

        <div id="part_five_11">
            <div class="fivetop">
             <p class="biaoti2"><a href="<?php echo site_url();?>">首页&nbsp>></a></p>    
            <p class="biaoti2" style="background:url();padding-left:0"><span>企业介绍</span></p>
            <!--
            <img src="images/vip.jpg" />
            
            <p class="more2"><a href="#">更多></a></p>
            -->
            </div>

            <div class="wx_ydjl_2">

                <div class="right_nr_zw">
                 <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px"><?php echo $userData['0']['companyName']?></h4>
                 <p><?php echo $userData['0']['companyProfile']?></p>
              <?php if(count($EnterpriseImg)>0){?>
	             <?php foreach ($EnterpriseImg as $Ek=>$Ev):?>	             
	                 <img class="pic"  style="width:216px;height:144px;" src="<?php echo  base_url('uploads/enterpriseImg').'/'.$Ev['enterpriseImg'];?>" />	              
	             <?php endforeach;?>   
              <?php }else{?>
              		 <img class="pic"  src="<?php echo  base_url('statics/images/qy_tp.jpg');?>" />	              
              			
              <?php  }?>                 
                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">企业产品及主要工程图：</h4>
                   <?php if(count($ProductImg)>0){?>
	             <?php foreach ($ProductImg as $Pk=>$Pv):?>
	              
	                 <img  class="pic"  style="width:216px;height:144px" src="<?php echo base_url('uploads/productImg').'/'.$Pv['productImg'];?>" />
	             
	             <?php endforeach;?>   
              <?php }else{ ?>
              	 <img class="pic"  src="<?php echo  base_url('statics/images/qy_tp.jpg');?>" />	 
              	
              <?php  }?>
                  
                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">相关资质证明:</h4>
                 <?php  if($userData['0']['license']!=0){?>
					<img class="pic"   src="<?php echo base_url('uploads/userImg').'/'.$userData['0']['license']?> "  style="width:216px;height:144px"/>
				 <?php }?>
				 <?php  if($userData['0']['tax']!=0){?>
					<img  class="pic"    src="<?php echo base_url('uploads/userImg').'/'.$userData['0']['tax']?>"  style="width:216px;height:144px"/>
				 <?php }?>
				  <?php  if($userData['0']['prove']!=0){?>
					<img  class="pic"    src="<?php echo base_url('uploads/userImg').'/'.$userData['0']['prove']?>" style="width:216px;height:144px"/>
				 <?php }?>
				  <?php  if($userData['0']['Product']!=0){?>
					<img class="pic"   src="<?php echo base_url('uploads/userImg').'/'.$userData['0']['Product']?>" style="width:216px;height:144px"/>
				 <?php }?>
				 
                
				<?php  if($userData['0']['license']=='0' && $userData['0']['Product']=='0' && $userData['0']['prove']=='0' && $userData['0']['tax']=='0'){?>
                	 <img class="pic"  src="<?php echo  base_url('statics/images/qy_tp.jpg');?>" />	 
				 <?php  }?> 
				
                 <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">公司类型：</h4>
                 <p style="text-indent:2em"><?php if($userData['0']['type']=='1'){echo '企业';}elseif ($userData['0']['type']=='2'){echo '供应商';}elseif ($userData['0']['type']=='3'){echo '普通企业';}?></p>

                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">联系我们：</h4>
                  <p style="text-indent:2em">联系人：   <?php echo $userData['0']['companyName']?></p>
                  <p style="text-indent:2em">联系方式：<?php echo $userData['0']['contact']?></p>
                  <p style="text-indent:2em">联系地址：<?php echo $userData['0']['companyAddress']?></p>

             </div>
 
             </div>
       
          
           <div style="clear:both"></div>

        </div>
         <div style="clear:both"></div>
       </div>
<div id="rongqi"  style="display:none">
   <img src="" id="pic" style="height:auto" >   
</div> 
    <script>
	$(".pic").click(function(){
        var picUrl=$(this).attr("src");    
        var w=$(document).width();
        var h=$(document).height();
        $("#pic").attr("src",picUrl);  	
     	$("#rongqi").show();
     	layer.open({
     	    type: 1,
     	    title: false,
     	    closeBtn: false,
     	    scrollbar: false,
     	    area: '1000px',
     	    skin: 'layui-layer-nobg', //没有背景色
     	    shadeClose: true,
     	    content: $('#rongqi')
     	});
 	    	       	    
      });
	$("#rongqi").click(function(e){		
		$("#rongqi").hide();
		layer.closeAll(); //疯狂模式，关闭所有层
	})	
</script> 
<?php $this->load->view('home/public/bottom_view');?>    

</body>
</html>
