<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2015
 * @package yii2-icons
 * @version 1.4.1
 */

namespace kartik\icons;
use kartik\base\AssetBundle;

/**
 * Asset bundle for FontAwesome icon set. Uses client assets
 * (CSS, images, and fonts) from font-awesome repository.
 * @see http://fortawesome.github.io/Font-Awesome/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setupAssets('css', ['css/font-awesome']);
        parent::init();
    }
}