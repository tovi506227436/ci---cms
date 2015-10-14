<?php $this->load->view('home/public/headerUser_view');?>
          
          <div id="right_nr">
          
             <div class="right_nr_bt">
              <p class="biaoti2" style="display: initial;"><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></p>  
              <p style="background:url();display: initial;padding-left:0px">密码修改</p>
             </div>
             
             <div class="right_nr_xg">
             <form action="<?php echo site_url('user_changepwd')?>" method="post" class="form form-horizontal responsive" id="pwdform">
                <div class="row cl">
					<label class="form-label col-2">旧密码：</label>
					<div class="formControls col-5">
						<input type="password" class="input-text" autocomplete="off" placeholder="旧密码" name="password" id="password" onBlur="if(this.value==''){$(this).next().show();return;}"   onFocus="if(this.value==''){$(this).next().hide();return}" >
						<div id="error1" class="col-5" style="display:none;color:red">旧密码不可为空 </div>
					</div>
					
				</div>
          
            
            <div class="row cl">
				<label class="form-label col-2">新密码：</label>
				<div class="formControls col-5">
					<input type="password" class="input-text" autocomplete="off" placeholder="新密码" name="password2" id="password2"  onBlur="if(this.value==''){$(this).next().show();return;}"   onFocus="if(this.value==''){$(this).next().hide();return}"  >
					<div id="error2" class="col-5" style="display:none;color:red">新密码不可为空 </div>
				</div>
				
			</div>
            
            
            <div class="row cl">
				<label class="form-label col-2">再次输入：</label>
				<div class="formControls col-5">
					<input type="password" class="input-text" autocomplete="off" placeholder="确认密码" name="password3" id="password3"  onBlur="if(this.value==''){$(this).next().show();return;}"   onFocus="if(this.value==''){$(this).next().hide();return}" >
					<div id="error3" class="col-5" style="display:none;color:red">确认密码不可为空 </div>
				</div>
				
			</div>
            
            <div class="row cl">
				<div class="col-10 col-offset-2">
					<input class="btn btn-primary" type="button" name="subPwd"  id="subPwd"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
       <script type="text/javascript">
       	$(function(){      		
           	var isPwd='-1';
           	$("#password").blur(function(){
				var pwd=$("#password").val();
				if(!pwd){
					return false;
				}				
				$.ajax({
					type:"POST",
					url: "<?php echo site_url('checkPwd') ?>",
					data:{pwd:pwd},
					success:function(msg){
						//alert(msg);
						if(msg=='-1'){
							$("#error1").show();
							$("#error1").text('原密码错误');
							return false;
						}else{
							$("#error1").hide();
							isPwd='1';
						}
					}
				});
			})
		
			$("#subPwd").click(function(){
				var pwd2=$("#password2").val();
				var pwd3=$("#password3").val();
				if(isPwd=='-1'){
					alert('原密码错误');
					return false;
				}
				if(pwd2==''){
					$("#error2").text('新密码不可为空');	
					return false;
				}
				if(pwd3==''){
					$("#error3").text('确认密码不可为空');	
					return false;
				}
				if(pwd3!= pwd2){
					$("#error3").text('两次密码不一致');	
					return false;
				}
				if(isPwd=='-1'){
					$("#error1").text('原密码错误');	
					return false;
				};
				$.ajax({
					type:"POST",
					url: "<?php echo site_url('modifyPwd') ?>",
					data:{pwd2:pwd2},
					success:function(msg){
						if(msg=='1'){
							alert('修改成功');
				       		window.location.href="<?php echo site_url('home/index/quit') ?>"; 
				       		
						}else{
							alert('修改成功');
						}
					}
				});
				
				
			})

        })
    </script>
                 
        </div>
             
             
           <div class="right_nr_bt">
                 <p>资料修改</p>
             </div>
             
             <div class="right_nr_xg2">
             <form action="<?php echo site_url('changeData')?>" method="post" class="form form-horizontal responsive" id="demoform">
                
                <div class="row cl">
				<label class="form-label col-2">公司简介：</label>
				<div class="formControls col-5">
					<textarea name="companyProfile" cols="" rows="" class="textarea"  placeholder="公司简介...最少输入30个字符" datatype="*10-500" nullmsg="公司简介不能为空！" onKeyUp="textarealength(this,500)"></textarea>
					<p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
				</div>
				<div class="col-5"> </div>
			</div>
            
            
            <div class="row cl">
				<label class="form-label col-2">联系人：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="4~16个字符，字母/中文/数字/下划线" name="corporation" id="username" datatype="*4-16" nullmsg="联系人不能为空">
				</div>
				<div class="col-5"> </div>
			</div>
            
            
            <div class="row cl">
				<label class="form-label col-2">联系邮箱：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="@" name="email" id="email" datatype="e" nullmsg="请输入邮箱！">
				</div>
				<div class="col-5"> </div>
			</div>
            
            
            <div class="row cl">
				<label class="form-label col-2">联系地址：</label>
				<div class="formControls col-5">
					<input type="text" class="input-text" placeholder="4~16个字符，字母/中文/数字/下划线" name="companyAddress" id="username" datatype="*4-16" nullmsg="联系地址不能为空">
				</div>
				<div class="col-5"> </div>
			</div>
            
            
            <div class="row cl">
				<div class="col-10 col-offset-2">
					<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
                  
             </div>
             
             
          
          </div>
      </div>

     <div style="clear:both"></div>

    </div>
<?php $this->load->view('home/public/buttomUser_view');?>
</body>
</html>
