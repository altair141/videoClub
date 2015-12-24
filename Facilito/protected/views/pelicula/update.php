<?php
/* @var $this PeliculaController */
/* @var $model Pelicula */

$this->breadcrumbs=array(
	'Peliculas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pelicula', 'url'=>array('index')),
	array('label'=>'Create Pelicula', 'url'=>array('create')),
	array('label'=>'View Pelicula', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pelicula', 'url'=>array('admin')),
);
?>

<h1>Update Pelicula <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>