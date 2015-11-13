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
<div data-role="page" data-add-back-btn="true" >
	<div data-role="header" data-position="fixed">
		<a href="" data-rel="back">返回</a>
		<?php
		include_once 'class/BookDao.php';
		$dao = new BookDao();
		$bean = $dao->loadByID($_GET['bid']);
		?>
		<h4>《<?php echo $bean->b_name; ?>》</h4>
	</div>
	<?php require_once '_form.php'; ?>
</div>
<script type="text/javascript">
$(function(){
	$('button').on('click', function(event){
		event.preventDefault();
		updateForm();
	});
	// $(document).bind("mobileinit", function() {
	// 	// disable ajax nav
	// 	$.mobile.ajaxEnabled=false
	// });
});
function updateForm(){
	$('#book_form').attr('action', 'UpdateAction.php').submit(); 
}
</script>
</body>
</html>