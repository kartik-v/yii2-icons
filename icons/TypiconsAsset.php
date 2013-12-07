<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran 2013-
 * @version 1.0.0
 */
namespace kartik\icons;

/**
 * Asset bundle for typicon icon set
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class TypiconAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/kartik-v/yii2-icons/kartik/vendor/typicons';
	public $css = array(
		'font/typicons.min.css',
	);
	public $depends = array(
		'yii\web\YiiAsset'
	);
}
