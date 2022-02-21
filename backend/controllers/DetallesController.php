<?php

namespace backend\controllers;

use yii;
use backend\models\DetallePedido;
use backend\models\Pedidos;
use backend\models\search\DetallesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



/**
 * DetallesController implements the CRUD actions for DetallePedido model.
 */
class DetallesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all DetallePedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetallesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetallePedido model.
     * @param int $idDetallePedido Id Detalle Pedido
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idDetallePedido)
    {
        return $this->render('view', [
            'model' => $this->findModel($idDetallePedido),
        ]);
    }

    /**
     * Creates a new DetallePedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DetallePedido();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idDetallePedido' => $model->idDetallePedido]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionCreateConPedido($idPedido){
        $model = new DetallePedido();
        $model->idPedido = $idPedido;
        $bandera = false;
        
        if ($model->load(yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['/pedidos/update', 'idPedido' => $idPedido]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'bandera' => $bandera,
            ]);
        }
    }

    /**
     * Updates an existing DetallePedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idDetallePedido Id Detalle Pedido
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idDetallePedido)
    {
        $bandera = true;
        $model = $this->findModel($idDetallePedido);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDetallePedido' => $model->idDetallePedido]);
        }

        return $this->render('update', [
            'model' => $model,
            'bandera' => $bandera,
        ]);
    }


    public function actionUpdateConPedido($id){
        
        $bandera = false;
        $model = $this->findModel($id);

        if ($model->load(yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pedidos/update', 'idPedido' => $model->idPedido]);
         }
         else {
             return $this->render('update', [
                 'model' => $model,
                 'bandera' => $bandera,
             ]);
         }
    }
    /**
     * Deletes an existing DetallePedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idDetallePedido Id Detalle Pedido
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idDetallePedido)
    {
        $this->findModel($idDetallePedido)->delete();

        return $this->redirect(['index']);
    }


    public function actionDeleteConPedido($id)
    {
        $model = $this->findModel($id);
        $idPedido = $model->idPedido;
        $model->delete();
        return $this->redirect(['/pedidos/update', 'idPedido'=>$idPedido]);
       // return $this->redirect(['index']);
    }

    /**
     * Finds the DetallePedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idDetallePedido Id Detalle Pedido
     * @return DetallePedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idDetallePedido)
    {
        if (($model = DetallePedido::findOne(['idDetallePedido' => $idDetallePedido])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
