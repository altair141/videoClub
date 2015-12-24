<?php
/* @var $this SocioController */
/* @var $model Socio */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Socio', 'url'=>array('index')),
	array('label'=>'Create Socio', 'url'=>array('create')),
	array('label'=>'Update Socio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Socio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Socio', 'url'=>array('admin')),
);
?>

<h1>View Socio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rut',
		'activo',
		'codigoIdentificado',
		'personaid',
		'nombreUsuario',
		'clave',
	),
)); ?>
