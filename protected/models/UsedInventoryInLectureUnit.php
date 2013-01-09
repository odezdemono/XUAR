<?php

/**
 * This is the model class for table "used_inventory_in_lecture_unit".
 *
 * The followings are the available columns in table 'used_inventory_in_lecture_unit':
 * @property string $id
 * @property string $Inventory_id
 * @property string $LectureUnit_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property InventoryVsTime[] $inventoryVsTimes
 * @property Inventory $inventory
 * @property UsedInventoryInLectureUnit $revisedRow
 * @property UsedInventoryInLectureUnit[] $usedInventoryInLectureUnits
 * @property LectureUnit $lectureUnit
 */
class UsedInventoryInLectureUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsedInventoryInLectureUnit the static model class
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
		return 'used_inventory_in_lecture_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Inventory_id, LectureUnit_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Inventory_id, LectureUnit_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Inventory_id, LectureUnit_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'inventoryVsTimes' => array(self::HAS_MANY, 'InventoryVsTime', 'UsedInventory_id'),
			'inventory' => array(self::BELONGS_TO, 'Inventory', 'Inventory_id'),
			'revisedRow' => array(self::BELONGS_TO, 'UsedInventoryInLectureUnit', 'RevisedRow_id'),
			'usedInventoryInLectureUnits' => array(self::HAS_MANY, 'UsedInventoryInLectureUnit', 'RevisedRow_id'),
			'lectureUnit' => array(self::BELONGS_TO, 'LectureUnit', 'LectureUnit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Inventory_id' => 'Inventory',
			'LectureUnit_id' => 'Lecture Unit',
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
		$criteria->compare('Inventory_id',$this->Inventory_id,true);
		$criteria->compare('LectureUnit_id',$this->LectureUnit_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}