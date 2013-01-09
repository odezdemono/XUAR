<?php
abstract class PersonActiveRecord extends CActiveRecord
{
	protected function beforeValidate()
	{
		if ($this->isNewRecord)
		{
			$this->RevisedRow_id = NULL;
			$this->TippedStatus = 1;
			$this->DeletedStatus = 0;
		}
		else
		{
			$this->TippedStatus = 1;
			$this->DeletedStatus = 0;
		}
		return parent::beforeValidate();
	}
	
	/*protected function beforeDelete()
	{
		$this->DeletedStatus = 1;
		return parent::beforeDelete();
	}*/
	
}
?>