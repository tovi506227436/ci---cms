<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/resource/childResource")?>" method="post">
      <table class="table table-bg">
        <tbody>
        <input type="hidden" value="<?php echo $pid;?>"  name="pid">
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 分类名称：</th>
            <td><input type="text" style="width:200px" class="input-text" id="name" name="name" datatype="*" nullmsg="分类名不能为空"></td>
          </tr>
          
          <tr>
          <th width="100" class="text-r"><span class="c-red">*</span> 分类11：</th>
			<td>
				<input name="picType" type="radio"  value="1" checked> 文章
				<input name="picType" type="radio"  value="2"> 视频
				<input name="picType" type="radio"  value="3"> 企业展示
			 </td>
		  </tr>
          <tr>
          	<th width="100" class="text-r"><span class="c-red">*</span> 置顶：</th>
					<td>
						<label>不置顶</label>&nbsp&nbsp<input type="radio"        name='t'  value="1" checked></br>			
				  		<label>首页头部目录置顶</label>&nbsp&nbsp<input type="radio" name='t'  value="2"></br>
						<label>首页左侧目录置顶</label>&nbsp&nbsp<input type="radio" name='t'  value="3"></br>
				   		<label>首页中间目录置顶</label>&nbsp&nbsp<input type="radio" name='t'  value="4"></br>
						<label>首页右侧目录置顶</label>&nbsp&nbsp<input type="radio" name='t'  value="5"></br>
						<label>网站底部目录置顶</label>&nbsp&nbsp<input type="radio" name='t'  value="6"></br>
				  </td>
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