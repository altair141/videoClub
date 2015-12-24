<?php
/* @var $this DirectorController */
/* @var $model Director */

$this->breadcrumbs=array(
	'Directors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Director', 'url'=>array('index')),
	array('label'=>'Create Director', 'url'=>array('create')),
	array('label'=>'Update Director', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Director', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Director', 'url'=>array('admin')),
);
?>

<h1>View Director #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'personaid',
	),
)); ?>
