<?php

/**
 * This is the model class for table "inventory_type".
 *
 * The followings are the available columns in table 'inventory_type':
 * @property string $id
 * @property string $name
 * @property string $Code
 * @property string $Parent_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Inventory[] $inventories
 * @property InventoryType $parent
 * @property InventoryType[] $inventoryTypes
 * @property InventoryType $revisedRow
 * @property InventoryType[] $inventoryTypes1
 * @property NotLabelledInventory[] $notLabelledInventories
 */
class InventoryType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InventoryType the static model class
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
		return 'inventory_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, Code, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('name, Code', 'length', 'max'=>45),
			array('Parent_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, Code, Parent_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'inventories' => array(self::HAS_MANY, 'Inventory', 'InventoryType_id'),
			'parent' => array(self::BELONGS_TO, 'InventoryType', 'Parent_id'),
			'inventoryTypes' => array(self::HAS_MANY, 'InventoryType', 'Parent_id'),
			'revisedRow' => array(self::BELONGS_TO, 'InventoryType', 'RevisedRow_id'),
			'inventoryTypes1' => array(self::HAS_MANY, 'InventoryType', 'RevisedRow_id'),
			'notLabelledInventories' => array(self::HAS_MANY, 'NotLabelledInventory', 'InventoryType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'Code' => 'Code',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}