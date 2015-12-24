<?php
/* @var $this PeliculaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Peliculas',
);

$this->menu=array(
	array('label'=>'Create Pelicula', 'url'=>array('create')),
	array('label'=>'Manage Pelicula', 'url'=>array('admin')),
);
?>

<h1>Peliculas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
