<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/freevideo/add")?>" method="post" enctype="multipart/form-data">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 标题：</th>
            <td><input type="text" style="width:400px" class="input-text" id="title" name="title" datatype="*" nullmsg="视频标题不能为空"></td>
          </tr>
           <tr>
            <th width="100" class="text-r"><span class="c-red">*</span>封面：</th>
            <td><input type="file" style="width:500px" class="input-text" id="thumbnail" name="thumbnail"></td>
          </tr>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> url：</th>
            <td><input type="text" style="width:400px" class="input-text" id="url" name="url" datatype="*" nullmsg="url不能为空"></td>
          </tr>
          <tr>
          <th width="100" class="text-r"><span class="c-red">*</span> 简介：</th>        
          <td><script  id="editor"  name="abstract" type="text/plain" style="width:100%; height:200px;" >          		
          	  </script>
          </td>
         </tr>     
          <tr>
            <th width="100" class="text-r">排序：</th>
            <td><input type="text" style="width:200px" class="input-text" id="orderlist" name="orderlist"></td>
          </tr>
           <tr>
            <th class="text-r">状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" checked> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0">停用
               </label>
           </td>
          </tr>
          <tr>
            <th></th>
            <td><button class="btn btn-success radius" type="submit"  name="sub"  value="sub"><i class="icon-ok"></i> 确定</button></td>
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