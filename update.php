<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="jquerymobile/jquery.mobile-1.4.5.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="jquerymobile/jquery.mobile-1.4.5.js"></script>
<style type="text/css">
#delDialog a{
	font-size: .8em;
	/*font-weight: normal;*/
}
</style>
<title>书籍信息</title>
</head>
<body>
<div data-role="page" data-add-back-btn="true" >
	<div data-role="header" data-position="fixed">
		<a href="index.php" data-rel="">返回</a>
		<?php
		include_once 'class/BookDao.php';
		$dao = new BookDao();
		$bean = $dao->loadByID($_GET['bid']);
		?>
		<h4>《<?php echo $bean->b_name; ?>》</h4>
		<a href="#delDialog" data-rel="popup" class="ui-icon-delete ui-btn-icon-left" style="background-color: #c11b17; color:white;">删除</a>
		<div data-role="popup" id="delDialog" data-position-to="window" data-dismissible="false" style="max-width:400px;">
			<div role="main" class="ui-content" style="text-align:center;">
				<p class="ui-title" style="">确认删除书籍？</p>
				<p style="font-size: .6em;color: #c11b17;">删除后数据无法恢复</p>
				<a href="#" onclick="delBook()" class="ui-btn ui-corner-all ui-btn-inline" style="background-color: #c11b17; color:white;" data-transition="flow">删除</a>
				<a href="#" class="ui-btn ui-corner-all ui-btn-inline" data-rel="back">取消</a>
			</div>
		</div>
	</div>
	<?php require_once '_form.php'; ?>
</div>
<script type="text/javascript">
$(function(){
	$('#submitBtn').on('click', function(event){
		event.preventDefault();
		updateBook();
	});
	$(document).bind("mobileinit", function() {
		// disable ajax nav
		$.mobile.ajaxEnabled=false
	});
});
function updateBook(){
	$('#oper').val('update');
	$('#book_form').attr('action', 'UpdateAction.php').submit(); 
}
function delBook(){
	$('#oper').val('delete');
	$('#book_form').attr('action', 'UpdateAction.php').submit();
}
</script>
</body>
</html>