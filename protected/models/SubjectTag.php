<?php

/**
 * This is the model class for table "subject_tag".
 *
 * The followings are the available columns in table 'subject_tag':
 * @property string $id
 * @property string $name
 * @property string $Parent_id
 * @property string $Subject_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property SubjectTag $parent
 * @property SubjectTag[] $subjectTags
 * @property Subject $subject
 * @property SubjectTag $revisedRow
 * @property SubjectTag[] $subjectTags1
 */
class SubjectTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubjectTag the static model class
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
		return 'subject_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('name, Parent_id, Subject_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, Parent_id, Subject_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'SubjectTag', 'Parent_id'),
			'subjectTags' => array(self::HAS_MANY, 'SubjectTag', 'Parent_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'Subject_id'),
			'revisedRow' => array(self::BELONGS_TO, 'SubjectTag', 'RevisedRow_id'),
			'subjectTags1' => array(self::HAS_MANY, 'SubjectTag', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'Parent_id' => 'Parent',
			'Subject_id' => 'Subject',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('Subject_id',$this->Subject_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}