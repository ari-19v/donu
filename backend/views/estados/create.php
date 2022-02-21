<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EstadoPedidos */

$this->title = Yii::t('app', 'Create Estado Pedidos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estado Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-pedidos-create">

 <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
