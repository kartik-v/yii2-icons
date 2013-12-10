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
class TypiconsAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/kartik-v/yii2-icons/kartik/lib/typicons';
	public $css = array(
		'css/typicons.min.css',
	);
	public $depends = array(
		'yii\web\YiiAsset'
	);
}
