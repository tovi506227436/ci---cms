<style>
#jddw{
color:#fff;
}
</style>
</head>
<script>
   function stop(){
	   return false;
	}
	document.oncontextmenu=stop;
   
</script>
<body id="t">
    <div id="top">
       <div id="toponly">
       <ul class="top_menu">            
       </ul>    
       </div>
    </div>       
    <div id="header">
 	
    </div> 
   <div id="nav">  	  
      <div id="nav_n"  style="position:relative;">
      <!--<p id="jddw" style="position:absolute; top:78px; left:15px;"><a href="<?php echo site_url('freeVideoList');?>" >免费视频</a></p>
  	  -->
       <?php foreach ($nav as $k=>$v):?>   		  
          <div id="nav<?php echo $k+1;?>">        
            <ul class="dhwz">
               <li class="navbt"><?php echo $v['name']?></li>
               <?php foreach ($v['list'] as $n=>$m):?>  
	               <li class="nav1_wz1"><a href="<?php if($m['picType']=='1'){echo site_url('node/'.$m['id']);}
	               elseif ($m['picType']=='2'){echo site_url('video/'.$m['id']);}
	               elseif ($m['picType']=='3'){echo site_url('enterprise/'.$m['id']);}?>
	               "><?php echo $m['name']?></a></li>		                             
               <?php endforeach;?> 
               
            </ul>
          </div>
         
      <?php endforeach;?> 
       <div id="nav8">
            <ul class="dhwz">
              <li class="navbt">关于我们</li>                   
              <li class="nav1_wz1"><a href="<?php echo site_url('about');?>">关于我们</a></li>
              <li class="nav1_wz1"><a href="<?php echo site_url('contact');?>">联系我们</a></li>   
            </ul>
          </div>
    
          <div id="nav9">
          <ul>
             <li>
	              <div style="width:216px;height:73px;overflow:hidden">
<iframe width="180" scrolling="no" height="80" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=8&color=%23FFFFFF&bgc=%23&icon=2&num=2"></iframe></iframe>             </ul>
             <div class="secrch">
               <form action="<?php echo site_url('search');?>"  method="get" id="secrchFrom">
                 <input class="text" type="text"  placeholder="请输入搜索信息"  id="title" name="title"  value="<?php echo $title;?>"/>
                 <input  class="btn" type="button" value="sub" id="sub"  style="font-size:0"/>
               </form>         
             </div>
          <script type="text/javascript">
          	$(function(){
				$("#sub").click(function(){
					if($("#title").val()==""){
						alert("搜索关键字不可为空");
						return false;
					}
					$("#secrchFrom").submit();		
				})				
             })          
         </script> 

          </div><!--
         
          <script type="text/javascript">
          	$(function(){
				$(".secrchT").click(function(){
					var title=$(this).text();				
					$("#title").attr("value",title);		
				})				
             })          
         </script>   
      --></div><!--
       <div style="width:300px;height:50px;position:fixed;top:258px;right:113px">
         <iframe name="weather_inc" src="http://tianqi.xixik.com/cframe/5" width="200" height="30" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" ></iframe>
       </div>
    --></div>   