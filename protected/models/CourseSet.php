<?php

/**
 * This is the model class for table "course_set".
 *
 * The followings are the available columns in table 'course_set':
 * @property string $id
 * @property string $Name
 * @property string $DependencyRule
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property CourseSet $revisedRow
 * @property CourseSet[] $courseSets
 * @property CourseSetComponent[] $courseSetComponents
 * @property CurriculumComponent[] $curriculumComponents
 */
class CourseSet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseSet the static model class
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
		return 'course_set';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, Name, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			array('DependencyRule', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, DependencyRule, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'CourseSet', 'RevisedRow_id'),
			'courseSets' => array(self::HAS_MANY, 'CourseSet', 'RevisedRow_id'),
			'courseSetComponents' => array(self::HAS_MANY, 'CourseSetComponent', 'CourseSet_id'),
			'curriculumComponents' => array(self::HAS_MANY, 'CurriculumComponent', 'CourseSet_id'),
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
			'DependencyRule' => 'Dependency Rule',
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
		$criteria->compare('DependencyRule',$this->DependencyRule,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}