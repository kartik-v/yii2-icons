<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2021
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
        //'https://use.fontawesome.com/releases/v5.13.0/js/all.js'
        // Better use CDN version, or else China site would have issue to get the JS.  Below CDN available for worldwide
        // Corrected CDN version (12-Jan-2021) to latest and to use minified assets - kartik-v
        'https://cdn.bootcss.com/font-awesome/5.15.1/js/all.min.js'
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
