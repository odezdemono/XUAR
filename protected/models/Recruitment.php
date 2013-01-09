<?php

/**
 * This is the model class for table "recruitment".
 *
 * The followings are the available columns in table 'recruitment':
 * @property string $id
 * @property string $Generation_id
 * @property string $Name
 * @property integer $Order
 * @property integer $Quota
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Generation $generation
 * @property Recruitment $revisedRow
 * @property Recruitment[] $recruitments
 * @property RecruitmentStep[] $recruitmentSteps
 */
class Recruitment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Recruitment the static model class
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
		return 'recruitment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Generation_id, Name, Order, TippedStatus, DeletedStatus', 'required'),
			array('Order, Quota, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Generation_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Generation_id, Name, Order, Quota, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'generation' => array(self::BELONGS_TO, 'Generation', 'Generation_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Recruitment', 'RevisedRow_id'),
			'recruitments' => array(self::HAS_MANY, 'Recruitment', 'RevisedRow_id'),
			'recruitmentSteps' => array(self::HAS_MANY, 'RecruitmentStep', 'Recruitment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Generation_id' => 'Generation',
			'Name' => 'Name',
			'Order' => 'Order',
			'Quota' => 'Quota',
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
		$criteria->compare('Generation_id',$this->Generation_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Order',$this->Order);
		$criteria->compare('Quota',$this->Quota);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}