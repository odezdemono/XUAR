<?php

/**
 * This is the model class for table "course_unit".
 *
 * The followings are the available columns in table 'course_unit':
 * @property string $id
 * @property string $Course_id
 * @property string $name
 * @property string $StudentGroup_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentSet[] $assessmentSets
 * @property CoursePlan[] $coursePlans
 * @property Group $studentGroup
 * @property Course $course
 * @property CourseUnit $revisedRow
 * @property CourseUnit[] $courseUnits
 * @property CourseUnitAssociation[] $courseUnitAssociations
 * @property CourseUnitAssociation[] $courseUnitAssociations1
 * @property CourseUnitConversion[] $courseUnitConversions
 * @property CourseUnitConversion[] $courseUnitConversions1
 * @property CourseUnitRule[] $courseUnitRules
 * @property CourseUnitValue[] $courseUnitValues
 * @property LectureSet[] $lectureSets
 */
class CourseUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseUnit the static model class
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
		return 'course_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Course_id, name, StudentGroup_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Course_id, StudentGroup_id, RevisedRow_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Course_id, name, StudentGroup_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'assessmentSets' => array(self::HAS_MANY, 'AssessmentSet', 'CourseUnit_id'),
			'coursePlans' => array(self::HAS_MANY, 'CoursePlan', 'CourseUnit_id'),
			'studentGroup' => array(self::BELONGS_TO, 'Group', 'StudentGroup_id'),
			'course' => array(self::BELONGS_TO, 'Course', 'Course_id'),
			'revisedRow' => array(self::BELONGS_TO, 'CourseUnit', 'RevisedRow_id'),
			'courseUnits' => array(self::HAS_MANY, 'CourseUnit', 'RevisedRow_id'),
			'courseUnitAssociations' => array(self::HAS_MANY, 'CourseUnitAssociation', 'PlannedCourseUnit_id'),
			'courseUnitAssociations1' => array(self::HAS_MANY, 'CourseUnitAssociation', 'ActedCourseUnit_id'),
			'courseUnitConversions' => array(self::HAS_MANY, 'CourseUnitConversion', 'OldCourseUnit_id'),
			'courseUnitConversions1' => array(self::HAS_MANY, 'CourseUnitConversion', 'NewCourseUnit_id'),
			'courseUnitRules' => array(self::HAS_MANY, 'CourseUnitRule', 'CourseUnit_id'),
			'courseUnitValues' => array(self::HAS_MANY, 'CourseUnitValue', 'CourceUnit_id'),
			'lectureSets' => array(self::HAS_MANY, 'LectureSet', 'CourseUnit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Course_id' => 'Course',
			'name' => 'Name',
			'StudentGroup_id' => 'Student Group',
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
		$criteria->compare('Course_id',$this->Course_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('StudentGroup_id',$this->StudentGroup_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}