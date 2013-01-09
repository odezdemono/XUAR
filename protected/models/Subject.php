<?php

/**
 * This is the model class for table "subject".
 *
 * The followings are the available columns in table 'subject':
 * @property string $id
 * @property string $Parent_id
 * @property string $Name
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Subject $parent
 * @property Subject[] $subjects
 * @property Subject $revisedRow
 * @property Subject[] $subjects1
 * @property SubjectInAssessmentUnit[] $subjectInAssessmentUnits
 * @property SubjectInCourse[] $subjectInCourses
 * @property SubjectInLectureUnit[] $subjectInLectureUnits
 * @property SubjectTag[] $subjectTags
 */
class Subject extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subject the static model class
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
		return 'subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Parent_id, Name, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Parent_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Parent_id, Name, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Subject', 'Parent_id'),
			'subjects' => array(self::HAS_MANY, 'Subject', 'Parent_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Subject', 'RevisedRow_id'),
			'subjects1' => array(self::HAS_MANY, 'Subject', 'RevisedRow_id'),
			'subjectInAssessmentUnits' => array(self::HAS_MANY, 'SubjectInAssessmentUnit', 'Subject_id'),
			'subjectInCourses' => array(self::HAS_MANY, 'SubjectInCourse', 'Subject_id'),
			'subjectInLectureUnits' => array(self::HAS_MANY, 'SubjectInLectureUnit', 'Subject_id'),
			'subjectTags' => array(self::HAS_MANY, 'SubjectTag', 'Subject_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Parent_id' => 'Parent',
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
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}