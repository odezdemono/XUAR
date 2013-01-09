<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property string $id
 * @property string $TableName
 * @property integer $Field_id
 * @property string $Operation_id
 * @property integer $User_id
 * @property string $TimeStamp
 *
 * The followings are the available model relations:
 * @property Lookup $operation
 */
class Log extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TableName, Field_id, Operation_id, User_id, TimeStamp', 'required'),
			array('Field_id, User_id', 'numerical', 'integerOnly'=>true),
			array('TableName', 'length', 'max'=>256),
			array('Operation_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, TableName, Field_id, Operation_id, User_id, TimeStamp', 'safe', 'on'=>'search'),
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
			'operation' => array(self::BELONGS_TO, 'Lookup', 'Operation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'TableName' => 'Table Name',
			'Field_id' => 'Field',
			'Operation_id' => 'Operation',
			'User_id' => 'User',
			'TimeStamp' => 'Time Stamp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('TableName',$this->TableName,true);
		$criteria->compare('Field_id',$this->Field_id);
		$criteria->compare('Operation_id',$this->Operation_id,true);
		$criteria->compare('User_id',$this->User_id);
		$criteria->compare('TimeStamp',$this->TimeStamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}