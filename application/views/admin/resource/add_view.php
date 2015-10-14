<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/resource/add")?>" method="post">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 分类名：</th>
            <td><input type="text" style="width:200px" class="input-text" id="name" name="name" datatype="*" nullmsg="分类名不能为空"></td>
          </tr> 
          <tr>
            <th width="100" class="text-r">排序：</th>
            <td><input type="text" style="width:100px" class="input-text" id="orderlist" name="orderlist"></td>
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
$(".Huiform").Validform(); 
</script>
</body>
</html>