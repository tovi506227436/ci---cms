<?php
$config=array(
	//article这个名字是可以随便请的，供控制器调用的名字 
	'admin'=>array(
		array(
			'field'=>'adminName', //name值
			'label'=>"角色名称不能为空",//提示的错误信息
			'rules'=>'required'//验证规则		
		)
	
	)	
);
?>