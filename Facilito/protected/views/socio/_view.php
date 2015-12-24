<?php
/* @var $this SocioController */
/* @var $data Socio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::encode($data->rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoIdentificado')); ?>:</b>
	<?php echo CHtml::encode($data->codigoIdentificado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personaid')); ?>:</b>
	<?php echo CHtml::encode($data->personaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->nombreUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($data->clave); ?>
	<br />


</div>