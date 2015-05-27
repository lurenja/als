<?php 
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */
?>
<div data-role="page" id="addbook_div">
	<div data-role="header" data-position="fixed" data-position="inline">
		<h4>所有书籍</h4>
		<a href="/als/index.php?r=book/create">New</a>
		<a href="/als/index.php?r=book/create">New2</a>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-filter="true" data-inset="true">
		<?php
			//foreach($dataProvider->getData() as $data){
			//var_dump($data);
			//	//echo '<li data-icon="false" data-ajax="false"><a href="" data-id="">'.$data->b_name.'</a></li>';
			//}
			$dataList = $dataProvider->getData();
			foreach($dataList as $data){
				echo '<li data-icon="false" data-ajax="false"><a href="" data-id="">'.$data->b_name.'</a></li>';
			}
		?>
		</ul>
    </div>	
	<!-- <div data-role="footer" style="overflow:hidden;">
		<div data-role="navbar">
			<ul>
				<li><a href="#" class="ui-btn-active">All</a></li>
				<li><a href="/als/index.php?r=book/create">New</a></li>
				<li><a href="#">About</a></li>
			</ul>
		</div>
    </div> -->
</div>