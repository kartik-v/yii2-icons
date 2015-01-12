<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

/**
 * Asset bundle for JUI theme set
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