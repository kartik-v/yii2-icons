<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

/**
 * Asset bundle for JUI theme set. Uses client assets
 * (CSS, images, and fonts) from Jquery UI Icons repository.
 * @see http://api.jqueryui.com/theming/icons/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class JuiAsset extends \kartik\base\AssetBundle
{
    public $sourcePath = '@bower/jquery-ui';
    public $css = [
        'themes/smoothness/jquery-ui.css',
    ];

}