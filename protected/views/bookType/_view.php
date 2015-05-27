<?php
/* @var $this BookTypeController */
/* @var $data BookType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->t_no), array('view', 'id'=>$data->t_no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>