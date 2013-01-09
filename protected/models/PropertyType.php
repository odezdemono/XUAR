<?php

/**
 * This is the model class for table "property_type".
 *
 * The followings are the available columns in table 'property_type':
 * @property string $id
 * @property string $NameSpace
 * @property string $Name
 * @property string $DataType
 * @property integer $Group
 *
 * The followings are the available model relations:
 * @property AdditionalProperty[] $additionalProperties
 */
class PropertyType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PropertyType the static model class
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
		return 'property_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NameSpace, Name, DataType', 'required'),
			array('Group', 'numerical', 'integerOnly'=>true),
			array('NameSpace, Name, DataType', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, NameSpace, Name, DataType, Group', 'safe', 'on'=>'search'),
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
			'additionalProperties' => array(self::HAS_MANY, 'AdditionalProperty', 'PropertyType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'NameSpace' => 'Name Space',
			'Name' => 'Name',
			'DataType' => 'Data Type',
			'Group' => 'Group',
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
		$criteria->compare('NameSpace',$this->NameSpace,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('DataType',$this->DataType,true);
		$criteria->compare('Group',$this->Group);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}