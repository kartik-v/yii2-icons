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

    public $depends = array(
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    );
    public function init() {
		$this->sourcePath = __DIR__ . '/../lib/whhg';
        $this->css = YII_DEBUG ? ['css/whhg.css'] : ['css/whhg.min.css'];
        parent::init();
    }

}
