<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZModel */

$this->title = '模特: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '模特管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑模特';
?>
<div class="zmodel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
