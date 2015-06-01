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
 * @property integer $is_single
 * @property string $serial_no
 * @property string $type
 * @property string $rectime
 */
class Book extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('rectime', 'required'),
			array('b_name, author, country, age, pub_house, pub_date', 'required'),
			array('is_single', 'numerical', 'integerOnly'=>true),
			array('bid', 'length', 'max'=>20),
			array('b_name, author, pub_house', 'length', 'max'=>128),
			array('country, age', 'length', 'max'=>32),
			array('serial_no', 'length', 'max'=>10),
			array('type', 'length', 'max'=>4),
			array('pub_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bid, b_name, author, country, age, pub_date, pub_house, is_single, serial_no, type, rectime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'typeName' => array(self::HAS_ONE, 'BookType', 't_no'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bid' => '编号',
			'b_name' => '书名',
			'author' => '作者',
			'country' => '国家',
			'age' => '时代',
			'pub_date' => '出版日期',
			'pub_house' => '出版社',
			'is_single' => '整本/分册',
			'serial_no' => '分册号',
			'type' => '类型',
			'rectime' => 'Rectime',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('bid',$this->bid,true);
		$criteria->compare('b_name',$this->b_name,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('pub_date',$this->pub_date,true);
		$criteria->compare('pub_house',$this->pub_house,true);
		$criteria->compare('is_single',$this->is_single);
		$criteria->compare('serial_no',$this->serial_no,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('rectime',$this->rectime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
