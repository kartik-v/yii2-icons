<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.1
 */

namespace kartik\icons;
use kartik\base\AssetBundle;

/**
 * Asset bundle for IcoFont icon set.
 * @see http://icofont.com/
 *
 * @author Andrei Shvets <shvetsdnepr@gmail.com>
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.4.1
 */

class IcoFontAsset extends AssetBundle
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