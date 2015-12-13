<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.1
 */

namespace kartik\icons;

/**
 * Asset bundle for Open Iconic icon set. Uses client assets
 * (CSS, images, and fonts) from Open Iconic repository.
 * @see https://github.com/iconic/open-iconic
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class OpenIconicAsset extends \kartik\base\AssetBundle
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