<?php 
/* @var $this BookController */
/* @var $model Book */
?>
<div data-role="page" data-add-back-btn="true" >
	<div data-role="header" data-position="fixed">
		<a href="" data-rel="back">返回</a>
		<h4>《<?php echo $model->b_name; ?>》</h4>
	</div>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>