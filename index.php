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
	$(document).bind("mobileinit", function() {
			// disable ajax nav
			$.mobile.ajaxEnabled=false
		});
	</script>
	<title>Index Page</title>
</head>
<body>
	<div data-role="page">
		<div data-role="header" data-position="fixed" id="pageone">
			<h4>所有书籍</h4>
			<?php //echo CHtml::link('新书', array('create', ''), array('class'=>'ui-btn-right')); ?>
		</div>
		<div class="ui-content">
			<ul data-role="listview" data-filter="true" data-inset="true" class="ui-content">
				<?php
				include_once 'class/BookDao.php';
				$dao = new BookDao();
				$bookList = $dao->loadAll();
				foreach($bookList as $bean){
					echo '<li data-icon="false">',
					'<a href="update.php?bid=',$bean->bid,'" data-id="">'.$bean->b_name.'</a>',
					'</li>';
				}
				?>
			</ul>
		</div>
	</div>
</body>
</html>
