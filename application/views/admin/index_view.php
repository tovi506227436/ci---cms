<?php $this->load->view('admin/public/header_view');?>
<body >
<header class="Hui-header cl"> <a class="Hui-logo l" title="上海消防CMS管理系统" href="/">上海消防CMS管理系统</a> <a class="Hui-logo-m l" href="/" title="上海消防CMS管理系统"></a> <span class="Hui-subtitle l">1.1</span> <span class="Hui-userbox"><span class="c-white">超级管理员：<?php echo $this->session->userdata('name')?></span> <a class="btn btn-danger radius ml-10" href="<?php echo site_url('admin/login/quit')?>" title="退出"><i class="icon-off"></i> 退出</a></span> <a aria-hidden="false" class="Hui-nav-toggle" id="nav-toggle" href="#"></a> </header>
<div class="cl Hui-main">
  <aside class="Hui-aside" style="">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    
  
    <?php foreach ($data as $k=>$v){if(in_array($v['id'],$this->session->userdata('topMenuIdArray'))){?>	
    <div class="menu_dropdown bk_2">
      <dl id="menu-user" >
        <dt><i class="<?php echo $v['class']?>"></i> <?php echo $v['name']?><b></b></dt>
        <dd>
          <ul>
          	  <?php foreach ($v['list'] as $childK=>$childV){if(in_array($childV['id'],$this->session->userdata('priveArray'))){?>		    
            	<li><a _href="<?php echo site_url($childV['url']);?>" href="javascript:;"> <?php echo $childV['name'];?></a></li> 
             <?php }}?>        
          </ul>
        </dd>
      </dl>     
    </div>
  <?php }}?>  
  </aside>
  <div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);"></a></div>
  <section class="Hui-article">
    <div id="Hui-tabNav" class="Hui-tabNav">
      <div class="Hui-tabNav-wp">
        <ul id="min_title_list" class="acrossTab cl">
          <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
        </ul>
      </div>
      <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-backward"></i></a><a id="js-tabNav-next" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-forward"></i></a></div>
    </div>
    <div id="iframe_box" class="Hui-articlebox">
      <div class="show_iframe">
        <div style="display:none" class="loading"></div>
        <iframe id="adminIframe"   scrolling="yes" frameborder="0" src="<?php echo site_url('admin/index/right');?>"></iframe>
      </div>
    </div>
  </section>
</div>
</body>
</html>