<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-icons
 * @version 1.4.5
 */

namespace kartik\icons;

use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for Web Hosting Hub Glyphs. Uses client assets (CSS, images, and fonts) from WHHG repository.
 *
 * @see http://www.webhostinghub.com/glyphs/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class WhhgAsset extends BaseAssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/whhg');
        $this->setupAssets('css', ['css/whhg']);
        parent::init();
    }
}