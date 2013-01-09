<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'person-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MiddleName'); ?>
		<?php echo $form->textField($model,'MiddleName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'MiddleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sex'); ?>
		<?php echo $form->dropDownList($model,'Sex',array(''=>'Pilih Jenis Kelamin',0=>'Perempuan',1=>'Laki-laki')); ?>
		<?php echo $form->error($model,'Sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BirthDate'); ?>
		<?php //echo $form->textField($model,'BirthDate'); ?>
		<?php echo $this->widget('CJuiDateTimePicker', array(
																													'model'			=> $model,
																													'attribute'	=> 'BirthDate',
																													'mode'			=> 'date',
																													'language'	=> 'id',
																													'options'		=> array(
																																								'dateFormat'	=> 'yy/mm/dd',
																																								'altFormat'		=> 'dd/mm/yy',
																																								'changeMonth' => 'true',	
																																								'changeYear' 	=> 'true', 
																																								'yearRange'  	=> '-20:+0',
																																								'showAnim' 	 	=> 'fold',
																																							),
																												),
															true
														); ?>
		<?php echo $form->error($model,'BirthDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BirthPlace'); ?>
		<?php echo $form->textField($model,'BirthPlace',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'BirthPlace'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'RevisedRow_id'); ?>
		<?php echo $form->textField($model,'RevisedRow_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'RevisedRow_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TippedStatus'); ?>
		<?php echo $form->textField($model,'TippedStatus'); ?>
		<?php echo $form->error($model,'TippedStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DeletedStatus'); ?>
		<?php echo $form->textField($model,'DeletedStatus'); ?>
		<?php echo $form->error($model,'DeletedStatus'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->