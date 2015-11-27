<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link rel="stylesheet" type="text/css" href="jquerymobile/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="jquerymobile/jquery.mobile-1.4.5.js"></script>
	<title>类型编辑</title>
</head>
<body>
<div data-role="page">
	<div data-role="header" data-position="fixed" data-add-back-btn="true">
		<a href="" data-rel="back" class="">返回</a>
		<h4>书籍类型</h4>
	</div>
	<div class="ui-content">
		<form id="booktype_form" action="SetAction.php" method="post">
			<input type="hidden" name="oper" value="">
			<div class="ui-field-contain">
				<label for="id_input">编号</label><input type="text" id="id_input" name="id"/>
			</div>
			<div class="ui-field-contain">
				<label for="name_input">名称</label><input type="text" id="name_input" name="name" />
			</div>
			<button class="ui-btn ui-corner-all" onclick="submit()">保存</button>
			<button id="delBtn" class="ui-btn ui-btn-del ui-corner-all" 
				style="" onclick="deleteType()">删除</button>
		</form>
	</div>
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