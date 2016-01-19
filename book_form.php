<?php
/* @var $bean Book */
?>
<!-- <div data-role="content"> -->
<form id="book_form" method="post" class="form-horizontal">
	<input type="hidden" id="oper" name="oper" value="" />
	<input type="hidden" name="bid" value="<?php echo $bean->bid; ?>" />
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('b_name'); ?></label>
		<div class="col-xs-9">
			<input type="text" name="bName" class="form-control" value="<?php echo $bean->b_name; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('author'); ?></label>
		<div class="col-xs-9">
			<input type="text" name="author" class="form-control" value="<?php echo $bean->author; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('country'); ?></label>
		<div class="col-xs-9">
			<input type="text" name="country" class="form-control" value="<?php echo $bean->country; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('age'); ?></label>
		<div class="col-xs-9">
			<input type="text" name="age" class="form-control" value="<?php echo $bean->age; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('pub_date'); ?></label>
		<div class="col-xs-9">
			<div class="btn-group">
				<div class="btn-group">
					<button id="pub_year" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
						aria-haspopup="false" aria-expanded="false">
						<?php echo empty($bean->pub_date)?'年份':substr($bean->pub_date, 0, 4); ?>
					</button>
					<ul class="dropdown-menu">
						<?php
						for($i=1949, $size=intval(date('Y'));$i<=$size;$i++){
							echo '<li><a href="#" onclick="setPubDate(this)">', $i, '</a></li>';
						}
						?>
					</ul>
				</div>
				<div class="btn-group">
					<button id="pub_month" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
						aria-haspopup="false" aria-expanded="false">
						<?php echo empty($bean->pub_date)?'月份':substr($bean->pub_date, 5, 2); ?></button>
					<ul class="dropdown-menu">
						<?php
						for($i=1, $size=12;$i<=$size;$i++){
							$iShow = $i>9?$i:'0'.$i;
							echo '<li><a href="#" onclick="setPubDate(this)">',$iShow,'</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
			<input type="hidden" name="pubDate" value="<?php echo $bean->pub_date; ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('pub_house'); ?></label>
		<div class="col-xs-9">
			<input type="text" name="pubHouse" class="form-control" value="<?php echo $bean->pub_house; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('type'); ?></label>
		<div class="col-xs-9">
			<div class="dropdown">
				<?php
					include_once 'class/BasicDao.php';
					$basicDao = new BasicDao();
					$list = $basicDao->loadBookType();
					$content = '';
					$typeId = '';
					foreach($list as $row){
						if($row['name'] == $bean->type){
							$typeId = $row['id'];
						}
						$content .= '<li><a href="#" onclick="setType(this, \''. $row['id'] .'\')">'
							. $row['name']. '</a></li>';
					}
				?>
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
						aria-haspopup="false" aria-expanded="false">
					<?php echo empty($bean->type)?'类型':$bean->type; ?>
				</button>
				<ul class="dropdown-menu">
					<?php echo $content; ?>
				</ul>
			</div>
			<input type="hidden" name="type" value="<?php echo $typeId; ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('serial_no'); ?></label>
		<div class="col-xs-9">
			<input type="number" pattern="[0-9]" name="serialNo" class="form-control" value="<?php echo $bean->serial_no; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"><?php echo $bean->labels('remarks'); ?></label>
		<div class="col-xs-9"><input type="text" name="remarks" class="form-control" value="<?php echo $bean->remarks; ?>"></div>
	</div>
	<!-- <div class="ui-grid-b"><?php //echo $form->errorSummary($bean); ?></div> -->
	<button id="submitBtn" class="btn btn-default form-control">保存</button>
</form>
<!-- </div> -->
<script type="text/javascript">
function setButton(e){
	$a = $(e);
	var $button = $a.closest('ul').prev('button');
	$button.text($a.text());
	return;
}
function setPubDate(e){
	setButton(e);
	var pubDate = $('#pub_year').text()+'-'+$('#pub_month').text()+'-01';
	$('input[name="pubDate"]').val(pubDate);
}
function setType(e, typeId){
	setButton(e);
	$('input[name="type"]').val(typeId);
}
</script>