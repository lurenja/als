<?php 
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */
/* @var $model Book*/
?>
<div data-role="page">
	<div data-role="header" data-position="fixed" id="pageone">
		<h4>所有书籍</h4>
		<?php echo CHtml::link('新书', array('create', ''), array('class'=>'ui-btn-right')); ?>
	</div>
	<div class="ui-content">
		<ul data-role="listview" data-filter="true" data-inset="true" class="ui-content">
		<?php
			$dataList = $dataProvider->getData();
			foreach($dataList as $data){
				echo '<li data-icon="false">',
					//'<a href="" data-id="">'.$data->b_name.'</a>',
					CHtml::link(CHtml::encode($data->b_name), array('view', 'id'=>$data->bid));
					'</li>';
			}
		?>
		</ul>
	</div>
	<!--<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="#" class="ui-btn-active">列表</a></li>
				<li><a href="/als/index.php?r=book/create">新书</a></li>
			</ul>
		</div>
    </div>-->
</div>