<?php
/* @var $this PrestamoController */
/* @var $model Prestamo */

$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Prestamo', 'url'=>array('index')),
	array('label'=>'Create Prestamo', 'url'=>array('create')),
	array('label'=>'Update Prestamo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Prestamo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prestamo', 'url'=>array('admin')),
);
?>

<h1>View Prestamo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fechaPrestamo',
		'fechaDevolucion',
		'socioid',
	),
)); ?>
