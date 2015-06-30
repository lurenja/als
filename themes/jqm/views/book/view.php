<?php
/* @var $this BookController */
/* @var $model Book */
?>
<div data-role="page">
	<div data-role="header" data-position="fixed" data-add-back-btn="true">
		<a href="" data-rel="back">首页</a>
		<h4>《<?php echo $model->b_name; ?>》</h4>
		<?php echo CHtml::link('编辑', array('update', 'id'=>$model->bid), array('class'=>'ui-btn-right')); ?>
	</div>
	<div class="ui-content">
		<table class="info_tb" style="text-align: left;">
		<thead>
			<th style="width: 40%;"></th>
			<th></th>
		</thead>
		<tbody>
			<tr><td><?php echo $model->getAttributeLabel('bid'); ?></td><td><?php echo $model->bid; ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('b_name'); ?></td><td><?php echo $model->b_name; ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('author'); ?></td><td><?php echo $model->author; ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('country'); ?></td><td><?php echo $model->country; ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('age'); ?></td><td><?php echo $model->age; ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('pub_date'); ?></td><td><?php echo $model->pub_date; ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('pub_house'); ?></td><td><?php echo $model->pub_house; ?></td></tr>
			<tr>
			<td><?php echo $model->getAttributeLabel('is_single'); ?></td>
			<td><?php echo intval($model->is_single) == 1?'整本':'分册'; ?></td>
			</tr>
			<?php if(intval($model->is_single) == 0){?>
			<tr>
			<td><?php echo $model->getAttributeLabel('serial_no'); ?></td>
			<td><?php echo $model->serial_no; ?></td>
			</tr>
			<?php } ?>
			<tr><td><?php echo $model->getAttributeLabel('type'); ?></td><td><?php echo $this->loadTypeName($model->type); ?></td></tr>
			<tr><td><?php echo $model->getAttributeLabel('rectime'); ?></td><td><?php echo $model->rectime; ?></td></tr>
		</tbody>
		</table>
	</div>
</div>