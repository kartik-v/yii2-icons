<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @package yii2-icons
 * @version 1.4.3
 */

namespace kartik\icons;

use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for FontAwesome icon set. Uses client assets (CSS, images, and fonts) from font-awesome repository.
 *
 * @see http://fortawesome.github.io/Font-Awesome/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class FontAwesomeProAsset extends BaseAssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
		'js/fontawesome-all.min.js',  //Font Awesome 5 Pro is subscriber only; user has to copy file to /js
    ];
	public $jsOptions = [
		'position' => \yii\web\View::POS_HEAD,
		'defer' => true,
	];
	
}
