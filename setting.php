<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>参数设置</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<style type="text/css">
		table.table td{
			cursor: pointer;
		}
		.panel-icon {
			float:right;
		}
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	//新增书籍类型
	function newType(){
		sessionStorage.removeItem('bean');
		sessionStorage.setItem('oper', 'insert');
		window.location.href = 'type_form.php';
	}
	//更新书籍类型
	function updateType(trObj){
		var $tds = $(trObj).find('td');
		var bean = {
			'id': $tds.eq(0).text(),
			'name': $tds.eq(1).text()
		};
		sessionStorage.setItem('bean', JSON.stringify(bean));
		sessionStorage.setItem('oper', 'update');
		window.location.href = 'type_form.php';
	}
<<<<<<< HEAD
	function newAuthor(){ //新增作者
		sessionStorage.setItem('oper', 'insert');
		window.location.href = 'author_form.php';
	}
	function updateAuthor(trObj) { //编辑作者信息
		var $tds = $(trObj).find('td');
=======
	function newAuthor(){
		sessionStorage.setItem('oper', 'insertAuthor');
		window.location.href = 'author_form.php';
	}
	function updateAuthor(obj) {
		var $tds = $(obj).find('td');
>>>>>>> 8e356334b17b3e482ec450f10e8f47b55c1d659b
		var bean = {
			'aid': $tds.eq(0).text(),
			'name': $tds.eq(1).text(),
			'country': $tds.eq(2).text(),
			'age': $tds.eq(3).text()
		}
<<<<<<< HEAD
		sessionStorage.setItem('oper', 'update');
=======
		sessionStorage.setItem('oper', 'updateAuthor');
>>>>>>> 8e356334b17b3e482ec450f10e8f47b55c1d659b
		sessionStorage.setItem('bean', JSON.stringify(bean));
		window.location.href = 'author_form.php';
	}
	</script>
</head>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-xs-2"><a href="index.php" class="glyphicon glyphicon-home"></a></div>
			<div class="col-xs-8"><h5>参数设置</h5></div>
		</div>
		<div data-role="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						书籍类型
						<a href="javascript:void(0);" onclick="newType()"
						class="glyphicon glyphicon-plus panel-icon"></a>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr><th>编号</th><th>名称</th></tr>
							</thead>
							<tbody>
								<?php
								include_once 'class/BasicDao.php';
								$dao = new BasicDao();
								$typeList = $dao->loadBookType();
								foreach ($typeList as $row) {
									echo '<tr onclick="updateType(this)"><td>'
									,$row['id'],'</td><td>'
									,$row['name'],'</td></tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						作者列表
						<a href="javascript:void(0);" onclick="newAuthor()" class="glyphicon glyphicon-plus panel-icon"></a>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr><th>ID</th><th>姓名</th><th>国籍</th><th>时代</th></tr>
							</thead>
							<tbody>
								<?php
								$alist = $dao->loadAuthor();
								foreach ($alist as $row) {
									echo '<tr onclick="updateAuthor(this)"><td>'
									,$row['aid'],'</td><td>'
									,$row['name'],'</td><td>'
									,$row['country'],'</td><td>'
									,$row['age'],'</td></tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		</script>
	</div>
</body>
</html>