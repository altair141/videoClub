<?php
/* @var $this DirectorController */
/* @var $model Director */

$this->breadcrumbs=array(
	'Directors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Director', 'url'=>array('index')),
	array('label'=>'Create Director', 'url'=>array('create')),
	array('label'=>'View Director', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Director', 'url'=>array('admin')),
);
?>

<h1>Update Director <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>