<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h3>Thông tin chi tiết người dùng <?php echo $model->username; ?></h3>
<br />

<?php 

$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model, 
    'attributes'=>array(            
        'username',                
        'profile.full_name',
        'profile.gender',
        'profile.dob',
        'profile.email',
        'profile.phone',
        'profile.note',
        'group.name',
        'profile.is_active',
        'profile.avatar' =>
        array( 
            'name'=> 'Avatar',//$model->profile->attributeLabels['avatar'],
            'type'=>'raw',
            'value'=> CHtml::image( $model->profile->avatar, 
                                    $model->username, 
                                    array('style'=>'width:150px;')),
        ),	
    ),
)); 






?>



<br />
 <?=CHtml::link("Quay lại", array("index"), array('class'=>'btn btn-primary'))?> 
 <?=CHtml::link("Sửa thông tin", array("update", 'id'=>$model->id), array('class'=>'btn btn-primary'))?> 
 <?=CHtml::link("Đổi mật khẩu", array("passwd", 'id'=>$model->id), array('class'=>'btn btn-primary'))?> 
 <?=CHtml::link("Xóa", array("delete", 'id'=>$model->id), array('class'=>'btn btn-primary', 'onClick'=>' return confirm("Bạn có chắc muốn xóa?")'))?>
