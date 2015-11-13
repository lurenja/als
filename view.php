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
	$(document).bind("mobileinit", function() {
			// disable ajax nav
			$.mobile.ajaxEnabled=false
		});
	</script>
	<title>VIEW</title>
</head>
<body>
<div data-role="page">
	<div data-role="header" data-position="fixed" data-add-back-btn="true">
		<a href="" data-rel="back">首页</a>
		<?php
		include_once 'class/BookDao.php';
		$dao = new BookDao();
		$bookList = $dao->loadByID($_GET['bid']);
		if(count($bookList) == 1){
			$model = $bookList[0];
		}
		?>
		<h4>《<?php echo $model['b_name']; ?>》</h4>
		<?php //echo CHtml::link('编辑', array('update', 'id'=>$model->bid), array('class'=>'ui-btn-right')); ?>
	</div>
	<div class="ui-content">
		<table class="info_tb" style="text-align: left;">
		<thead>
			<th style="width: 40%;"></th>
			<th></th>
		</thead>
		<tbody>
			<tr><td>名称</td><td><?php echo $model['b_name']; ?></td></tr>
			<tr><td>作者</td><td><?php echo $model['author']; ?></td></tr>
			<tr><td>国籍</td><td><?php echo $model['country']; ?></td></tr>
			<tr><td>时期</td><td><?php echo $model['age']; ?></td></tr>
			<?php if(!empty($model['serial_no'])){ ?>
			<tr><td>分册</td><td><?php echo $model['serial_no']; ?></td></tr>
			<?php } ?>
			<tr><td>出版日期</td><td><?php echo $model['pub_date']; ?></td></tr>
			<tr><td>出版社</td><td><?php echo $model['pub_house']; ?></td></tr>
			<tr><td>类型</td><td><?php echo $model['type']; ?></td></tr>
			<tr><td>ID</td><td><?php echo $model['bid']; ?></td></tr>
			<tr><td>数据时间</td><td><?php echo $model['rectime']; ?></td></tr>
		</tbody>
		</table>
	</div>
</div>
</body>
</html>