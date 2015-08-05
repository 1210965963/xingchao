<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZModel */

$this->title = '添加模特';
$this->params['breadcrumbs'][] = ['label' => '模特管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zmodel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
