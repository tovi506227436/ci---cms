<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" href="<?php echo base_url('statics/css/admin.css')?>" rel="stylesheet" />
		<script type="text/javascript"  src="<?php  echo base_url('statics/js/jquery-1.7.2.min.js') ?>"></script>		
</head>
<body>
<ul id="Huifold1" class="Huifold"> 
  <?php foreach ($data as $k=>$v):?>
  	<li class="item">
	    <h4><?php echo $v['name']?></a><b>+</b></h4>
	    <?php foreach ($v['list'] as $childK=>$childV):?>
		    <div class="info"> 
		    	<a href="<?php echo site_url("$childV");?>" target="right" ><?php echo $childV['name'];?></a>
		    </div>
	    <?php endforeach;?>
  	</li>
  <?php endforeach;?>
</ul>
<script type="text/javascript">
$(function(){
	$.Huifold("#Huifold1 .item h4","#Huifold1 .item .info","fast",1,"click"); /*5个参数顺序不可打乱，分别是：相应区,隐藏显示的内容,速度,类型,事件*/
});
</script>
</body>	
</html>
