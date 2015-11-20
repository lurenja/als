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
	$(function(){
		$('#booktype_form button').on('click', function(event){
			event.preventDefault();
		});
		$(document).on('click', '#testbtn', function(event){
			$('#menu_panel').panel('open');
		});
	});
	function newBook(){
		$('#booktype_form input[name="oper"]').val('insert');
		$('#delBtn').hide();
	}
	function updateBook(obj){
		var id = $(obj).text();
		var name = $(obj).parent().next().text();
		var $inputs = $('#booktype_form').find('input');
		$inputs.eq(0).val('update');
		$inputs.eq(1).val(id);
		$inputs.eq(2).val(name);
	}
	function deleteBook(){
		$('#booktype_form input[name="oper"]').val('delete');
		$('#booktype_form').submit();
	}
	function submitForm(){
		$('#booktype_form').submit();
	}
	</script>
	<title>参数设置</title>
</head>
<body>
	<div data-role="page">
		<div data-role="header"><h5>参数设置</h5></div>
		<div data-role="content">
			<div class="ui-corner-all">
				<div class="ui-bar ui-bar-a">书籍类型</div>
				<div class="ui-body ui-body-a">
					<table data-role="table" data-mode="" class="ui-responsive ">
						<thead>
							<tr><th>编号</th><th>名称</th></tr>
						</thead>
						<tbody>
							<?php 
							include_once 'class/BookDao.php';
							$dao = new BookDao();
							$typeList = $dao->loadBookType();
							foreach ($typeList as $row) {
								echo '<tr>','<td><a href="#booktype_form" data-rel="popup" onclick="updateBook(this)">'
									,$row['id'],'</a></td><td>'
									,$row['name'],'</td>','</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<a href="#booktype_form" onclick="newBook()" data-rel="popup" class="ui-btn ui-icon-plus ui-btn-icon-notext">添加</a>
			<form id="booktype_form" action="SetAction.php" method="post" data-role="popup" data-ajax="false">
				<input type="hidden" name="oper" value="">
				<div class="ui-field-contain">
					<label for="id_input">编号</label><input type="text" id="id_input" name="id"/>
				</div>
				<div class="ui-field-contain">
					<label for="name_input">名称</label><input type="text" id="name_input" name="name" />
				</div>
				<button class="ui-btn ui-btn-inline ui-mini" onclick="submitForm()">保存</button>
				<button id="delBtn" class="ui-btn ui-btn-inline ui-mini" style="background-color: #c11b17; color:white;" onclick="deleteBook()">删除</button>
				<button class="ui-btn ui-btn-inline ui-mini">取消</button>
			</form>
			<a href="" id="testbtn">open menu</a>
		</div>
	</div>
</body>
</html>