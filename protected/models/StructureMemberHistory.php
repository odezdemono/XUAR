<?php

/**
 * This is the model class for table "structure_member_history".
 *
 * The followings are the available columns in table 'structure_member_history':
 * @property string $id
 * @property string $GroupStructure_id
 * @property string $PositionInStructure_id
 * @property string $Person_id
 * @property string $StartDate
 * @property string $EndDate
 *
 * The followings are the available model relations:
 * @property GroupStructure $groupStructure
 * @property PositionInStructure $positionInStructure
 * @property Person $person
 */
class StructureMemberHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StructureMemberHistory the static model class
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
		return 'structure_member_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GroupStructure_id, PositionInStructure_id, Person_id, StartDate', 'required'),
			array('GroupStructure_id, PositionInStructure_id, Person_id', 'length', 'max'=>10),
			array('EndDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, GroupStructure_id, PositionInStructure_id, Person_id, StartDate, EndDate', 'safe', 'on'=>'search'),
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
			'groupStructure' => array(self::BELONGS_TO, 'GroupStructure', 'GroupStructure_id'),
			'positionInStructure' => array(self::BELONGS_TO, 'PositionInStructure', 'PositionInStructure_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'Person_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'GroupStructure_id' => 'Group Structure',
			'PositionInStructure_id' => 'Position In Structure',
			'Person_id' => 'Person',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
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
		$criteria->compare('GroupStructure_id',$this->GroupStructure_id,true);
		$criteria->compare('PositionInStructure_id',$this->PositionInStructure_id,true);
		$criteria->compare('Person_id',$this->Person_id,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}