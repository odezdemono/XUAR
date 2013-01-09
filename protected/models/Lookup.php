<?php

/**
 * This is the model class for table "lookup".
 *
 * The followings are the available columns in table 'lookup':
 * @property string $id
 * @property string $TableName
 * @property string $FieldName
 * @property string $Value
 *
 * The followings are the available model relations:
 * @property AbsenceFactor[] $absenceFactors
 * @property AdditionalProperty[] $additionalProperties
 * @property AdditionalProperty[] $additionalProperties1
 * @property GradeFactor[] $gradeFactors
 * @property Log[] $logs
 * @property PersonRelationship[] $personRelationships
 */
class Lookup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lookup the static model class
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
		return 'lookup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TableName, FieldName, Value', 'required'),
			array('TableName, FieldName, Value', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, TableName, FieldName, Value', 'safe', 'on'=>'search'),
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
			'absenceFactors' => array(self::HAS_MANY, 'AbsenceFactor', 'ActivityType_id'),
			'additionalProperties' => array(self::HAS_MANY, 'AdditionalProperty', 'EntityType_id'),
			'additionalProperties1' => array(self::HAS_MANY, 'AdditionalProperty', 'ReferenceEntityType_id'),
			'gradeFactors' => array(self::HAS_MANY, 'GradeFactor', 'ActivityType_id'),
			'logs' => array(self::HAS_MANY, 'Log', 'Operation_id'),
			'personRelationships' => array(self::HAS_MANY, 'PersonRelationship', 'RelationshipType_id'),
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
			'FieldName' => 'Field Name',
			'Value' => 'Value',
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
		$criteria->compare('FieldName',$this->FieldName,true);
		$criteria->compare('Value',$this->Value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}