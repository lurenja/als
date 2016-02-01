<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>Index Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row header" id="pageone">
			<div class="col-xs-2">
				<div class="btn-group">
					<span class="glyphicon glyphicon-menu-hamburger"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
					<ul class="dropdown-menu">
						<li><a href="index.php">首页</a></li>
						<li><a href="setting.php">设置</a></li>
					</ul>
				</div>
			</div>
			<div class="col-xs-8"><h4>所有书籍</h4></div>
			<div class="col-xs-2"><a href="book_create.php" class="glyphicon glyphicon-plus" aria-hidden="true"></a></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="list-group">
					<?php
					include_once 'class/BookDao.php';
					$dao = new BookDao();
					$bookList = $dao->loadAll();
					foreach($bookList as $bean){
						echo '<a class="list-group-item" href="book_update.php?bid=',$bean->bid,'" data-id="">',
						$bean->b_name,'&nbsp;-&nbsp;',$bean->aname,
						'</a>';
					}
					?>
				</div>
			</div>
		</div>
		<?php //include_once 'all_panel.html' ?>
	</div>
</body>
</html>
