<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-icons
 * @version 1.0.0
 */

namespace kartik\icons;

/**
 * Asset bundle for Typicons icon set
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class TypiconsAsset extends \yii\web\AssetBundle {

    public $sourcePath = '@vendor/kartik-v/yii2-icons/kartik/lib/typicons';
    public $depends = array(
        'yii\web\YiiAsset'
    );

    public function init() {
        $this->css = YII_DEBUG ? ['css/typicons.css'] : ['css/typicons.min.css'];
        parent::init();
    }

}
