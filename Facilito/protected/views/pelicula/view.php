<?php
/* @var $this PeliculaController */
/* @var $model Pelicula */

$this->breadcrumbs=array(
	'Peliculas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pelicula', 'url'=>array('index')),
	array('label'=>'Create Pelicula', 'url'=>array('create')),
	array('label'=>'Update Pelicula', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pelicula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pelicula', 'url'=>array('admin')),
);
?>

<h1>View Pelicula #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombrePelicula',
		'precio',
		'estado',
		'duracionMinutos',
	),
)); ?>
