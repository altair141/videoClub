<?php
/* @var $this ComunaController */
/* @var $model Comuna */

$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comuna', 'url'=>array('index')),
	array('label'=>'Create Comuna', 'url'=>array('create')),
	array('label'=>'View Comuna', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comuna', 'url'=>array('admin')),
);
?>

<h1>Update Comuna <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>