<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2020
 * @package yii2-icons
 * @version 1.4.6
 */

namespace kartik\icons;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset bundle for FontAwesome SVG/JS icon set. Uses SVG/JS client assets from font-awesome CDN repository.
 *
 * @see http://fortawesome.github.io/Font-Awesome/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class FontAwesomeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $js = [
        // font awesome free version (can be overridden from yii2 asset manager)
        'https://use.fontawesome.com/releases/v5.13.0/js/all.js'
    ];

    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
        'defer' => true,
        'crossorigin' => 'anonymous'
    ];
}
