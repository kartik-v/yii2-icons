<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-icons
 * @version 1.0.0
 */

namespace kartik\icons;

/**
 * Asset bundle for Elusive icon set
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class ElusiveAsset extends \yii\web\AssetBundle {

    public $depends = array(
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    );

    public function init() {
		$this->sourcePath = __DIR__ . '/../lib/elusive';
        $this->css = YII_DEBUG ? ['css/elusive-webfont.css'] : ['css/elusive-webfont.min.css'];
        parent::init();
    }

}
