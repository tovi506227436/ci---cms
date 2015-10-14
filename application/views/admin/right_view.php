<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url('statics/js/html5.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/js/respond.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/js/PIE_IE678.js')?>"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('statics/css/H-ui.css')?>"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('statics/css/H-ui.admin.css')?>"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('statics/font/font-awesome.min.css')?>"/>
<!--[if IE 7]>
<link href="<?php echo base_url('statics/font/font-awesome-ie7.min.css')?>" rel="stylesheet" type="text/css" />
<![endif]-->
<title>上海司耀信息技术公司CMS管理系统</title>
</head>
<body>
<div class="pd-20" style="padding-top:20px;">
  <p class="f-20 text-success">上海司耀信息技术公司CMS管理系统 <span class="f-14">V1.1</span></p>
 
  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">服务器信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th width="200">系统类型及版本号</th>
        <td><span id="lbServerName"><?php echo  php_uname(); ?></span></td>
      </tr>
      <tr>
        <td>只获取系统版本号：         </td>
        <td><?php echo  php_uname('r'); ?></td>
      </tr>
      <tr>
        <td>服务器域名</td>
        <td><?php echo $_SERVER["HTTP_HOST"];?> </td>
      </tr>
      <tr>
        <td>服务器Web端口</td>
        <td><?php echo $_SERVER['SERVER_PORT'];?> </td>
      </tr>
      
      <tr>
        <td>前进程用户名：</td>
        <td><?php echo Get_Current_User(); ?></td>
      </tr>
      <tr>
        <td>PHP运行方式：           </td>
        <td><?php echo php_sapi_name(); ?></td>
      </tr>
      <tr>
        <td>PHP版本：              </td>
        <td><?php echo PHP_VERSION; ?></td>
      </tr>
      <tr>
        <td>PHP安装路径 </td>
        <td><?php echo  DEFAULT_INCLUDE_PATH; ?></td>
      </tr>
      <tr>
        <td>当前文件绝对路径 </td>
        <td><?php echo  __FILE__; ?></td>
      </tr>
      <tr>
        <td>服务器IP </td>
        <td><?php echo   GetHostByName($_SERVER['SERVER_NAME']); ?></td>
      </tr>
      <tr>
        <td>服务器解译引擎 </td>
        <td><?php echo  $_SERVER['SERVER_SOFTWARE']; ?></td>
      </tr>
      <tr>
        <td>服务器CPU数量 </td>
        <td><?php echo $_SERVER['PROCESSOR_IDENTIFIER']; ?></td>
      </tr>
      <tr>
        <td>服务器系统目录 </td>
        <td><?php echo   $_SERVER['SystemRoot']; ?></td>
      </tr>
      <tr>
        <td>服务器语言 </td>
        <td><?php echo  $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td>
      </tr>
      
    </tbody>
  </table>
</div>
<footer>
  <p>2015-8-5<br>
    本后台系统由&nbsp&nbsp&nbsp上海司耀信息技术公司</a>提供技术支持</p>
</footer>
<script type="text/javascript" src="<?php echo base_url('statics/js/jquery.min.js')?>"></script>

</body>
</html>