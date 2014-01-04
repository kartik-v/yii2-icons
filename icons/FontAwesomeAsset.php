<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-icons
 * @version 1.0.0
 */

namespace kartik\icons;

/**
 * Asset bundle for FontAwesome icon set
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class FontAwesomeAsset extends \yii\web\AssetBundle {

    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $depends = array(
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    );

    public function init() {
        $this->css = YII_DEBUG ? ['css/font-awesome.css'] : ['css/font-awesome.min.css'];
        parent::init();
    }

}
