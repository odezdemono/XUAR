<?php

/**
 * This is the model class for table "material_location".
 *
 * The followings are the available columns in table 'material_location':
 * @property string $id
 * @property string $Material_id
 * @property string $Location_id
 * @property double $Quantity
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property ConsumedMaterial[] $consumedMaterials
 * @property MaterialHistory[] $materialHistories
 * @property MaterialHistory[] $materialHistories1
 * @property Material $material
 * @property Space $location
 * @property MaterialLocation $revisedRow
 * @property MaterialLocation[] $materialLocations
 */
class MaterialLocation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MaterialLocation the static model class
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
		return 'material_location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Material_id, Location_id, Quantity, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Quantity', 'numerical'),
			array('Material_id, Location_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Material_id, Location_id, Quantity, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'consumedMaterials' => array(self::HAS_MANY, 'ConsumedMaterial', 'MaterialLocation_id'),
			'materialHistories' => array(self::HAS_MANY, 'MaterialHistory', 'OldMaterialLocation_id'),
			'materialHistories1' => array(self::HAS_MANY, 'MaterialHistory', 'NewMaterialLocation_id'),
			'material' => array(self::BELONGS_TO, 'Material', 'Material_id'),
			'location' => array(self::BELONGS_TO, 'Space', 'Location_id'),
			'revisedRow' => array(self::BELONGS_TO, 'MaterialLocation', 'RevisedRow_id'),
			'materialLocations' => array(self::HAS_MANY, 'MaterialLocation', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Material_id' => 'Material',
			'Location_id' => 'Location',
			'Quantity' => 'Quantity',
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
		$criteria->compare('Material_id',$this->Material_id,true);
		$criteria->compare('Location_id',$this->Location_id,true);
		$criteria->compare('Quantity',$this->Quantity);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}