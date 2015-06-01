<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bid'); ?>
		<?php echo $form->textField($model,'bid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b_name'); ?>
		<?php echo $form->textField($model,'b_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'b_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_date'); ?>
		<?php echo $form->textField($model,'pub_date'); ?>
		<?php echo $form->error($model,'pub_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_house'); ?>
		<?php echo $form->textField($model,'pub_house',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'pub_house'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_single'); ?>
		<?php echo $form->textField($model,'is_single'); ?>
		<?php echo $form->error($model,'is_single'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial_no'); ?>
		<?php echo $form->textField($model,'serial_no',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'serial_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rectime'); ?>
		<?php echo $form->textField($model,'rectime'); ?>
		<?php echo $form->error($model,'rectime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->