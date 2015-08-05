<?php
use yii\helpers\Url;
$this->title = 'My Yii Application';
$this->registerCssFile('@web/css/contact.css');
?>
<div class="ybtp">

	<div>
		<div class="xdt"></div>
		<div class="xdt_xwz"></div>
		<div class="xdt_y">
			<form action="<?php echo Url::to(['save'])?>" method="post">
				<ul>
					<li><input name="ZMessage[real_name]" type="text" value="<?php echo $model->real_name ?>" class=" xdt_form"
						placeholder="您的姓名"></li>
					<li><input name="ZMessage[real_mobile]" type="text" value="<?php echo $model->real_mobile ?>" class=" xdt_form"
						placeholder="您的电话"></li>
					<li><textarea name="ZMessage[real_remark]" cols="50" rows="10" class="xdt_formz"
							placeholder="留言给我们："><?php echo $model->real_remark ?></textarea> <input type="image"
						src="<?php echo Yii::getAlias('@web') ?>/images/btn_tj.gif" class="xdt_formtb" /></li>
				</ul>
				<input type="hidden" name="<?php echo Yii::$app->request->csrfParam?>" value="<?php echo Yii::$app->request->csrfToken?>" />
			</form>
		</div>
	</div>


	<div class="logo_menu">
		<div class="menu_app">
			<a href="#" target="_blank"><button title="列表"></button></a>
		</div>

	</div>



	<!--音乐插件-->


	<div class="qq">
		<div class="qq_h">
			<a href="#" target="_blank"><button title="QQ"></button></a>
		</div>
	</div>

	<div class="sjh">
		<div class="sjh_h">
			<a href="#" target="_blank"><button title="手机"></button></a>
		</div>
	</div>

</div>
<?php if (isset($_GET['success'])):?>
<script type="text/javascript">
alert('录入成功');
</script>
<?php endif;?>
<?php if (count($model->errors)) : ?>
<script type="text/javascript">
<?php 
foreach ($model->errors as $error):
?>
alert('<?php echo $error[0]?>');
<?php
break;
endforeach;
?>
</script>
<?php endif; ?>
