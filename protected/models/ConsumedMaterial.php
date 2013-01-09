<?php

/**
 * This is the model class for table "consumed_material".
 *
 * The followings are the available columns in table 'consumed_material':
 * @property string $id
 * @property string $MaterialLocation_id
 * @property double $Quantity
 * @property string $Date
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property MaterialLocation $materialLocation
 * @property ConsumedMaterial $revisedRow
 * @property ConsumedMaterial[] $consumedMaterials
 */
class ConsumedMaterial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ConsumedMaterial the static model class
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
		return 'consumed_material';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MaterialLocation_id, Quantity, Date, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Quantity', 'numerical'),
			array('MaterialLocation_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, MaterialLocation_id, Quantity, Date, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'materialLocation' => array(self::BELONGS_TO, 'MaterialLocation', 'MaterialLocation_id'),
			'revisedRow' => array(self::BELONGS_TO, 'ConsumedMaterial', 'RevisedRow_id'),
			'consumedMaterials' => array(self::HAS_MANY, 'ConsumedMaterial', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'MaterialLocation_id' => 'Material Location',
			'Quantity' => 'Quantity',
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
		$criteria->compare('MaterialLocation_id',$this->MaterialLocation_id,true);
		$criteria->compare('Quantity',$this->Quantity);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}