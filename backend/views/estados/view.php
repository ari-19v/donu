<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EstadoPedidos */

$this->title = $model->idEstado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estado Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
 
    <div class="estado-pedidos-view"><br>

    

        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'idEstado' => $model->idEstado], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idEstado' => $model->idEstado], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'idEstado',
                'Nombre',
            ],
        ]) ?>

    </div>
</section>
