<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran 2013-
 * @version 1.0.0
 */
namespace kartik\icons;

/**
 * Asset bundle for elusive icon set
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class ElusiveAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/kartik-v/yii2-icons/kartik/vendor/elusive-iconfont';
	public $css = array(
		'css/elusive-webfont.css',
	);
	public $depends = array(
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset'
	);
}
