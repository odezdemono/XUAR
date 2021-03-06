<?php

/**
 * This is the model class for table "person_participate_in_recruitment".
 *
 * The followings are the available columns in table 'person_participate_in_recruitment':
 * @property string $id
 * @property string $RecruitmentStep_id
 * @property string $Person_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property RecruitmentStep $recruitmentStep
 * @property Person $person
 * @property PersonParticipateInRecruitment $revisedRow
 * @property PersonParticipateInRecruitment[] $personParticipateInRecruitments
 */
class PersonParticipateInRecruitment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonParticipateInRecruitment the static model class
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
		return 'person_participate_in_recruitment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RecruitmentStep_id, Person_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('RecruitmentStep_id, Person_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, RecruitmentStep_id, Person_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'recruitmentStep' => array(self::BELONGS_TO, 'RecruitmentStep', 'RecruitmentStep_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'Person_id'),
			'revisedRow' => array(self::BELONGS_TO, 'PersonParticipateInRecruitment', 'RevisedRow_id'),
			'personParticipateInRecruitments' => array(self::HAS_MANY, 'PersonParticipateInRecruitment', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'RecruitmentStep_id' => 'Recruitment Step',
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
		$criteria->compare('RecruitmentStep_id',$this->RecruitmentStep_id,true);
		$criteria->compare('Person_id',$this->Person_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}