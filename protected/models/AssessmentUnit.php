<?php

/**
 * This is the model class for table "assessment_unit".
 *
 * The followings are the available columns in table 'assessment_unit':
 * @property string $id
 * @property string $AssessmentSet_id
 * @property string $Name
 * @property string $Occurrence_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentSet $assessmentSet
 * @property AssessmentUnit $revisedRow
 * @property AssessmentUnit[] $assessmentUnits
 * @property LectureUnitOccurrence $occurrence
 * @property AssessmentUnitAssociation[] $assessmentUnitAssociations
 * @property AssessmentUnitAssociation[] $assessmentUnitAssociations1
 * @property AssessmentUnitValue[] $assessmentUnitValues
 * @property GradeFactor[] $gradeFactors
 * @property SubjectInAssessmentUnit[] $subjectInAssessmentUnits
 */
class AssessmentUnit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssessmentUnit the static model class
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
		return 'assessment_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AssessmentSet_id, Name, Occurrence_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('AssessmentSet_id, Occurrence_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, AssessmentSet_id, Name, Occurrence_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'assessmentSet' => array(self::BELONGS_TO, 'AssessmentSet', 'AssessmentSet_id'),
			'revisedRow' => array(self::BELONGS_TO, 'AssessmentUnit', 'RevisedRow_id'),
			'assessmentUnits' => array(self::HAS_MANY, 'AssessmentUnit', 'RevisedRow_id'),
			'occurrence' => array(self::BELONGS_TO, 'LectureUnitOccurrence', 'Occurrence_id'),
			'assessmentUnitAssociations' => array(self::HAS_MANY, 'AssessmentUnitAssociation', 'PlannedAssessmentUnit_id'),
			'assessmentUnitAssociations1' => array(self::HAS_MANY, 'AssessmentUnitAssociation', 'ActedAssessmentUnit_id'),
			'assessmentUnitValues' => array(self::HAS_MANY, 'AssessmentUnitValue', 'AssessmentUnit_id'),
			'gradeFactors' => array(self::HAS_MANY, 'GradeFactor', 'AssessmentUnit_id'),
			'subjectInAssessmentUnits' => array(self::HAS_MANY, 'SubjectInAssessmentUnit', 'AssessmentUnit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'AssessmentSet_id' => 'Assessment Set',
			'Name' => 'Name',
			'Occurrence_id' => 'Occurrence',
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
		$criteria->compare('AssessmentSet_id',$this->AssessmentSet_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Occurrence_id',$this->Occurrence_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}