<?php
/* @var $this DomicilioController */
/* @var $data Domicilio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regionid')); ?>:</b>
	<?php echo CHtml::encode($data->regionid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personaid')); ?>:</b>
	<?php echo CHtml::encode($data->personaid); ?>
	<br />


</div>