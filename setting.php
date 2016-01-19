<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>参数设置</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	//新增书籍类型
	function newType(){
		sessionStorage.removeItem('typeBean');
		sessionStorage.setItem('typeOper', 'insert');
		window.location.href = 'type_form.php';
	}
	//更新书籍类型
	function updateType(obj){
		var bean = {
			'id': $(obj).text(),
			'name': $(obj).parent().next().text()
		};
		sessionStorage.setItem('typeBean', JSON.stringify(bean));
		sessionStorage.setItem('typeOper', 'update');
		window.location.href = 'type_form.php';
	}
	</script>
</head>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-xs-12"><h5>参数设置</h5></div>
		</div>
		<div data-role="row">
			<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					书籍类型
					<a href="javascript:void(0);" onclick="newType()"
						class="glyphicon glyphicon-plus" style="float:right;"></a>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr><th>编号</th><th>名称</th></tr>
						</thead>
						<tbody>
							<?php
							include_once 'class/BookDao.php';
							$dao = new BookDao();
							$typeList = $dao->loadBookType();
							foreach ($typeList as $row) {
								echo '<tr>','<td><a href="javascript:void(0);" onclick="updateType(this)">'
								,$row['id'],'</a></td><td>'
								,$row['name'],'</td>','</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
		<script type="text/javascript">
		$(function(){
			// $(document).on('swiperight', '.ui-page', function(event){ //绑定右滑全局菜单
			// 	$('#menu_panel').panel('open');
			// });
		});
		</script>
	</div>
</body>
</html>