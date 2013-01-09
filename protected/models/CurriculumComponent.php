<?php

/**
 * This is the model class for table "curriculum_component".
 *
 * The followings are the available columns in table 'curriculum_component':
 * @property string $id
 * @property string $Curriculum_id
 * @property string $CourseSet_id
 * @property integer $MandatoryStatus
 * @property string $Order
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Curriculum $curriculum
 * @property CourseSet $courseSet
 * @property CurriculumComponent $revisedRow
 * @property CurriculumComponent[] $curriculumComponents
 */
class CurriculumComponent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CurriculumComponent the static model class
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
		return 'curriculum_component';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Curriculum_id, CourseSet_id, MandatoryStatus, TippedStatus, DeletedStatus', 'required'),
			array('MandatoryStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Curriculum_id, CourseSet_id, Order, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Curriculum_id, CourseSet_id, MandatoryStatus, Order, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'curriculum' => array(self::BELONGS_TO, 'Curriculum', 'Curriculum_id'),
			'courseSet' => array(self::BELONGS_TO, 'CourseSet', 'CourseSet_id'),
			'revisedRow' => array(self::BELONGS_TO, 'CurriculumComponent', 'RevisedRow_id'),
			'curriculumComponents' => array(self::HAS_MANY, 'CurriculumComponent', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Curriculum_id' => 'Curriculum',
			'CourseSet_id' => 'Course Set',
			'MandatoryStatus' => 'Mandatory Status',
			'Order' => 'Order',
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
		$criteria->compare('Curriculum_id',$this->Curriculum_id,true);
		$criteria->compare('CourseSet_id',$this->CourseSet_id,true);
		$criteria->compare('MandatoryStatus',$this->MandatoryStatus);
		$criteria->compare('Order',$this->Order,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}