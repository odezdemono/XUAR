<?php

/**
 * This is the model class for table "assessment_set_value".
 *
 * The followings are the available columns in table 'assessment_set_value':
 * @property string $id
 * @property string $AssessmentSet_id
 * @property string $Student_id
 * @property string $Grade
 * @property integer $AdjustedStatus
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentSet $assessmentSet
 * @property AssessmentSetValue $revisedRow
 * @property AssessmentSetValue[] $assessmentSetValues
 * @property Person $student
 */
class AssessmentSetValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssessmentSetValue the static model class
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
		return 'assessment_set_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AssessmentSet_id, Student_id, Grade, AdjustedStatus, TippedStatus, DeletedStatus', 'required'),
			array('AdjustedStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('AssessmentSet_id, Student_id, RevisedRow_id', 'length', 'max'=>10),
			array('Grade', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, AssessmentSet_id, Student_id, Grade, AdjustedStatus, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'AssessmentSetValue', 'RevisedRow_id'),
			'assessmentSetValues' => array(self::HAS_MANY, 'AssessmentSetValue', 'RevisedRow_id'),
			'student' => array(self::BELONGS_TO, 'Person', 'Student_id'),
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
			'Student_id' => 'Student',
			'Grade' => 'Grade',
			'AdjustedStatus' => 'Adjusted Status',
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
		$criteria->compare('Student_id',$this->Student_id,true);
		$criteria->compare('Grade',$this->Grade,true);
		$criteria->compare('AdjustedStatus',$this->AdjustedStatus);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}