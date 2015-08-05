<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ZMessage;

/* @var $this yii\web\View */
/* @var $model common\models\ZMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zmessage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'real_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'real_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'real_remark')->textarea() ?>

    <?= $form->field($model, 'status')->dropDownList(ZMessage::getArrayStatus()) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '编辑', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
