<?php

/**
 * This is the model class for table "lecture_set_association".
 *
 * The followings are the available columns in table 'lecture_set_association':
 * @property string $id
 * @property string $PlannedLectureSet_id
 * @property string $ActedLectureSet_id
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property LectureSet $plannedLectureSet
 * @property LectureSet $actedLectureSet
 */
class LectureSetAssociation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LectureSetAssociation the static model class
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
		return 'lecture_set_association';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PlannedLectureSet_id, ActedLectureSet_id, DeletedStatus', 'required'),
			array('DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('PlannedLectureSet_id, ActedLectureSet_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, PlannedLectureSet_id, ActedLectureSet_id, DeletedStatus', 'safe', 'on'=>'search'),
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
			'plannedLectureSet' => array(self::BELONGS_TO, 'LectureSet', 'PlannedLectureSet_id'),
			'actedLectureSet' => array(self::BELONGS_TO, 'LectureSet', 'ActedLectureSet_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'PlannedLectureSet_id' => 'Planned Lecture Set',
			'ActedLectureSet_id' => 'Acted Lecture Set',
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
		$criteria->compare('PlannedLectureSet_id',$this->PlannedLectureSet_id,true);
		$criteria->compare('ActedLectureSet_id',$this->ActedLectureSet_id,true);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}