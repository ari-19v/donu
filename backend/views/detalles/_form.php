<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallePedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPedido')->textInput() ?>

    <?= $form->field($model, 'idProducto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
