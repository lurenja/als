<?php 
/* @var $bean Book */
?>
<div data-role="content">
	<form id="book_form" method="post">
		<input type="hidden" name="bid" value="<?php echo $bean->bid; ?>" />
		<table>
		<tbody>
			<tr>
			<td style="width: 30%;"><?php echo $bean->labels('b_name'); ?></td>
			<td><input type="text" name="bName" value="<?php echo $bean->b_name; ?>"></td>
			</tr>
			<tr>
			<td><?php echo $bean->labels('author'); ?></td>
			<td><input type="text" name="author" value="<?php echo $bean->author; ?>"></td>
			</tr>
			<tr>
			<td><?php echo $bean->labels('country'); ?></td>
			<td><input type="text" name="country" value="<?php echo $bean->country; ?>"></td>
			</tr>
			<tr>
			<td><?php echo $bean->labels('age'); ?></td>
			<td><input type="text" name="age" value="<?php echo $bean->age; ?>"></td>
			</tr>
			<tr>
				<td><?php echo $bean->labels('pub_date'); ?></td>
				<td>
				<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" name="" id="">
					<select id="pub_year" onchange="setPubDate()">
						<option value="" selected="selected" disabled="disabled">年份</option>
						<?php 
							for($i=1949, $size=intval(date('Y'));$i<=$size;$i++){
								if(substr($bean->pub_date, 0, 4) == $i){
									echo '<option selected="selected" value="';
								}else{
									echo '<option value="';
								}
								echo $i,'">',$i,'</option>';
							}
						?>
					</select>
					<select id="pub_month" onchange="setPubDate()">
						<option value="" selected="selected" disabled="disabled">月份</option>
						<?php 
							for($i=1, $size=12;$i<=$size;$i++){
								$iShow = $i>9?$i:'0'.$i;
								if(substr($bean->pub_date, 5, 2) == $iShow){
									echo '<option selected="selected" value="';
								}else{
									echo '<option value="';
								}
								echo $iShow,'">',$iShow,'</option>';
							}
						?>
					</select>
				</fieldset>
				<input type="hidden" name="pubDate" value="<?php echo $bean->pub_date; ?>"/>
				</td>
			</tr>
			<tr>
			<td><?php echo $bean->labels('pub_house'); ?></td>
			<td><input type="text" name="pubHouse" value="<?php echo $bean->pub_house; ?>"></td>
			</tr>
			<tr>
			<td><?php echo $bean->labels('type'); ?></td>
			<td>
			<select name="type">
				<?php 
				foreach($dao->loadBookType() as $row){
					if($bean->type == $row['name']){
						echo '<option selected="selected" value="';
					}else{
						echo '<option value="';
					}
					echo $row['id'], '">', $row['name'], '</option>';
				}
				?>
			</select>
			</td>
			</tr>
			<?php if($bean->serial_no > 1 || empty($bean->serial_no)){ ?>
			<tr>
				<td><?php echo $bean->labels('serial_no'); ?></td>
				<td><input type="number" pattern="[0-9]" name="serialNo" value="<?php echo $bean->serial_no; ?>"></td>
			</tr>
			<?php } ?>
			<tr>
				<td><?php echo $bean->labels('remarks'); ?></td>
				<td><input type="text" name="remarks" value="<?php echo $bean->remarks; ?>"></td>
			</tr>
		</tbody>
		</table>
		<div class="ui-grid-b"><?php //echo $form->errorSummary($bean); ?></div>
		<button class="ui-btn ui-corner-all ui-shadow">保存</button>
		<?php //echo CHtml::submitButton($bean->is_new ? '添加' : '保存'); ?>
</form>
</div>
<script type="text/javascript">
function setPubDate(){
	var pubDate = $('#pub_year').val()+'-'+$('#pub_month').val()+'-01';
	$('input[name="pubDate"]').val(pubDate);
}
</script>