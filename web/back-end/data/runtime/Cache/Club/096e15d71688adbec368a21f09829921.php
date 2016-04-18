<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/1/CERT_Website_2016/web/back-end/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/1/CERT_Website_2016/web/back-end/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/1/CERT_Website_2016/web/back-end/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/1/CERT_Website_2016/web/back-end/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/1/CERT_Website_2016/web/back-end/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/1/CERT_Website_2016/web/back-end/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/1/CERT_Website_2016/web/back-end/public/js/jquery.js"></script>
    <script src="/1/CERT_Website_2016/web/back-end/public/js/wind.js"></script>
    <script src="/1/CERT_Website_2016/web/back-end/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('AdminDepart/index');?>">部门管理</a></li>
			<li><a href="<?php echo U('AdminDepart/add');?>">添加部门</a></li>
		</ul>
		<form class="js-ajax-form" method="post">
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminDepart/delete');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>"><?php echo L('DELETE');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminDepart/active');?>" data-subcheck="true" data-msg="你确定是否激活部门？">激活</button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminDepart/stop');?>" data-subcheck="true" data-msg="你确定是否暂停部门？">暂停</button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="60">部门名</th>
						<th width="50">标识</th>
						<th>部门简介</th>
						<th>部门详介</th>
						<th width="120">部门主题背景</th>
						<th width="80"><span>显示顺序</span></th>
						<th width="120"><span>是否运作</span></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<?php if(is_array($departments)): foreach($departments as $key=>$vo): ?><tr>
					<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
					<td><?php echo ($vo["department_name"]); ?></td>
					<td><?php echo ($vo["department_name_en"]); ?></td>
					<td><?php echo ($vo["brief"]); ?></td>
					<td><?php echo ($vo["introduction"]); ?></td>
					<td><a href="<?php echo ($vo["background"]); ?>" target="_blank"><?php echo ($vo["background"]); ?></a></td>
					<td><?php echo ($vo["orders"]); ?></td>
					<td><?php if($vo["flag"] == 1): ?>启用<?php else: ?>暂停<?php endif; ?></td>
					<td>
						<a href="<?php echo U('AdminDepart/edit',array('id'=>$vo['id']));?>"><?php echo L('EDIT');?></a>|
						<a href="<?php echo U('AdminDepart/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
					</td>
				</tr><?php endforeach; endif; ?>
			</table>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
	</div>
	<script src="/1/CERT_Website_2016/web/back-end/public/js/common.js"></script>
	<script>
		setCookie('refersh_time', 0);
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location.reload();
			}
		}
		setInterval(function() {
			refersh_window()
		}, 2000);
	</script>
</body>
</html>