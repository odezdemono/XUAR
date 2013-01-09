<?php

/**
 * This is the model class for table "space".
 *
 * The followings are the available columns in table 'space':
 * @property string $id
 * @property string $Name
 * @property string $Parent_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Inventory[] $inventories
 * @property InventoryLocationHistory[] $inventoryLocationHistories
 * @property InventoryLocationHistory[] $inventoryLocationHistories1
 * @property MaterialLocation[] $materialLocations
 * @property NotLabelledInventory[] $notLabelledInventories
 * @property Space $revisedRow
 * @property Space[] $spaces
 * @property Space $parent
 * @property Space[] $spaces1
 * @property SpaceOwnership[] $spaceOwnerships
 * @property UsedSpaceInLectureUnit[] $usedSpaceInLectureUnits
 */
class Space extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Space the static model class
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
		return 'space';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>45),
			array('Parent_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, Parent_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'inventories' => array(self::HAS_MANY, 'Inventory', 'Location_id'),
			'inventoryLocationHistories' => array(self::HAS_MANY, 'InventoryLocationHistory', 'OldLocation_id'),
			'inventoryLocationHistories1' => array(self::HAS_MANY, 'InventoryLocationHistory', 'NewLocation_id'),
			'materialLocations' => array(self::HAS_MANY, 'MaterialLocation', 'Location_id'),
			'notLabelledInventories' => array(self::HAS_MANY, 'NotLabelledInventory', 'Space_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Space', 'RevisedRow_id'),
			'spaces' => array(self::HAS_MANY, 'Space', 'RevisedRow_id'),
			'parent' => array(self::BELONGS_TO, 'Space', 'Parent_id'),
			'spaces1' => array(self::HAS_MANY, 'Space', 'Parent_id'),
			'spaceOwnerships' => array(self::HAS_MANY, 'SpaceOwnership', 'Space_id'),
			'usedSpaceInLectureUnits' => array(self::HAS_MANY, 'UsedSpaceInLectureUnit', 'Space_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Name' => 'Name',
			'Parent_id' => 'Parent',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}