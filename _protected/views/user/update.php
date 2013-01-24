<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>Sửa người dùng <i><?php echo $model->username; ?></i></h2>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
        'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($profileModel,'full_name'); ?>
		<?php echo $form->textField($profileModel,'full_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($profileModel,'full_name'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($profileModel,'dob'); ?>
		<?php echo $form->textField($profileModel,'dob',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($profileModel,'dob'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($profileModel,'gender'); ?>
		<?php echo $form->dropdownlist($profileModel,'gender',array(1=>'nam',0=>'nữ')); ?>
		<?php echo $form->error($profileModel,'gender'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($profileModel,'email'); ?>
		<?php echo $form->textField($profileModel,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($profileModel,'email'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($profileModel,'phone'); ?>
		<?php echo $form->textField($profileModel,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($profileModel,'phone'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($profileModel,'note'); ?>
		<?php echo $form->textArea($profileModel,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($profileModel,'dob'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->dropdownlist($model,'group_id',  CHtml::listData($groupModel, 'id', 'name')); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>
        
         <div class="row">
		<?php echo $form->labelEx($profileModel,'avatar'); ?>
		<?php echo CHtml::activeFileField($profileModel,'avatar'); ?>
             <div><?=CHtml::image($profileModel->avatar, $model->username, array('style'=>'width:200px; margin-top: 10px; margin-bottom: 10px'))?></div>
		<?php echo $form->error($profileModel,'avatar'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Cập nhật', array('class'=>'btn btn-primary')); ?>
                <?php echo CHtml::link('Quay lại', array('index'), array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>