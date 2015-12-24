<?php
/* @var $this DirectorController */
/* @var $model Director */

$this->breadcrumbs=array(
	'Directors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Director', 'url'=>array('index')),
	array('label'=>'Manage Director', 'url'=>array('admin')),
);
?>

<h1>Create Director</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>