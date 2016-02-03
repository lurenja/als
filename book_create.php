<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap3-typeahead.js"></script>
	<title>书籍信息</title>
</head>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-xs-2"><a href="index.php" class="glyphicon glyphicon-menu-left"></a></div>
			<div class="col-xs-8"><h4>新书</h4></div>
		</div>
		<?php
		include_once 'class/bean/Book.php';
		$bean = new Book();
		$time = gettimeofday();
		$bean->bid = $time['sec'].$time['usec'];
		require_once 'book_form.php';
		?>
		<script type="text/javascript">
		$(function(){
			$('#submitBtn').on('click', function(event){
				event.preventDefault();
				createBook();
			});
		});
		function createBook(){
			$.post('CreateAction.php', $('#book_form').serialize(), function(data){
				window.location.href="index.php";
			}, 'text');
		}
		</script>
	</div>
</body>
</html>