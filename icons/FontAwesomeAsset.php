<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran 2013-
 * @version 1.0.0
 */
namespace kartik\icons;

/**
 * Asset bundle for FontAwesome icon set
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class FontAwesomeAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/fortawesome/font-awesome';
	public $css = array(
		'css/font-awesome.min.css',
	);
	public $depends = array(
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset'
	);
}
