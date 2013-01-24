<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>
<div style="margin-left: 50px;">
<h2>Thêm người dùng mới</h2>

<div class="form">

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
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
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
		<?php echo $form->error($profileModel,'note'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->dropdownlist($model,'group_id',  CHtml::listData($groupModel, 'id', 'name')); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($profileModel,'avatar'); ?>
		<?php echo CHtml::activeFileField($profileModel,'avatar'); ?>
		<?php echo $form->error($profileModel,'avatar'); ?>
	</div>
        <br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>