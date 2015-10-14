<?php $this->load->view('admin/public/header_view');?>
<div class="cl pd-5 bg-1 bk-gray mt-20"  style="padding:20px;background:#fff;border:0">  
  <table class="table table-border table-bordered  table-hover table-sort" > 
    <thead>
      <tr class="text-c">
        <th width="20">序号</th>          
        <th width="200">视频标题</th>
        <th width="80">观看时间</th>      
      </tr>
    </thead>
    <tbody>
    <?php if(count($data)>0){?>
      <?php foreach ($data as $k=>$v):?>
      <tr class="text-c">     
        <td><?php echo $k+1;?></td>
        <td><?php echo $v['title'] ;?></td>
        <td><?php echo date("Y-m-d H:i:s",$v['time']) ;?></td>             
      </tr>
      <?php endforeach;?>
      
      <?php }else{?>
      <center><h1>暂无观看记录</h1></center>
      <?php }?>
    </tbody>
  </table>
</div>
</body>
</html>