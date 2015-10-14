<?php $this->load->view('home/public/headerUser_view');?>        
          <div id="right_nr" style="height:800px">
          
             <div class="right_nr_bt">
                 <p class="biaoti2" style="display: initial;"><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></p>  
                 <p style="background:url();display: initial;padding-left:0px">资料表格下载</p>
             </div>
             <div class="right_nr_xg">
              <?php if(count($downloadData)>0){?>
              <?php foreach ($downloadData as $k=>$v):?>
                <div class="wx_ydjl">
	                <ul>
	                  <li class="xg_wz_bt"><a href="<?php echo site_url('downloadEXE'.'/'.$v['url'].'/'.$v['title'])?>"><?php echo $v['title']?></a></li>
	                  <li class="xg_wz_sj">更新时间:<?php echo date("Y-m-d",$v['time'])?></li>
	                </ul>
	                <div style="clear:both"></div>
                </div>
               <?php endforeach;?>
               <?php }?> 
             </div> 
             <div style="clear:both"></div>  
              </div>
        </div>      
             </div>
          </div>
      </div>

     <div style="clear:both"></div>

    </div>
<?php $this->load->view('home/public/buttomUser_view');?>  
</body>
</html>
