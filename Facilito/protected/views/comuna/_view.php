<?php
/* @var $this ComunaController */
/* @var $data Comuna */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreComuna')); ?>:</b>
	<?php echo CHtml::encode($data->nombreComuna); ?>
	<br />


</div>