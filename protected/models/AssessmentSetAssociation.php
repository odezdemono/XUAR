<?php

/**
 * This is the model class for table "assessment_set_association".
 *
 * The followings are the available columns in table 'assessment_set_association':
 * @property string $id
 * @property string $PlannedAssessmentSet_id
 * @property string $ActedAssessmentSet_id
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentSet $plannedAssessmentSet
 * @property AssessmentSet $actedAssessmentSet
 */
class AssessmentSetAssociation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssessmentSetAssociation the static model class
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
		return 'assessment_set_association';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PlannedAssessmentSet_id, ActedAssessmentSet_id, DeletedStatus', 'required'),
			array('DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('PlannedAssessmentSet_id, ActedAssessmentSet_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, PlannedAssessmentSet_id, ActedAssessmentSet_id, DeletedStatus', 'safe', 'on'=>'search'),
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
			'plannedAssessmentSet' => array(self::BELONGS_TO, 'AssessmentSet', 'PlannedAssessmentSet_id'),
			'actedAssessmentSet' => array(self::BELONGS_TO, 'AssessmentSet', 'ActedAssessmentSet_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'PlannedAssessmentSet_id' => 'Planned Assessment Set',
			'ActedAssessmentSet_id' => 'Acted Assessment Set',
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
		$criteria->compare('PlannedAssessmentSet_id',$this->PlannedAssessmentSet_id,true);
		$criteria->compare('ActedAssessmentSet_id',$this->ActedAssessmentSet_id,true);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}