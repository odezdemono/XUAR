<?php

/**
 * This is the model class for table "not_labelled_inventory".
 *
 * The followings are the available columns in table 'not_labelled_inventory':
 * @property string $id
 * @property string $InventoryType_id
 * @property string $Owner_id
 * @property string $Space_id
 * @property string $Quantity
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property LabellingHistory[] $labellingHistories
 * @property InventoryType $inventoryType
 * @property Group $owner
 * @property Space $space
 * @property NotLabelledInventory $revisedRow
 * @property NotLabelledInventory[] $notLabelledInventories
 * @property ProducedInventoryInLectureUnit[] $producedInventoryInLectureUnits
 */
class NotLabelledInventory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NotLabelledInventory the static model class
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
		return 'not_labelled_inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('InventoryType_id, Owner_id, Space_id, Quantity, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('InventoryType_id, Owner_id, Space_id, Quantity, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, InventoryType_id, Owner_id, Space_id, Quantity, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'labellingHistories' => array(self::HAS_MANY, 'LabellingHistory', 'NotLabelledInventory_id'),
			'inventoryType' => array(self::BELONGS_TO, 'InventoryType', 'InventoryType_id'),
			'owner' => array(self::BELONGS_TO, 'Group', 'Owner_id'),
			'space' => array(self::BELONGS_TO, 'Space', 'Space_id'),
			'revisedRow' => array(self::BELONGS_TO, 'NotLabelledInventory', 'RevisedRow_id'),
			'notLabelledInventories' => array(self::HAS_MANY, 'NotLabelledInventory', 'RevisedRow_id'),
			'producedInventoryInLectureUnits' => array(self::HAS_MANY, 'ProducedInventoryInLectureUnit', 'NotLabelledInventory_id'),
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
			'Owner_id' => 'Owner',
			'Space_id' => 'Space',
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
		$criteria->compare('InventoryType_id',$this->InventoryType_id,true);
		$criteria->compare('Owner_id',$this->Owner_id,true);
		$criteria->compare('Space_id',$this->Space_id,true);
		$criteria->compare('Quantity',$this->Quantity,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}