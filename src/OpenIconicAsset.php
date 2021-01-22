<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2021
 * @package yii2-icons
 * @version 1.4.7
 */

namespace kartik\icons;

use kartik\base\BaseAssetBundle;

/**
 * Asset bundle for Open Iconic icon set. Uses client assets (CSS, images, and fonts) from Open Iconic repository.
 * 
 * @see https://github.com/iconic/open-iconic
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class OpenIconicAsset extends BaseAssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/openiconic');
        $this->setupAssets('css', ['css/open-iconic-bootstrap']);
        parent::init();
    }
}