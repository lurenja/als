<?php
/* @var $this BookTypeController */
/* @var $model BookType */

$this->breadcrumbs=array(
	'Book Types'=>array('index'),
	$model->t_no,
);

$this->menu=array(
	array('label'=>'List BookType', 'url'=>array('index')),
	array('label'=>'Create BookType', 'url'=>array('create')),
	array('label'=>'Update BookType', 'url'=>array('update', 'id'=>$model->t_no)),
	array('label'=>'Delete BookType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->t_no),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BookType', 'url'=>array('admin')),
);
?>

<h1>View BookType #<?php echo $model->t_no; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		't_no',
		'description',
	),
)); ?>
