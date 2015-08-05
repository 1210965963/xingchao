<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZMessage */

$this->title = '添加留言';
$this->params['breadcrumbs'][] = ['label' => '留言管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zmessage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
