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
	public $sourcePath = '@vendor/kartik-v/yii2-icons/kartik/lib/elusive';
	public $css = array(
		'css/elusive-webfont.min.css',
	);
	public $depends = array(
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset'
	);
}
