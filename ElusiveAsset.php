<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

/**
 * Asset bundle for Elusive icon set. Uses client assets
 * (CSS, images, and fonts) from Elusive Icons repository.
 * @see http://shoestrap.org/downloads/elusive-icons-webfont/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class ElusiveAsset extends \kartik\base\AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/elusive');
        $this->setupAssets('css', ['css/elusive-webfont']);
        parent::init();
    }
}