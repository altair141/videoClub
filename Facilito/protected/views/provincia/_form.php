<?php
/* @var $this ProvinciaController */
/* @var $model Provincia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provincia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreProvincia'); ?>
		<?php echo $form->textField($model,'nombreProvincia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreProvincia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comunaid'); ?>
		<?php echo $form->textField($model,'comunaid'); ?>
		<?php echo $form->error($model,'comunaid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->