<?php

/**
 * This is the model class for table "course_set_component".
 *
 * The followings are the available columns in table 'course_set_component':
 * @property string $id
 * @property string $CourseSet_id
 * @property string $Course_id
 * @property integer $MandatoryStatus
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property CourseSet $courseSet
 * @property Course $course
 * @property CourseSetComponent $revisedRow
 * @property CourseSetComponent[] $courseSetComponents
 */
class CourseSetComponent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseSetComponent the static model class
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
		return 'course_set_component';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CourseSet_id, Course_id, MandatoryStatus, TippedStatus, DeletedStatus', 'required'),
			array('MandatoryStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('CourseSet_id, Course_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, CourseSet_id, Course_id, MandatoryStatus, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'courseSet' => array(self::BELONGS_TO, 'CourseSet', 'CourseSet_id'),
			'course' => array(self::BELONGS_TO, 'Course', 'Course_id'),
			'revisedRow' => array(self::BELONGS_TO, 'CourseSetComponent', 'RevisedRow_id'),
			'courseSetComponents' => array(self::HAS_MANY, 'CourseSetComponent', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'CourseSet_id' => 'Course Set',
			'Course_id' => 'Course',
			'MandatoryStatus' => 'Mandatory Status',
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
		$criteria->compare('CourseSet_id',$this->CourseSet_id,true);
		$criteria->compare('Course_id',$this->Course_id,true);
		$criteria->compare('MandatoryStatus',$this->MandatoryStatus);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}