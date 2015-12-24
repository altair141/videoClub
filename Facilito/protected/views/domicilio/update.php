<?php
/* @var $this DomicilioController */
/* @var $model Domicilio */

$this->breadcrumbs=array(
	'Domicilios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Domicilio', 'url'=>array('index')),
	array('label'=>'Create Domicilio', 'url'=>array('create')),
	array('label'=>'View Domicilio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Domicilio', 'url'=>array('admin')),
);
?>

<h1>Update Domicilio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>