<?php
/* @var $this ProductItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Items',
);

$this->menu=array(
	array('label'=>'Create ProductItem', 'url'=>array('create')),
	array('label'=>'Manage ProductItem', 'url'=>array('admin')),
);
?>

<h1>Product Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
