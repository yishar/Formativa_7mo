<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'AuditTrailBehavior' => [
                'class' => 'bedezign\yii2\audit\AuditTrailBehavior',
                // Array with fields to save. You don't need to configure both `allowed` and `ignored`
                //'allowed' => ['*'],
                // Array with fields to ignore. You don't need to configure both `allowed` and `ignored`
                //'ignored' => ['*'],
                // Array with classes to ignore
                //'ignoredClasses' => ['common\models\Model'],
                // Is the behavior is active or not
                'active' => true,
                // Date format to use in stamp - set to "Y-m-d H:i:s" for datetime or "U" for timestamp
                'dateFormat' => 'Y-m-d H:i:s',
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    
     public function actionEstudiante()
    {
         $api = new \RestClient(
                 [
                     'base_url' =>'http://localhost/servicio_estudiantes/frontend/web/index.php/api?',
                     'headers' => [
                              'Accept' =>'application/json'
                     ]
                 ]
                 );
         $result = $api->get('/default');
        $data = \yii\helpers\Json::decode($result->response);
        

        
//$resultData = [
//    '4' => [
//        'id'          => 4,
//        'key'         => 'dictionary_email',
//        'value'       => 'Email',
//        'description' => '//email comment'
//    ],
//    '5' => [
//        'id'          => 5,
//        'key'         => 'dictionary_username',
//        'value'       => 'Name',
//        'description' => '//name comment'
//    ],
//    '6' => [
//        'id'          => 6,
//        'key'         => 'dictionary_new-password',
//        'value'       => 'New password',
//        'description' => '//new password comment'
//    ],
//    '7' => [
//        'id'          => 7,
//        'key'         => 'dictionary_current-password',
//        'value'       => 'Current password',
//        'description' => '//current password'
//    ],
//];        
        
              //  $query = Actividad::find();

//        $dataProvider = new \yii\data\ActiveDataProvider([
//            'query' => $resultData,
//            
//            //'totalCount' => 3,
//        ]);
        
        
//        $arr=[];
//        
//        foreach ($data as $key => $value) {
//            $arr[]=['Cedula'=>$value['Cedula'], 'Nombre'=>$value['Nombre'], 'Apellido'=>$value['Apellido']];
//        }

        // add conditions that should always apply here

   
                 
        return $this->render('estudiante',[
            //'query' => $data,
                        //'dataProvider' => $dataProvider,
            'data' => $data,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
