<?php $this->load->view('home/public/headerUser_view');?>
          
          <div id="right_nr">
          
             <div class="right_nr_bt">
             <p class="biaoti2" style="display: initial;"><a href="<?php echo site_url();?>">首页&nbsp&nbsp>></a></p>  
               <p style="background:url();display: initial;padding-left:0px">视频观看记录</p>
               
             </div>
             
             <div class="right_nr_xg">
             
              <?php foreach ($userVideoHistory  as $Vk=>$Vv):?>
               <div class="xg_videos">
                 <img src="<?php echo base_url('uploads/video'.'/'.$Vv['coverUrl']);?>" style="width:213px;height:105px" />
                 <a href="<?php echo site_url('videoPlayer'.'/'.$Vv['videoID'])?>"><p><?php echo mb_substr($Vv['title'],0,12,'utf-8')?><?php if(strlen($Vv['title'])/3>12){echo '....';}?></p></a>
                 <p>上次观看时间：<?php echo date("Y-m-d",$Vv['time'])?></p>
               </div>
               <?php endforeach;?>                         
              <div style="clear:both"></div>             
              </div>            
              <div class="right_nr_bt">
                 <p>文章阅读记录：</p>
             </div>
             
             <div class="right_nr_xg">
            
             <?php foreach ($userArticleHistory  as $Hk=>$Hv):?>
       
                <div class="wx_ydjl">
                <ul>
                  <li class="xg_wz_bt"><a href="<?php echo site_url('article'.'/'.$Hv['articleId'])?>"><?php echo $Hv['article'];?></a></li>
                  <li class="xg_wz_sj">阅读时间:<?php echo date("Y-m-d",$Hv['time'])?></li>
                </ul>
                <div style="clear:both"></div>
                </div>
                
           <?php endforeach;?>        
             
                
             </div>
   
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
