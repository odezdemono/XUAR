<?php

/**
 * This is the model class for table "group_structure_history".
 *
 * The followings are the available columns in table 'group_structure_history':
 * @property string $id
 * @property string $Group_id
 * @property string $Name
 * @property string $Parent_id
 * @property string $ActualStartDate
 * @property string $ActualEndDate
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property GroupStructureHistory $parent
 * @property GroupStructureHistory[] $groupStructureHistories
 */
class GroupStructureHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GroupStructureHistory the static model class
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
		return 'group_structure_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Group_id, Name, ActualStartDate', 'required'),
			array('Group_id, Parent_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			array('ActualEndDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Group_id, Name, Parent_id, ActualStartDate, ActualEndDate', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'Group', 'Group_id'),
			'parent' => array(self::BELONGS_TO, 'GroupStructureHistory', 'Parent_id'),
			'groupStructureHistories' => array(self::HAS_MANY, 'GroupStructureHistory', 'Parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Group_id' => 'Group',
			'Name' => 'Name',
			'Parent_id' => 'Parent',
			'ActualStartDate' => 'Actual Start Date',
			'ActualEndDate' => 'Actual End Date',
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
		$criteria->compare('Group_id',$this->Group_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('ActualStartDate',$this->ActualStartDate,true);
		$criteria->compare('ActualEndDate',$this->ActualEndDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}