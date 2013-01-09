<?php

/**
 * This is the model class for table "macrotime_unit".
 *
 * The followings are the available columns in table 'macrotime_unit':
 * @property string $id
 * @property string $Name
 * @property string $MacrotimeSet
 * @property string $NormalStartDate
 * @property string $NormalEndDate
 * @property string $LimitEndDate
 * @property string $RegisterStartDate
 * @property string $RegisterEndDate
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property CourseAvailability[] $courseAvailabilities
 * @property MacrotimeSet $macrotimeSet
 * @property MacrotimeUnit $revisedRow
 * @property MacrotimeUnit[] $macrotimeUnits
 */
class MacrotimeUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MacrotimeUnit the static model class
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
		return 'macrotime_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, MacrotimeSet, NormalStartDate, NormalEndDate, LimitEndDate, RegisterStartDate, RegisterEndDate, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>45),
			array('MacrotimeSet, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, MacrotimeSet, NormalStartDate, NormalEndDate, LimitEndDate, RegisterStartDate, RegisterEndDate, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'courseAvailabilities' => array(self::HAS_MANY, 'CourseAvailability', 'MacrotimeUnit_id'),
			'macrotimeSet' => array(self::BELONGS_TO, 'MacrotimeSet', 'MacrotimeSet'),
			'revisedRow' => array(self::BELONGS_TO, 'MacrotimeUnit', 'RevisedRow_id'),
			'macrotimeUnits' => array(self::HAS_MANY, 'MacrotimeUnit', 'RevisedRow_id'),
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
			'MacrotimeSet' => 'Macrotime Set',
			'NormalStartDate' => 'Normal Start Date',
			'NormalEndDate' => 'Normal End Date',
			'LimitEndDate' => 'Limit End Date',
			'RegisterStartDate' => 'Register Start Date',
			'RegisterEndDate' => 'Register End Date',
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
		$criteria->compare('MacrotimeSet',$this->MacrotimeSet,true);
		$criteria->compare('NormalStartDate',$this->NormalStartDate,true);
		$criteria->compare('NormalEndDate',$this->NormalEndDate,true);
		$criteria->compare('LimitEndDate',$this->LimitEndDate,true);
		$criteria->compare('RegisterStartDate',$this->RegisterStartDate,true);
		$criteria->compare('RegisterEndDate',$this->RegisterEndDate,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}