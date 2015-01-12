<?php
namespace kartik\icons;

class SociconAsset extends \kartik\base\AssetBundle
{

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/lib/socicon');
        $this->setupAssets('css', ['css/socicon']);
        parent::init();
    }

}