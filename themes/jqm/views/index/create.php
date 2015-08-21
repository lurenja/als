<?php 
/* @var $this BookController */
/* @var $model Book */
?>
<div data-role="page">
	<div data-role="header" data-position="fixed">
		<a href="" data-rel="back">首页</a>
		<h4>添加书籍</h4>
	</div>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	<!-- <div data-role="footer" data-position="fixed" >
		<div data-role="navbar">
			<ul>
				<li><a href="/als/index.php?r=book">列表</a></li>
				<li><a href="" class="ui-btn-active">新书</a></li>
			</ul>
		</div>
	</div> -->
</div>