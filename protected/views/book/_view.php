<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bid), array('view', 'id'=>$data->bid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('b_name')); ?>:</b>
	<?php echo CHtml::encode($data->b_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pub_date')); ?>:</b>
	<?php echo CHtml::encode($data->pub_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pub_house')); ?>:</b>
	<?php echo CHtml::encode($data->pub_house); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_single')); ?>:</b>
	<?php echo CHtml::encode($data->is_single); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_no')); ?>:</b>
	<?php echo CHtml::encode($data->serial_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rectime')); ?>:</b>
	<?php echo CHtml::encode($data->rectime); ?>
	<br />

	*/ ?>

</div>