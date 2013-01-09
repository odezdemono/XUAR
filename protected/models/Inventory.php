<?php

/**
 * This is the model class for table "inventory".
 *
 * The followings are the available columns in table 'inventory':
 * @property string $id
 * @property string $InventoryType_id
 * @property string $Code
 * @property integer $AvailabilityStatus
 * @property string $Location_id
 * @property string $Owner_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property InventoryType $inventoryType
 * @property Inventory $revisedRow
 * @property Inventory[] $inventories
 * @property Space $location
 * @property Group $owner
 * @property InventoryAvailabilityHistory[] $inventoryAvailabilityHistories
 * @property InventoryLocationHistory[] $inventoryLocationHistories
 * @property InventoryOwnershipHistory[] $inventoryOwnershipHistories
 * @property LabellingHistory[] $labellingHistories
 * @property UsedInventoryInLectureUnit[] $usedInventoryInLectureUnits
 */
class Inventory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Inventory the static model class
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
		return 'inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('InventoryType_id, Code, AvailabilityStatus, Owner_id, TippedStatus, DeletedStatus', 'required'),
			array('AvailabilityStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('InventoryType_id, Location_id, Owner_id, RevisedRow_id', 'length', 'max'=>10),
			array('Code', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, InventoryType_id, Code, AvailabilityStatus, Location_id, Owner_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'inventoryType' => array(self::BELONGS_TO, 'InventoryType', 'InventoryType_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Inventory', 'RevisedRow_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'RevisedRow_id'),
			'location' => array(self::BELONGS_TO, 'Space', 'Location_id'),
			'owner' => array(self::BELONGS_TO, 'Group', 'Owner_id'),
			'inventoryAvailabilityHistories' => array(self::HAS_MANY, 'InventoryAvailabilityHistory', 'Inventory_id'),
			'inventoryLocationHistories' => array(self::HAS_MANY, 'InventoryLocationHistory', 'Inventory_id'),
			'inventoryOwnershipHistories' => array(self::HAS_MANY, 'InventoryOwnershipHistory', 'Inventory_id'),
			'labellingHistories' => array(self::HAS_MANY, 'LabellingHistory', 'Inventory_id'),
			'usedInventoryInLectureUnits' => array(self::HAS_MANY, 'UsedInventoryInLectureUnit', 'Inventory_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'InventoryType_id' => 'Inventory Type',
			'Code' => 'Code',
			'AvailabilityStatus' => 'Availability Status',
			'Location_id' => 'Location',
			'Owner_id' => 'Owner',
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
		$criteria->compare('InventoryType_id',$this->InventoryType_id,true);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('AvailabilityStatus',$this->AvailabilityStatus);
		$criteria->compare('Location_id',$this->Location_id,true);
		$criteria->compare('Owner_id',$this->Owner_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}