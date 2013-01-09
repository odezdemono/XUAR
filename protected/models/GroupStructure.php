<?php

/**
 * This is the model class for table "group_structure".
 *
 * The followings are the available columns in table 'group_structure':
 * @property string $id
 * @property string $Group_id
 * @property string $Name
 * @property string $Parent_id
 * @property string $FormalStartDate
 * @property string $FormalEndDate
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property GroupStructure $parent
 * @property GroupStructure[] $groupStructures
 * @property GroupStructure $revisedRow
 * @property GroupStructure[] $groupStructures1
 * @property StructureMember[] $structureMembers
 * @property StructureMemberHistory[] $structureMemberHistories
 */
class GroupStructure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GroupStructure the static model class
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
		return 'group_structure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Group_id, Name, FormalStartDate, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Group_id, Parent_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			array('FormalEndDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Group_id, Name, Parent_id, FormalStartDate, FormalEndDate, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'GroupStructure', 'Parent_id'),
			'groupStructures' => array(self::HAS_MANY, 'GroupStructure', 'Parent_id'),
			'revisedRow' => array(self::BELONGS_TO, 'GroupStructure', 'RevisedRow_id'),
			'groupStructures1' => array(self::HAS_MANY, 'GroupStructure', 'RevisedRow_id'),
			'structureMembers' => array(self::HAS_MANY, 'StructureMember', 'GroupStructure_id'),
			'structureMemberHistories' => array(self::HAS_MANY, 'StructureMemberHistory', 'GroupStructure_id'),
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
			'FormalStartDate' => 'Formal Start Date',
			'FormalEndDate' => 'Formal End Date',
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
		$criteria->compare('Group_id',$this->Group_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('FormalStartDate',$this->FormalStartDate,true);
		$criteria->compare('FormalEndDate',$this->FormalEndDate,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}