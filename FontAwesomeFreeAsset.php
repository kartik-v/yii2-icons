<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-icons
 * @version 1.4.4
 */

namespace kartik\icons;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset bundle for FontAwesome icon set. Uses client assets (CSS, images, and fonts) from font-awesome repository.
 *
 * @see http://fortawesome.github.io/Font-Awesome/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class FontAwesomeFreeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $js = [
		'https://use.fontawesome.com/releases/v5.0.6/js/all.js', //Use Free CDN
    ];
    /**
     * @inheritdoc
     */
	public $jsOptions = [
		'position' => View::POS_HEAD,
		'defer' => true,
	];
}
