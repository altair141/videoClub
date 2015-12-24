<?php
/* @var $this DomicilioController */
/* @var $model Domicilio */

$this->breadcrumbs=array(
	'Domicilios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Domicilio', 'url'=>array('index')),
	array('label'=>'Create Domicilio', 'url'=>array('create')),
	array('label'=>'Update Domicilio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Domicilio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Domicilio', 'url'=>array('admin')),
);
?>

<h1>View Domicilio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'direccion',
		'ciudad',
		'regionid',
		'personaid',
	),
)); ?>
