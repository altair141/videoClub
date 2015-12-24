<?php
/* @var $this ProvinciaController */
/* @var $data Provincia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreProvincia')); ?>:</b>
	<?php echo CHtml::encode($data->nombreProvincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comunaid')); ?>:</b>
	<?php echo CHtml::encode($data->comunaid); ?>
	<br />


</div>