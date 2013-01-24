<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CKP::Đăng nhập vào hệ thống</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">   
    
    <!-- Styles -->
    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/bootstrap-overrides.css" rel="stylesheet">
    
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/slate.css" rel="stylesheet">
    
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/components/signin.css" rel="stylesheet" type="text/css">   
    
    
    <!-- Javascript -->
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/jquery-ui-1.8.18.custom.min.js"></script>    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/demos/signin.js"></script>


</head>

<body>



<div class="account-container login">
	 <?php echo $content; ?>
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
    Quay lại <?=CHtml::link("Trang chủ", array("users/index"))?><br/>
    <?=CHtml::link("Quên mật khẩu?", array("users/index"))?>
</div> <!-- /login-extra -->


</body>
</html>



