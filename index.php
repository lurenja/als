<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="jquerymobile/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="jquerymobile/jquery.mobile-1.4.5.js"></script>
	<script type="text/javascript">
	$(function(){
		$(document).on('swiperight', '.ui-page', function(event){
			$('#menu_panel').panel('open');
		});
	});
	</script>
	<title>Index Page</title>
</head>
<body>
	<div data-role="page">
		<div data-role="header" data-position="fixed" id="pageone">
			<h4>所有书籍</h4>
			<a href="create.php" data-ajax="false" class="ui-shadow ui-btn-right ui-corner-all">新书</a>
		</div>
		<div data-role="content">
			<ul data-role="listview" data-filter="true" data-inset="true" class="ui-content">
				<?php
				include_once 'class/BookDao.php';
				$dao = new BookDao();
				$bookList = $dao->loadAll();
				foreach($bookList as $bean){
					echo '<li data-icon="false">',
					'<a href="update.php?bid=',$bean->bid,'" data-id="" data-ajax="false">',
					$bean->b_name,'&nbsp;-&nbsp;',$bean->author,
					'</a>',
					'</li>';
				}
				?>
			</ul>
			<a href="setting.php">设置</a>
		</div>
	</div>
	<div data-role="panel" id="menu_panel" data-display="overlay">
			<ul data-role="listview">
				<li><a href="index.php">首页</a></li>
				<li><a href="setting.php" data-ajax="true">设置</a></li>
			</ul>
	</div>
</body>
</html>
