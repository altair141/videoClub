<?php
/* @var $this TipopeliculaController */
/* @var $model Tipopelicula */

$this->breadcrumbs=array(
	'Tipopeliculas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tipopelicula', 'url'=>array('index')),
	array('label'=>'Create Tipopelicula', 'url'=>array('create')),
	array('label'=>'Update Tipopelicula', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tipopelicula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipopelicula', 'url'=>array('admin')),
);
?>

<h1>View Tipopelicula #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'categoria',
	),
)); ?>
