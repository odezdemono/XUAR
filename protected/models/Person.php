<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property string $id
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property integer $Sex
 * @property string $BirthDate
 * @property string $BirthPlace
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AbsenceFactor[] $absenceFactors
 * @property AssessmentSetConversion[] $assessmentSetConversions
 * @property AssessmentSetValue[] $assessmentSetValues
 * @property AssessmentUnitValue[] $assessmentUnitValues
 * @property CourseUnitConversion[] $courseUnitConversions
 * @property CourseUnitValue[] $courseUnitValues
 * @property GradeFactor[] $gradeFactors
 * @property GroupMember[] $groupMembers
 * @property LectureSetConversion[] $lectureSetConversions
 * @property MedicalRecord[] $medicalRecords
 * @property Person $revisedRow
 * @property Person[] $people
 * @property PersonAttendance[] $personAttendances
 * @property PersonParticipateInRecruitment[] $personParticipateInRecruitments
 * @property PersonRelationship[] $personRelationships
 * @property PersonRelationship[] $personRelationships1
 * @property StructureMember[] $structureMembers
 * @property StructureMemberHistory[] $structureMemberHistories
 */
//class Person extends CActiveRecord
class Person extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
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
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('FirstName, Sex, BirthDate, BirthPlace, TippedStatus, DeletedStatus', 'required'),
			array('FirstName, Sex, BirthDate, BirthPlace', 'required'),
			//array('Sex, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Sex', 'numerical', 'integerOnly'=>true),
			array('FirstName, MiddleName, LastName, BirthPlace', 'length', 'max'=>45),
			//array('RevisedRow_id', 'length', 'max'=>10),
			//array('RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, FirstName, MiddleName, LastName, Sex, BirthDate, BirthPlace, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
			array('id, FirstName, MiddleName, LastName, Sex, BirthDate, BirthPlace', 'safe', 'on'=>'search'),
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
			'absenceFactors' => array(self::HAS_MANY, 'AbsenceFactor', 'Person_id'),
			'assessmentSetConversions' => array(self::HAS_MANY, 'AssessmentSetConversion', 'Person_id'),
			'assessmentSetValues' => array(self::HAS_MANY, 'AssessmentSetValue', 'Student_id'),
			'assessmentUnitValues' => array(self::HAS_MANY, 'AssessmentUnitValue', 'Student_id'),
			'courseUnitConversions' => array(self::HAS_MANY, 'CourseUnitConversion', 'Person_id'),
			'courseUnitValues' => array(self::HAS_MANY, 'CourseUnitValue', 'Student_id'),
			'gradeFactors' => array(self::HAS_MANY, 'GradeFactor', 'Student_id'),
			'groupMembers' => array(self::HAS_MANY, 'GroupMember', 'Person_id'),
			'lectureSetConversions' => array(self::HAS_MANY, 'LectureSetConversion', 'Person_id'),
			'medicalRecords' => array(self::HAS_MANY, 'MedicalRecord', 'Person_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Person', 'RevisedRow_id'),
			'people' => array(self::HAS_MANY, 'Person', 'RevisedRow_id'),
			'personAttendances' => array(self::HAS_MANY, 'PersonAttendance', 'Person_id'),
			'personParticipateInRecruitments' => array(self::HAS_MANY, 'PersonParticipateInRecruitment', 'Person_id'),
			'personRelationships' => array(self::HAS_MANY, 'PersonRelationship', 'Person_id'),
			'personRelationships1' => array(self::HAS_MANY, 'PersonRelationship', 'OtherPerson_id'),
			'structureMembers' => array(self::HAS_MANY, 'StructureMember', 'Person_id'),
			'structureMemberHistories' => array(self::HAS_MANY, 'StructureMemberHistory', 'Person_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'FirstName' => 'First Name',
			'MiddleName' => 'Middle Name',
			'LastName' => 'Last Name',
			'Sex' => 'Sex',
			'BirthDate' => 'Birth Date',
			'BirthPlace' => 'Birth Place',
			/*'RevisedRow_id' => 'Revised Row',
			'TippedStatus' => 'Tipped Status',
			'DeletedStatus' => 'Deleted Status',*/
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
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('MiddleName',$this->MiddleName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Sex',$this->Sex);
		$criteria->compare('BirthDate',$this->BirthDate,true);
		$criteria->compare('BirthPlace',$this->BirthPlace,true);
		/*
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);
    */
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}