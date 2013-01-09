<?php

/**
 * This is the model class for table "material_vs_time".
 *
 * The followings are the available columns in table 'material_vs_time':
 * @property string $id
 * @property string $UsedMaterial_id
 * @property string $LectureUnitOccurrence_id
 * @property integer $DeletedStatus
 *
 * The followings are the available model relations:
 * @property UsedMaterialInLectureUnit $usedMaterial
 * @property LectureUnitOccurrence $lectureUnitOccurrence
 */
class MaterialVsTime extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MaterialVsTime the static model class
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
		return 'material_vs_time';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UsedMaterial_id, LectureUnitOccurrence_id, DeletedStatus', 'required'),
			array('DeletedStatus', 'numerical', 'integerOnly'=>true),
			array('UsedMaterial_id, LectureUnitOccurrence_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, UsedMaterial_id, LectureUnitOccurrence_id, DeletedStatus', 'safe', 'on'=>'search'),
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
			'usedMaterial' => array(self::BELONGS_TO, 'UsedMaterialInLectureUnit', 'UsedMaterial_id'),
			'lectureUnitOccurrence' => array(self::BELONGS_TO, 'LectureUnitOccurrence', 'LectureUnitOccurrence_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'UsedMaterial_id' => 'Used Material',
			'LectureUnitOccurrence_id' => 'Lecture Unit Occurrence',
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
		$criteria->compare('UsedMaterial_id',$this->UsedMaterial_id,true);
		$criteria->compare('LectureUnitOccurrence_id',$this->LectureUnitOccurrence_id,true);
		$criteria->compare('DeletedStatus',$this->DeletedStatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}