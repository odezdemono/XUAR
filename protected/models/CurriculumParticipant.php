<?php

/**
 * This is the model class for table "curriculum_participant".
 *
 * The followings are the available columns in table 'curriculum_participant':
 * @property string $id
 * @property string $Curriculum_id
 * @property string $Group_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Curriculum $curriculum
 * @property Group $group
 * @property CurriculumParticipant $revisedRow
 * @property CurriculumParticipant[] $curriculumParticipants
 */
class CurriculumParticipant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CurriculumParticipant the static model class
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
		return 'curriculum_participant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Curriculum_id, Group_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Curriculum_id, Group_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Curriculum_id, Group_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'Group', 'Group_id'),
			'revisedRow' => array(self::BELONGS_TO, 'CurriculumParticipant', 'RevisedRow_id'),
			'curriculumParticipants' => array(self::HAS_MANY, 'CurriculumParticipant', 'RevisedRow_id'),
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
			'Group_id' => 'Group',
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
		$criteria->compare('Group_id',$this->Group_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}