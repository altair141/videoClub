<?php
/* @var $this PrestamoController */
/* @var $model Prestamo */

$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prestamo', 'url'=>array('index')),
	array('label'=>'Manage Prestamo', 'url'=>array('admin')),
);
?>

<h1>Create Prestamo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>