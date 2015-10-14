<?php $this->load->view('admin/public/header_view');?>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form action="<?php echo site_url("admin/resource/update")?>" method="post">
      <table class="table table-bg">
        <tbody>
        <input type="hidden" name="id" value="<?php echo $resourceData['0']['id']?>">
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 分类名：</th>
            <td><input type="text" style="width:200px" class="input-text" id="name" name="name" value="<?php echo $resourceData['0']['name']?>"   datatype="*" nullmsg="分类名不能为空"></td>
          </tr>
           
          <tr>
            <th width="100" class="text-r">子类：</th>&nbsp&nbsp&nbsp&nbsp  
            <td><table class="table table-border table-bordered radius">                    
            <?php if($childData){foreach ($childData as $k=>$v):?>            	            	 				
				<tr>
				  <th rowspan="4"  class="active">子类<?php echo $k+1?></th>
				  <td>
					<input type="text" style="width:200px" class="input-text" name="childName[]"  value="<?php echo $v['name']?>"> 
				  </td>
				</tr>
				<tr>
				 <td>
					<input name="picType<?php echo $v['id']?>" type="radio"  value="1" <?php if($v['picType']=='1'){echo 'checked';}?>> 文章
					<input name="picType<?php echo $v['id']?>" type="radio"  value="2" <?php if($v['picType']=='2'){echo 'checked';}?>> 视频
					<input name="picType<?php echo $v['id']?>" type="radio"  value="3" <?php if($v['picType']=='3'){echo 'checked';}?>> 企业展示
				 </td>
				</tr>
				<tr>
					<td>
						<label>不置顶</label>&nbsp&nbsp<input type="radio"        name='t<?php echo $v['id']?>'  value="1" <?php if($v['t']=='1'){echo 'checked';}?>>&nbsp&nbsp			
				   	</br><label>首页头部目录置顶</label>&nbsp&nbsp<input type="radio" name='t<?php echo $v['id']?>'  value="2" <?php if($v['t']=='2'){echo 'checked';}?>>&nbsp&nbsp
					</br><label>首页左侧目录置顶</label>&nbsp&nbsp<input type="radio" name='t<?php echo $v['id']?>'  value="3" <?php if($v['t']=='3'){echo 'checked';}?>>&nbsp&nbsp
				    </br><label>首页中间目录置顶</label>&nbsp&nbsp<input type="radio" name='t<?php echo $v['id']?>'  value="4" <?php if($v['t']=='4'){echo 'checked';}?>>&nbsp&nbsp
					</br><label>首页右侧目录置顶</label>&nbsp&nbsp<input type="radio" name='t<?php echo $v['id']?>'  value="5" <?php if($v['t']=='5'){echo 'checked';}?>>&nbsp&nbsp				   
				   	</br><label>网站底部目录置顶</label>&nbsp&nbsp<input type="radio" name='t<?php echo $v['id']?>'  value="6" <?php if($v['t']=='6'){echo 'checked';}?>>&nbsp&nbsp	
				  </td>
				</tr>
				<tr>
				 <td>
					排序：<input type="text" style="width:140px" class="input-text" name="orderlistPid[]"  value="<?php echo $v['orderlist']?>">  
				 	<i class="icon-trash" style="font-size:20px;margin-top:-5px;margin-left:10px;cursor:pointer ;color: #06C;" onClick="resourceDelect2('将删除该分类下的所有文章,请谨慎操作','<?php echo site_url('admin/resource/delect2');?>','<?php echo $v['id'] ;?>','<?php echo site_url('admin/resource/update?id='.$resourceData['0']['id']);?>')"></i></input>           	
            		<input type="hidden"  name="childId[]"  value="<?php echo $v['id']?>">
				 </td>
				</tr>
				
					  	   	
            <?php endforeach;?>
            </table></td>  
            <?php }else{
            	echo "<td style='color:red'>该子类下无分类</td>";
            	
            }?> 
                               
          </tr>                             
          <tr>
            <th width="100" class="text-r">排序：</th>
            <td><input type="text" style="width:100px" class="input-text" id="orderlist" name="orderlist" value="<?php echo $resourceData['0']['orderlist']?>" ></td>
          </tr>              
           <tr>
            <th class="text-r">状态：</th>
            <td>
            <label>
                <input name="status" type="radio" id="six_1" value="1" <?php if($resourceData['0']['status']=='1'){echo 'checked';}?>> 启用
           	</label>
               <label>
                <input type="radio" name="status" value="2" id="six_0" <?php if($resourceData['0']['status']=='2'){echo 'checked';}?>>停用
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