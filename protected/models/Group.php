<?php

/**
 * This is the model class for table "group".
 *
 * The followings are the available columns in table 'group':
 * @property string $id
 * @property string $Parent_id
 * @property string $Name
 * @property string $StartDate
 * @property string $EndDate
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 * @property CourseUnit[] $courseUnits
 * @property Curriculum[] $curriculums
 * @property CurriculumParticipant[] $curriculumParticipants
 * @property DaySetOwnership[] $daySetOwnerships
 * @property Expense[] $expenses
 * @property Generation[] $generations
 * @property Group $revisedRow
 * @property Group[] $groups
 * @property Group $parent
 * @property Group[] $groups1
 * @property GroupMember[] $groupMembers
 * @property GroupStructure[] $groupStructures
 * @property GroupStructureHistory[] $groupStructureHistories
 * @property Income[] $incomes
 * @property Inventory[] $inventories
 * @property InventoryLabelTemplate[] $inventoryLabelTemplates
 * @property InventoryOwnershipHistory[] $inventoryOwnershipHistories
 * @property InventoryOwnershipHistory[] $inventoryOwnershipHistories1
 * @property LectureSet[] $lectureSets
 * @property MacrotimeSet[] $macrotimeSets
 * @property MaterialHistory[] $materialHistories
 * @property MaterialHistory[] $materialHistories1
 * @property MicrotimeSet[] $microtimeSets
 * @property NotLabelledInventory[] $notLabelledInventories
 * @property PositionInStructure[] $positionInStructures
 * @property SpaceOwnership[] $spaceOwnerships
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
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
		return 'group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, StartDate, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Parent_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			array('EndDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Parent_id, Name, StartDate, EndDate, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Course', 'Owner_id'),
			'courseUnits' => array(self::HAS_MANY, 'CourseUnit', 'StudentGroup_id'),
			'curriculums' => array(self::HAS_MANY, 'Curriculum', 'Owner_id'),
			'curriculumParticipants' => array(self::HAS_MANY, 'CurriculumParticipant', 'Group_id'),
			'daySetOwnerships' => array(self::HAS_MANY, 'DaySetOwnership', 'Group_id'),
			'expenses' => array(self::HAS_MANY, 'Expense', 'Group_id'),
			'generations' => array(self::HAS_MANY, 'Generation', 'Group_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Group', 'RevisedRow_id'),
			'groups' => array(self::HAS_MANY, 'Group', 'RevisedRow_id'),
			'parent' => array(self::BELONGS_TO, 'Group', 'Parent_id'),
			'groups1' => array(self::HAS_MANY, 'Group', 'Parent_id'),
			'groupMembers' => array(self::HAS_MANY, 'GroupMember', 'Group_id'),
			'groupStructures' => array(self::HAS_MANY, 'GroupStructure', 'Group_id'),
			'groupStructureHistories' => array(self::HAS_MANY, 'GroupStructureHistory', 'Group_id'),
			'incomes' => array(self::HAS_MANY, 'Income', 'Group_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'Owner_id'),
			'inventoryLabelTemplates' => array(self::HAS_MANY, 'InventoryLabelTemplate', 'Owner_id'),
			'inventoryOwnershipHistories' => array(self::HAS_MANY, 'InventoryOwnershipHistory', 'OldOwner_id'),
			'inventoryOwnershipHistories1' => array(self::HAS_MANY, 'InventoryOwnershipHistory', 'NewOwner_id'),
			'lectureSets' => array(self::HAS_MANY, 'LectureSet', 'LecturerGroup_id'),
			'macrotimeSets' => array(self::HAS_MANY, 'MacrotimeSet', 'Owner_id'),
			'materialHistories' => array(self::HAS_MANY, 'MaterialHistory', 'OldOwner_id'),
			'materialHistories1' => array(self::HAS_MANY, 'MaterialHistory', 'NewOwner_id'),
			'microtimeSets' => array(self::HAS_MANY, 'MicrotimeSet', 'Owner_id'),
			'notLabelledInventories' => array(self::HAS_MANY, 'NotLabelledInventory', 'Owner_id'),
			'positionInStructures' => array(self::HAS_MANY, 'PositionInStructure', 'Group_id'),
			'spaceOwnerships' => array(self::HAS_MANY, 'SpaceOwnership', 'Group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Parent_id' => 'Parent',
			'Name' => 'Name',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
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
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}