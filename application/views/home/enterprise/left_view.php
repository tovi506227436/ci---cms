  <div id="con_video">

        <div id="left_a1">


         <div class="left_dh st0_1">
	         <a style="cursor:pointer"  href="<?php echo site_url('enterprise'.'/115');?>">
	         	<p class="left_dh1_p">全部类型公司></p>
	         </a>
         </div>
         <div class="left_dh st1_1">
         	<a style="cursor:pointer"  href="<?php echo site_url('classify'.'/1');?>">
         		<p class="left_dh1_p">企业></p>
         	</a>
         </div>
         <div class="left_dh st2_1">
	         <a style="cursor:pointer"  href="<?php echo site_url('classify'.'/2');?>">
	         	<p class="left_dh1_p">供应商></p>
	         </a>
         </div>
         <div class="left_dh st3_1">
	         <a style="cursor:pointer"  href="<?php echo site_url('classify'.'/3');?>">
	         	<p class="left_dh1_p">普通企业></p>
	         </a>
         </div>
        </div>

        <script type="text/javascript">       
        $(function(){
			var mark="<?php echo $this->uri->segment(2);?>";			
			
			if(mark==1){
				$(".st1_1").addClass('st');
				$("p:eq(1)").addClass('st');	
			}else if(mark==2){
				$(".st2_1").addClass('st');
				$("p:eq(2)").addClass('st');
			}else if(mark==3){
				$(".st3_1").addClass('st');
				$("p:eq(3)").addClass('st');
			}else{
				$(".st0_1").addClass('st');
				$("p:eq(0)").addClass('st');
			}

        })        
        </script>  