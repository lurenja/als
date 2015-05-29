<?php 
/* @var $this BookController */
/* @var $model Book */
/* @var $modelBT BookType */
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
						<option value="">年份</option>
					</select>
					<select id="pub_month" onchange="setPubDate()">
						<option value="">月份</option>
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
				<select id="b_type" onchange="setType()">
					<?php 
					foreach($modelBT->findAll() as $datarow){
						echo '<option value="',$datarow->t_no,'">',$datarow->description,'</option>';
					}
					?>
				</select>
				<?php echo $form->hiddenField($model,'type',array('size'=>10,'maxlength'=>10));?>
			</td>
			</tr>
		</tbody>
		</table>
		<div class="ui-grid-a custom_grid1">
			<div class="ui-block-a">
				<fieldset data-role="controlgroup" id="rdo-single" data-type="horizontal" data-mini="true">
					<input type="radio" name="rdo-single" id="rdo-single-1" value="1" checked="checked" />
					<label for="rdo-single-1">整本</label>
					<input type="radio" name="rdo-single" id="rdo-single-0" value="0" />
					<label for="rdo-single-0">分册</label>
					<input type="hidden" id="hid_single"  value="0"/>
				</fieldset>
				<?php echo $form->hiddenField($model, 'is_single'); ?>
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
	initSelect();
	$('INPUT[name="rdo-single"]').on('click', setIsSingle);
	initSingleRadio();
});
function setPubDate(){
	var pubDate = $('#pub_year').val()+'-'+$('#pub_month').val()+'-01';
	$('#Book_pub_date').val(pubDate);
}
function setIsSingle(){
	var isSingle = $('INPUT[name="rdo-single"]:checked').val();
	if(isSingle == 1){
		$('#Book_serial_no').val(1);
	}
	$('#Book_is_single').val(isSingle);
}
function setType(){
	$('#Book_type').val($('#b_type').val());
}
function initSelect(){
	var myDate = new Date();
	var year = myDate.getFullYear();
	var frag = document.createDocumentFragment();
	var opt;
	for(var i=1970, size=year;i<=size;i++){
		opt = document.createElement('option');
		opt.value = i;
		opt.innerText = i;
		opt.textContent = i; //Firefox
		frag.appendChild(opt);
	}
	document.getElementById('pub_year').appendChild(frag);
	frag = document.createDocumentFragment();
	for(var i=1; i<10;i++){
		opt = document.createElement('option');
		opt.value = '0'+i;
		opt.innerText = '0'+i;
		opt.textContent = '0'+i; //Firefox
		frag.appendChild(opt);
	}
	for(var i=10; i<13;i++){
		opt = document.createElement('option');
		opt.value = i;
		opt.innerText = i;
		opt.textContent = i; //Firefox
		frag.appendChild(opt);
	}
	document.getElementById('pub_month').appendChild(frag);
}
function initSingleRadio(){
	if($('#Book_is_single').val() != ''){
		var isSingle = $('#Book_is_single').val();
		if(isSingle == 0){
			$('#rdo-single-0').prop('checked', true);
			//$('INPUT[name="rdo-single"]').checkboxradio("refresh");
		}
	}else{
		$('#Book_serial_no').val(1);
	}
}
</script>