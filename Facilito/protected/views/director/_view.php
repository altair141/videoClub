<?php
/* @var $this DirectorController */
/* @var $data Director */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personaid')); ?>:</b>
	<?php echo CHtml::encode($data->personaid); ?>
	<br />


</div>