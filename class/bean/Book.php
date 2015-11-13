<?php

/**
 * This is the model class for table "tbl_book".
 *
 * The followings are the available columns in table 'tbl_book':
 * @property string $bid
 * @property string $b_name
 * @property string $author
 * @property string $country
 * @property string $age
 * @property string $pub_date
 * @property string $pub_house
 * @property string $type
 * @property string $rectime
 */
class Book
{
	var $bid;
    var $b_name;
    var $author;
    var $country;
    var $age;
    var $pub_date;
    var $pub_house;
    var $type;
    var $rectime;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_book';
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function labels($key)
	{
		$labels = array(
			'bid' => 'ID',
			'b_name' => '书名',
			'author' => '作者',
			'country' => '国籍',
			'age' => '朝代',
			'pub_date' => '出版日期',
			'pub_house' => '出版社',
			'type' => '类型',
			'rectime' => '数据时间',
		);
		return $labels[$key];
	}
}
