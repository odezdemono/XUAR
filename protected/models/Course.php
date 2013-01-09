<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property string $id
 * @property string $Name
 * @property string $Alias
 * @property string $DependencyRule
 * @property string $Owner_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Course $revisedRow
 * @property Course[] $courses
 * @property Group $owner
 * @property CourseAvailability[] $courseAvailabilities
 * @property CourseSetComponent[] $courseSetComponents
 * @property CourseUnit[] $courseUnits
 * @property ReportComponent[] $reportComponents
 * @property SubjectInCourse[] $subjectInCourses
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Owner_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name, Alias', 'length', 'max'=>45),
			array('Owner_id, RevisedRow_id', 'length', 'max'=>10),
			array('DependencyRule', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, Alias, DependencyRule, Owner_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'Course', 'RevisedRow_id'),
			'courses' => array(self::HAS_MANY, 'Course', 'RevisedRow_id'),
			'owner' => array(self::BELONGS_TO, 'Group', 'Owner_id'),
			'courseAvailabilities' => array(self::HAS_MANY, 'CourseAvailability', 'Course_id'),
			'courseSetComponents' => array(self::HAS_MANY, 'CourseSetComponent', 'Course_id'),
			'courseUnits' => array(self::HAS_MANY, 'CourseUnit', 'Course_id'),
			'reportComponents' => array(self::HAS_MANY, 'ReportComponent', 'Course_id'),
			'subjectInCourses' => array(self::HAS_MANY, 'SubjectInCourse', 'Cource_id'),
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
			'Alias' => 'Alias',
			'DependencyRule' => 'Dependency Rule',
			'Owner_id' => 'Owner',
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
		$criteria->compare('Alias',$this->Alias,true);
		$criteria->compare('DependencyRule',$this->DependencyRule,true);
		$criteria->compare('Owner_id',$this->Owner_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}