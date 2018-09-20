<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-icons
 * @version 1.4.5
 */

namespace kartik\icons;
use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for IcoFont icon set. Uses client assets (CSS, images, and fonts) from IcoFont repository.
 * @see http://icofont.com/
 *
 * @author Andrei Shvets <shvetsdnepr@gmail.com>
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.4.5
 */

class IcoFontAsset extends BaseAssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/icofont');
        $this->setupAssets('css', ['css/icofont']);
        parent::init();
    }
}