<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\EstadoPedidos;
use backend\models\DetallePedido;
use backend\models\Pedido;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Pedidos */
/* @var $form yii\widgets\ActiveForm */
?>
<section class=" containe bg-light">
    <div class="containe bg-secondary">        
        <div class="form-row " >
            <div class="col-md-10" >
                <?= Html::img('@web/images/icon/rol.png', ['width' =>'80'], ['height'=>'80']) ?>                
                    <button type="button"class=" btn btn-secondary" style="color: white">
                    <h1 class=""></h1>                     
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row"><br>
                <div class="col-7"><br>
                    <div class="form-row">
                        <div class="col-4">
                            <?php
                                $users =ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');
                                $estado =ArrayHelper::map(EstadoPedidos::find()->orderBy('Nombre')->all(), 'idEstado', 'Nombre');
                            ?>
                            <!--  $form->field($model, 'idPedido')->dropDownList($users) ?>                        -->
                            <?= $form->field($model, 'idCliente')->dropDownList($users)?>
                        </div>
                        <div class="col-4">
                        <!-- <fieldset disabled>  $form->field($model, 'idRepartidor')->textInput(yii::$app->user->id)?></fieldset> -->
                            <?= $form->field($model, 'idRepartidor')->dropDownList($users)?>    
                            <?= $form->field($model, 'idMensajero')->dropDownList($users) ?>
                        </div>
                        <div class="col-4">
                        
                            <?= $form->field($model, 'idEstado')->dropDownList($estado)?>
                            <?= $form->field($model, 'rireccion')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div><br>
                </div>

                <div class="col-5 bg-white"><br>
                    <h2 class="bg-success text-white">PRODUCTOS</h2>
                    <?=
                    \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getDetallePedido(),
                    'pagination' => false
                    ]),
                    /*'controller' => 'actividades',*/
                    
                        'columns' => [
                            'idProducto',
                            'cantidad',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'controller' => 'detalle',
                                'header' => Html::a('<i class"glyphicon  glyphicon-plus"></i>&nbsp;Agregar producto', ['detalles/create-con-pedido','idPedido' => $model->idPedido]),
                                'template' => '{update_con_pedido} {delete}',
                                'buttons' => [
                                    'update_con_pedido' => function ($url, $model){
                                        return Html::a('<span class="glyphicon  glyphicon-pencil">Edit</span>', $url);
                                    }
                                ],
                                
                                'urlCreator' => function($action, $model, $key, $index){
                                    if ($action === 'update_con_pedido') {
                                        $url = Url::to(['detalles/update-con-pedido', 'id' => $model->idDetallePedido]);
                                        return $url;
                                    }
                                    elseif ($action === 'delete') {
                                        $url =  Url::to(['detalles/delete-con-pedido', 'id' => $model->idDetallePedido]);
                                        return $url;
                                    }
                                }
                            ],
                        ],

                    ]);
                    ?>
                
                </div>

       
       
        

       

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</section>
