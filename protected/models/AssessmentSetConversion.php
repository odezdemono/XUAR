<?php

/**
 * This is the model class for table "assessment_set_conversion".
 *
 * The followings are the available columns in table 'assessment_set_conversion':
 * @property string $id
 * @property string $OldAssessmentSet_id
 * @property string $NewAssessmentSet_id
 * @property string $Person_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AssessmentSet $oldAssessmentSet
 * @property AssessmentSet $newAssessmentSet
 * @property Person $person
 * @property AssessmentSetConversion $revisedRow
 * @property AssessmentSetConversion[] $assessmentSetConversions
 */
class AssessmentSetConversion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssessmentSetConversion the static model class
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
		return 'assessment_set_conversion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NewAssessmentSet_id, Person_id, TippedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('OldAssessmentSet_id, NewAssessmentSet_id, Person_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, OldAssessmentSet_id, NewAssessmentSet_id, Person_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'oldAssessmentSet' => array(self::BELONGS_TO, 'AssessmentSet', 'OldAssessmentSet_id'),
			'newAssessmentSet' => array(self::BELONGS_TO, 'AssessmentSet', 'NewAssessmentSet_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'Person_id'),
			'revisedRow' => array(self::BELONGS_TO, 'AssessmentSetConversion', 'RevisedRow_id'),
			'assessmentSetConversions' => array(self::HAS_MANY, 'AssessmentSetConversion', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'OldAssessmentSet_id' => 'Old Assessment Set',
			'NewAssessmentSet_id' => 'New Assessment Set',
			'Person_id' => 'Person',
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
		$criteria->compare('OldAssessmentSet_id',$this->OldAssessmentSet_id,true);
		$criteria->compare('NewAssessmentSet_id',$this->NewAssessmentSet_id,true);
		$criteria->compare('Person_id',$this->Person_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}