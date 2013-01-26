<?php
/* @var $this ProductItemController */
/* @var $model ProductItem */

$this->breadcrumbs=array(
	'Product Items'=>array('index'),
	'Thêm sản phẩm',
);

$this->menu=array(
	array('label'=>'List ProductItem', 'url'=>array('index')),
	array('label'=>'Manage ProductItem', 'url'=>array('admin')),
);
?>

<h1>Create ProductItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>