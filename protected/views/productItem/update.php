<?php
/* @var $this ProductItemController */
/* @var $model ProductItem */

$this->breadcrumbs=array(
	'Product Items'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductItem', 'url'=>array('index')),
	array('label'=>'Create ProductItem', 'url'=>array('create')),
	array('label'=>'View ProductItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductItem', 'url'=>array('admin')),
);
?>

<h1>Update ProductItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>