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
class FontAwesomeFreeAsset extends BaseAssetBundle
{

    public $js = [
		'https://use.fontawesome.com/releases/v5.0.6/js/all.js', //Use Free CDN
    ];

	public $jsOptions = [
		'position' => \yii\web\View::POS_HEAD,
		'defer' => true,
	];
	
}
