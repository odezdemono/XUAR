<?php

/**
 * This is the model class for table "lecture_unit".
 *
 * The followings are the available columns in table 'lecture_unit':
 * @property string $id
 * @property string $Name
 * @property string $LectureSet_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AbsenceFactor[] $absenceFactors
 * @property LectureSet $lectureSet
 * @property LectureUnit $revisedRow
 * @property LectureUnit[] $lectureUnits
 * @property LectureUnitAssociation[] $lectureUnitAssociations
 * @property LectureUnitAssociation[] $lectureUnitAssociations1
 * @property LectureUnitOccurrence[] $lectureUnitOccurrences
 * @property MaterialChangeInLectureUnit[] $materialChangeInLectureUnits
 * @property PersonAttendance[] $personAttendances
 * @property ProducedInventoryInLectureUnit[] $producedInventoryInLectureUnits
 * @property SubjectInLectureUnit[] $subjectInLectureUnits
 * @property UsedInventoryInLectureUnit[] $usedInventoryInLectureUnits
 * @property UsedMaterialInLectureUnit[] $usedMaterialInLectureUnits
 * @property UsedSpaceInLectureUnit[] $usedSpaceInLectureUnits
 */
class LectureUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LectureUnit the static model class
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
		return 'lecture_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, LectureSet_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>45),
			array('LectureSet_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, LectureSet_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'absenceFactors' => array(self::HAS_MANY, 'AbsenceFactor', 'LectureUnit_id'),
			'lectureSet' => array(self::BELONGS_TO, 'LectureSet', 'LectureSet_id'),
			'revisedRow' => array(self::BELONGS_TO, 'LectureUnit', 'RevisedRow_id'),
			'lectureUnits' => array(self::HAS_MANY, 'LectureUnit', 'RevisedRow_id'),
			'lectureUnitAssociations' => array(self::HAS_MANY, 'LectureUnitAssociation', 'PlannedCourseUnit_id'),
			'lectureUnitAssociations1' => array(self::HAS_MANY, 'LectureUnitAssociation', 'ActedCourseUnit_id'),
			'lectureUnitOccurrences' => array(self::HAS_MANY, 'LectureUnitOccurrence', 'LectureUnit_id'),
			'materialChangeInLectureUnits' => array(self::HAS_MANY, 'MaterialChangeInLectureUnit', 'LectureUnit_id'),
			'personAttendances' => array(self::HAS_MANY, 'PersonAttendance', 'LectureUnit_id'),
			'producedInventoryInLectureUnits' => array(self::HAS_MANY, 'ProducedInventoryInLectureUnit', 'LectureUnit_id'),
			'subjectInLectureUnits' => array(self::HAS_MANY, 'SubjectInLectureUnit', 'LectureUnit_id'),
			'usedInventoryInLectureUnits' => array(self::HAS_MANY, 'UsedInventoryInLectureUnit', 'LectureUnit_id'),
			'usedMaterialInLectureUnits' => array(self::HAS_MANY, 'UsedMaterialInLectureUnit', 'LectureUnit_id'),
			'usedSpaceInLectureUnits' => array(self::HAS_MANY, 'UsedSpaceInLectureUnit', 'LectureUnit_id'),
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
			'LectureSet_id' => 'Lecture Set',
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
		$criteria->compare('LectureSet_id',$this->LectureSet_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}