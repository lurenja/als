<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->bid=>array('view','id'=>$model->bid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index')),
	array('label'=>'Create Book', 'url'=>array('create')),
	array('label'=>'View Book', 'url'=>array('view', 'id'=>$model->bid)),
	array('label'=>'Manage Book', 'url'=>array('admin')),
);
?>

<h1>Update Book <?php echo $model->bid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>