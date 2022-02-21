<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedidos */

$this->title = Yii::t('app', 'Create Pedidos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
