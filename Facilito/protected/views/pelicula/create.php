<?php
/* @var $this PeliculaController */
/* @var $model Pelicula */

$this->breadcrumbs=array(
	'Peliculas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pelicula', 'url'=>array('index')),
	array('label'=>'Manage Pelicula', 'url'=>array('admin')),
);
?>

<h1>Create Pelicula</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>