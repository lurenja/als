<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>参数设置</title>
	<link rel="stylesheet" type="text/css" href="jquerymobile/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<style type="text/css">
	.ui-bar .ui-btn{
		margin-top: -3px !important;
		margin: 0px;
	}
	</style>
	<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="jquerymobile/jquery.mobile-1.4.5.js"></script>
	<script type="text/javascript">
	//新增书籍类型
	function newType(){
		sessionStorage.removeItem('typeBean');
		sessionStorage.setItem('typeOper', 'insert');
		$.mobile.changePage('type_form.php');
	}
	//更新书籍类型
	function updateType(obj){
		var bean = {
			'id': $(obj).text(),
			'name': $(obj).parent().next().text()
		};
		sessionStorage.setItem('typeBean', JSON.stringify(bean));
		sessionStorage.setItem('typeOper', 'update');
		$.mobile.changePage('type_form.php');
	}
	</script>
</head>
<body>
	<div data-role="page">
		<div data-role="header"><h5>参数设置</h5></div>
		<div data-role="content">
			<div class="ui-corner-all">
				<div class="ui-bar ui-bar-a">
					书籍类型
					<a href="javascript:void(0);" onclick="newType()" 
						class="ui-btn ui-btn-inline ui-btn-right ui-icon-plus ui-btn-icon-notext ui-corner-all">添加</a>
				</div>
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
		<?php include_once 'all_panel.html'; ?>
		<script type="text/javascript">
		$(function(){
			$(document).on('swiperight', '.ui-page', function(event){ //绑定右滑全局菜单
				$('#menu_panel').panel('open');
			});
		});
		</script>
	</div>
</body>
</html>