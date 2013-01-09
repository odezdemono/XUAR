<?php

/**
 * This is the model class for table "lecture_set".
 *
 * The followings are the available columns in table 'lecture_set':
 * @property string $id
 * @property string $CourseUnit_id
 * @property string $Name
 * @property string $LecturerGroup_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property CourseUnit $courseUnit
 * @property LectureSet $revisedRow
 * @property LectureSet[] $lectureSets
 * @property Group $lecturerGroup
 * @property LectureSetAssociation[] $lectureSetAssociations
 * @property LectureSetAssociation[] $lectureSetAssociations1
 * @property LectureSetConversion[] $lectureSetConversions
 * @property LectureSetConversion[] $lectureSetConversions1
 * @property LectureUnit[] $lectureUnits
 */
class LectureSet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LectureSet the static model class
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
		return 'lecture_set';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CourseUnit_id, Name, LecturerGroup_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('CourseUnit_id, LecturerGroup_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, CourseUnit_id, Name, LecturerGroup_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'courseUnit' => array(self::BELONGS_TO, 'CourseUnit', 'CourseUnit_id'),
			'revisedRow' => array(self::BELONGS_TO, 'LectureSet', 'RevisedRow_id'),
			'lectureSets' => array(self::HAS_MANY, 'LectureSet', 'RevisedRow_id'),
			'lecturerGroup' => array(self::BELONGS_TO, 'Group', 'LecturerGroup_id'),
			'lectureSetAssociations' => array(self::HAS_MANY, 'LectureSetAssociation', 'PlannedLectureSet_id'),
			'lectureSetAssociations1' => array(self::HAS_MANY, 'LectureSetAssociation', 'ActedLectureSet_id'),
			'lectureSetConversions' => array(self::HAS_MANY, 'LectureSetConversion', 'OldLectureSet_id'),
			'lectureSetConversions1' => array(self::HAS_MANY, 'LectureSetConversion', 'NewLectureSet_id'),
			'lectureUnits' => array(self::HAS_MANY, 'LectureUnit', 'LectureSet_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'CourseUnit_id' => 'Course Unit',
			'Name' => 'Name',
			'LecturerGroup_id' => 'Lecturer Group',
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
		$criteria->compare('CourseUnit_id',$this->CourseUnit_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('LecturerGroup_id',$this->LecturerGroup_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}