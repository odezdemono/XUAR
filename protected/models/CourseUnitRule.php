<?php

/**
 * This is the model class for table "course_unit_rule".
 *
 * The followings are the available columns in table 'course_unit_rule':
 * @property string $id
 * @property string $CourseUnit_id
 * @property string $Formula
 * @property integer $PlannedStatus
 * @property integer $UsedStatus
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property CourseUnit $courseUnit
 * @property CourseUnitRule $revisedRow
 * @property CourseUnitRule[] $courseUnitRules
 */
class CourseUnitRule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseUnitRule the static model class
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
		return 'course_unit_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CourseUnit_id, Formula, PlannedStatus, UsedStatus, TippedStatus, DeletedStatus', 'required'),
			array('PlannedStatus, UsedStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('CourseUnit_id, RevisedRow_id', 'length', 'max'=>10),
			array('Formula', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, CourseUnit_id, Formula, PlannedStatus, UsedStatus, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'CourseUnitRule', 'RevisedRow_id'),
			'courseUnitRules' => array(self::HAS_MANY, 'CourseUnitRule', 'RevisedRow_id'),
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
			'Formula' => 'Formula',
			'PlannedStatus' => 'Planned Status',
			'UsedStatus' => 'Used Status',
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
		$criteria->compare('Formula',$this->Formula,true);
		$criteria->compare('PlannedStatus',$this->PlannedStatus);
		$criteria->compare('UsedStatus',$this->UsedStatus);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}