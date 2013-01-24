<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<h2>Thay đổi mật khẩu người dùng <i><?php echo $model->username; ?></i></h2>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		Mật khẩu hiện tại
		<?=CHtml::passwordField('currentPwd');?>
	</div>
        
        <div class="row">
            Mật khẩu mới
            <?=CHtml::passwordField('newPwd');?>
	</div>
        
        <div class="row">
            Nhắc lại mật khẩu mới
            <?=CHtml::passwordField('newPwdConfirm');?>
	</div>
        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Cập nhật', array('class'=>'btn btn-primary')); ?>
                <?php echo CHtml::link('Quay lại', array('update', 'id'=>$model->id), array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

        