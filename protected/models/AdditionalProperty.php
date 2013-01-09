<?php

/**
 * This is the model class for table "additional_property".
 *
 * The followings are the available columns in table 'additional_property':
 * @property string $id
 * @property string $EntityType_id
 * @property string $Entity_id
 * @property string $PropertyType_id
 * @property string $value
 * @property string $StartDate
 * @property string $EndDate
 * @property string $ReferenceEntityType_id
 * @property string $ReferenceEntity_id
 * @property string $DocumentBundle_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property PropertyType $propertyType
 * @property AdditionalProperty $revisedRow
 * @property AdditionalProperty[] $additionalProperties
 * @property DocumentBundle $documentBundle
 * @property Lookup $entityType
 * @property Lookup $referenceEntityType
 */
class AdditionalProperty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdditionalProperty the static model class
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
		return 'additional_property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EntityType_id, Entity_id, PropertyType_id, value, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('EntityType_id, Entity_id, PropertyType_id, ReferenceEntityType_id, ReferenceEntity_id, DocumentBundle_id, RevisedRow_id', 'length', 'max'=>10),
			array('value', 'length', 'max'=>45),
			array('StartDate, EndDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, EntityType_id, Entity_id, PropertyType_id, value, StartDate, EndDate, ReferenceEntityType_id, ReferenceEntity_id, DocumentBundle_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'propertyType' => array(self::BELONGS_TO, 'PropertyType', 'PropertyType_id'),
			'revisedRow' => array(self::BELONGS_TO, 'AdditionalProperty', 'RevisedRow_id'),
			'additionalProperties' => array(self::HAS_MANY, 'AdditionalProperty', 'RevisedRow_id'),
			'documentBundle' => array(self::BELONGS_TO, 'DocumentBundle', 'DocumentBundle_id'),
			'entityType' => array(self::BELONGS_TO, 'Lookup', 'EntityType_id'),
			'referenceEntityType' => array(self::BELONGS_TO, 'Lookup', 'ReferenceEntityType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'EntityType_id' => 'Entity Type',
			'Entity_id' => 'Entity',
			'PropertyType_id' => 'Property Type',
			'value' => 'Value',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'ReferenceEntityType_id' => 'Reference Entity Type',
			'ReferenceEntity_id' => 'Reference Entity',
			'DocumentBundle_id' => 'Document Bundle',
			'RevisedRow_id' => 'Revised Row',
			'TippedStatus' => 'Tipped Status',
			'DeletedStatus' => 'Deleted Status',
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
		$criteria->compare('EntityType_id',$this->EntityType_id,true);
		$criteria->compare('Entity_id',$this->Entity_id,true);
		$criteria->compare('PropertyType_id',$this->PropertyType_id,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('ReferenceEntityType_id',$this->ReferenceEntityType_id,true);
		$criteria->compare('ReferenceEntity_id',$this->ReferenceEntity_id,true);
		$criteria->compare('DocumentBundle_id',$this->DocumentBundle_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}