<?php

/**
 * This is the model class for table "space_ownership".
 *
 * The followings are the available columns in table 'space_ownership':
 * @property string $id
 * @property string $Group_id
 * @property string $Space_id
 * @property integer $InheritToChildStatus
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property Space $space
 * @property SpaceOwnership $revisedRow
 * @property SpaceOwnership[] $spaceOwnerships
 */
class SpaceOwnership extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpaceOwnership the static model class
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
		return 'space_ownership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Group_id, Space_id, TippedStatus, DeletedStatus', 'required'),
			array('InheritToChildStatus, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Group_id, Space_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Group_id, Space_id, InheritToChildStatus, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'space' => array(self::BELONGS_TO, 'Space', 'Space_id'),
			'revisedRow' => array(self::BELONGS_TO, 'SpaceOwnership', 'RevisedRow_id'),
			'spaceOwnerships' => array(self::HAS_MANY, 'SpaceOwnership', 'RevisedRow_id'),
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
			'Space_id' => 'Space',
			'InheritToChildStatus' => 'Inherit To Child Status',
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
		$criteria->compare('Space_id',$this->Space_id,true);
		$criteria->compare('InheritToChildStatus',$this->InheritToChildStatus);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}