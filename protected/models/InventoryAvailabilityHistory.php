<?php

/**
 * This is the model class for table "inventory_availability_history".
 *
 * The followings are the available columns in table 'inventory_availability_history':
 * @property string $id
 * @property string $Inventory_id
 * @property string $OldStatus
 * @property string $NewStatus
 * @property string $Date
 * @property string $Reason
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Inventory $inventory
 * @property InventoryAvailabilityHistory $revisedRow
 * @property InventoryAvailabilityHistory[] $inventoryAvailabilityHistories
 */
class InventoryAvailabilityHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InventoryAvailabilityHistory the static model class
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
		return 'inventory_availability_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Inventory_id, OldStatus, NewStatus, Date, Reason, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Inventory_id, RevisedRow_id', 'length', 'max'=>10),
			array('OldStatus, NewStatus, Reason', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Inventory_id, OldStatus, NewStatus, Date, Reason, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'inventory' => array(self::BELONGS_TO, 'Inventory', 'Inventory_id'),
			'revisedRow' => array(self::BELONGS_TO, 'InventoryAvailabilityHistory', 'RevisedRow_id'),
			'inventoryAvailabilityHistories' => array(self::HAS_MANY, 'InventoryAvailabilityHistory', 'RevisedRow_id'),
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
			'OldStatus' => 'Old Status',
			'NewStatus' => 'New Status',
			'Date' => 'Date',
			'Reason' => 'Reason',
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
		$criteria->compare('OldStatus',$this->OldStatus,true);
		$criteria->compare('NewStatus',$this->NewStatus,true);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('Reason',$this->Reason,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}