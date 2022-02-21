<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallePedido */

$this->title = Yii::t('app', 'Create Detalle Pedido');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
