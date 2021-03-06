<?php

/**
 * This is the model class for table "labelling_history".
 *
 * The followings are the available columns in table 'labelling_history':
 * @property string $id
 * @property string $NotLabelledInventory_id
 * @property string $Inventory_id
 * @property string $Date
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property NotLabelledInventory $notLabelledInventory
 * @property Inventory $inventory
 * @property LabellingHistory $revisedRow
 * @property LabellingHistory[] $labellingHistories
 */
class LabellingHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LabellingHistory the static model class
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
		return 'labelling_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NotLabelledInventory_id, Inventory_id, Date, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('NotLabelledInventory_id, Inventory_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, NotLabelledInventory_id, Inventory_id, Date, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'notLabelledInventory' => array(self::BELONGS_TO, 'NotLabelledInventory', 'NotLabelledInventory_id'),
			'inventory' => array(self::BELONGS_TO, 'Inventory', 'Inventory_id'),
			'revisedRow' => array(self::BELONGS_TO, 'LabellingHistory', 'RevisedRow_id'),
			'labellingHistories' => array(self::HAS_MANY, 'LabellingHistory', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'NotLabelledInventory_id' => 'Not Labelled Inventory',
			'Inventory_id' => 'Inventory',
			'Date' => 'Date',
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
		$criteria->compare('NotLabelledInventory_id',$this->NotLabelledInventory_id,true);
		$criteria->compare('Inventory_id',$this->Inventory_id,true);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}