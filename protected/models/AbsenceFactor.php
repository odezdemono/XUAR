<?php

/**
 * This is the model class for table "absence_factor".
 *
 * The followings are the available columns in table 'absence_factor':
 * @property string $id
 * @property string $LectureUnit_id
 * @property string $Person_id
 * @property string $ActivityType_id
 * @property integer $Activity_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property LectureUnit $lectureUnit
 * @property Person $person
 * @property AbsenceFactor $revisedRow
 * @property AbsenceFactor[] $absenceFactors
 * @property Lookup $activityType
 */
class AbsenceFactor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AbsenceFactor the static model class
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
		return 'absence_factor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LectureUnit_id, Person_id, ActivityType_id, TippedStatus', 'required'),
			array('Activity_id, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('LectureUnit_id, Person_id, ActivityType_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, LectureUnit_id, Person_id, ActivityType_id, Activity_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'lectureUnit' => array(self::BELONGS_TO, 'LectureUnit', 'LectureUnit_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'Person_id'),
			'revisedRow' => array(self::BELONGS_TO, 'AbsenceFactor', 'RevisedRow_id'),
			'absenceFactors' => array(self::HAS_MANY, 'AbsenceFactor', 'RevisedRow_id'),
			'activityType' => array(self::BELONGS_TO, 'Lookup', 'ActivityType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'LectureUnit_id' => 'Lecture Unit',
			'Person_id' => 'Person',
			'ActivityType_id' => 'Activity Type',
			'Activity_id' => 'Activity',
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
		$criteria->compare('LectureUnit_id',$this->LectureUnit_id,true);
		$criteria->compare('Person_id',$this->Person_id,true);
		$criteria->compare('ActivityType_id',$this->ActivityType_id,true);
		$criteria->compare('Activity_id',$this->Activity_id);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}