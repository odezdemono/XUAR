<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property string $id
 * @property string $Name
 * @property string $File
 * @property integer $PhysicalExistance
 * @property string $Url
 * @property string $DocumentBundle_id
 * @property string $SenderType_id
 * @property string $Sender_id
 * @property string $ReceiverType_id
 * @property string $Receiver_id
 * @property string $SentDate
 * @property string $ReceivedDate
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Document $revisedRow
 * @property Document[] $documents
 * @property DocumentBundle $documentBundle
 */
class Document extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Document the static model class
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
		return 'document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, DocumentBundle_id, SenderType_id, ReceiverType_id, SentDate, TippedStatus, DeletedStatus', 'required'),
			array('PhysicalExistance, TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>45),
			array('DocumentBundle_id, SenderType_id, Sender_id, ReceiverType_id, Receiver_id, RevisedRow_id', 'length', 'max'=>10),
			array('File, Url, ReceivedDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, File, PhysicalExistance, Url, DocumentBundle_id, SenderType_id, Sender_id, ReceiverType_id, Receiver_id, SentDate, ReceivedDate, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'revisedRow' => array(self::BELONGS_TO, 'Document', 'RevisedRow_id'),
			'documents' => array(self::HAS_MANY, 'Document', 'RevisedRow_id'),
			'documentBundle' => array(self::BELONGS_TO, 'DocumentBundle', 'DocumentBundle_id'),
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
			'File' => 'File',
			'PhysicalExistance' => 'Physical Existance',
			'Url' => 'Url',
			'DocumentBundle_id' => 'Document Bundle',
			'SenderType_id' => 'Sender Type',
			'Sender_id' => 'Sender',
			'ReceiverType_id' => 'Receiver Type',
			'Receiver_id' => 'Receiver',
			'SentDate' => 'Sent Date',
			'ReceivedDate' => 'Received Date',
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
		$criteria->compare('File',$this->File,true);
		$criteria->compare('PhysicalExistance',$this->PhysicalExistance);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('DocumentBundle_id',$this->DocumentBundle_id,true);
		$criteria->compare('SenderType_id',$this->SenderType_id,true);
		$criteria->compare('Sender_id',$this->Sender_id,true);
		$criteria->compare('ReceiverType_id',$this->ReceiverType_id,true);
		$criteria->compare('Receiver_id',$this->Receiver_id,true);
		$criteria->compare('SentDate',$this->SentDate,true);
		$criteria->compare('ReceivedDate',$this->ReceivedDate,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}