<?php

/**
 * This is the model class for table "microtime_unit".
 *
 * The followings are the available columns in table 'microtime_unit':
 * @property string $id
 * @property string $MicrotimeSet_id
 * @property string $DayUnit_id
 * @property string $StartHour
 * @property string $EndHour
 * @property string $Name
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property LectureUnitOccurrence[] $lectureUnitOccurrences
 * @property MicrotimeSet $microtimeSet
 * @property DayUnit $dayUnit
 * @property MicrotimeUnit $revisedRow
 * @property MicrotimeUnit[] $microtimeUnits
 */
class MicrotimeUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MicrotimeUnit the static model class
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
		return 'microtime_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MicrotimeSet_id, DayUnit_id, StartHour, EndHour, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('MicrotimeSet_id, DayUnit_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, MicrotimeSet_id, DayUnit_id, StartHour, EndHour, Name, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'lectureUnitOccurrences' => array(self::HAS_MANY, 'LectureUnitOccurrence', 'TimeUnit_id'),
			'microtimeSet' => array(self::BELONGS_TO, 'MicrotimeSet', 'MicrotimeSet_id'),
			'dayUnit' => array(self::BELONGS_TO, 'DayUnit', 'DayUnit_id'),
			'revisedRow' => array(self::BELONGS_TO, 'MicrotimeUnit', 'RevisedRow_id'),
			'microtimeUnits' => array(self::HAS_MANY, 'MicrotimeUnit', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'MicrotimeSet_id' => 'Microtime Set',
			'DayUnit_id' => 'Day Unit',
			'StartHour' => 'Start Hour',
			'EndHour' => 'End Hour',
			'Name' => 'Name',
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
		$criteria->compare('MicrotimeSet_id',$this->MicrotimeSet_id,true);
		$criteria->compare('DayUnit_id',$this->DayUnit_id,true);
		$criteria->compare('StartHour',$this->StartHour,true);
		$criteria->compare('EndHour',$this->EndHour,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}