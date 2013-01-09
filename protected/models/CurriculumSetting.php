<?php

/**
 * This is the model class for table "curriculum_setting".
 *
 * The followings are the available columns in table 'curriculum_setting':
 * @property string $id
 * @property string $RootCurriculum_id
 * @property integer $SequencedStatus
 * @property integer $ActivatedStatus
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Curriculum $rootCurriculum
 * @property CurriculumSetting $revisedRow
 * @property CurriculumSetting[] $curriculumSettings
 */
class CurriculumSetting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CurriculumSetting the static model class
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
		return 'curriculum_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RootCurriculum_id, SequencedStatus, ActivatedStatus, TippedStatus, DeletedStatus', 'required'),
			array('SequencedStatus, ActivatedStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('RootCurriculum_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, RootCurriculum_id, SequencedStatus, ActivatedStatus, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'rootCurriculum' => array(self::BELONGS_TO, 'Curriculum', 'RootCurriculum_id'),
			'revisedRow' => array(self::BELONGS_TO, 'CurriculumSetting', 'RevisedRow_id'),
			'curriculumSettings' => array(self::HAS_MANY, 'CurriculumSetting', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'RootCurriculum_id' => 'Root Curriculum',
			'SequencedStatus' => 'Sequenced Status',
			'ActivatedStatus' => 'Activated Status',
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
		$criteria->compare('RootCurriculum_id',$this->RootCurriculum_id,true);
		$criteria->compare('SequencedStatus',$this->SequencedStatus);
		$criteria->compare('ActivatedStatus',$this->ActivatedStatus);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}