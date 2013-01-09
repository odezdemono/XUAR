<?php

/**
 * This is the model class for table "subject_in_course".
 *
 * The followings are the available columns in table 'subject_in_course':
 * @property string $id
 * @property string $Cource_id
 * @property string $Subject_id
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Course $cource
 * @property Subject $subject
 */
class SubjectInCourse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubjectInCourse the static model class
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
		return 'subject_in_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cource_id, Subject_id, DeletedStatus', 'required'),
			array('DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Cource_id, Subject_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Cource_id, Subject_id, DeletedStatus', 'safe', 'on'=>'search'),
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
			'cource' => array(self::BELONGS_TO, 'Course', 'Cource_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'Subject_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Cource_id' => 'Cource',
			'Subject_id' => 'Subject',
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
		$criteria->compare('Cource_id',$this->Cource_id,true);
		$criteria->compare('Subject_id',$this->Subject_id,true);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}