<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Styles -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/bootstrap-overrides.css" rel="stylesheet">

<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/datatables/DT_bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/responsive-tables/responsive-tables.css" rel="stylesheet"> 

<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/slate.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/slate-responsive.css" rel="stylesheet">

<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/css/pages/dashboard.css" rel="stylesheet">


<!-- Javascript -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/bootstrap.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/Slate.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/excanvas/excanvas.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/flot/jquery.flot.resize.js"></script>
<!--
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/demos/charts/bar.js"></script>-->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/datatables/DT_bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/plugins/responsive-tables/responsive-tables.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/js/test.js"></script>



<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="../../../html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<!---- CUSTOM JS & CSS -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/_mystyle/mycss.css" rel="stylesheet">
<!---- CUSTOM JS & CSS -->


</head>

<body>
 	
  	
<div id="header">
	
	<div class="container">			
		
                    <h1><?=CHtml::link("CKP", array("site/index"))?>'></h1>			
		
		<div id="info">				
			
			<a href="javascript:;" id="info-trigger">
				<i class="icon-cog"></i>
			</a>
			
			<div id="info-menu">
				
				<div class="info-details">
				
					<p>
                                            Xin chào <b><?=$_SESSION['nc_usn']?> </b>
                                            <a href="<?=$this->createUrl('site/logout')?>">(Đăng xuất)</a>                                        
                                        </p>
					
					
					
				</div> <!-- /.info-details -->
				
				<div class="info-avatar">
					
<!--					<img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/slate/img/avatar.jpg" alt="avatar">-->
                                    <?php $model = User::model()->findByAttributes(array('username'=>$_SESSION['nc_usn']));
                                        $avatar = ($model->profile->avatar == "")?"default.jpg" : $model->profile->avatar;
                                    ?>
                                    <img src="<?php echo MY_AVATAR_DIR.$avatar;?>" alt="avatar">
					
				</div> <!-- /.info-avatar -->
				
			</div> <!-- /#info-menu -->
			
		</div> <!-- /#info -->
		
	</div> <!-- /.container -->

</div> <!-- /#header -->


<div id="nav">
		
	<div class="container">
		
		<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<i class="icon-reorder"></i>
      	</a>
		
		<div class="nav-collapse">
			
			<ul class="nav">
		
				<li class="nav-icon active">
					<a href='<?=$this->createUrl("site/index")?>'>
						<i class="icon-home"></i>
						<span>Home</span>
					</a>	    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th"></i>
						Quản lý hệ thống
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                                            <li class="dropdown"><a href="<?php echo $this->createUrl("user/"); ?>">
                                                Người dùng
                                                <i class="icon-chevron-right sub-menu-caret"></i>
                                                </a>
                                                
                                            <ul class="dropdown-menu sub-menu">
                                                <li><a href="<?php echo $this->createUrl("user/create"); ?>">
                                                Thêm người dùng</a></li>
                                                
                                            </ul>
                                            
                                            </li>
                                            <li class="dropdown"><a href="<?php echo $this->createUrl("userGroup/"); ?>">
                                                Nhóm người dùng
                                                <i class="icon-chevron-right sub-menu-caret"></i>
                                                </a>
                                                <ul class="dropdown-menu sub-menu">
                                                <li><a href="<?php echo $this->createUrl("userGroup/create"); ?>">
                                                Thêm nhóm người dùng</a></li>
                                                
                                                </ul>                                            
                                            </li>
                                            <li class="dropdown"><a href="<?php echo $this->createUrl("productItem/"); ?>">
                                                Sản phẩm<i class="icon-chevron-right sub-menu-caret"></i></a>
                                            
                                                <ul class="dropdown-menu sub-menu">
                                                    <li><a href="<?php echo $this->createUrl("productItem/create"); ?>">
                                                    Thêm sản phẩm</a></li>

                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="<?php echo $this->createUrl("productCategory/"); ?>">
                                                Danh mục sản phẩm<i class="icon-chevron-right sub-menu-caret"></i></a>
                                            
                                                <ul class="dropdown-menu sub-menu">
                                                    <li><a href="<?php echo $this->createUrl("productCategory/create"); ?>">
                                                    Thêm danh mục sản phẩm</a></li>

                                                </ul>
                                            </li>                                                
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-copy"></i>
						Sample Pages
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="invoice.html">Invoice</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="pricing.html">Pricing Plans</a></li>
						<li><a href="gallery.html">Image Gallery</a></li>
						<li><a href="wizard.html">Wizard</a></li>
						<li><a href="reports.html">Reports</a></li>
						<li><a href="calendar.html">Calendar</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-external-link"></i>
						Other Pages
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li><a href="login.html">Login</a></li>
						<li><a href="signup.html">Signup</a></li>
						<li><a href="error.html">Error</a></li>
						<li class="dropdown">
							<a href="javascript:;">
								Dropdown Menu									
								<i class="icon-chevron-right sub-menu-caret"></i>
							</a>
							
							<ul class="dropdown-menu sub-menu">
		                        <li><a href="javascript:;">Dropdown #1</a></li>
		                        <li><a href="javascript:;">Dropdown #2</a></li>
		                        <li><a href="javascript:;">Dropdown #3</a></li>
		                        <li><a href="javascript:;">Dropdown #4</a></li>
		                    </ul>
						</li>
					</ul>    				
				</li>
				
				
			
			</ul>
			
			
			<ul class="nav pull-right">
		
				<li class="">
					<form class="navbar-search pull-left">
						<input type="text" class="search-query" placeholder="Search">
						<button class="search-btn"><i class="icon-search"></i></button>
					</form>	    				
				</li>
				
			</ul>
			
		</div> <!-- /.nav-collapse -->
		
	</div> <!-- /.container -->
	
</div> <!-- /#nav -->


<div id="content">
		
	<div class="container">
           
            <div id="page-title" class="clearfix">			
                 <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink' => CHtml::link('Trang chủ', Yii::app()->homeUrl),
                        'links'=>$this->breadcrumbs,
                        'separator'=> " / ",
                    ));
                    ?>
            </div> <!-- /.page-title -->
            <?php echo $content; ?>
	</div> <!-- /.container -->
	
</div> <!-- /#content -->



<div id="footer">	
		
	<div class="container">
		
		&copy; 2013 New Creation JSC
		
	</div> <!-- /.container -->		
	
</div> <!-- /#footer -->





  </body>
</html>
