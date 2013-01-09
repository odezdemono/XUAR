<?php
/* @var $this PersonController */
/* @var $data Person */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstName')); ?>:</b>
	<?php echo CHtml::encode($data->FirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MiddleName')); ?>:</b>
	<?php echo CHtml::encode($data->MiddleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastName')); ?>:</b>
	<?php echo CHtml::encode($data->LastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sex')); ?>:</b>
	<?php echo CHtml::encode($data->Sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BirthDate')); ?>:</b>
	<?php echo CHtml::encode($data->BirthDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BirthPlace')); ?>:</b>
	<?php echo CHtml::encode($data->BirthPlace); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RevisedRow_id')); ?>:</b>
	<?php echo CHtml::encode($data->RevisedRow_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TippedStatus')); ?>:</b>
	<?php echo CHtml::encode($data->TippedStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DeletedStatus')); ?>:</b>
	<?php echo CHtml::encode($data->DeletedStatus); ?>
	<br />

	*/ ?>

</div>