<?php

/**
 * This is the model class for table "course_availability".
 *
 * The followings are the available columns in table 'course_availability':
 * @property string $id
 * @property string $Course_id
 * @property string $MacrotimeUnit_id
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property MacrotimeUnit $macrotimeUnit
 */
class CourseAvailability extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseAvailability the static model class
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
		return 'course_availability';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Course_id, MacrotimeUnit_id, DeletedStatus', 'required'),
			array('DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Course_id, MacrotimeUnit_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Course_id, MacrotimeUnit_id, DeletedStatus', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'Course_id'),
			'macrotimeUnit' => array(self::BELONGS_TO, 'MacrotimeUnit', 'MacrotimeUnit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Course_id' => 'Course',
			'MacrotimeUnit_id' => 'Macrotime Unit',
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
		$criteria->compare('Course_id',$this->Course_id,true);
		$criteria->compare('MacrotimeUnit_id',$this->MacrotimeUnit_id,true);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}