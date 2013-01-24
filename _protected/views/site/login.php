<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
<div class="content clearfix">     

                <h1>Đăng nhập</h1>		

                <div class="login-fields">

                        <p>Nhập thông tin để đăng nhập:</p>

                        <div class="field">
                            <?php echo $form->labelEx($model, 'username'); ?>
                            <?php echo $form->textField($model, 'username', array('class' => 'login username-field')); ?>
                            <?php echo $form->error($model, 'username'); ?>
                        </div> <!-- /field -->

                        <div class="field">
                            <?php echo $form->labelEx($model,'password'); ?>
                            <?php echo $form->passwordField($model,'password', array('class'=>'login password-field')); ?>
                            <?php echo $form->error($model,'password'); ?>                              
                        </div> <!-- /password -->

                </div> <!-- /login-fields -->

                <div class="login-actions">

                        <span class="login-checkbox">
                            <?php echo $form->checkBox($model,'rememberMe', array('class'=>'field login-checkbox', 'id'=>'Field', 'tabindex'=>'4')); ?>
                            <?php echo $form->label($model,'rememberMe', array('class'=>'choice')); ?>
                            <?php echo $form->error($model,'rememberMe'); ?>
                                
                        </span>                        
                        <?php echo CHtml::submitButton('Đăng nhập', array('class'=>'button btn btn-secondary btn-large')); ?>

                </div> <!-- .actions -->

</div> <!-- /content -->
<?php $this->endWidget(); ?>
</div><!-- form -->