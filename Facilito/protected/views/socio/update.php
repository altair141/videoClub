<?php
/* @var $this SocioController */
/* @var $model Socio */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Socio', 'url'=>array('index')),
	array('label'=>'Create Socio', 'url'=>array('create')),
	array('label'=>'View Socio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Socio', 'url'=>array('admin')),
);
?>

<h1>Update Socio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>