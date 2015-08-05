<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZModelCat */

$this->title = '添加分类';
$this->params['breadcrumbs'][] = ['label' => '模特分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zmodel-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
