<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.0
 */

namespace kartik\icons;

/**
 * Asset bundle for Octicons icon set. Uses client assets
 * (CSS, images, and fonts) from Github Icons repository.
 * @see https://octicons.github.com/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */

class OcticonsAsset extends \kartik\base\AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/octicons');
        $this->setupAssets('css', ['octicons']);
        parent::init();
    }

}