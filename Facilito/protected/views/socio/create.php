<?php
/* @var $this SocioController */
/* @var $model Socio */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Socio', 'url'=>array('index')),
	array('label'=>'Manage Socio', 'url'=>array('admin')),
);
?>

<h1>Create Socio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>