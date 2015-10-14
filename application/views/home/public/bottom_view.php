   <div id="footer">
        <div id="footer_bar">
            <ul>
               <li><a href="<?php echo site_url('');?>">首页</a></li>
               <li><a href="<?php echo site_url('node/'.'101');?>">要闻</a></li>
               <?php foreach ($bottonNav as $k=>$v):?>
               		<li><a href="<?php if($v['picType']=='1'){echo site_url('node/'.$v['id']);}
	               elseif ($v['picType']=='2'){echo site_url('video/'.$v['id']);}
	               elseif ($v['picType']=='3'){echo site_url('enterprise/'.$v['id']);}?>
	               "><?php echo $v['name']?></a>  </li>         
               <?php endforeach;?>
               
            </ul>
        </div>
        <div id="footer_banner"></div>
    </div>
</body>
</html>
