<?php
/* @var $this TipopeliculaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipopeliculas',
);

$this->menu=array(
	array('label'=>'Create Tipopelicula', 'url'=>array('create')),
	array('label'=>'Manage Tipopelicula', 'url'=>array('admin')),
);
?>

<h1>Tipopeliculas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
