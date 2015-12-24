<?php
/* @var $this DomicilioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Domicilios',
);

$this->menu=array(
	array('label'=>'Create Domicilio', 'url'=>array('create')),
	array('label'=>'Manage Domicilio', 'url'=>array('admin')),
);
?>

<h1>Domicilios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
