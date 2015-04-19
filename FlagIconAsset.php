<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

/**
 * Asset bundle for FlagIcon icon set
 *
 * @author Davidson Alencar <davidson.t.i@gmail.com>
 * @since 1.4
 */
class FlagIconAsset extends \kartik\base\AssetBundle
{
    public $sourcePath = '@vendor/components/flag-icon-css';
    public $depends = array(
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    );

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setupAssets('css', ['css/flag-icon']);
        parent::init();
    }
}