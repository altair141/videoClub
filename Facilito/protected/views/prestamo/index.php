<?php
/* @var $this PrestamoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prestamos',
);

$this->menu=array(
	array('label'=>'Create Prestamo', 'url'=>array('create')),
	array('label'=>'Manage Prestamo', 'url'=>array('admin')),
);
?>

<h1>Prestamos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
