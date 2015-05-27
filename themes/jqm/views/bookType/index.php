<?php 
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */
?>
<div data-role="page" id="addbook_div">
	<div data-role="header" data-position="fixed" data-position="inline">
		<h4>所有书籍</h4>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-filter="true" data-inset="true">
		<?php
			//foreach($dataProvider->getData() as $data){
			//var_dump($data);
			//	//echo '<li data-icon="false" data-ajax="false"><a href="" data-id="">'.$data->description.'</a></li>';
			//}
			$dataList = $dataProvider->getData();
			foreach($dataList as $data){
				echo '<li data-icon="false" data-ajax="false"><a href="" data-id="'.$data->t_no.'">'.$data->description.'</a></li>';
			}
		?>
		</ul>
    </div>
</div>