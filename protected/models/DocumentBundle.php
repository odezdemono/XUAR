<?php

/**
 * This is the model class for table "document_bundle".
 *
 * The followings are the available columns in table 'document_bundle':
 * @property string $id
 * @property string $Name
 * @property string $PhysicalLocation
 * @property string $Parent_id
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property AdditionalProperty[] $additionalProperties
 * @property Document[] $documents
 * @property DocumentBundle $parent
 * @property DocumentBundle[] $documentBundles
 * @property DocumentBundle $revisedRow
 * @property DocumentBundle[] $documentBundles1
 */
class DocumentBundle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentBundle the static model class
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
		return 'document_bundle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>45),
			array('Parent_id, RevisedRow_id', 'length', 'max'=>10),
			array('PhysicalLocation', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, PhysicalLocation, Parent_id, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'additionalProperties' => array(self::HAS_MANY, 'AdditionalProperty', 'DocumentBundle_id'),
			'documents' => array(self::HAS_MANY, 'Document', 'DocumentBundle_id'),
			'parent' => array(self::BELONGS_TO, 'DocumentBundle', 'Parent_id'),
			'documentBundles' => array(self::HAS_MANY, 'DocumentBundle', 'Parent_id'),
			'revisedRow' => array(self::BELONGS_TO, 'DocumentBundle', 'RevisedRow_id'),
			'documentBundles1' => array(self::HAS_MANY, 'DocumentBundle', 'RevisedRow_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Name' => 'Name',
			'PhysicalLocation' => 'Physical Location',
			'Parent_id' => 'Parent',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('PhysicalLocation',$this->PhysicalLocation,true);
		$criteria->compare('Parent_id',$this->Parent_id,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}