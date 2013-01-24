<?php
/* @var $this ProductItemController */
/* @var $model ProductItem */

$this->breadcrumbs=array(
	'Product Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductItem', 'url'=>array('index')),
	array('label'=>'Create ProductItem', 'url'=>array('create')),
	array('label'=>'Update ProductItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductItem', 'url'=>array('admin')),
);
?>

<h1>View ProductItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'name',
		'code',
		'image',
		'brief',
		'description',
		'related_url',
		'price',
		'unit',
		'quantity',
		'created_dt',
		'last_modified_dt',
		'created_user_id',
		'last_modified_user_id',
		'is_active',
	),
)); ?>
