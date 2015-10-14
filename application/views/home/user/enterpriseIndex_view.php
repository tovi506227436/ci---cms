<?php $this->load->view('home/public/headerUser_view');?>
          
          <div id="right_nr">
          
             <div class="right_nr_bt">
              <p class="biaoti2" style="display: initial;"><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></p>  
               <p style="background:url();display: initial;padding-left:0px">公司展示</p>
              
             </div>
             
             <div class="right_nr_zw">
                 <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px"><?php echo $userData['0']['companyName']?></h4>
                 <p><?php echo $userData['0']['companyProfile']?></p>
                 
				<?php if(count($productImg)>0){?>
                 	<?php foreach ($productImg as $Pk=>$Pv):?>
                 		<img  class="pic"   style="width:216px;height:140px"  src="<?php echo base_url('uploads/productImg/'.$Pv['productImg'])?>" />
                 	<?php endforeach;?>
                 <?php }?>
                 
                  
                  
                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">企业产品及主要工程图：</h4>
                 <?php if(count($enterpriseImg)>0){?>
                 	<?php foreach ($enterpriseImg as $Ek=>$Ev):?>
                 		<img  class="pic"   style="width:216px;height:140px" src="<?php echo base_url('uploads/enterpriseImg/'.$Ev['enterpriseImg'])?>" />
                 	<?php endforeach;?>
                 <?php }else{?>
                 <center><h2 style="color:red">无企业产品及主要工程图</h2></center>
                 <?php }?>         
                  
                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">相关资质证明：</h4>
                  <?php if($userData['0']['license']!=='0'){?>
                  	 <img class="pic"  style="width:216px;height:140px"  src="<?php echo base_url('uploads/userImg/'.$userData['0']['license'])?>" />
                  <?php }?>
                  
                  <?php if($userData['0']['tax']!=='0'){?>
                  	 <img class="pic"  style="width:216px;height:140px" src="<?php echo base_url('uploads/userImg/'.$userData['0']['tax'])?>" />
                  <?php }?>
                  
                   <?php if($userData['0']['prove']!=='0'){?>
                  	 <img  class="pic" style="width:216px;height:140px"  src="<?php echo base_url('uploads/userImg/'.$userData['0']['prove'])?>" />
                  <?php }?>
                  
                   <?php if($userData['0']['Product']!=='0'){?>
                  	 <img class="pic"  style="width:216px;height:140px" src="<?php echo base_url('uploads/userImg/'.$userData['0']['Product'])?>" />
                  <?php }?>

                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">公司类型：</h4>
                  <p><?php if($userData['0']['type']=='1'){echo '企业';}elseif ($userData['0']['type']=='2'){echo '供应商';}elseif ($userData['0']['type']=='3'){echo '普通企业';}?></p>
                  <h4 style="background:#E4E4E4;line-height:40px;padding-left:10px">联系我们：</h4>
                  <p>联系人：<?php echo $userData['0']['corporation']?> </p>
                  <p>联系方式：<?php echo $userData['0']['contact']?> </p>
                  <p>联系地址：<?php echo $userData['0']['companyAddress']?></p>
             </div>
          
          </div>
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
<?php $this->load->view('home/public/buttomUser_view');?>
</body>
</html>
