<?php
/* @var $this BookTypeController */
/* @var $model BookType */

$this->breadcrumbs=array(
	'Book Types'=>array('index'),
	$model->t_no=>array('view','id'=>$model->t_no),
	'Update',
);

$this->menu=array(
	array('label'=>'List BookType', 'url'=>array('index')),
	array('label'=>'Create BookType', 'url'=>array('create')),
	array('label'=>'View BookType', 'url'=>array('view', 'id'=>$model->t_no)),
	array('label'=>'Manage BookType', 'url'=>array('admin')),
);
?>

<h1>Update BookType <?php echo $model->t_no; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>