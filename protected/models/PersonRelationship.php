<?php

/**
 * This is the model class for table "person_relationship".
 *
 * The followings are the available columns in table 'person_relationship':
 * @property string $id
 * @property string $Person_id
 * @property string $RelationshipType_id
 * @property string $OtherPerson_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Person $person
 * @property Person $otherPerson
 * @property PersonRelationship $revisedRow
 * @property PersonRelationship[] $personRelationships
 * @property Lookup $relationshipType
 */
class PersonRelationship extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonRelationship the static model class
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
		return 'person_relationship';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Person_id, RelationshipType_id, OtherPerson_id, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Person_id, RelationshipType_id, OtherPerson_id, RevisedRow_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Person_id, RelationshipType_id, OtherPerson_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'person' => array(self::BELONGS_TO, 'Person', 'Person_id'),
			'otherPerson' => array(self::BELONGS_TO, 'Person', 'OtherPerson_id'),
			'revisedRow' => array(self::BELONGS_TO, 'PersonRelationship', 'RevisedRow_id'),
			'personRelationships' => array(self::HAS_MANY, 'PersonRelationship', 'RevisedRow_id'),
			'relationshipType' => array(self::BELONGS_TO, 'Lookup', 'RelationshipType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Person_id' => 'Person',
			'RelationshipType_id' => 'Relationship Type',
			'OtherPerson_id' => 'Other Person',
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
		$criteria->compare('Person_id',$this->Person_id,true);
		$criteria->compare('RelationshipType_id',$this->RelationshipType_id,true);
		$criteria->compare('OtherPerson_id',$this->OtherPerson_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}