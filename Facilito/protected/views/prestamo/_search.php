<?php
/* @var $this PrestamoController */
/* @var $model Prestamo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaPrestamo'); ?>
		<?php echo $form->textField($model,'fechaPrestamo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaDevolucion'); ?>
		<?php echo $form->textField($model,'fechaDevolucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'socioid'); ?>
		<?php echo $form->textField($model,'socioid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->