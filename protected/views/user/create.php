<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
      	'Người dùng'=>array('index'),
	'Thêm mới',
);
//
//$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
//	array('label'=>'Manage User', 'url'=>array('admin')),
//);
?>



<script language='javascript'>

jQuery('document').ready(function() {
    function checkExistAccount(){
        if(jQuery("#User_username").val()!='')
        {
            jQuery.ajax({
                type: "POST",
                data: "username="+$(this).val(),
                url: "<?php echo $this->createUrl("user/usernameExists");?>",
                beforeSend: function(){
                    jQuery("#check_account").html("Kiểm tra tài khoản"); //show checking or loading image
                },
                success: function(data){
                    if(data != "0")
                    {
                        jQuery("#check_account").html("Tài khoản đã tồn tại");
                        jQuery("#input_username").addClass('error');                      
                        return false;
                    }
                    else
                    {
                        jQuery("#check_account").html("Hợp lệ");
                        jQuery("#input_username").addClass('success');      
                        return true;
                    }
                }
            });
        }
    }    
    
    jQuery("#User_username").blur(checkExistAccount);
});


</script>


<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/pages/calendar.css" rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/Slate.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/_myjs/calendar.js"></script>



<div class="row">			
    <div class="span8">	      		
        <div id="horizontal" class="widget widget-form">	      			
            <div class="widget-header">	      				
                <h3>
                    <i class="icon-pencil"></i>
                    Thêm người dùng mới	      					
                </h3>	
            </div> <!-- /widget-header -->

            <div class="widget-content">
                
                
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'user-form',
                    'enableClientValidation'=>FALSE,
                    'enableAjaxValidation'=>FALSE,
                    'htmlOptions' => array('enctype' => 'multipart/form-data',
                                            'class' => "form-horizontal"),
                )); ?>
<!--                 <div class="alert alert-block">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                     <h4 class="alert-heading">Validation Example!</h4> 
                    <?php echo $form->errorSummary($model); ?>
                    <?php echo $form->error($model,'username'); ?>
                    <?php echo $form->error($model,'password'); ?>
                    <?php echo $form->error($profileModel,'full_name'); ?>
                    <?php echo $form->error($profileModel,'dob'); ?>
                    <?php echo $form->error($profileModel,'gender'); ?>
                </div>-->
                
                
                <fieldset>
                  <div id="input_username" class="control-group">
                    <label class="control-label" for="input01">
                        <?php echo $form->labelEx($model,'username'); ?>                       
                    </label>
                    <div class="controls">
                      <?php 
                        echo $form->textField($model,'username',array('class'=>'input-large'));                       
                      ?>                    
                       <div id="check_account" class="help-inline"></div>
                    </div>
                  </div> 
                 
                  <div id="input_password" class="control-group">
                    <label class="control-label" for="input01">                      
                        <?php echo $form->labelEx($model,'password'); ?>
                    </label>
                    <div class="controls">
                        <?php echo $form->passwordField($model,'password',array( 'class'=>'input-large')); ?>                                           
                    </div>
                  </div>
                    
                  <div id="input_password_repeat" class="control-group">
                    <label class="control-label" for="input01">                      
                        Nhập lại mật khẩu *
                    </label>
                    <div class="controls">
                        <?php echo CHtml::passwordField('password_repeat','', array('class'=>'input-large')); ?>                                           
                    </div>
                  </div>
                    
                  <div id="input_fullname" class="control-group">
                    <label class="control-label" for="input01">                        
                        <?php echo $form->labelEx($profileModel,'full_name'); ?>
                    </label>
                    <div class="controls">
                      <?php echo $form->textField($profileModel,'full_name',array('class'=>'input-large')); ?>                                         
                    </div>
                  </div>  
                    
                <div id="input_dob" class="control-group">
                    <label class="control-label" for="input01">                        
                        <?php echo $form->labelEx($profileModel,'dob'); ?>
                    </label>
                    <div class="controls">
                      
                      <?php echo $form->textField($profileModel,'dob',array('placeholder'=>'Chọn ngày sinh','class'=>'input-large datepicker')); ?>                                         
                    </div>
                  </div>
                
                  <div id="input_gender" class="control-group">
                    <label class="control-label" for="select01"><?php echo $form->labelEx($profileModel,'gender'); ?></label>
                    <div class="controls">
                      <?php echo $form->dropdownlist($profileModel,'gender',array(1=>'nam',0=>'nữ')); ?>                    
                    </div>
                  </div>
		
                   <div id="input_email" class="control-group">
                    <label class="control-label" for="input01">                        
                        <?php echo $form->labelEx($profileModel,'email'); ?>
                    </label>
                    <div class="controls">                    
                      <?php echo $form->textField($profileModel,'email',array('class'=>'input-large')); ?>     
                        <?php echo $form->error($profileModel,'email'); ?>
                    </div>
                  </div>
		
                 <div id="input_phone" class="control-group">
                    <label class="control-label" for="input01">                        
                         <?php echo $form->labelEx($profileModel,'phone'); ?>
                    </label>
                    <div class="controls">                    
                      <?php echo $form->textField($profileModel,'phone',array('class'=>'input-large')); ?>     
                      <?php echo $form->error($profileModel,'phone'); ?>
                    </div>
                  </div>
                    
                 <div id="input_note" class="control-group">
                    <label class="control-label" for="textarea"><?php echo $form->labelEx($profileModel,'note'); ?></label>
                    <div class="controls">                      
                      <?php echo $form->textArea($profileModel,'note',array('class'=>'input-large', 'row'=>'3')); ?>
                        <?php echo $form->error($profileModel,'note'); ?>
                    </div>
                  </div>
                    
                  <div id="input_group" class="control-group">
                    <label class="control-label" for="select01"><?php echo $form->labelEx($model,'group_id'); ?></label>
                    <div class="controls">
                      <?php echo $form->dropdownlist($model,'group_id',  CHtml::listData($groupModel, 'id', 'name')); ?>
                      <?php echo $form->error($model,'group_id'); ?>
                                 
                    </div>
                  </div>
                    
                  <div id="input_avatar" class="control-group">
                    <label class="control-label" for="fileInput"><?php echo $form->labelEx($profileModel,'avatar'); ?></label>
                    <div class="controls">
                      
                      <?php echo CHtml::activeFileField($profileModel,'avatar', array('class'=>'input-file')); ?>
                      <?php echo $form->error($profileModel,'avatar'); ?>
                    </div>
                  </div>                  
                                    
                  <div id="input_submitbtn" class="form-actions">                      
                     <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại', array('class'=>'btn btn-primary', 'onClick'=>'checkExistAccount')); ?>                    
                    <button class="btn">Cancel</button>
                  </div>
                </fieldset>
                <?php $this->endWidget(); ?>
            </div> <!-- /widget-content -->						
        </div>
    </div> <!-- /span8 -->		    

<!--    <div class="span4">

        <div id="formToc" class="widget highlight">
            <div class="widget-header">
                    <h3>Flexible HTML and CSS</h3>		    			
            </div>  /widget-header 

            <div class="widget-content">
                <p>The best part about forms in Bootstrap is that all your inputs and controls look great no matter how you build them in your markup. No superfluous HTML is required, but we provide the patterns for those who require it.</p>

                <br>

                <p>Bootstrap's forms include styles for all the base form controls like input, textarea, and select you'd expect. But it also comes with a number of custom components like appended and prepended inputs and support for lists of checkboxes.</p>
            </div>  /widget-content 
        </div>  /widget 
    </div>  /.span4 -->
</div> <!-- /row -->
		




