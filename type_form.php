<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>类型编辑</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row header">
		<div class="col-xs-2">
			<a href="setting.php" class="glyphicon glyphicon-menu-left"></a>
		</div>
		<div class="col-xs-8"><h4>书籍类型</h4></div>
	</div>
	<form id="booktype_form" action="SetAction.php" method="post" class="form-horizontal">
		<input type="hidden" name="oper" value="">
		<div class="form-group">
			<label for="id_input" class="col-xs-3 control-label">编号</label>
			<div class="col-xs-9"><input type="text" id="id_input" name="id" class="form-control"/></div>
		</div>
		<div class="form-group">
			<label for="name_input" class="col-xs-3 control-label">名称</label>
			<div class="col-xs-9"><input type="text" id="name_input" name="name" class="form-control"/></div>
		</div>
		<div class="form-group" role="group">
			<div class="col-xs-3"></div>
			<button class="btn btn-default col-xs-6" onclick="submit()">保存</button>
			<button id="delBtn" class="btn btn-danger col-xs-3" onclick="deleteType()">删除</button>
		</div>
	</form>
	<script type="text/javascript">
		//阻止表单按钮默认事件
		$('#booktype_form button').on('click', function(event){
			event.preventDefault();
		});
		$('#booktype_form input[name="oper"]').val(sessionStorage.getItem('typeOper'));
		if(sessionStorage.getItem('typeOper') == 'insert'){
			$('#delBtn').hide();
		}else if(sessionStorage.getItem('typeOper') == 'update'){
			var bean = JSON.parse(sessionStorage.getItem('typeBean'));
			$('#id_input').val(bean['id']);
			$('#name_input').val(bean['name']);
		}
		//提交表单
		function submit(){
			$('#booktype_form').submit();
		}
		//删除类型
		function deleteType(){
			$('#booktype_form input[name="oper"]').val('delete');
			$('#booktype_form').submit();
		}
	</script>
</div>
</body>
</html>