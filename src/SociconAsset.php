<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-icons
 * @version 1.4.5
 */

namespace kartik\icons;

/**
 * Asset bundle for Socicon icon set. Uses client assets (CSS, images, and fonts) from Socicon repository.
 *
 * @see http://www.socicon.com/
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */

class SociconAsset extends \kartik\base\AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/socicon');
        $this->setupAssets('css', ['css/socicon']);
        parent::init();
    }

}