<?php
/* @var $this PrestamoController */
/* @var $data Prestamo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaPrestamo')); ?>:</b>
	<?php echo CHtml::encode($data->fechaPrestamo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaDevolucion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaDevolucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('socioid')); ?>:</b>
	<?php echo CHtml::encode($data->socioid); ?>
	<br />


</div>