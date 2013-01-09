<?php

/**
 * This is the model class for table "curriculum".
 *
 * The followings are the available columns in table 'curriculum':
 * @property string $id
 * @property string $Name
 * @property string $Parent_id
 * @property string $Owner_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Curriculum $revisedRow
 * @property Curriculum[] $curriculums
 * @property Curriculum $parent
 * @property Curriculum[] $curriculums1
 * @property Group $owner
 * @property CurriculumComponent[] $curriculumComponents
 * @property CurriculumParticipant[] $curriculumParticipants
 * @property CurriculumSetting[] $curriculumSettings
 * @property Report[] $reports
 */
class Curriculum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Curriculum the static model class
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
		return 'curriculum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Owner_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>45),
			array('Parent_id, Owner_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, Parent_id, Owner_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'Curriculum', 'RevisedRow_id'),
			'curriculums' => array(self::HAS_MANY, 'Curriculum', 'RevisedRow_id'),
			'parent' => array(self::BELONGS_TO, 'Curriculum', 'Parent_id'),
			'curriculums1' => array(self::HAS_MANY, 'Curriculum', 'Parent_id'),
			'owner' => array(self::BELONGS_TO, 'Group', 'Owner_id'),
			'curriculumComponents' => array(self::HAS_MANY, 'CurriculumComponent', 'Curriculum_id'),
			'curriculumParticipants' => array(self::HAS_MANY, 'CurriculumParticipant', 'Curriculum_id'),
			'curriculumSettings' => array(self::HAS_MANY, 'CurriculumSetting', 'RootCurriculum_id'),
			'reports' => array(self::HAS_MANY, 'Report', 'Curriculum_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Name' => 'Name',
			'Parent_id' => 'Parent',
			'Owner_id' => 'Owner',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('Owner_id',$this->Owner_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}