<?php
/* @var $this SocioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Socios',
);

$this->menu=array(
	array('label'=>'Create Socio', 'url'=>array('create')),
	array('label'=>'Manage Socio', 'url'=>array('admin')),
);
?>

<h1>Socios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
