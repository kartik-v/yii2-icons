<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2021
 * @package yii2-icons
 * @version 1.4.7
 */

namespace kartik\icons;

use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for JUI theme set. Uses client assets (CSS, images, and fonts) from Jquery UI Icons repository.
 * 
 * @see http://api.jqueryui.com/theming/icons/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class JuiAsset extends BaseAssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/jquery-ui';
    /**
     * @inheritdoc
     */
    public $css = [
        'themes/smoothness/jquery-ui.css',
    ];

}