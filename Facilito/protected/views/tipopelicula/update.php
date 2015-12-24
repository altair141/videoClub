<?php
/* @var $this TipopeliculaController */
/* @var $model Tipopelicula */

$this->breadcrumbs=array(
	'Tipopeliculas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipopelicula', 'url'=>array('index')),
	array('label'=>'Create Tipopelicula', 'url'=>array('create')),
	array('label'=>'View Tipopelicula', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipopelicula', 'url'=>array('admin')),
);
?>

<h1>Update Tipopelicula <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>