<?php 
class BookForm extends CFormModel{
	public $bid;
 	public $b_name;
 	public $author;
 	public $country;
 	public $age;
 	public $pub_date;
 	public $pub_house;
 	public $type;
 	public $rectime;
 	public $serial_no;
 	public $is_new;

 	private $_identity;

	public function rules()
	{
		return array(
			array('bid, b_name, author, country, age, pub_date, pub_house, type, serial_no', 'required'),
		);
	}
}
?>