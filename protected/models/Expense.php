<?php

/**
 * This is the model class for table "expense".
 *
 * The followings are the available columns in table 'expense':
 * @property string $id
 * @property string $ExpenseType_id
 * @property string $Group_id
 * @property string $Amount
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property ExpenceInLectureUnit[] $expenceInLectureUnits
 * @property ExpenseType $expenseType
 * @property Group $group
 * @property Expense $revisedRow
 * @property Expense[] $expenses
 */
class Expense extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expense the static model class
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
		return 'expense';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ExpenseType_id, Group_id, Amount, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('ExpenseType_id, Group_id, Amount, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ExpenseType_id, Group_id, Amount, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'expenceInLectureUnits' => array(self::HAS_MANY, 'ExpenceInLectureUnit', 'Expence_id'),
			'expenseType' => array(self::BELONGS_TO, 'ExpenseType', 'ExpenseType_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'Group_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Expense', 'RevisedRow_id'),
			'expenses' => array(self::HAS_MANY, 'Expense', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ExpenseType_id' => 'Expense Type',
			'Group_id' => 'Group',
			'Amount' => 'Amount',
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
		$criteria->compare('ExpenseType_id',$this->ExpenseType_id,true);
		$criteria->compare('Group_id',$this->Group_id,true);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}