<?php
/* @var $this ProductItemController */
/* @var $model ProductItem */

$this->breadcrumbs=array(
	'Product Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductItem', 'url'=>array('index')),
	array('label'=>'Create ProductItem', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Items</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_id',
		'name',
		'code',
		'image',
		'brief',
		/*
		'description',
		'related_url',
		'related_video',
		'price',
		'unit',
		'quantity',
		'created_dt',
		'last_modified_dt',
		'created_user_id',
		'last_modified_user_id',
		'is_active',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
