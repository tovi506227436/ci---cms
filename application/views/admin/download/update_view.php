<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/download/update")?>" method="post"  enctype="multipart/form-data">
      <table class="table table-bg">
        <tbody>
          <tr>
            <input type="hidden" name="id"  value="<?php echo $data['0']['id'];?>"/>
            <th width="100" class="text-r"><span class="c-red">*</span>文件名:</th>
            <td><input type="text" style="width:200px" class="input-text" id="title" name="title"  value="<?php echo $data['0']['title']?>"   datatype="*" nullmsg="文件名不能为空"></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span> 文件：</th>
            <td><div class="formControls col-5"> <span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="dataxls1" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"> 浏览文件</a>
					<input type="file" multiple  name="dataxls" class="input-file">
					</span> </div>
				<div class="col-5"> </div>
		    </td>
          </tr>
          <tr>
            <td><input type="hidden" style="width:200px" class="input-text" id="exl" name="exl"  value="<?php echo $data['0']['url']?>"></td>
          </tr>
           <tr>
            <th width="100" class="text-r">排序:</th>
            <td><input type="text" style="width:200px" class="input-text" id="orderlist" name="orderlist"  value="<?php echo $data['0']['orderlist']?>"></td>
          </tr>
           <tr>
            <th class="text-r">状态：</th>
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
            <td><button class="btn btn-success radius" type="submit"  name="sub"  value="sub"><i class="icon-ok"></i> 确定</button></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script type="text/javascript">
$(".Huiform").Validform(); 
</script>
</body>
</html>