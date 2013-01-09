<?php

/**
 * This is the model class for table "assessment_unit_value".
 *
 * The followings are the available columns in table 'assessment_unit_value':
 * @property string $id
 * @property string $AssessmentUnit_id
 * @property string $Student_id
 * @property string $grade
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentUnit $assessmentUnit
 * @property AssessmentUnitValue $revisedRow
 * @property AssessmentUnitValue[] $assessmentUnitValues
 * @property Person $student
 */
class AssessmentUnitValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssessmentUnitValue the static model class
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
		return 'assessment_unit_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AssessmentUnit_id, Student_id, grade, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('AssessmentUnit_id, Student_id, RevisedRow_id', 'length', 'max'=>10),
			array('grade', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, AssessmentUnit_id, Student_id, grade, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'assessmentUnit' => array(self::BELONGS_TO, 'AssessmentUnit', 'AssessmentUnit_id'),
			'revisedRow' => array(self::BELONGS_TO, 'AssessmentUnitValue', 'RevisedRow_id'),
			'assessmentUnitValues' => array(self::HAS_MANY, 'AssessmentUnitValue', 'RevisedRow_id'),
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
			'AssessmentUnit_id' => 'Assessment Unit',
			'Student_id' => 'Student',
			'grade' => 'Grade',
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
		$criteria->compare('AssessmentUnit_id',$this->AssessmentUnit_id,true);
		$criteria->compare('Student_id',$this->Student_id,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}