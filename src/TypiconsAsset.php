<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-icons
 * @version 1.4.5
 */

namespace kartik\icons;

use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for Typicons icon set. Uses client assets (CSS, images, and fonts) from Typicons repository.
 *
 * @see http://www.typicons.com/
 * 
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class TypiconsAsset extends BaseAssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/typicons');
        $this->setupAssets('css', ['css/typicons']);
        parent::init();
    }
}