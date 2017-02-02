<?php

namespace frontend\controllers;

use Yii;
use common\models\LaborSocial;
use frontend\models\LaborSocialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/////
use kartik\mpdf\Pdf;

/**
 * LaborSocialController implements the CRUD actions for LaborSocial model.
 */
class LaborSocialController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//                'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                [
//                        'actions' => ['logout', 'index', 'create', 'update', 'view', ],
//                        'allow' => true,
//                        'roles' => ['AdministradorLaborSocial'],
//                ],
//                [
//                        'actions' => ['index', 'create', 'update', 'view', ],
//                        'allow' => false,
//                        'roles' => ['AdministradorPracticasPre-Profesionales'],
//                ],
//                [
//                        'actions' => ['index', 'create', 'update', 'view', ],
//                        'allow' => false,
//                        'roles' => ['AdministradorSecreteria'],
//                ],
//               [
//                        'actions' => ['logout', 'index', 'create', 'update', 'view', ],
//                        'allow' => true,
//                        'roles' => ['superadmin'],
//                ],
//                    ],
//                     ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            ];        
       
    }

    /**
     * Lists all LaborSocial models.
     * @return mixed
     */
    public function actionIndex()
    {    
        
        $searchModel = new LaborSocialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=3;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single LaborSocial model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "LaborSocial #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new LaborSocial model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Tomar los estudiantes desde el servicio
        $request = Yii::$app->request;
        $model = new LaborSocial();  
        
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
       
                  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new LaborSocial",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'data' => $data,
                        
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new LaborSocial",
                    'content'=>'<span class="text-success">Create LaborSocial success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Crear Mas',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Crear nueva Labor Social",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'data' => $data,
                        
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->Id_labor_social]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing LaborSocial model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        //Tomar los estudiantes desde el servicio 
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
       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update LaborSocial #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "LaborSocial #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update LaborSocial #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->Id_labor_social]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'data' => $data,
                ]);
            }
        }
    }

    /**
     * Delete an existing LaborSocial model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing LaborSocial model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the LaborSocial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LaborSocial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaborSocial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    //////////////////////Para reporte general////////////////////////
  public function actionReporte() {
      $model = LaborSocial::find()->groupBy('Cedula')->all();
      $model1 = LaborSocial::find()->select(['Cedula as cedula, Id_actividad as idact, sum(N_horas) as horas'])->groupBy('Cedula');
      $command = $model1->createCommand();
      $rows = $command->queryAll();
      
      //Tomar los estudiantes desde el servicio      
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
      

        //-------Fin Servicio --------//
        $pdf = new Pdf([
            'content' => $this->renderPartial('reporte', [
                'model' => $model,
                'rows' => $rows,
                'data' => $data,
            ]),
            // 'mode'=> Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            //'orientation'=>Pdf::ORIENT_POTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.kv-heading-1{font-size:14px}',
            'options' => ['title' => 'Reporte de horas por estdiante'],
            'methods' => [
                'setHeader' => ['Generado: ' . date("r")],
                'setFooter' => ['|PÃ¡gina {PAGENO}|'],
            ]
        ]);
        return $pdf->render('reporte');
    }
}
