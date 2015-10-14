<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/freeVideo/update");?>" method="post" class="Huiform" id="roleForm"  enctype="multipart/form-data">
      <table class="table table-bg">
      <input type="hidden" value="<?php echo $data['0']['id']?>" name="id">
        <tbody>
           <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 标题：</th>
            <td><input type="text" style="width:400px" class="input-text" id="title"  value="<?php echo $data['0']['title']?>"    name="title" datatype="*" nullmsg="视频标题不能为空"></td>
          </tr>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> url：</th>
            <td><input type="text" style="width:400px" class="input-text" id="url"  value="<?php echo $data['0']['url']?>" name="url" datatype="*" nullmsg="url不能为空"></td>
          </tr>
           <tr>
            <th width="100" class="text-r"><span class="c-red">*</span>封面：</th>
            <td><input type="file" style="width:500px" class="input-text" id="thumbnail" name="thumbnail"></td>                  
         </tr>
         <input type="hidden"  name="thumbnail2" id="thumbnail2" value="<?php echo $data['0']['thumbnail'];?>"> 
         <tr>
         	<th width="100" class="text-r"></th>
            <td>
             <?php if($data['0']['thumbnail']){
             	$imgUrl=base_url('uploads/freevideo/'.$data['0']['thumbnail']);
             	echo  "<img src=$imgUrl  style='width:300px;height:300px'>";            	            	
             }?>                  
 			</td>
         </tr>
         <tr>
           <th width="100" class="text-r">摘要：</th>        
          <td><script id="editor"  name="abstract" type="text/plain" style="width:100%;height:200px;"><?php echo $data['0']['abstract']?></script></td>
         </tr>   
          <tr>
            <th width="100" class="text-r">排序：</th>
            <td><input type="text" style="width:200px" class="input-text" id="orderlist" name="orderlist" value="<?php echo $data['0']['orderlist']?>"></td>
          </tr>
           <tr>
            <th class="text-r"><span class="c-red">*</span> 状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" <?php if($data['0']['status']=='1'){echo 'checked';}?>> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0" <?php if($data['0']['status']=='2'){echo 'checked';}?>>停用
               </label>
           </td>
          </tr>
          <tr>
            <th></th>
            <td>
            <button type="submit" class="btn btn-success radius"  id="adminRoleSave" name="sub"  value="sub"><i class="icon-ok"></i>提交</button>
          </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
<script type="text/javascript">
$(function(){
	var ue = UE.getEditor('editor');
	
})	
</script>
<script type="text/javascript">
$(".Huiform").Validform(); 
</script>
</body>
</html>