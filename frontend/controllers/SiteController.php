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
                     'base_url' =>'http://localhost/servicio_estudiantes/frontend/web/index.php/api?',
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
    
     public function actionSecretaria()
    {
         //Pasar datos del servicio de estudiante
         $api = new \RestClient(
                 [
                     'base_url' =>'http://localhost/servicio_estudiantes/frontend/web/index.php/api?',
                     'headers' => [
                              'Accept' =>'application/json'
                     ]
                 ]
                 );
         $result = $api->get('/default');
        $estudiante = \yii\helpers\Json::decode($result->response);
         //-------Hasta aki----------//
         
         //Pasar datos del servicio de vinculacion
         $api1 = new \RestClient(
                 [
                     'base_url' =>'http://localhost/servicio_estudiantes/frontend/web/index.php/api2?',
                     'headers' => [
                              'Accept' =>'application/json'
                     ]
                 ]
                 );
         $result1 = $api1->get('/default');
        $vinculacion = \yii\helpers\Json::decode($result1->response);
        //-------Hasta aki----------//
        
        //Pasar datos de practicas pre-profesionales
        $model1 = \common\models\PreProfesionales::find()->select(['N_Matricula as matricula, Id_Empresa as idemp, Fecha_inicio as finicio, Fecha_fin as ffin, sum(N_Horas) as horas, (abs(240-sum(N_Horas))) as restantes'])->groupBy('N_Matricula');
        $command = $model1->createCommand();
        $practicas = $command->queryAll();
        //-------Hasta aki----------//
        
        //Pasar datos de certificados 
        $model2 = \common\models\Certificados::find()->select(['matricula as matricula1'])->groupBy('matricula');
        $command2 = $model2->createCommand();
        $certificado = $command2->queryAll();
        //-------Hasta aki----------//
        
        //-------Utilizamos dataProvider para mandarlo a la vista ---------//
        $dataProvider = new ArrayDataProvider([
            'allModels' => $estudiante,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('secretaria',[
            //'query' => $data,
             'dataProvider' => $dataProvider,
            'estudiante' => $estudiante,
            'vinculacion' => $vinculacion,
            'preprofesionales' => $practicas,
            'certificado' => $certificado,
            
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
