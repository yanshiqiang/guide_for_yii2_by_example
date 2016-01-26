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
		
	             return $this->render('gender',
							                                                                    ['jsondata'=>$data]
							                                                                   );
    }
	
    public function actionGrade()
    {
	             $model=new Statistics();
	             $result=$model->getGrade();
                     $data=$model->convert_json($result);
	             //var_dump($data);die;
		
	             return $this->render('grade',
						                                                                            ['jsondata'=>$data]
                                                                             					           );
    }	

    public function actionYear()
    {
                     $model=new Statistics();
                     $result=$model->getYear();
                     $data=$model->convert_json($result);
                     //   var_dump($data);die();
                     return $this->render('year',
                                                                                                                            ['jsondata'=>$data]
                                                                                                                           );
   }
   
   public function actionCollege()
    {
                     $model=new Statistics();
                     $result=$model->getCollege();
                     $data=$model->convert_json($result);
                      //   var_dump($data);die();
                     return $this->render('college',
                                                                                                                            ['jsondata'=>$data]
                                                                                                                           );
   } 

    public function actionMajor()
    {
                     $model=new Statistics();
                     $result=$model->getMajor();
                     $data=$model->convert_json($result);
                      //var_dump($data);die;
	  	
                     return $this->render('major',
							                                                                   ['jsondata'=>$data]
							                                                                  );
  }
	
    public function actionGenre()
    {
                     $model=new Statistics();
                     $result=$model->getGenre();
                     $data=$model->convert_json($result);
                     //var_dump($data);die;
                     return $this->render('genre',
                                                                                                                            ['jsondata'=>$data]
                                                                                                                           );
                       
  } 
                    
    public function actionArea()
    {
                    $model=new Statistics();
                    $result=$model->getProvince();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
	
                    return $this->render('province',
                                  					                                                    ['jsondata'=>$data]
                                                                           						   );
    }	
    public function actionNational()
    {
                    $model=new Statistics();
                    $result=$model->getNational();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		
                    return $this->render('national',
                                  						                                            ['jsondata'=>$data]
							                                                                   );
    }
    
    public function actionBirthday()
    {
                    $model=new Statistics();
                    $result=$model->getBirthday();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		
                    return $this->render('birthday',
                                   						                                            ['jsondata'=>$data]
							                                                                   );
    }
    public function actionAlumnus()
    {
                    $model=new Statistics();
                    $result=$model->getAlumnus();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		
                    return $this->render('alumnus',
                                   						                                            ['jsondata'=>$data]
							                                                                   );
    }
    public function actionOrganization()
    {
                    $model=new Statistics();
       		    $result=$model->getOrganization();
                    $data=$model->convert_json($result);
                    //var_dump($data);die;
		    return $this->render('organization',
                                                                                                                            ['jsondata'=>$data]
                                                                                                                           );
    }
}
