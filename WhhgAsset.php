<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

/**
 * Asset bundle for Web Hosting Hub Glyphs. Uses client assets
 * (CSS, images, and fonts) from Web Hosting Hub Glyphs repository.
 * @see http://www.webhostinghub.com/glyphs/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class WhhgAsset extends \kartik\base\AssetBundle
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