<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\DetallePedido;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DetallesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Detalle Pedidos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detalle Pedido'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetallePedido',
            'idPedido',
            'idProducto',
            'cantidad',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DetallePedido $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idDetallePedido' => $model->idDetallePedido]);
                 }
            ],
        ],
    ]); ?>


</div>
