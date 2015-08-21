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
			//array('rectime', 'required'),
			array('bid', 'length', 'max'=>20),
			array('b_name, author, pub_house', 'length', 'max'=>128),
			array('country, age', 'length', 'max'=>32),
			array('type', 'length', 'max'=>4),
			array('pub_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bid, b_name, author, country, age, pub_date, pub_house, type, rectime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bid' => 'Bid',
			'b_name' => 'B Name',
			'author' => 'Author',
			'country' => 'Country',
			'age' => 'Age',
			'pub_date' => 'Pub Date',
			'pub_house' => 'Pub House',
			'type' => 'Type',
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
