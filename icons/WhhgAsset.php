<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-icons
 * @version 1.0.0
 */

namespace kartik\icons;

/**
 * Asset bundle for Web Hosting Hub Glyphs
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class WhhgAsset extends \yii\web\AssetBundle {

    public $sourcePath = '@vendor/kartik-v/yii2-icons/kartik/lib/whhg';
    public $css = array(
        'css/whhg.min.css',
    );
    public $depends = array(
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    );

}
