<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Roles */
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
<div class="roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</section>
