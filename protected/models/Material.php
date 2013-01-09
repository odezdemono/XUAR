<?php

/**
 * This is the model class for table "material".
 *
 * The followings are the available columns in table 'material':
 * @property string $id
 * @property string $MaterialType_id
 * @property string $Code
 * @property string $Owner_id
 * @property string $Unit_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property MaterialType $materialType
 * @property Material $revisedRow
 * @property Material[] $materials
 * @property MaterialChangeInLectureUnit[] $materialChangeInLectureUnits
 * @property MaterialLocation[] $materialLocations
 * @property UsedMaterialInLectureUnit[] $usedMaterialInLectureUnits
 */
class Material extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Material the static model class
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
		return 'material';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MaterialType_id, Code, Owner_id, Unit_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('MaterialType_id, Owner_id, Unit_id, RevisedRow_id', 'length', 'max'=>10),
			array('Code', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, MaterialType_id, Code, Owner_id, Unit_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'materialType' => array(self::BELONGS_TO, 'MaterialType', 'MaterialType_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Material', 'RevisedRow_id'),
			'materials' => array(self::HAS_MANY, 'Material', 'RevisedRow_id'),
			'materialChangeInLectureUnits' => array(self::HAS_MANY, 'MaterialChangeInLectureUnit', 'Material_id'),
			'materialLocations' => array(self::HAS_MANY, 'MaterialLocation', 'Material_id'),
			'usedMaterialInLectureUnits' => array(self::HAS_MANY, 'UsedMaterialInLectureUnit', 'Material_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'MaterialType_id' => 'Material Type',
			'Code' => 'Code',
			'Owner_id' => 'Owner',
			'Unit_id' => 'Unit',
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
		$criteria->compare('MaterialType_id',$this->MaterialType_id,true);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Owner_id',$this->Owner_id,true);
		$criteria->compare('Unit_id',$this->Unit_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}