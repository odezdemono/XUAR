<?php

/**
 * This is the model class for table "lecture_unit_association".
 *
 * The followings are the available columns in table 'lecture_unit_association':
 * @property string $id
 * @property string $PlannedCourseUnit_id
 * @property string $ActedCourseUnit_id
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property LectureUnit $plannedCourseUnit
 * @property LectureUnit $actedCourseUnit
 */
class LectureUnitAssociation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LectureUnitAssociation the static model class
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
		return 'lecture_unit_association';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PlannedCourseUnit_id, ActedCourseUnit_id, DeletedStatus', 'required'),
			array('DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('PlannedCourseUnit_id, ActedCourseUnit_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, PlannedCourseUnit_id, ActedCourseUnit_id, DeletedStatus', 'safe', 'on'=>'search'),
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
			'plannedCourseUnit' => array(self::BELONGS_TO, 'LectureUnit', 'PlannedCourseUnit_id'),
			'actedCourseUnit' => array(self::BELONGS_TO, 'LectureUnit', 'ActedCourseUnit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'PlannedCourseUnit_id' => 'Planned Course Unit',
			'ActedCourseUnit_id' => 'Acted Course Unit',
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
		$criteria->compare('PlannedCourseUnit_id',$this->PlannedCourseUnit_id,true);
		$criteria->compare('ActedCourseUnit_id',$this->ActedCourseUnit_id,true);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}