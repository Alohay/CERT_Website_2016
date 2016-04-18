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
		<li class="active">
			<a href="<?php echo U('AdminApplication/index');?>">申请管理</a>
		</li>
	</ul>
	<form class="well form-search" method="post" action="<?php echo U('AdminApplication/index');?>">
		<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入姓名...">
		<input type="submit" class="btn btn-primary" value="搜索" />
	</form>
	<form class="js-ajax-form" method="post">
		<div class="table-actions">
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminApplication/delete');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>"><?php echo L('DELETE');?></button>
		</div>
		<table class="table table-hover table-bordered table-list">
			<thead>
			<tr>
				<th width="16">
					<label>
						<input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label>
				</th>
				<th width="60">学号</th>
				<th width="50">姓名</th>
				<th width="60">班级</th>
				<th width="60">电子邮箱</th>
				<th width="60">手机号码</th>
				<th>自我介绍</th>
				<th width="60">意向部门</th>
				<th width="120">
					<span>申请时间</span>
				</th>
				<th width="60">
					<span>通过面试</span>
				</th>
				<th width="60">
					<span>通过考核</span>
				</th>
				<th width="120"><?php echo L('ACTIONS');?></th>
			</tr>
			</thead>
			<?php if(is_array($applications)): foreach($applications as $key=>$vo): ?><tr>
					<td>
						<input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
					<td><?php echo ($vo["student_id"]); ?></td>
					<td><?php echo ($vo["username"]); ?></td>
					<td><?php echo ($vo["classname"]); ?></td>
					<td><?php echo ($vo["email"]); ?></td>
					<td><?php echo ($vo["phonenumber"]); ?></td>
					<td><?php echo ($vo["introduction"]); ?></td>
					<td><?php echo ($vo["department_name"]); ?></td>
					<td><?php echo ($vo["create_time"]); ?></td>
					<td>
						<?php if($vo["pass"] == 1): ?>通过
							<?php else: ?>
							未通过<?php endif; ?>
					</td>
					<td>
						<?php if($vo["check"] == 1): ?>通过
							<?php else: ?>
							未通过<?php endif; ?>
					</td>
					<td>
						<a href="<?php echo U('AdminApplication/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a><br/>
						<a href="<?php echo U('AdminApplication/pass',array('id'=>$vo['id']));?>" class="js-ajax-club" data-msg="<?php echo ($vo["username"]); ?>是否通过面试？">通过面试</a>
						|
						<a href="<?php echo U('AdminApplication/unpass',array('id'=>$vo['id']));?>" class="js-ajax-club" data-msg="是否取消<?php echo ($vo["username"]); ?>通过面试？">取消面试通过</a><br />
						<a href="<?php echo U('AdminApplication/check',array('id'=>$vo['id']));?>" class="js-ajax-club" data-msg="将会从成员表中添加<?php echo ($vo["username"]); ?>，是否通过此人考核？">通过考核</a>
						|
						<a href="<?php echo U('AdminApplication/uncheck',array('id'=>$vo['id']));?>" class="js-ajax-club" data-msg="将会从成员表中删除此人，是否取消<?php echo ($vo["username"]); ?>通过考核？">取消考核通过</a>
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


	//社团成员的考核通过操作
	if ($('a.js-ajax-club').length) {
		Wind.use('artDialog', function () {
			$('.js-ajax-club').on('click', function (e) {
				e.preventDefault();
				var $_this = this,
						$this = $($_this),
						href = $this.prop('href'),
						msg = $this.data('msg');
				art.dialog({
					title: false,
					icon: 'question',
					content: msg,
					follow: $_this,
					close: function () {
						$_this.focus();; //关闭时让触发弹窗的元素获取焦点
						return true;
					},
					okVal:"确定",
					ok: function () {

						$.getJSON(href).done(function (data) {
							if (data.state === 'success') {
								if (data.referer) {
									location.href = data.referer;
								} else {
									reloadPage(window);
								}
							} else if (data.state === 'fail') {
								//art.dialog.alert(data.info);
								//alert(data.info);//暂时处理方案
								art.dialog({
									content: data.info,
									icon: 'warning',
									ok: function () {
										this.title(data.info);
										return true;
									}
								});
							}
						});
					},
					cancelVal: '关闭',
					cancel: true
				});
			});

		});
	}
</script>
</body>
</html>