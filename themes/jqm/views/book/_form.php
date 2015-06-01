<?php 
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>
<div data-role="content">
	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'book-form', 'enableAjaxValidation'=>false,)); ?>
		<table>
		<tbody>
			<tr>
			<td style="width: 30%;"><?php echo $form->labelEx($model,'b_name'); ?></td>
			<td><?php echo $form->textField($model,'b_name',array('size'=>60,'maxlength'=>128));?></td>
			</tr>
			<tr>
			<td><?php echo $form->labelEx($model,'author'); ?></td>
			<td><?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128));?></td>
			</tr>
			<tr>
			<td><?php echo $form->labelEx($model,'country'); ?></td>
			<td><?php echo $form->textField($model,'country',array('size'=>32,'maxlength'=>32));?></td>
			</tr>
			<tr>
			<td><?php echo $form->labelEx($model,'age'); ?></td>
			<td><?php echo $form->textField($model,'age',array('size'=>32,'maxlength'=>32)); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'pub_date'); ?></td>
				<td>
				<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" name="" id="">
					<select id="pub_year" onchange="setPubDate()">
						<option value="" selected="selected" disabled="disabled">年份</option>
						<?php 
							for($i=1949, $size=intval(date('Y'));$i<=$size;$i++){
								echo '<option value="',$i,'">',$i,'</option>';
							}
						?>
					</select>
					<select id="pub_month" onchange="setPubDate()">
						<option value="" selected="selected" disabled="disabled">月份</option>
						<?php 
							for($i=1, $size=9;$i<=$size;$i++){
								echo '<option value="0',$i,'">0',$i,'</option>';
							}
							for($i=10, $size=12;$i<=$size;$i++){
								echo '<option value="',$i,'">',$i,'</option>';
							}
						?>
					</select>
				</fieldset>
				<?php echo $form->hiddenField($model, 'pub_date'); ?>
				</td>
			</tr>
			<tr>
			<td><?php echo $form->labelEx($model,'pub_house'); ?></td>
			<td><?php echo $form->textField($model,'pub_house',array('size'=>60,'maxlength'=>128)); ?></td>
			</tr>
			<tr>
			<td><?php echo $form->labelEx($model,'type'); ?></td>
			<td>
				<?php 
				$typeList = array();
				foreach($this->loadBookType() as $row){
					$typeList[$row->t_no] = $row->description;
				}
				echo $form->dropDownList($model, 'type', $typeList); 
				?>
			</td>
			</tr>
		</tbody>
		</table>
		<div class="ui-grid-a custom_grid1">
			<div class="ui-block-a">
				<fieldset data-role="controlgroup" id="rdo-single" data-type="horizontal" data-mini="true">
					<?php echo $form->radioButtonList($model, 'is_single', array(1=>"整本", 0=>"分册"), array('separator'=>'')); ?>
				</fieldset>
			</div>
			<div class="ui-block-b">
				<?php echo $form->textField($model, 'serial_no'); ?>
			</div>
		</div>
		<div class="ui-grid-b"><?php echo $form->errorSummary($model); ?></div>
		<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '保存'); ?>
	<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
$(function(){
	//initSelect();
	//$('INPUT[name="rdo-single"]').on('click', setIsSingle);
	//initSingleRadio();
});
function setPubDate(){
	var pubDate = $('#pub_year').val()+'-'+$('#pub_month').val()+'-01';
	$('#Book_pub_date').val(pubDate);
}
</script>