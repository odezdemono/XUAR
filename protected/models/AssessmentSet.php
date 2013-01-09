<?php

/**
 * This is the model class for table "assessment_set".
 *
 * The followings are the available columns in table 'assessment_set':
 * @property string $id
 * @property string $CourseUnit_id
 * @property string $Name
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property CourseUnit $courseUnit
 * @property AssessmentSet $revisedRow
 * @property AssessmentSet[] $assessmentSets
 * @property AssessmentSetAssociation[] $assessmentSetAssociations
 * @property AssessmentSetAssociation[] $assessmentSetAssociations1
 * @property AssessmentSetConversion[] $assessmentSetConversions
 * @property AssessmentSetConversion[] $assessmentSetConversions1
 * @property AssessmentSetRule[] $assessmentSetRules
 * @property AssessmentSetValue[] $assessmentSetValues
 * @property AssessmentUnit[] $assessmentUnits
 */
class AssessmentSet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssessmentSet the static model class
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
		return 'assessment_set';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CourseUnit_id, Name, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('CourseUnit_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, CourseUnit_id, Name, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'AssessmentSet', 'RevisedRow_id'),
			'assessmentSets' => array(self::HAS_MANY, 'AssessmentSet', 'RevisedRow_id'),
			'assessmentSetAssociations' => array(self::HAS_MANY, 'AssessmentSetAssociation', 'PlannedAssessmentSet_id'),
			'assessmentSetAssociations1' => array(self::HAS_MANY, 'AssessmentSetAssociation', 'ActedAssessmentSet_id'),
			'assessmentSetConversions' => array(self::HAS_MANY, 'AssessmentSetConversion', 'OldAssessmentSet_id'),
			'assessmentSetConversions1' => array(self::HAS_MANY, 'AssessmentSetConversion', 'NewAssessmentSet_id'),
			'assessmentSetRules' => array(self::HAS_MANY, 'AssessmentSetRule', 'AssessmentSet_id'),
			'assessmentSetValues' => array(self::HAS_MANY, 'AssessmentSetValue', 'AssessmentSet_id'),
			'assessmentUnits' => array(self::HAS_MANY, 'AssessmentUnit', 'AssessmentSet_id'),
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
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}