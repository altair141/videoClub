<?php
/* @var $this DomicilioController */
/* @var $model Domicilio */

$this->breadcrumbs=array(
	'Domicilios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Domicilio', 'url'=>array('index')),
	array('label'=>'Manage Domicilio', 'url'=>array('admin')),
);
?>

<h1>Create Domicilio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>