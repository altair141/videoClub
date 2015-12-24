<?php
/* @var $this TipopeliculaController */
/* @var $model Tipopelicula */

$this->breadcrumbs=array(
	'Tipopeliculas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipopelicula', 'url'=>array('index')),
	array('label'=>'Manage Tipopelicula', 'url'=>array('admin')),
);
?>

<h1>Create Tipopelicula</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>