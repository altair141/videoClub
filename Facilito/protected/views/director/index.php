<?php
/* @var $this DirectorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directors',
);

$this->menu=array(
	array('label'=>'Create Director', 'url'=>array('create')),
	array('label'=>'Manage Director', 'url'=>array('admin')),
);
?>

<h1>Directors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
