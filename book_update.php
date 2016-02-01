<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	#delDialog a{
		font-size: .8em;
		/*font-weight: normal;*/
	}
	</style>
	<title>书籍信息</title>
</head>
<body>
<div class="container">
	<div class="row header">
		<div class="col-xs-2"><a href="index.php" class="glyphicon glyphicon-menu-left"></a></div>
		<div class="col-xs-8">
			<?php
			include_once 'class/BookDao.php';
			$dao = new BookDao();
			$bean = $dao->loadByID($_GET['bid']);
			?>
			<h4>《<?php echo $bean->b_name; ?>》</h4>
		</div>
		<div class="col-xs-2">
			<a class="glyphicon glyphicon-trash ui-btn-del" data-toggle="modal" data-target="#delDialog"></a>
			<div id="delDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div role="main" class="modal-content" style="text-align:center;">
					<div class="modal-body">
						<p class="ui-title" style="">确认删除书籍？</p>
						<p style="font-size: .6em;color: #c11b17;">删除后数据无法恢复</p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-danger" onclick="delBook()">删除</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">取消</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php require_once 'book_form.php'; ?>
	<script type="text/javascript">
	$(function(){
		$('#submitBtn').on('click', function(event){
			event.preventDefault();
			updateBook();
		});
	});
	function updateBook(){
		$('#oper').val('update');
		// $('#book_form').attr('action', 'UpdateAction.php').submit();
		$.post('UpdateAction.php', $('#book_form').serialize(), function(result){
			window.location.href = 'index.php';
		}, 'text');
	}
	function delBook(){
		$('#oper').val('delete');
		// $('#book_form').attr('action', 'UpdateAction.php').submit();
		$.post('UpdateAction.php', $('#book_form').serialize(), function(result){
			window.location.href = 'index.php';
		}, 'text');
	}
	</script>
</div>
</body>
</html>