<?php
/* @var $this PrestamoController */
/* @var $model Prestamo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prestamo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaPrestamo'); ?>
		<?php echo $form->textField($model,'fechaPrestamo'); ?>
		<?php echo $form->error($model,'fechaPrestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaDevolucion'); ?>
		<?php echo $form->textField($model,'fechaDevolucion'); ?>
		<?php echo $form->error($model,'fechaDevolucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'socioid'); ?>
		<?php echo $form->textField($model,'socioid'); ?>
		<?php echo $form->error($model,'socioid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->