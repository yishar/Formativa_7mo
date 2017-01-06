<?php

namespace frontend\controllers;

use Yii;
use common\models\LaborSocial;
use common\searchs\LaborSocialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single LaborSocial model.
     * @param string $Cedula
     * @param integer $Id_actividad
     * @param string $CedulaCoordi
     * @return mixed
     */
    public function actionView($Cedula, $Id_actividad, $CedulaCoordi)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "LaborSocial #".$Cedula, $Id_actividad, $CedulaCoordi,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($Cedula, $Id_actividad, $CedulaCoordi),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','Cedula, $Id_actividad, $CedulaCoordi'=>$Cedula, $Id_actividad, $CedulaCoordi],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($Cedula, $Id_actividad, $CedulaCoordi),
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
        $request = Yii::$app->request;
        $model = new LaborSocial();  

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
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new LaborSocial",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
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
                return $this->redirect(['view', 'Cedula' => $model->Cedula, 'Id_actividad' => $model->Id_actividad, 'CedulaCoordi' => $model->CedulaCoordi]);
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
     * @param string $Cedula
     * @param integer $Id_actividad
     * @param string $CedulaCoordi
     * @return mixed
     */
    public function actionUpdate($Cedula, $Id_actividad, $CedulaCoordi)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($Cedula, $Id_actividad, $CedulaCoordi);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update LaborSocial #".$Cedula, $Id_actividad, $CedulaCoordi,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "LaborSocial #".$Cedula, $Id_actividad, $CedulaCoordi,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','Cedula, $Id_actividad, $CedulaCoordi'=>$Cedula, $Id_actividad, $CedulaCoordi],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update LaborSocial #".$Cedula, $Id_actividad, $CedulaCoordi,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
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
                return $this->redirect(['view', 'Cedula' => $model->Cedula, 'Id_actividad' => $model->Id_actividad, 'CedulaCoordi' => $model->CedulaCoordi]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing LaborSocial model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Cedula
     * @param integer $Id_actividad
     * @param string $CedulaCoordi
     * @return mixed
     */
    public function actionDelete($Cedula, $Id_actividad, $CedulaCoordi)
    {
        $request = Yii::$app->request;
        $this->findModel($Cedula, $Id_actividad, $CedulaCoordi)->delete();

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
     * @param string $Cedula
     * @param integer $Id_actividad
     * @param string $CedulaCoordi
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
     * @param string $Cedula
     * @param integer $Id_actividad
     * @param string $CedulaCoordi
     * @return LaborSocial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Cedula, $Id_actividad, $CedulaCoordi)
    {
        if (($model = LaborSocial::findOne(['Cedula' => $Cedula, 'Id_actividad' => $Id_actividad, 'CedulaCoordi' => $CedulaCoordi])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
