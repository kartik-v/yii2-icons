<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @package yii2-icons
 * @version 1.4.8
 */

namespace kartik\icons;
use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for the FlagIcon icon set. Uses client assets (CSS, images, and fonts) from flag icons repository.
 * 
 * @see http://lipis.github.io/flag-icon-css/
 *
 * @author Davidson Alencar <davidson.t.i@gmail.com>
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.4
 */
class FlagIconAsset extends BaseAssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/components/flag-icon-css';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setupAssets('css', ['css/flag-icon']);
        parent::init();
    }
}