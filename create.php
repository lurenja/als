<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="jquerymobile/jquery.mobile-1.4.5.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="jquerymobile/jquery.mobile-1.4.5.js"></script>
<title>书籍信息</title>
</head>
<body>
<div data-role="page">
	<div data-role="header" data-position="fixed">
		<a href="index.php">返回</a>
		<h4>新书</h4>
	</div>
	<?php
	include_once 'class/bean/Book.php';
	$bean = new Book();
	$time = gettimeofday();
	$bean->bid = $time['sec'].$time['usec'];
	require_once 'book_form.php'; 
	?>
	<script type="text/javascript">
	$(document).on('pagecreate', function(event){
		$('#submitBtn').on('click', function(event){
			event.preventDefault();
			createBook();
		});
	});
	function createBook(){
		// $('#book_form').attr('action', 'CreateAction.php').submit();
		$.post('CreateAction.php', $('#book_form').serialize(), function(data){
			$.mobile.changePage('index.php', {reload:true});
		}, 'text');
	}
	</script>
</div>
</body>
</html>