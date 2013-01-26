<?php

class UserController extends Controller
{
    /**
     * Validate against authorised access
     * User have to log in to access this page
     */
    public function init() {
        if (!isset($_SESSION['nc_usn'])) {
            $this->redirect($this->createUrl("site/login"));
        }        
    }
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
//	public function accessRules()
//	{
////		return array(
//////			array('allow',  // allow all users to perform 'index' and 'view' actions
//////				'actions'=>array('index','view'),
//////				'users'=>array('*'),
//////			),
//////			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//////				'actions'=>array('create','update'),
//////				'users'=>array('@'),
//////			),
//////			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//////				'actions'=>array('admin','delete'),
//////				'users'=>array('admin'),
//////			),
//////			array('deny',  // deny all users
//////				'users'=>array('*'),
//////			),
////		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{            
            $model = $this->loadModel($id);
            $this->pageTitle = Yii::app()->name." :: Xem thông tin người dùng ".$model->username;
            $model->profile->gender = ($model->profile->gender == 1)?"nam":"nữ";
            $model->profile->is_active = ($model->profile->is_active == 1)?"có":"không";
            $avatar = MY_AVATAR_DIR.$model->profile->avatar;
            $model->profile->avatar = ($model->profile->avatar == "" || !file_exists($avatar))? MY_AVATAR_DIR.'default.jpg' :  $avatar;
		$this->render('view',array(
                    'model'=> $model,
                    'profile'=> $model->profile,
                    'group'=> $model->group                        
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            Yii::app()->getClientScript()->registerCoreScript('yii');
            $this->pageTitle = Yii::app()->name." :: Thêm người dùng mới";
		$model=new User;
                $profileModel = new UserProfile;                
                $groupModel = UserGroup::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
                $this->performAjaxValidation($profileModel);
		
                if(isset($_POST['User']) && isset($_POST['UserProfile']))
		{
                    $model->attributes=$_POST['User'];
                    $model->password = md5($_POST['User']['password']);
////                    if($model->save()) {
////                        $profileModel->user_id = $model->id;
////                        $profileModel->attributes = $_POST['UserProfile'];
////                        $avatar = CUploadedFile::getInstance($profileModel, 'avatar');
////                        //var_dump($avatar);                  
//////                        if (is_object($avatar) && (get_class($avatar)==='CUploadedFile')) {
//////                            $ext = substr($avatar->getName(),strrpos($avatar->getName(), '.', 0)+1);
//////                            $savedName = md5($model->id."-".$model->username).".".$ext;
//////                            $savedLocation = MY_AVATAR_DIR.$savedName;
//////                            $avatar->saveAs($savedLocation);
//////                            $profileModel->avatar = $savedName;    
//////                        }                        
//////                        if ($profileModel->save()) {
//////                            Yii::app()->user->setFlash("success","Thêm mới thành công");
//////                            $this->redirect(array('view','id'=>$model->id));  
//////                        }
//////                        else {
//////                            $model->delete();
//////                            //$this->redirect(array('create'));  
////                        }                            
//                    }                    
		}               

		$this->render('create',array(
                    'model'=>$model,
                    'profileModel' => $profileModel,
                    'groupModel' => $groupModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);
            $profileModel = $model->profile;
            $avatar = MY_AVATAR_DIR.$model->profile->avatar;
            $model->profile->avatar = ($model->profile->avatar == "" || !file_exists($avatar))? MY_AVATAR_DIR.'default.jpg' :  $avatar;
            $groupModel = UserGroup::model()->findAll();

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['User']) && isset($_POST['UserProfile']))
            {
                $model->attributes=$_POST['User'];
                if($model->save()) {
                    $profileModel->user_id = $model->id;
                    $profileModel->attributes = $_POST['UserProfile']; 
                    
                    $avatar = CUploadedFile::getInstance($profileModel, 'avatar');
                        //var_dump($avatar);                  
                    if (is_object($avatar) && (get_class($avatar)==='CUploadedFile')) {
                        $ext = substr($avatar->getName(),strrpos($avatar->getName(), '.', 0)+1);
                        $savedName = md5($model->id."-".$model->username).".".$ext;
                        $savedLocation = MY_AVATAR_DIR.$savedName;
                        $avatar->saveAs($savedLocation);
                        $profileModel->avatar = $savedName;    
                    } 

                    if ($profileModel->save())
                        $this->redirect(array('view','id'=>$model->id));                            
                }
            }

            $this->render('update',array(
                    'model'=>$model,
                    'profileModel'=>$profileModel,
                    'groupModel'=>$groupModel
            ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            $user = $this->loadModel($id);
            $user->delete();
            $user->profile->delete();                

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            Yii::app()->getClientScript()->registerCoreScript('yii');
//            $model = User::model()->findAll();
//            $this->render('list',array(
//                'model'=> $model,
//            ));	
            $criteria=new CDbCriteria();
            $count=User::model()->count($criteria);
            $pages=new CPagination($count);

            // results per page
            $pages->pageSize=5;
            $pages->applyLimit($criteria);
            $model=User::model()->findAll($criteria);

            $this->render('index', array(
                'model' => $model,
                'pages' => $pages
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
            $model=User::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionPasswd($id) {
            $model = $this->loadModel($id);
            
            if (isset($_POST['currentPwd'])) {
                if(md5($_POST['currentPwd'])!=$model->password) {
                    
                    return false;
                    Yii::app()->end();
                }
                else {
                    $model->password = md5($_POST['newPwd']);
                    $model->save();
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
            
            $this->render('passwd',array(
			'model'=>$model,
		)); 
        }
        
        public function actionList() {
            $model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
            
            // $model = User::model()->findAll();
            $this->render('list',array(
                'model'=> $model,
            ));	
        }
        
        public function actionUsernameExists() {
            if(isset($_POST['username']))
            {
                $username = trim($_POST['username']);
//                $data_hostname = PortalCustomerDomains::model()->findByAttributes(array('customer_id'=>$this->customer_id));
//                $account_name = '$'.$data_hostname->hostname.'$'.$account;
//                $model = PortalCustomerAccounts::model()->findByAttributes(array('account_name'=>$account_name));
//                return $exists = User::model()->exists("username = '".$username."'");
                $model = User::model()->findByAttributes(array('username'=>$username));
                if(count($model)>0)
                {
                    echo "1";
                }
                else
                {
                    echo "0";
                }
            }
        }
}