<?php

use yii\web\JqueryAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '模特图片';
$this->params['breadcrumbs'][] = $this->title;
$timestamp = time();

$this->registerCssFile('@web/uploadify/uploadify.css');
$this->registerJsFile('@web/uploadify/jquery.uploadify.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJs("
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'_csrf' : yii.getCsrfToken(),
                    'model_id' : '".$_GET['model_id']."'
				},
				'swf'      : '".Yii::$app->homeUrl."uploadify/uploadify.swf',
				'uploader' : '".Url::toRoute('mt-gallery/upload')."',
                'fileSizeLimit' : '80MB',
                'fileTypeExts' : '*.jpg; *.png; *.gif',
                'method' : 'post',
                'multi' : true,
                'buttonText' : '上传图片',
                'fileObjName' : 'ZModelGallery[image]',
                'onUploadSuccess' : function(file,data,respone) {
                    var res = eval(\"(\"+data+\")\");
                    var html = '<div style=\"width: 200px;height: 300px; display: inline-block; text-align: center; margin-right: 5px;\">';
                        html += '<img style=\"width: 200px;height: 200px;\" alt=\"\" src=\"'+res.image+'\">';
                        html += '<span><a href=\"#\" onclick=\"set_image('+res.id+')\">设为封面</a></span>';
                        html += '&nbsp;';
                        html += '<span><a href=\"#\" onclick=\"delete_image('+res.id+')\">删除图片</a></span>';
                        html += '</div>';
                    $('#image-wrap').append(html);
                }
			});
		});
");
?>
<div class="zmodel-gallery-index">

    <p>
        <div id="queue"></div>
        <input id="file_upload" name="file_upload" type="file" class="btn btn-success" multiple="true">
    </p>

    <div id="image-wrap">
        <?php foreach ($models as $item):?>
        <div style="width: 200px;height: 300px; display: inline-block; text-align: center; margin-right: 5px;">
            <img style="width: 200px;height: 200px;" alt="" src="<?php echo Yii::$app->params['uploadFileUrl'].'/upload/'.$item->image ?>">
            <span><a href="#" onclick="set_image(<?php echo $item->id ?>)">设为封面</a></span>
            &nbsp;
            <span><a href="#" onclick="delete_image(<?php echo $item->id ?>)">删除图片</a></span>
        </div>
        <?php endforeach;?>
    </div>
</div>
<script type="text/javascript">
function set_image(id) {
    $.post("<?php echo Url::toRoute('mt-gallery/set-image')?>", {id:id}, function(data) {
    	window.location.href = '';
    });
}

function delete_image(id) {
    $.post("<?php echo Url::toRoute('mt-gallery/delete')?>", {id:id}, function(data) {
        window.location.href = '';
    });
}
</script>