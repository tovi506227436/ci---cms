<?php $this->load->view('home/public/headerUser_view');?>
          
          <div id="right_nr">
          
             <div class="right_nr_bt">
             <p class="biaoti2" style="display: initial;"><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></p>  
             <p style="background:url();display: initial;padding-left:0px">企业图片上传</p>
               
             </div>
             
             <div class="right_nr_xg">
             <?php if(count($enterpriseImg)>0){?>
	             <?php foreach ($enterpriseImg as $Ek=>$Ev):?>
	               <div class="xg_img">
	                 <img  class="pic" style="width:227px;height:144px" src="<?php echo base_url('uploads/enterpriseImg').'/'.$Ev['enterpriseImg']?>" />
	                 <p style="cursor:pointer"  onClick="delectImg('<?php  echo site_url('home/user/delectImg')?>','<?php echo $Ev['id'];?>','<?php echo $Ev['enterpriseImg'];?>')"> 删除</p>
	               </div>
	             <?php endforeach;?>   
              <?php }elseif (count($enterpriseImg)=='0'){ ?>
              <div class="xg_img">
              		<img class="pic"  src="<?php echo  base_url('statics/images/qy_tp.jpg');?>" />	
              </div>         	
              <?php  }?>
              <div style="clear:both"></div>
              
              <div class="xg_tj">
                 
             <form action="<?php echo site_url('enterpriseImg')?>"  enctype="multipart/form-data"  method="post" mclass="form form-horizontal responsive" id="demoform1">
              
                <div class="row cl">
                <center><h2 style="color:red"><?php echo $this->session->flashdata('enterpriseImgError');?></h2></center>
				<label class="form-label col-2">企业图片上传：</label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="enterprise1" id="enterprise1" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn">浏览文件</a>
					<input type="file" multiple name="enterprise" class="input-file">
					</span> </div>
				<div class="col-5"> </div>
			</div>
                    
                    <div class="row cl">
				<div class="col-10 col-offset-2">
					<input class="btn btn-primary" type="submit"  name="sub"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
        
          </div>
   
              </div>
              
              
              <div class="right_nr_bt">
                 <p>企业产品及主要工程图</p>
             </div>
             
             <div class="right_nr_xg">               
               <?php if(count($productImg)>0){?>
	             <?php foreach ($productImg as $Pk=>$Pv):?>
	               <div class="xg_img">
	                 <img class="pic" onClick="pic()" style="width:227px;height:144px" src="<?php echo base_url('uploads/productImg').'/'.$Pv['productImg']?>" />
	                  <p style="cursor:pointer"  onClick="delectImg('<?php  echo site_url('home/user/delectProductImg')?>','<?php echo $Pv['id'];?>','<?php echo $Pv['productImg'];?>')"> 删除</p>
	               </div>
	             <?php endforeach;?>   
              <?php }else{ ?>
               <div class="xg_img">
              		<img class="pic"  src="<?php echo  base_url('statics/images/qy_tp.jpg');?>" />	
              	</div>
              <?php  }?>
              <div style="clear:both"></div>
              
              <div class="xg_tj">
                 
         <form action="<?php echo site_url('productImg')?>"  enctype="multipart/form-data"  method="post" mclass="form form-horizontal responsive" id="demoform2">
              
                <div class="row cl">
                <center><h2 style="color:red"><?php echo $this->session->flashdata('productImgError');?></h2></center>
				
                
             <label class="form-label col-2"><p>产品/主要工程图：</p></label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="productImg1" id="productImg1" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"> 浏览文件</a>
					<input type="file" multiple name="productImg" class="input-file">
					</span> </div>
				<div class="col-5"> </div>
			</div>
                    
                    <div class="row cl">
				<div class="col-10 col-offset-2">
					<input class="btn btn-primary" type="submit"  name="sub"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>        
          </div>  
              </div>
    
        </div>       
        
        
             
             <div class="right_nr_xg"> 
                       
              
              <div style="clear:both"></div>
              
              <div class="xg_tj">
                 
         		<form action="<?php echo site_url('log')?>"  enctype="multipart/form-data"  method="post" mclass="form form-horizontal responsive" id="demoform3">
              
                <div class="row cl">
                <center><h2 style="color:red"><?php echo $this->session->flashdata('logError');?></h2></center>
			
			<div class="right_nr_bt">
                 <p>企业log上传</p>
             </div>
              <div class="right_nr_xg">
             
              <?php if($userData['0']['logImg']!=0){?>                       
	               <div class="xg_img">
	                 <img class="pic"  style="width:227px;height:144px;" src="<?php echo base_url('uploads/log').'/'.$userData['0']['logImg']?>" />	                
	               </div>	          
              <?php }else{ ?>
               <div class="xg_img" style="clear: both;margin-bottom:20px">
              	 	<img class="pic"  src="<?php echo  base_url('statics/images/qy_tp.jpg');?>" />	
              	</div>	
              <?php  }?>
              
              </div>
             <div  >
             
			                  
                    <div class="row cl">
                    
				<div class="col-10 col-offset-2" style="margin-left:0">
				<label class="form-label col-2"><p>企业log上传：</p></label>
				<div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" style="margin-left:20px;width:201px"   type="text" name="log1" id="log1" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn">浏览文件</a>
					<input type="file" multiple name="log" class="input-file">
					</span> 
				</div>
					
				<div class="col-5" style="width:43.667%;"> </div>
					<input style="display: block;clear: both;margin-left: 121px" class="btn btn-primary" type="submit"  name="sub"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
				</div> 
			</div>
			
			</div> 
			
			
		</form>        
          </div>  
              </div>
    
        </div>

               
             </div>

          
          </div>
      </div>

     <div style="clear:both"></div>

    </div>
<div id="rongqi"  style="display:none">
   <img src="" id="pic" style="height:auto" >   
</div>   
<?php $this->load->view('home/public/buttomUser_view');?>  

<script type="text/javascript">
	function delectImg(url,id,img){
		$.ajax({                 		
		type:"POST",
		url: url,
		data:{id:id,img:img},
		success:function(msg){
			if(msg=='1'){
				alert('删除成功');
				window.parent.location.reload()
			}else{
				alert('删除失败，请重试');
			}
		}
	});
 }
	 </script>
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
</body>
</html>
