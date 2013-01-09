<?php

/**
 * This is the model class for table "report".
 *
 * The followings are the available columns in table 'report':
 * @property string $id
 * @property string $Curriculum_id
 * @property string $Name
 * @property string $PublishedDate
 * @property string $Template
 * @property string $RevisedRow_id
 * @property integer $TippedStatus
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property Curriculum $curriculum
 * @property Report $revisedRow
 * @property Report[] $reports
 * @property ReportComponent[] $reportComponents
 */
class Report extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Report the static model class
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
		return 'report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Curriculum_id, Name, PublishedDate, Template, TippedStatus, DeletedStatus', 'required'),
			array('TippedStatus, DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('Curriculum_id, RevisedRow_id', 'length', 'max'=>10),
			array('Name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Curriculum_id, Name, PublishedDate, Template, RevisedRow_id, TippedStatus, DeletedStatus', 'safe', 'on'=>'search'),
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
			'curriculum' => array(self::BELONGS_TO, 'Curriculum', 'Curriculum_id'),
			'revisedRow' => array(self::BELONGS_TO, 'Report', 'RevisedRow_id'),
			'reports' => array(self::HAS_MANY, 'Report', 'RevisedRow_id'),
			'reportComponents' => array(self::HAS_MANY, 'ReportComponent', 'Report_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Curriculum_id' => 'Curriculum',
			'Name' => 'Name',
			'PublishedDate' => 'Published Date',
			'Template' => 'Template',
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
		$criteria->compare('Curriculum_id',$this->Curriculum_id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('PublishedDate',$this->PublishedDate,true);
		$criteria->compare('Template',$this->Template,true);
		$criteria->compare('RevisedRow_id',$this->RevisedRow_id,true);
		$criteria->compare('TippedStatus',$this->TippedStatus);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}