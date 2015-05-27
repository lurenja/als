<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bid'); ?>
		<?php echo $form->textField($model,'bid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_name'); ?>
		<?php echo $form->textField($model,'b_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pub_date'); ?>
		<?php echo $form->textField($model,'pub_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pub_house'); ?>
		<?php echo $form->textField($model,'pub_house',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_single'); ?>
		<?php echo $form->textField($model,'is_single'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_no'); ?>
		<?php echo $form->textField($model,'serial_no',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rectime'); ?>
		<?php echo $form->textField($model,'rectime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->