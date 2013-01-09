<?php

/**
 * This is the model class for table "material_history".
 *
 * The followings are the available columns in table 'material_history':
 * @property string $id
 * @property string $OldOwner_id
 * @property string $OldMaterialLocation_id
 * @property string $NewOwner_id
 * @property string $NewMaterialLocation_id
 * @property double $Quantity
 * @property string $Date
 * @property string $Reason
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property MaterialLocation $oldMaterialLocation
 * @property MaterialLocation $newMaterialLocation
 * @property MaterialHistory $revisedRow
 * @property MaterialHistory[] $materialHistories
 * @property Group $oldOwner
 * @property Group $newOwner
 */
class MaterialHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MaterialHistory the static model class
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
		return 'material_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OldOwner_id, OldMaterialLocation_id, NewOwner_id, NewMaterialLocation_id, Quantity, Date, Reason, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Quantity', 'numerical'),
			array('OldOwner_id, OldMaterialLocation_id, NewOwner_id, NewMaterialLocation_id, RevisedRow_id', 'length', 'max'=>10),
			array('Reason', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, OldOwner_id, OldMaterialLocation_id, NewOwner_id, NewMaterialLocation_id, Quantity, Date, Reason, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'oldMaterialLocation' => array(self::BELONGS_TO, 'MaterialLocation', 'OldMaterialLocation_id'),
			'newMaterialLocation' => array(self::BELONGS_TO, 'MaterialLocation', 'NewMaterialLocation_id'),
			'revisedRow' => array(self::BELONGS_TO, 'MaterialHistory', 'RevisedRow_id'),
			'materialHistories' => array(self::HAS_MANY, 'MaterialHistory', 'RevisedRow_id'),
			'oldOwner' => array(self::BELONGS_TO, 'Group', 'OldOwner_id'),
			'newOwner' => array(self::BELONGS_TO, 'Group', 'NewOwner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'OldOwner_id' => 'Old Owner',
			'OldMaterialLocation_id' => 'Old Material Location',
			'NewOwner_id' => 'New Owner',
			'NewMaterialLocation_id' => 'New Material Location',
			'Quantity' => 'Quantity',
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
		$criteria->compare('OldOwner_id',$this->OldOwner_id,true);
		$criteria->compare('OldMaterialLocation_id',$this->OldMaterialLocation_id,true);
		$criteria->compare('NewOwner_id',$this->NewOwner_id,true);
		$criteria->compare('NewMaterialLocation_id',$this->NewMaterialLocation_id,true);
		$criteria->compare('Quantity',$this->Quantity);
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