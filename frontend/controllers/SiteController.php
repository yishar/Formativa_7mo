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

//Añadido
use yii\data\ArrayDataProvider;
use yii\httpclient\Client;
use yii\helpers\Json;


use frontend\models\LaborSocialSearch;

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
                     'base_url' =>'https://localhost/servicio_estudiantes/frontend/web/index.php/api?',
                     'headers' => [
                              'Accept' =>'application/json'
                     ]
                 ]
                 );
         $result = $api->get('/default');
        $data = \yii\helpers\Json::decode($result->response);
        
       
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
                 
        return $this->render('estudiante',[
            //'query' => $data,
             'dataProvider' => $dataProvider,
            'data' => $data,
            
        ]);
    }
 public function actionSecretaria() {
        $client = new Client(['baseUrl' => 'https://localhost/servicio_estudiantes/frontend/web/index.php/api?']);
        $response = $client->createRequest()
               // ->setUrl('estudiantes')//toma los datos del controlador estudiantes del servicio que nos estan dando
                //->setMethod('post')
                //->setData(['nummatricula'=>9854])busca por matricula, esto sera remplazado por el nombre del campo del formulario
                ->addHeaders(['content-type' => 'application/json'])
                ->send();
        $data = Json::decode($response->content);
        
//         $data1=[['h_vin' =>1],['h_vin' =>0],
//    ['h_vin' =>false],['h_vin' =>'flase'],
//    ['h_vin' =>false],['h_vin' =>true]];
         $data1['h_vin']='No';
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('secretaria', [
                    'dataProvider' => $dataProvider,
            'data1'=>$data1,
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
