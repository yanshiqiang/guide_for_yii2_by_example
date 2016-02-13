<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Statistics;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGender()
    {
	             $model=new Statistics();
                     $result=$model->getGender();
	             $data=$model->convert_json($result);
                     //var_dump($data);die;
		     $title=json_encode(array('text'=>'性别'));
	             return $this->render('pie',
							                                                                    ['jsondata'=>$data,'title'=>$title]
							                                                                   );
    }
	
    public function actionGrade()
    {
	             $model=new Statistics();
	             $result=$model->getGrade();
                     $data=$model->convert_json($result);
	             //var_dump($data);die;
		     $title=json_encode(array('text'=>'年级'));
	             return $this->render('histogram',
						                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                             					           );
    }	

    public function actionYear()
    {
                     $model=new Statistics();
                     $result=$model->getYear();
                     $data=$model->convert_json($result);
                     //var_dump($data);die();
		     $title=json_encode(array('text'=>'年龄'));
                     return $this->render('pie',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
   }
   
   public function actionCollege()
    {
                     $model=new Statistics();
                     $result=$model->getCollege();
                     $data=$model->convert_json($result);
                     //var_dump($data);die();
		     $title=json_encode(array('text'=>'学院'));
                     return $this->render('histogram',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
   } 

    public function actionMajor()
    {
                     $model=new Statistics();
                     $result=$model->getMajor();
                     $data=$model->convert_json($result);
                      //var_dump($data);die;
	  	     $title=json_encode(array('text'=>'专业'));
                     return $this->render('histogram',
							                                                                   ['jsondata'=>$data,'title'=>$title]
							                                                                  );
  }
	
    public function actionGenre()
    {
                     $model=new Statistics();
                     $result=$model->getGenre();
                     $data=$model->convert_json($result);
                     //var_dump($data);die;
		     $title=json_encode(array('text'=>'类型'));
                     return $this->render('pie',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
                       
  } 
                    
    public function actionArea()
    {
                    $model=new Statistics();
                    $result=$model->getProvince();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
	            $title=json_encode(array('text'=>'省市'));
                    return $this->render('histogram',
                                  					                                                    ['jsondata'=>$data,'title'=>$title]
                                                                           						   );
    }	
    public function actionNational()
    {
                    $model=new Statistics();
                    $result=$model->getNational();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'民族'));
                    return $this->render('histogram',
                                  						                                            ['jsondata'=>$data,'title'=>$title]
							                                                                   );
    }
    
    public function actionBirthday()
    {
                    $model=new Statistics();
                    $result=$model->getBirthday();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'生日分布'));
                    return $this->render('histogram',
                                   						                                            ['jsondata'=>$data,'title'=>$title]
							                                                                   );
    }
    public function actionAlumnus()
    {
                    $model=new Statistics();
                    $result=$model->getAlumnus();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'校友分布'));
                    return $this->render('histogram',
                                   						                                            ['jsondata'=>$data,'title'=>$title]
							                                                                   );
    }
    public function actionOrganization()
    {
                    $model=new Statistics();
       		    $result=$model->getOrganization();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
   		    $title=json_encode(array('text'=>'手机型号'));
		    return $this->render('pie',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }
    public function actionConstellation()
    {
                    $model=new Statistics();
       		    $result=$model->getConstellation();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
  		    $title=json_encode(array('text'=>'星座'));
		    return $this->render('histogram',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }
    public function actionIsp()
    {
                    $model=new Statistics();
       		    $result=$model->getIsp();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'运营商'));
		    return $this->render('pie',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }
    public function actionRoom()
    {
                    $model=new Statistics();
       		    $result=$model->getRoom();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'宿舍'));
		    return $this->render('histogram',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }

    public function actionNet()
    {
                    $model=new Statistics();
       		    $result=$model->getNet();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
  		    $title=json_encode(array('text'=>'校园网'));
		    return $this->render('pie',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }

    public function actionPurchase()
    {
                    $model=new Statistics();
       		    $result=$model->getPurchase();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'年消费分布'));
		    return $this->render('histogram',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }
	
    public function actionWlan()
    {
                    $model=new Statistics();
       		    $result=$model->getWlan();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    $title=json_encode(array('text'=>'校园无线网'));
		    return $this->render('pie',
                                                                                                                            ['jsondata'=>$data,'title'=>$title]
                                                                                                                           );
    }
}
