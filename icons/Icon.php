<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-icons
 * @version 1.0.0
 */

namespace kartik\icons;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

/**
 * Icon is a class for setting up icon frameworks to work with Yii in an easy way
 * To setup a global default icon framework, you can set the Yii param 'icon-framework' 
 * to one of the following values in your config file:
 * - 'fa' for Font Awesome Icons
 * - 'el' for Elusive Font Icons
 * - 'typ' for Typicon Font Icons
 * - 'whhg' for Web Hosting Hub Glyphs Icons
 * - 'jui' for JQuery UI Icons
 * 
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 */
class Icon {

    const NS = '\\kartik\\icons\\';
    const PARAM_NOT_SET = "The 'icon-framework' option has not been setup in Yii params. Check your configuration file.";
    const PARAM_INVALID = "Invalid or non-recognized 'icon-framework' has been setup in Yii params. Check your configuration file.";

    /**
     * Icon framework constants
     */
    const FA = 'fa';
    const EL = 'el';
    const TYP = 'typ';
    const WHHG = 'whhg';
    const JUI = 'jui';

    /**
     * Icon framework configurations
     */
    private static $_frameworks = [
        self::FA => ['prefix' => 'fa fa-', 'class' => 'FontAwesomeAsset'],
        self::EL => ['prefix' => 'el-icon-', 'class' => 'ElusiveAsset'],
        self::TYP => ['prefix' => 'typcn typcn-', 'class' => 'TypiconsAsset'],
        self::WHHG => ['prefix' => 'icon-', 'class' => 'WhhgAsset'],
        self::JUI => ['prefix' => 'ui-icon ui-icon-', 'class' => '\\yii\\jui\\ThemeAsset']
    ];

    /**
     * Returns the font framework setup from Yii parameters.
     *
     * @var string the framework to be used with the application
     * @throws InvalidConfigException
     */
    protected static function getFramework($framework = null) {
        if (strlen($framework) == 0 && empty(Yii::$app->params['icon-framework'])) {
            throw new InvalidConfigException(self::PARAM_NOT_SET);
        }
        if (!in_array(Yii::$app->params['icon-framework'], array_keys(self::$_frameworks))) {
            throw new InvalidConfigException(self::PARAM_INVALID);
        }
        if (strlen($framework) == 0) {
            return Yii::$app->params['icon-framework'];
        }
        return $framework;
    }

    /**
     * Maps the icon framework to the current view. Call this in your view or layout file.
     *
     * @param object $view the view object
     * @param string $framework the name of the framework, if not passed it will default to
     * the Yii config param 'icon-framework'
     */
    public static function map($view, $framework = null) {
        $key = static::getFramework($framework);
        $class = self::$_frameworks[$key]['class'];
        if (substr($class, 0, 1) != '\\') {
            $class = self::NS . $class;
        }
        $class::register($view);
    }

    /**
     * Displays an icon for a specific framework.
     *
     * @param string $name the icon name
     * @param array $options the icon options
     * @param string $framework the icon framework name. If not passed will default to the
     * `icon-framework` param set in Yii Configuration file. Will throw an InvalidConfigException
     * if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to true 
     * @param string $tag the html tag to wrap the icon (defaults to 'i')
     * @return string the html formatted icon
     */
    public static function show($name, $options = [], $framework = null, $space = true, $tag = 'i') {
        $key = static::getFramework($framework);
        $class = self::$_frameworks[$key]['prefix'] . $name;
        $options['class'] = empty($options['class']) ? $class : $class . ' ' . $options['class'];
        return Html::tag($tag, '', $options) . ($space ? ' ' : '');
    }

}
