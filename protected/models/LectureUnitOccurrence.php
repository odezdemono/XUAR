<?php

/**
 * This is the model class for table "lecture_unit_occurrence".
 *
 * The followings are the available columns in table 'lecture_unit_occurrence':
 * @property string $id
 * @property string $StartDate
 * @property string $StartHour
 * @property string $EndDate
 * @property string $EndHour
 * @property string $TimeUnit_id
 * @property string $LectureUnit_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentUnit[] $assessmentUnits
 * @property InventoryVsTime[] $inventoryVsTimes
 * @property MicrotimeUnit $timeUnit
 * @property LectureUnitOccurrence $revisedRow
 * @property LectureUnitOccurrence[] $lectureUnitOccurrences
 * @property LectureUnit $lectureUnit
 * @property MaterialVsTime[] $materialVsTimes
 * @property SpaceVsTime[] $spaceVsTimes
 */
class LectureUnitOccurrence extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LectureUnitOccurrence the static model class
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
		return 'lecture_unit_occurrence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('StartDate, StartHour, LectureUnit_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('TimeUnit_id, LectureUnit_id, RevisedRow_id', 'length', 'max'=>10),
			array('EndDate, EndHour', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, StartDate, StartHour, EndDate, EndHour, TimeUnit_id, LectureUnit_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'assessmentUnits' => array(self::HAS_MANY, 'AssessmentUnit', 'Occurrence_id'),
			'inventoryVsTimes' => array(self::HAS_MANY, 'InventoryVsTime', 'LectureUnitOccurrence_id'),
			'timeUnit' => array(self::BELONGS_TO, 'MicrotimeUnit', 'TimeUnit_id'),
			'revisedRow' => array(self::BELONGS_TO, 'LectureUnitOccurrence', 'RevisedRow_id'),
			'lectureUnitOccurrences' => array(self::HAS_MANY, 'LectureUnitOccurrence', 'RevisedRow_id'),
			'lectureUnit' => array(self::BELONGS_TO, 'LectureUnit', 'LectureUnit_id'),
			'materialVsTimes' => array(self::HAS_MANY, 'MaterialVsTime', 'LectureUnitOccurrence_id'),
			'spaceVsTimes' => array(self::HAS_MANY, 'SpaceVsTime', 'LectureUnitOccurrence_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'StartDate' => 'Start Date',
			'StartHour' => 'Start Hour',
			'EndDate' => 'End Date',
			'EndHour' => 'End Hour',
			'TimeUnit_id' => 'Time Unit',
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
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('StartHour',$this->StartHour,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('EndHour',$this->EndHour,true);
		$criteria->compare('TimeUnit_id',$this->TimeUnit_id,true);
		$criteria->compare('LectureUnit_id',$this->LectureUnit_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}