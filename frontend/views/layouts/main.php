<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
  <?php $this->beginBody() ?>
  <div class="zb">
    <div class="logo"></div>
    <div class="zc">
    <ul>
      <li class="zc01"><a href="<?php echo Yii::$app->homeUrl ?>" title="首页"></a></li>
      <li class="zc02"><a href="<?php echo Url::toRoute('team/index')?>"  title="团队作品"></a></li>
      <li class="zc06"><a href="<?php echo Url::toRoute('mt/index')?>" title="模特"></a></li> 
      <li class="zc03"><a href="<?php echo Url::toRoute('service/index')?>" title="服务内容"></a></li> 
      <li class="zc04"><a href="<?php echo Url::toRoute('about/index')?>" title="关于我们"></a></li>
      <li class="zc05"><a href="<?php echo Url::toRoute('contact/index')?>" title="联系我们"></a></li>        
    </ul>
  </div>
  <div class="xiam">
    <label>QQ:</label>&nbsp;1234567   <label>Tel:</label>&nbsp;020-23456789<br/>
    <span>Copyright      2015 StarTide all</span>
  </div>
  </div>
  <?= $content ?>

  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
